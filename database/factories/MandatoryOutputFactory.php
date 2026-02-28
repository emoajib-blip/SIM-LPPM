<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MandatoryOutput>
 */
class MandatoryOutputFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'journal_title' => $this->faker->sentence(),
            'article_title' => $this->faker->sentence(),
            'status_type' => 'published',
            'publication_year' => date('Y'),
        ];
    }
}
