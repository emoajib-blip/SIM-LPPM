<?php

namespace Database\Factories;

use App\Models\Faculty;
use App\Models\Institution;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'institution_id' => Institution::factory(),
            'name' => fake()->unique()->words(3, true),
            'code' => fake()->unique()->lexify('?????'),
        ];
    }
}
