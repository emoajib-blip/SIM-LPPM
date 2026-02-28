<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MasterIku extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'target_percentage',
        'internal_weight',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'target_percentage' => 'decimal:2',
        'internal_weight' => 'decimal:2',
    ];

    /**
     * Get the proposals that target this IKU.
     */
    public function proposals(): BelongsToMany
    {
        return $this->belongsToMany(Proposal::class, 'proposal_target_iku');
    }
}
