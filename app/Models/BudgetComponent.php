<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $budget_group_id
 * @property string $code
 * @property string $name
 * @property string|null $unit
 * @property string|null $description
 * @property-read \App\Models\BudgetGroup $budgetGroup
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BudgetItem[] $budgetItems
 */
class BudgetComponent extends Model
{
    protected $fillable = [
        'budget_group_id',
        'code',
        'name',
        'unit',
        'description',
    ];

    /**
     * Get the budget group that owns the component.
     */
    public function budgetGroup(): BelongsTo
    {
        return $this->belongsTo(BudgetGroup::class);
    }

    /**
     * Get all budget items for this component.
     */
    public function budgetItems(): HasMany
    {
        return $this->hasMany(BudgetItem::class);
    }
}
