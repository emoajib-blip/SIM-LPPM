<?php

namespace App\Models;

use App\Enums\ReviewStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $proposal_id
 * @property string $user_id
 * @property \App\Enums\ReviewStatus $status
 * @property string|null $review_notes
 * @property string|null $recommendation
 * @property int|null $round
 * @property \Illuminate\Support\Carbon|null $assigned_at
 * @property \Illuminate\Support\Carbon|null $deadline_at
 * @property \Illuminate\Support\Carbon|null $started_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property-read \App\Models\Proposal $proposal
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReviewLog[] $logs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReviewScore[] $scores
 *
 * @method \Illuminate\Database\Eloquent\Builder|static completed()
 * @method \Illuminate\Database\Eloquent\Builder|static forRound(int $round)
 */
class ProposalReviewer extends Model
{
    protected $table = 'proposal_reviewer';

    protected $fillable = [
        'proposal_id',
        'user_id',
        'status',
        'review_notes',
        'recommendation',
        'round',
        'assigned_at',
        'deadline_at',
        'started_at',
        'completed_at',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'status' => ReviewStatus::class,
            'recommendation' => 'string',
            'round' => 'integer',
            'assigned_at' => 'datetime',
            'deadline_at' => 'datetime',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
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
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all review logs (history) for this reviewer assignment.
     */
    public function logs(): HasMany
    {
        return $this->hasMany(ReviewLog::class)->orderBy('round', 'desc');
    }

    /**
     * Get all scores for this reviewer assignment.
     */
    public function scores(): HasMany
    {
        return $this->hasMany(ReviewScore::class);
    }

    /**
     * Get scores for the current round.
     */
    public function currentScores(): HasMany
    {
        return $this->scores()->where('round', $this->round);
    }

    /**
     * Get the latest completed review log.
     */
    // Vetted by AI - Manual Review Required by Senior Engineer/Manager
    public function latestLog(): ?ReviewLog
    {
        return $this->logs()->whereNotNull('completed_at')->first();
    }

    /**
     * Get the review log for a specific round.
     */
    public function logForRound(int $round): ?ReviewLog
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        /** @var ReviewLog|null $log */
        $log = $this->logs()->where('round', $round)->first();

        return $log;
    }

    /**
     * Get the previous round's review log.
     */
    public function previousRoundLog(): ?ReviewLog
    {
        $currentRound = $this->round ?? 1;
        if ($currentRound <= 1) {
            return null;
        }

        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        /** @var ReviewLog|null $prevLog */
        $prevLog = $this->logs()->where('round', $currentRound - 1)->first();

        return $prevLog;
    }

    /**
     * Check if review is completed.
     */
    public function isCompleted(): bool
    {
        return $this->status === ReviewStatus::COMPLETED;
    }

    /**
     * Check if review is pending (needs action).
     */
    public function isPending(): bool
    {
        return $this->status === ReviewStatus::PENDING;
    }

    /**
     * Check if review is in progress.
     */
    public function isInProgress(): bool
    {
        return $this->status === ReviewStatus::IN_PROGRESS;
    }

    /**
     * Check if re-review is requested.
     */
    public function isReReviewRequested(): bool
    {
        return $this->status === ReviewStatus::RE_REVIEW_REQUESTED;
    }

    /**
     * Check if review requires action from reviewer.
     */
    public function requiresAction(): bool
    {
        return $this->status->requiresAction();
    }

    /**
     * Check if review is overdue.
     */
    public function isOverdue(): bool
    {
        if (! $this->deadline_at) {
            return false;
        }

        return ! $this->isCompleted() && $this->deadline_at->isPast();
    }

    /**
     * Check if deadline is approaching (within specified days).
     */
    public function isDeadlineApproaching(int $days = 3): bool
    {
        if (! $this->deadline_at) {
            return false;
        }

        if ($this->isCompleted()) {
            return false;
        }

        $daysUntilDeadline = now()->diffInDays($this->deadline_at, false);

        return $daysUntilDeadline >= 0 && $daysUntilDeadline <= $days;
    }

    /**
     * Get days remaining until deadline.
     */
    public function getDaysRemainingAttribute(): ?int
    {
        if (! $this->deadline_at) {
            return null;
        }

        return (int) now()->diffInDays($this->deadline_at, false);
    }

    /**
     * Get days overdue (negative if not overdue).
     */
    public function getDaysOverdueAttribute(): ?int
    {
        if (! $this->deadline_at) {
            return null;
        }

        $days = now()->diffInDays($this->deadline_at, false);

        return $days < 0 ? abs($days) : 0;
    }

    /**
     * Mark review as started (in progress).
     */
    public function markAsStarted(): void
    {
        if ($this->started_at) {
            return; // Already started
        }

        $this->update([
            'status' => ReviewStatus::IN_PROGRESS,
            'started_at' => now(),
        ]);
    }

    /**
     * Mark review as completed.
     */
    public function complete(string $reviewNotes, string $recommendation): void
    {
        $this->update([
            'status' => ReviewStatus::COMPLETED,
            'review_notes' => $reviewNotes,
            'recommendation' => $recommendation,
            'completed_at' => now(),
        ]);
    }

    /**
     * Request re-review (after proposal revision).
     */
    public function requestReReview(): void
    {
        $currentRound = $this->round ?? 1;

        $this->update([
            'status' => ReviewStatus::RE_REVIEW_REQUESTED,
            'round' => $currentRound + 1,
            'review_notes' => null,
            'recommendation' => null,
            'started_at' => null,
            'completed_at' => null,
            'assigned_at' => now(),
        ]);
    }

    /**
     * Reset for new review round (keeps reviewer but resets review data).
     */
    public function resetForNewRound(int $daysToReview = 14): void
    {
        $currentRound = $this->round ?? 1;

        $this->update([
            'status' => ReviewStatus::PENDING,
            'round' => $currentRound + 1,
            'review_notes' => null,
            'recommendation' => null,
            'started_at' => null,
            'completed_at' => null,
            'assigned_at' => now(),
            'deadline_at' => now()->addDays($daysToReview),
        ]);
    }

    /**
     * Scope for pending reviews.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopePending($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('status', ReviewStatus::PENDING);
    }

    /**
     * Scope for completed reviews.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeCompleted($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('status', ReviewStatus::COMPLETED);
    }

    /**
     * Scope for reviews requiring action.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeRequiresAction($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereIn('status', [ReviewStatus::PENDING, ReviewStatus::RE_REVIEW_REQUESTED]);
    }

    /**
     * Scope for overdue reviews.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeOverdue($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereNotNull('deadline_at')
            ->where('deadline_at', '<', now())
            ->where('status', '!=', ReviewStatus::COMPLETED);
    }

    /**
     * Scope for reviews with approaching deadline.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeDeadlineApproaching($query, int $days = 3): \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereNotNull('deadline_at')
            ->where('deadline_at', '>=', now())
            ->where('deadline_at', '<=', now()->addDays($days))
            ->where('status', '!=', ReviewStatus::COMPLETED);
    }

    /**
     * Scope for specific reviewer.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeForReviewer($query, $userId): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope for specific round.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeForRound($query, int $round): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('round', $round);
    }

    /**
     * Scope for current (latest) round.
     *
     * @return \Illuminate\Database\Eloquent\Builder<\App\Models\ProposalReviewer>
     */
    public function scopeCurrentRound($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->orderBy('round', 'desc');
    }
}
