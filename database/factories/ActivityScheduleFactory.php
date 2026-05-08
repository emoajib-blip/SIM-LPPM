<?php

namespace Database\Factories;

use App\Models\ActivitySchedule;
use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ActivitySchedule>
 */
class ActivityScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startMonth = fake()->numberBetween(1, 12);
        $endMonth = fake()->numberBetween($startMonth, 12);

        return [
            'proposal_id' => Proposal::factory(),
            'activity_name' => fake()->randomElement([
                'Persiapan Penelitian',
                'Pengumpulan Data',
                'Analisis Data',
                'Penyusunan Laporan',
                'Seminar Hasil',
                'Publikasi',
                'Survey Lokasi',
                'Wawancara Responden',
            ]),
            'year' => fake()->numberBetween(1, 3),
            'start_month' => $startMonth,
            'end_month' => $endMonth,
        ];
    }
}
