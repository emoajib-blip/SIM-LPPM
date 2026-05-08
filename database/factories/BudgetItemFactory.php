<?php

namespace Database\Factories;

use App\Models\BudgetComponent;
use App\Models\BudgetGroup;
use App\Models\BudgetItem;
use App\Models\Proposal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BudgetItem>
 */
class BudgetItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $volume = fake()->numberBetween(1, 20);
        $unitPrice = fake()->randomFloat(2, 50000, 5000000);

        $group = BudgetGroup::inRandomOrder()->first();
        $component = null;
        $groupId = null;
        $groupName = fake()->word();

        if ($group) {
            $groupId = $group->id;
            $groupName = $group->name;
            $component = BudgetComponent::where('budget_group_id', $groupId)->inRandomOrder()->first();
        }

        $componentId = null;
        $componentName = fake()->word();

        if ($component) {
            $componentId = $component->id;
            $componentName = $component->name;
        }

        return [
            'proposal_id' => Proposal::factory(),
            'year' => 1,
            'budget_group_id' => $groupId,
            'budget_component_id' => $componentId,
            'group' => $groupName,
            'component' => $componentName,
            'item_description' => fake()->sentence(4),
            'volume' => $volume,
            'unit_price' => $unitPrice,
            'total_price' => $volume * $unitPrice,
        ];
    }
}
