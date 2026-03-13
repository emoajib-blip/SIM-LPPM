<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Define all dynamic modules mapped from the old MenuComposer
        $modules = [
            'module_penelitian' => ['dosen', 'kepala lppm', 'admin lppm', 'rektor', 'dekan'],
            'module_pengabdian' => ['dosen', 'kepala lppm', 'admin lppm', 'rektor', 'dekan'],
            'module_rekognisi' => ['dosen'],
            'module_persetujuan_dekan' => ['dekan'],
            'module_persetujuan_awal' => ['kepala lppm'],
            'module_persetujuan_akhir' => ['kepala lppm'],
            'module_reviewer_management' => ['admin lppm'],
            'module_monev' => ['admin lppm'],
            'module_review' => ['reviewer'],
            'module_laporan' => ['admin lppm', 'rektor', 'kepala lppm'],
            'module_iku' => ['admin lppm', 'rektor', 'kepala lppm', 'dekan'],
            'module_kelola_pengguna' => ['admin lppm', 'superadmin'],
            'module_arsip_data' => ['admin lppm', 'superadmin'],
            'module_export_sinta' => ['admin lppm', 'superadmin'],
            'module_pengaturan' => ['admin lppm', 'superadmin'],
        ];

        // Ensure permissions are created without duplicating
        foreach ($modules as $permissionName => $roles) {
            $permission = DB::table('permissions')
                ->where('name', $permissionName)
                ->where('guard_name', 'web')
                ->first();

            $permissionId = $permission ? $permission->id : Str::uuid()->toString();

            if (! $permission) {
                DB::table('permissions')->insert([
                    'id' => $permissionId,
                    'name' => $permissionName,
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Assign permission to the specific roles directly via pivot table
            foreach ($roles as $roleName) {
                $role = DB::table('roles')->where('name', $roleName)->where('guard_name', 'web')->first();

                if ($role) {
                    $exists = DB::table('role_has_permissions')
                        ->where('permission_id', $permissionId)
                        ->where('role_id', $role->id)
                        ->exists();

                    if (! $exists) {
                        DB::table('role_has_permissions')->insert([
                            'permission_id' => $permissionId,
                            'role_id' => $role->id,
                        ]);
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $permissions = [
            'module_penelitian',
            'module_pengabdian',
            'module_rekognisi',
            'module_persetujuan_dekan',
            'module_persetujuan_awal',
            'module_persetujuan_akhir',
            'module_reviewer_management',
            'module_monev',
            'module_review',
            'module_laporan',
            'module_iku',
            'module_kelola_pengguna',
            'module_arsip_data',
            'module_export_sinta',
            'module_pengaturan',
        ];

        Permission::whereIn('name', $permissions)->delete();
    }
};
