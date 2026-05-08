<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Institution;
use App\Models\StudyProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudyProgram>
 */
class StudyProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programs = [
            'Teknik Informatika',
            'Sistem Informasi',
            'Teknik Elektro',
            'Teknik Mesin',
            'Teknik Industri',
            'Manajemen',
            'Akuntansi',
            'Ekonomi Syariah',
            'Hukum',
            'Pendidikan Agama Islam',
            'Farmasi',
            'Kesehatan Masyarakat',
        ];

        return [
            'institution_id' => Institution::factory(),
            'faculty_id' => Faculty::factory(),
            'name' => fake()->randomElement($programs),
        ];
    }
}
