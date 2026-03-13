<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    use SeedHelper;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sanity check: make sure no duplicate role names are already present
        $this->assertUnique(Role::class, 'name');
        // there are 8 roles
        $roles = [
            'superadmin', // for it admin / developer only
            'admin lppm',
            'kepala lppm',
            'dekan',
            'dosen',
            'reviewer',
            'rektor',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['name' => $role],
                [
                    'id' => \Illuminate\Support\Str::uuid(),
                    'name' => $role,
                ]
            );
        }
        // final check after creation to ensure uniqueness still holds
        $this->assertUnique(Role::class, 'name');
    }
}
