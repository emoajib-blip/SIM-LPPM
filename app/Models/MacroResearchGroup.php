<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Research[] $research
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CommunityService[] $communityServices
 */
class MacroResearchGroup extends Model
{
    /** @method static \Database\Factories\MacroResearchGroupFactory factory(...$parameters) */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get all research associated with this macro research group.
     */
    public function research(): HasMany
    {
        return $this->hasMany(Research::class);
    }

    /**
     * Get all community services associated with this macro research group.
     */
    public function communityServices(): HasMany
    {
        return $this->hasMany(CommunityService::class);
    }
}
