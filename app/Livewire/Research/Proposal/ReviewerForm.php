<?php

namespace App\Livewire\Research\Proposal;

use App\Livewire\Concerns\HasToast;
use App\Models\Proposal;
use App\Models\ReviewCriteria;
use App\Models\ReviewLog;
use App\Models\ReviewScore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property-read \Illuminate\Support\Collection|\App\Models\ReviewCriteria[] $activeCriterias
 * @property-read float $totalScore
 * @property-read \App\Models\Proposal|null $proposal
 * @property-read \App\Models\ProposalReviewer|null $myReview
 * @property-read \Illuminate\Support\Collection|\App\Models\ProposalReviewer[] $allReviews
 * @property-read bool $canReview
 * @property-read bool $needsAction
 * @property-read bool $hasReviewed
 * @property-read bool $needsReReview
 * @property-read bool $canEditReview
 * @property-read int $reviewRound
 * @property-read mixed $deadline
 * @property-read bool $isOverdue
 * @property-read int|null $daysRemaining
 * @property-read \Illuminate\Support\Collection<int, \App\Models\ReviewLog> $previousRoundLogs
 * @property-read \Illuminate\Support\Collection<int, \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewLog>> $allReviewLogs
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class ReviewerForm extends Component
{
    use HasToast;

    public string $proposalId = '';

    public bool $showForm = false;

    public string $reviewNotes = '';

    public string $recommendation = '';

    public array $scores = []; // [criteria_id => ['score' => 1-5, 'acuan' => 'text']]

    public function mount(string $proposalId): void
    {
        $this->proposalId = $proposalId;

        // Eager load relationships to prevent N+1 queries
        $this->proposal?->load(['reviewers.user', 'teamMembers']);

        // Load existing review data if available
        $myReview = $this->myReview;
        if ($myReview && $myReview->isCompleted()) {
            $this->reviewNotes = $myReview->review_notes ?? '';
            $this->recommendation = $myReview->recommendation ?? '';

            // Load existing scores
            // Vetted by AI - Manual Review Required by Senior Engineer/Manager
            $existingScores = $myReview->scores()->where('round', $myReview->round)->get();
            /** @var \App\Models\ReviewScore $score */
            foreach ($existingScores as $score) {
                $this->scores[$score->review_criteria_id] = [
                    'score' => $score->score,
                    'acuan' => $score->acuan,
                ];
            }
        }

        // Initialize empty scores for active criteria if not exists
        foreach ($this->activeCriterias as $criteria) {
            if (! isset($this->scores[$criteria->id])) {
                $this->scores[$criteria->id] = [
                    'score' => '',
                    'acuan' => '',
                ];
            }
        }

        // Mark as started when form is mounted (if reviewer is viewing)
        $this->markReviewAsStarted();

        // If review is in progress, show the form by default
        if ($this->myReview && $this->myReview->isInProgress()) {
            $this->showForm = true;
        }
    }

    protected function rules(): array
    {
        $rules = [
            'reviewNotes' => 'required|min:10',
            'recommendation' => 'required|in:approved,rejected,revision_needed',
        ];

        foreach ($this->activeCriterias as $criteria) {
            $rules["scores.{$criteria->id}.score"] = 'required|integer|min:1|max:5';
            $rules["scores.{$criteria->id}.acuan"] = 'required|string|min:3';
        }

        return $rules;
    }

    protected function validationAttributes(): array
    {
        $attributes = [
            'reviewNotes' => 'Catatan Review',
            'recommendation' => 'Rekomendasi',
        ];

        foreach ($this->activeCriterias as $criteria) {
            $attributes["scores.{$criteria->id}.score"] = "Skor {$criteria->criteria}";
            $attributes["scores.{$criteria->id}.acuan"] = "Acuan {$criteria->criteria}";
        }

        return $attributes;
    }

    /**
     * Mark the review as started when reviewer first opens the form
     */
    protected function markReviewAsStarted(): void
    {
        $review = $this->myReview;
        if ($review && $review->isPending()) {
            $review->markAsStarted();
        }
    }

    #[Computed]
    public function activeCriterias()
    {
        return ReviewCriteria::where('type', 'research')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    #[Computed]
    public function totalScore(): float
    {
        $total = 0;
        foreach ($this->activeCriterias as $criteria) {
            $score = $this->scores[$criteria->id]['score'] ?? 0;
            if (is_numeric($score)) {
                $total += ($score * $criteria->weight);
            }
        }

        return $total;
    }

    #[Computed]
    public function proposal(): ?Proposal
    {
        return Proposal::with([
            'reviewers.user.identity',
            'reviewers.scores.criteria',
        ])->find($this->proposalId);
    }

    #[Computed]
    public function myReview(): ?\App\Models\ProposalReviewer
    {
        return $this->proposal->reviewers
            ->where('user_id', Auth::id())
            ->first();
    }

    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\ProposalReviewer>
     */
    #[Computed]
    /**
     * @return \Illuminate\Support\Collection<int, \App\Models\ReviewLog>
     */
    public function allReviews(): \Illuminate\Support\Collection
    {
        return $this->proposal->reviewers;
    }

    #[Computed]
    public function canReview(): bool
    {
        return $this->myReview !== null;
    }

    #[Computed]
    public function needsAction(): bool
    {
        return $this->myReview !== null && (
            $this->myReview->requiresAction() || $this->myReview->isInProgress()
        );
    }

    #[Computed]
    public function hasReviewed(): bool
    {
        $review = $this->myReview;

        return $review && $review->isCompleted();
    }

    #[Computed]
    public function needsReReview(): bool
    {
        $review = $this->myReview;

        return $review && $review->isReReviewRequested();
    }

    #[Computed]
    public function canEditReview(): bool
    {
        $review = $this->myReview;
        if (! $review) {
            return false;
        }

        // Jika rekomendasi sudah approved, tidak bisa edit
        if ($review->recommendation === 'approved') {
            return false;
        }

        // Jika proposal sudah final, tidak bisa edit
        if ($this->proposal->status->isFinal()) {
            return false;
        }

        return $review->isCompleted();
    }

    #[Computed]
    public function reviewRound(): int
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $currentRound = $this->myReview->round ?? 1;

        return $currentRound;
    }

    #[Computed]
    public function deadline(): ?string
    {
        return $this->myReview?->deadline_at;
    }

    #[Computed]
    public function isOverdue(): bool
    {
        return $this->myReview?->isOverdue() ?? false;
    }

    #[Computed]
    public function daysRemaining(): ?int
    {
        return $this->myReview?->days_remaining;
    }

    /**
     * Get all review logs for this proposal (for showing complete history).
     *
     * @return \Illuminate\Support\Collection<int, \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewLog>>
     */
    #[Computed]
    public function allReviewLogs(): \Illuminate\Support\Collection
    {
        return ReviewLog::forProposal($this->proposalId)
            ->with(['user', 'scores.criteria'])
            ->orderBy('round', 'desc')
            ->orderBy('completed_at', 'desc')
            ->get()
            ->groupBy('round');
    }

    public function toggleForm(): void
    {
        $this->showForm = ! $this->showForm;

        // Mark as started when form is opened
        if ($this->showForm) {
            $this->markReviewAsStarted();
        }
    }

    public function submitReview(): void
    {
        $completeReviewAction = app(\App\Livewire\Actions\CompleteReviewAction::class);
        $this->validate();

        $review = $this->myReview;

        if (! $review) {
            $message = 'Anda bukan reviewer untuk proposal ini';
            $this->toastError($message);
            $this->dispatch('error', message: $message);

            return;
        }

        try {
            DB::transaction(function () use ($review, $completeReviewAction): void {
                // 1. Save individual scores first
                foreach ($this->activeCriterias as $criteria) {
                    $scoreData = $this->scores[$criteria->id];
                    ReviewScore::updateOrCreate(
                        [
                            'proposal_reviewer_id' => $review->id,
                            'review_criteria_id' => $criteria->id,
                            'round' => $review->round,
                        ],
                        [
                            'acuan' => $scoreData['acuan'],
                            'score' => $scoreData['score'],
                            'weight_snapshot' => $criteria->weight,
                            'value' => $scoreData['score'] * $criteria->weight,
                        ]
                    );
                }

                // 2. Execute CompleteReviewAction
                // This handles: status update, logging, notifications, and final decision check
                $result = $completeReviewAction->execute($review, $this->reviewNotes, $this->recommendation);

                if (! $result['success']) {
                    throw new \Exception($result['message']);
                }
            });

            $message = $this->needsReReview ? 'Review ulang berhasil disubmit' : 'Review berhasil disubmit';

            // Close the form after successful submission
            $this->showForm = false;

            // Clear computed property cache to refresh data immediately
            unset($this->proposal);
            unset($this->myReview);
            unset($this->allReviews);
            unset($this->allReviewLogs);

            // Flash message and dispatch event
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->dispatch('review-submitted', proposalId: $this->proposalId);
        } catch (\Exception $e) {
            $message = 'Gagal menyimpan review: '.$e->getMessage();
            $this->addError('error', $message);
            $this->toastError($message);
        }
    }

    public function render(): View
    {
        return view('livewire.research.proposal.reviewer-form');
    }
}
