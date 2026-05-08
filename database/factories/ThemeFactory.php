<?php

namespace Database\Factories;

use App\Models\FocusArea;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Theme>
 */
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'focus_area_id' => FocusArea::factory(),
            'name' => fake()->randomElement([
                'Smart City',
                'E-Government',
                'Digital Economy',
                'Sustainable Agriculture',
                'Renewable Energy Systems',
                'Health Technology',
                'Educational Innovation',
            ]),
        ];
    }
}
