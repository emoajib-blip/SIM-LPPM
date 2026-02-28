<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $proposal_reviewer_id
 * @property int $review_criteria_id
 * @property string|null $acuan
 * @property int|null $score
 * @property int|null $weight_snapshot
 * @property int|null $value
 * @property int|null $round
 * @property-read \App\Models\ProposalReviewer $reviewer
 * @property-read \App\Models\ReviewCriteria $criteria
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class ReviewScore extends Model
{
    protected $fillable = [
        'proposal_reviewer_id',
        'review_criteria_id',
        'acuan',
        'score',
        'weight_snapshot',
        'value',
        'round',
    ];

    protected function casts(): array
    {
        return [
            'score' => 'integer',
            'weight_snapshot' => 'integer',
            'value' => 'integer',
            'round' => 'integer',
        ];
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(ProposalReviewer::class, 'proposal_reviewer_id');
    }

    public function criteria(): BelongsTo
    {
        return $this->belongsTo(ReviewCriteria::class, 'review_criteria_id');
    }
}
