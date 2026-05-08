<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Institution;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
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

        $saintek = Faculty::where('code', 'SAINTEK')->first();
        $dekabita = Faculty::where('code', 'DEKABITA')->first();

        if ($saintek) {
            $saintekPrograms = [
                'S1 Informatika',
                'S1 Teknologi Informasi',
                'S1 Fisika',
                'S1 Teknik Industri',
            ];

            foreach ($saintekPrograms as $programName) {
                StudyProgram::updateOrCreate(
                    ['name' => $programName, 'institution_id' => $institution->id],
                    [
                        'faculty_id' => $saintek->id,
                        'name' => $programName,
                        'institution_id' => $institution->id,
                    ]
                );
            }
        }

        if ($dekabita) {
            $dekabitaPrograms = [
                'D3 Akuntansi',
                'D3 Administrasi Perkantoran',
                'D3 Kriya Batik',
            ];

            foreach ($dekabitaPrograms as $programName) {
                StudyProgram::updateOrCreate(
                    ['name' => $programName, 'institution_id' => $institution->id],
                    [
                        'faculty_id' => $dekabita->id,
                        'name' => $programName,
                        'institution_id' => $institution->id,
                    ]
                );
            }
        }
    }
}
