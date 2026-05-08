<?php

namespace Database\Factories;

use App\Models\Proposal;
use App\Models\ResearchStage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ResearchStage>
 */
class ResearchStageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'proposal_id' => Proposal::factory(),
            'stage_number' => fake()->numberBetween(1, 5),
            'process_name' => fake()->randomElement([
                'Persiapan Penelitian',
                'Pengumpulan Data',
                'Analisis Data',
                'Penyusunan Laporan',
                'Publikasi Hasil',
            ]),
            'outputs' => fake()->sentence(6),
            'indicator' => fake()->sentence(8),
            'person_in_charge_id' => User::factory(),
        ];
    }
}
