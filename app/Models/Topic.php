<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $theme_id
 * @property string $name
 * @property bool $is_active_for_research
 * @property bool $is_active_for_community_service
 * @property-read \App\Models\Theme $theme
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Proposal[] $proposals
 */
class Topic extends Model
{
    /** @use HasFactory<\Database\Factories\TopicFactory> */
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'name',
        'is_active_for_research',
        'is_active_for_community_service',
    ];

    protected $casts = [
        'is_active_for_research' => 'boolean',
        'is_active_for_community_service' => 'boolean',
    ];

    /**
     * Get the theme that owns the topic.
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Get all proposals in this topic.
     */
    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }
}
