<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Institution;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institution = Institution::where('name', 'like', '%Institut Teknologi dan Sains Nahdlatul Ulama%')->first()
            ?? Institution::first();

        if (! $institution) {
            return;
        }

        // Check if custom faculties were provided by the installer
        $customFaculties = cache('installer_faculties_config');

        if ($customFaculties && is_array($customFaculties)) {
            foreach ($customFaculties as $faculty) {
                Faculty::updateOrCreate(
                    ['code' => $faculty['code']],
                    [
                        'institution_id' => $institution->id,
                        'name' => $faculty['name'],
                        'code' => $faculty['code'],
                    ]
                );
            }

            return;
        }

        // Default faculties
        $faculties = [
            ['name' => 'Fakultas Sains dan Teknologi', 'code' => 'SAINTEK'],
            ['name' => 'Fakultas Desain Kreatif dan Bisnis Digital', 'code' => 'DEKABITA'],
        ];

        foreach ($faculties as $faculty) {
            Faculty::updateOrCreate(
                ['code' => $faculty['code']],
                [
                    'institution_id' => $institution->id,
                    'name' => $faculty['name'],
                    'code' => $faculty['code'],
                ]
            );
        }
    }
}
