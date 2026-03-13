<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $focus_area_id
 * @property string $name
 * @property bool $is_active_for_research
 * @property bool $is_active_for_community_service
 * @property-read \App\Models\FocusArea $focusArea
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'focus_area_id',
        'name',
        'is_active_for_research',
        'is_active_for_community_service',
    ];

    protected $casts = [
        'is_active_for_research' => 'boolean',
        'is_active_for_community_service' => 'boolean',
    ];

    /**
     * Get the focus area that owns the theme.
     */
    public function focusArea(): BelongsTo
    {
        return $this->belongsTo(FocusArea::class);
    }

    /**
     * Get all topics in this theme.
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * Get all proposals in this theme.
     */
    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }
}
