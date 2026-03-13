<?php

namespace Database\Seeders;

use App\Models\PolicyInvolvement;
use App\Models\User;
use Illuminate\Database\Seeder;

class PolicyInvolvementSeeder extends Seeder
{
    public function run(): void
    {
        $dosen = User::role('dosen')->first();
        if ($dosen) {
            $involvement = PolicyInvolvement::create([
                'user_id' => $dosen->id,
                'title' => 'Penyusunan Perda Sistem Informasi Desa',
                'organization' => 'Dinas Kominfo Kabupaten Pekalongan',
                'level' => 'Regional/Institusi',
                'role' => 'Narasumber Ahli',
                'date' => '2025-01-15',
                'status' => 'verified',
                'verified_at' => now(),
                'verified_by' => User::role('admin lppm')->first()?->id,
            ]);

            echo "Seeded Policy Involvement for {$dosen->name}\n";
        }
    }
}
