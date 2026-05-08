<?php

namespace Database\Seeders;

use App\Models\FocusArea;
use Illuminate\Database\Seeder;

class FocusAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $focusAreas = [
            'Keamanan',
            'Kesehatan',
            'Energi',
            'Maritim',
            'Pertahanan',
            'Manufaktur',
            'Keadilan Sosial',
            'Digitalisasi Industri',
            'Teknologi Informasi dan Komunikasi (ICT)',
            'Kebencanaan',
            'Kecerdasan Buatan (AI)',
        ];

        foreach ($focusAreas as $area) {
            FocusArea::firstOrCreate(['name' => $area]);
        }
    }
}
