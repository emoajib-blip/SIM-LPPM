<?php

namespace Database\Factories;

use App\Models\NationalPriority;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NationalPriority>
 */
class NationalPriorityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Pangan',
                'Energi',
                'Kesehatan',
                'Lingkungan',
                'Material Maju',
                'IT dan Komunikasi',
                'Pertahanan dan Keamanan',
                'Transportasi',
                'Kemaritiman',
            ]),
        ];
    }
}
