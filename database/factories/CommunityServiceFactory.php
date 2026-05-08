<?php

namespace Database\Factories;

use App\Models\CommunityService;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CommunityService>
 */
class CommunityServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partner_id' => Partner::factory(),
            'partner_issue_summary' => fake()->paragraphs(2, true),
            'solution_offered' => fake()->paragraphs(2, true),
        ];
    }
}
