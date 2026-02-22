<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FocusArea extends Model
{
    /** @use HasFactory<\Database\Factories\FocusAreaFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active_for_research',
        'is_active_for_community_service',
    ];

    protected $casts = [
        'is_active_for_research' => 'boolean',
        'is_active_for_community_service' => 'boolean',
    ];

    /**
     * Get all themes in this focus area.
     */
    public function themes(): HasMany
    {
        return $this->hasMany(Theme::class);
    }

    /**
     * Get all proposals in this focus area.
     */
    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }
}
