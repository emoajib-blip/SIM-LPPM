<?php

namespace App\Models;

use App\Enums\ProposalStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $proposal_id
 * @property string|null $user_id
 * @property ProposalStatus|null $status_before
 * @property ProposalStatus $status_after
 * @property string|null $body
 * @property string|null $notes
 * @property Carbon $at
 * @property-read Proposal $proposal
 * @property-read User|null $user
 */
class ProposalStatusLog extends Model
{
    use HasUuids;

    /**
     * The type of the auto-incrementing ID's primary key.
     */
    protected $keyType = 'string';

    /**
     * Indicates if the ID is auto-incrementing.
     */
    public $incrementing = false;

    protected $fillable = [
        'proposal_id',
        'user_id',
        'status_before',
        'status_after',
        'body',
        'notes',
        'at',
    ];

    protected $casts = [
        'status_before' => ProposalStatus::class,
        'status_after' => ProposalStatus::class,
        'at' => 'datetime',
    ];

    /**
     * Get the proposal that this log belongs to.
     */
    public function proposal(): BelongsTo
    {
        return $this->belongsTo(Proposal::class);
    }

    /**
     * Get the user who performed this status change.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope to get logs for a specific proposal, ordered by date.
     *
     * @return Builder<ProposalStatusLog>
     */
    public function scopeForProposal($query, $proposalId): Builder
    {
        return $query->where('proposal_id', $proposalId)
            ->orderBy('at', 'desc');
    }

    /**
     * Scope to get logs by a specific user.
     *
     * @return Builder<ProposalStatusLog>
     */
    public function scopeByUser($query, $userId): Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope to get logs within a date range.
     *
     * @return Builder<ProposalStatusLog>
     */
    public function scopeWithinDateRange($query, $startDate, $endDate = null): Builder
    {
        $query->where('at', '>=', $startDate);

        if ($endDate) {
            $query->where('at', '<=', $endDate);
        }

        return $query;
    }
}
