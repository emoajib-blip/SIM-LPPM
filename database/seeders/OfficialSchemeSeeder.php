<?php

namespace Database\Seeders;

use App\Models\CommunityServiceScheme;
use App\Models\ResearchScheme;
use Illuminate\Database\Seeder;

class OfficialSchemeSeeder extends Seeder
{
    public function run(): void
    {
        // Research Schemes
        $researchSchemes = [
            [
                'name' => 'Skema 1: Reguler',
                'strata' => 'Reguler',
                'description' => 'Skema penelitian reguler',
            ],
            [
                'name' => 'Skema 2: Kolaborasi Internal',
                'strata' => 'Kolaborasi Internal',
                'description' => 'Skema penelitian kolaborasi internal',
            ],
            [
                'name' => 'Skema 3: Kolaborasi Eksternal',
                'strata' => 'Kerja Sama Antar PT',
                'description' => 'Skema penelitian kolaborasi eksternal',
            ],
        ];

        foreach ($researchSchemes as $scheme) {
            ResearchScheme::updateOrCreate(
                ['name' => $scheme['name']],
                $scheme
            );
        }

        // Community Service Schemes
        $csSchemes = [
            [
                'name' => 'Skema 1: Reguler',
                'strata' => 'PKM-Reguler',
                'description' => 'Skema pengabdian reguler',
            ],
            [
                'name' => 'Skema 2: Kolaborasi Internal',
                'strata' => 'PKM-KI',
                'description' => 'Skema pengabdian kolaborasi internal',
            ],
            [
                'name' => 'Skema 3: Kolaborasi Eksternal',
                'strata' => 'PKM-KE',
                'description' => 'Skema pengabdian kolaborasi eksternal',
            ],
        ];

        foreach ($csSchemes as $scheme) {
            CommunityServiceScheme::updateOrCreate(
                ['name' => $scheme['name']],
                $scheme
            );
        }
    }
}
