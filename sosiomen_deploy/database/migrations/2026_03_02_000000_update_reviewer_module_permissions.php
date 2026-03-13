<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Reviewer MUST have access to research and community service modules to see what they are reviewing
        $mappings = [
            'module_penelitian' => ['reviewer'],
            'module_pengabdian' => ['reviewer'],
            'module_review' => ['admin lppm', 'superadmin'], // add admin/super to monitor
        ];

        foreach ($mappings as $permissionName => $roles) {
            $permission = DB::table('permissions')
                ->where('name', $permissionName)
                ->where('guard_name', 'web')
                ->first();

            if (!$permission) {
                // If permission doesn't exist (which shouldn't happen), create it
                $permissionId = Str::uuid()->toString();
                DB::table('permissions')->insert([
                    'id' => $permissionId,
                    'name' => $permissionName,
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $permissionId = $permission->id;
            }

            foreach ($roles as $roleName) {
                $role = DB::table('roles')->where('name', $roleName)->where('guard_name', 'web')->first();

                if ($role) {
                    $exists = DB::table('role_has_permissions')
                        ->where('permission_id', $permissionId)
                        ->where('role_id', $role->id)
                        ->exists();

                    if (!$exists) {
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
        // We don't necessarily want to remove these on down, but if we must:
        // This is safe to leave as-is for now.
    }
};
