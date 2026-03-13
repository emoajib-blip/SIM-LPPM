<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager

        $permissionsToFix = [
            'module_penelitian' => ['dosen', 'kepala lppm', 'admin lppm', 'rektor', 'dekan', 'superadmin'],
            'module_pengabdian' => ['dosen', 'kepala lppm', 'admin lppm', 'rektor', 'dekan', 'superadmin'],
        ];

        foreach ($permissionsToFix as $permissionName => $roleNames) {
            // Use DB table directly to avoid Eloquent UUID -> Integer casting (which results in 0)
            $permission = DB::table('permissions')->where('name', $permissionName)->where('guard_name', 'web')->first();

            if (!$permission) {
                continue;
            }

            // 1. Clear existing assignments for this permission to start fresh
            DB::table('role_has_permissions')->where('permission_id', $permission->id)->delete();

            // 2. Assign to correct roles
            foreach ($roleNames as $roleName) {
                $role = DB::table('roles')->where('name', $roleName)->where('guard_name', 'web')->first();

                if ($role) {
                    DB::table('role_has_permissions')->insert([
                        'permission_id' => $permission->id,
                        'role_id' => $role->id,
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Not implemented (no safe way to undo correctly without knowing previous and current state)
    }
};
