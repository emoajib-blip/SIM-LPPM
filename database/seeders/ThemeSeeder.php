<?php

namespace Database\Seeders;

use App\Models\FocusArea;
use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $focusAreas = FocusArea::all();

        if ($focusAreas->isEmpty()) {
            return;
        }

        $themesData = [
            'Teknologi Informasi dan Komunikasi' => [
                'Smart City',
                'E-Government',
                'Digital Economy',
                'Artificial Intelligence',
            ],
            'Energi Terbarukan' => [
                'Solar Energy Systems',
                'Wind Power',
                'Biomass Energy',
            ],
            'Ketahanan Pangan' => [
                'Sustainable Agriculture',
                'Urban Farming',
                'Food Security',
            ],
            'Kesehatan dan Obat' => [
                'Herbal Medicine',
                'Telemedicine',
                'Public Health Systems',
            ],
        ];

        foreach ($focusAreas as $focusArea) {
            if (isset($themesData[$focusArea->name])) {
                foreach ($themesData[$focusArea->name] as $themeName) {
                    Theme::firstOrCreate(
                        ['focus_area_id' => $focusArea->id, 'name' => $themeName],
                        ['focus_area_id' => $focusArea->id, 'name' => $themeName]
                    );
                }
            } else {
                // Create default themes for other focus areas
                $defaultThemeName = 'General '.$focusArea->name;
                Theme::firstOrCreate(
                    ['focus_area_id' => $focusArea->id, 'name' => $defaultThemeName],
                    ['focus_area_id' => $focusArea->id, 'name' => $defaultThemeName]
                );
            }
        }
    }
}
