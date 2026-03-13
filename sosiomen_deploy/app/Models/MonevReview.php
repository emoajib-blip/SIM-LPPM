<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property string $proposal_id
 * @property string $reviewer_id
 * @property float $score
 * @property string|null $status
 * @property string|null $notes
 * @property array|null $borang_data
 * @property string $academic_year
 * @property string $semester
 * @property \Illuminate\Support\Carbon|null $reviewed_at
 * @property \Illuminate\Support\Carbon|null $finalized_by_lppm_at
 * @property \Illuminate\Support\Carbon|null $reported_to_rektor_at
 *
 * @property-read \App\Models\Proposal $proposal
 * @property-read \App\Models\User $reviewer
 */
class MonevReview extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'proposal_id',
        'reviewer_id',
        'score',
        'status',
        'notes',
        'borang_data',
        'academic_year',
        'semester',
        'reviewed_at',
        'finalized_by_lppm_at',
        'reported_to_rektor_at',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'score' => 'float',
            'borang_data' => 'array',
            'reviewed_at' => 'datetime',
            'finalized_by_lppm_at' => 'datetime',
            'reported_to_rektor_at' => 'datetime',
        ];
    }

    /**
     * Get the proposal being reviewed.
     */
    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

    /**
     * Get the reviewer user.
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
