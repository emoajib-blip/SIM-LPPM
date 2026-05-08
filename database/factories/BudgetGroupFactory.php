<?php

namespace Database\Factories;

use App\Models\BudgetGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BudgetGroup>
 */
class BudgetGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->numerify('BG-###'),
            'name' => $this->faker->words(2, true),
            'percentage' => $this->faker->randomElement([null, 20, 30, 40]),
        ];
    }
}
