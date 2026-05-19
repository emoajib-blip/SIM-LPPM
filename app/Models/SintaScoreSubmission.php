<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SintaScoreSubmission extends Model
{
    protected $fillable = [
        'identity_id',
        'user_id',
        'sinta_score_v3_overall',
        'sinta_score_v3_3yr',
        'scopus_h_index',
        'gs_h_index',
        'wos_h_index',
        'status',
        'verified_by',
        'verified_at',
        'verification_notes',
        'submission_notes',
        'rejected_reason',
    ];

    public function identity(): BelongsTo
    {
        return $this->belongsTo(Identity::class);
    }

    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * @param  Builder<SintaScoreSubmission>  $query
     * @return Builder<SintaScoreSubmission>
     */
    public function scopePending($query): Builder
    {
        return $query->where('status', 'pending');
    }

    /**
     * @param  Builder<SintaScoreSubmission>  $query
     * @return Builder<SintaScoreSubmission>
     */
    public function scopeApproved($query): Builder
    {
        return $query->where('status', 'approved');
    }

    /**
     * @param  Builder<SintaScoreSubmission>  $query
     * @return Builder<SintaScoreSubmission>
     */
    public function scopeRejected($query): Builder
    {
        return $query->where('status', 'rejected');
    }
}
