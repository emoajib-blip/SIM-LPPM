<?php

namespace Database\Factories;

use App\Models\Theme;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'theme_id' => Theme::factory(),
            'name' => fake()->randomElement([
                'IoT untuk Smart City',
                'Blockchain untuk E-Government',
                'AI dalam Pendidikan',
                'Solar Panel Efficiency',
                'Hydroponic Systems',
                'Telemedicine Platform',
                'Digital Literacy Program',
            ]),
        ];
    }
}
