<?php

namespace App\Livewire\Settings;

use App\Livewire\Concerns\HasToast;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RolePermissionMatrix extends Component
{
    use HasToast;

    // We store role and permission objects to build the table
    // But matrix property holds the boolean state for each combination
    public $roleList;

    public $permissionList;

    public $matrix = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Use App\Models for correct UUID handling
        $this->roleList = Role::whereIn('name', [
            'dosen',
            'reviewer',
            'dekan',
            'kepala lppm',
            'admin lppm',
            'superadmin',
            'rektor',
        ])->orderBy('name')->get();

        // Get only module permissions
        $this->permissionList = Permission::where('name', 'like', 'module_%')
            ->orderBy('name')
            ->get();

        // Build the current matrix state
        $this->matrix = [];
        foreach ($this->roleList as $role) {
            foreach ($this->permissionList as $permission) {
                // Check direct DB to avoid caching issues during live updates
                $hasPerm = DB::table('role_has_permissions')
                    ->where('role_id', $role->id)
                    ->where('permission_id', $permission->id)
                    ->exists();

                $this->matrix[$role->id][$permission->id] = $hasPerm;
            }
        }
    }

    /**
     * Toggles the permission state in the UI matrix.
     * Decisions are only persisted when the Save button is clicked.
     */
    public function togglePermission($roleId, $permissionId)
    {
        // Find role and permission by their UUID keys
        $role = Role::find($roleId);
        $permission = Permission::find($permissionId);

        if (! $role || ! $permission) {
            return;
        }

        // Safety Rule: Admin LPPM and Superadmin must always have access to settings
        if (
            in_array($role->name, ['admin lppm', 'superadmin']) &&
            in_array($permission->name, ['module_pengaturan', 'module_kelola_pengguna'])
        ) {
            $this->toastWarning('Hak akses dasar Administrator tidak dapat dicabut.', 'Keamanan');

            // Force the state back to true
            $this->matrix[$roleId][$permissionId] = true;

            return;
        }

        // Just toggle the matrix state in memory
        $this->matrix[$roleId][$permissionId] = ! ($this->matrix[$roleId][$permissionId] ?? false);
    }

    /**
     * Persists all matrix changes to the database.
     */
    public function save()
    {
        $updatedCount = 0;

        try {
            DB::transaction(function () use (&$updatedCount) {
                foreach ($this->matrix as $roleId => $permissions) {
                    $role = Role::find($roleId);
                    if (! $role) {
                        continue;
                    }

                    // Get IDs of permissions that are set to true in the matrix
                    $allowedPermissionIds = array_keys(array_filter($permissions));

                    // Use sync to efficiently update the role_has_permissions pivot table
                    // We sync by IDs which is faster than names
                    $role->permissions()->sync($allowedPermissionIds);
                    $updatedCount++;
                }
            });

            // Clear Spatie Permissions cache to ensure changes take effect immediately
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            $this->toastSuccess('Pengaturan hak akses berhasil disimpan permanent ke sistem.');
        } catch (\Throwable $e) {
            \Log::error('RBAC Matrix Save Error: '.$e->getMessage());
            $this->toastError('Gagal menyimpan perubahan: '.$e->getMessage());
        }
    }

    /**
     * Discards memory changes and reloads from database.
     */
    public function resetMatrix()
    {
        $this->loadData();
        $this->toastInfo('Matriks hak akses dimuat ulang dari database.');
    }

    public function render()
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        return view('livewire.settings.role-permission-matrix');
    }
}
