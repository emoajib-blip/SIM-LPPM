<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TktLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'level',
        'description',
        'is_active_for_research',
        'is_active_for_community_service',
    ];

    protected $casts = [
        'is_active_for_research' => 'boolean',
        'is_active_for_community_service' => 'boolean',
    ];

    public function indicators(): HasMany
    {
        return $this->hasMany(TktIndicator::class);
    }

    public function research(): BelongsToMany
    {
        return $this->belongsToMany(Research::class, 'research_tkt_level')
            ->withPivot('percentage');
    }
}
