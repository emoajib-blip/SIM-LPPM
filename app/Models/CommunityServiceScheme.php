<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityServiceScheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'strata',
    ];

    /**
     * Get all proposals using this community service scheme.
     */
    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }
}
