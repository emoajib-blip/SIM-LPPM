<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property float|null $percentage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BudgetComponent[] $components
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BudgetItem[] $budgetItems
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class BudgetGroup extends Model
{
    /** @use HasFactory<\Database\Factories\BudgetGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'percentage',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'percentage' => 'decimal:2',
        ];
    }

    /**
     * Get all components for this budget group.
     */
    public function components(): HasMany
    {
        return $this->hasMany(BudgetComponent::class);
    }

    /**
     * Get all budget items for this group.
     */
    public function budgetItems(): HasMany
    {
        return $this->hasMany(BudgetItem::class);
    }
}
