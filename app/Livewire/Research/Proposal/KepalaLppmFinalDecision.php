<?php

namespace App\Livewire\Research\Proposal;

use App\Enums\ProposalStatus;
use App\Livewire\Concerns\HasToast;
use App\Models\Proposal;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * @property-read \App\Models\Proposal|null $proposal
 * @property-read bool $canDecide
 * @property-read \Illuminate\Support\Collection|\App\Models\ProposalReviewer[] $pendingReviewers
 * @property-read \Illuminate\Support\Collection $reviewSummary
 */
// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class KepalaLppmFinalDecision extends Component
{
    use HasToast;

    public string $proposalId = '';

    public string $decision = '';

    public string $notes = '';

    public function mount(string $proposalId): void
    {
        $this->proposalId = $proposalId;
    }

    #[Computed]
    public function proposal(): ?Proposal
    {
        return Proposal::with(['reviewers.user', 'teamMembers.user'])->find($this->proposalId);
    }

    #[Computed]
    public function canDecide(): bool
    {
        $user = Auth::user();
        $isKepalaLppm = $user->hasRole(['kepala lppm']);
        $proposal = $this->proposal;

        return $isKepalaLppm && $proposal->status === ProposalStatus::REVIEWED && $proposal->allReviewsCompleted();
    }

    #[Computed]
    public function pendingReviewers(): \Illuminate\Support\Collection
    {
        return $this->proposal->pendingReviewers()->get();
    }

    #[Computed]
    public function reviewSummary(): \Illuminate\Support\Collection
    {
        return $this->proposal->reviewers()
            ->select('recommendation')
            ->get()
            ->groupBy('recommendation')
            ->map->count();
    }

    public function openDecisionModal(string $decision): void
    {
        $this->decision = $decision;
        $this->notes = '';
        $this->dispatch('open-final-decision-modal');
    }

    public function cancelDecision(): void
    {
        $this->decision = '';
        $this->notes = '';
    }

    #[On('confirm-final-decision')]
    public function processDecision(): void
    {
        $user = Auth::user();
        $isKepalaLppm = $user->hasRole(['kepala lppm']);

        if (! $isKepalaLppm) {
            $message = 'Anda tidak memiliki akses untuk membuat keputusan';
            session()->flash('error', $message);
            $this->toastError($message);

            return;
        }

        $proposal = $this->proposal;

        if ($proposal->status !== ProposalStatus::REVIEWED) {
            $message = 'Proposal tidak dalam status yang dapat diputuskan';
            session()->flash('error', $message);
            $this->toastError($message);

            return;
        }

        if (! $proposal->allReviewsCompleted()) {
            $message = 'Semua reviewer harus menyelesaikan review terlebih dahulu';
            session()->flash('error', $message);
            $this->toastError($message);

            return;
        }

        if (! in_array($this->decision, ['completed', 'revision_needed', 'rejected'])) {
            $message = 'Keputusan tidak valid';
            session()->flash('error', $message);
            $this->toastError($message);

            return;
        }

        try {
            $newStatus = match ($this->decision) {
                'completed' => ProposalStatus::COMPLETED,
                'rejected' => ProposalStatus::REJECTED,
                'revision_needed' => ProposalStatus::REVISION_NEEDED,
            };

            // Validate transition
            if (! $proposal->status->canTransitionTo($newStatus)) {
                $message = 'Transisi status tidak diizinkan';
                session()->flash('error', $message);
                $this->toastError($message);

                return;
            }

            // Update proposal status
            $proposal->update([
                'status' => $newStatus,
            ]);

            Log::info('Kepala LPPM final decision', [
                'proposal_id' => $proposal->id,
                'user_id' => $user->id,
                'decision' => $this->decision,
                'new_status' => $newStatus->value,
                'notes' => $this->notes,
            ]);

            // Send notifications
            $this->sendNotifications($proposal, $this->decision, $user);

            // Vetted by AI - Manual Review Required by Senior Engineer/Manager
            $message = match ($this->decision) {
                'completed' => 'Proposal berhasil disetujui dan selesai.',
                'rejected' => 'Proposal telah ditolak.',
                'revision_needed' => 'Proposal memerlukan perbaikan dan dikembalikan ke pengusul.',
                default => 'Keputusan berhasil diproses.',
            };

            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->dispatch('close-final-decision-modal');
            $this->dispatch('proposal-final-decided', proposalId: $proposal->id, decision: $this->decision);
            $this->cancelDecision();
        } catch (\Exception $e) {
            Log::error('Kepala LPPM final decision failed', [
                'proposal_id' => $proposal->id,
                'error' => $e->getMessage(),
            ]);

            $message = 'Terjadi kesalahan saat membuat keputusan: '.$e->getMessage();
            session()->flash('error', $message);
            $this->toastError($message);
        }
    }

    /**
     * Send notifications to stakeholders
     */
    protected function sendNotifications(Proposal $proposal, string $decision, User $kepalaLppm): void
    {
        $notificationService = app(NotificationService::class);

        $faculty = $proposal->submitter->identity?->faculty;
        $dekan = $faculty->deanUser ?? User::role('dekan')->whereHas('identity', function ($query) use ($faculty) {
            $query->where('faculty_id', $faculty?->id);
        })->first();

        // Get recipients
        $recipients = collect()
            ->push($proposal->user) // Submitter
            ->push($dekan) // Relevant Dekan
            ->push(User::role('admin lppm')->first()) // Admin LPPM
            ->merge($proposal->teamMembers) // Team Members
            ->filter()
            ->unique('id')
            ->values();

        $notificationService->notifyFinalDecision(
            $proposal,
            $decision,
            $kepalaLppm,
            $recipients
        );
    }

    public function render(): View
    {
        return view('livewire.research.proposal.kepala-lppm-final-decision');
    }
}
