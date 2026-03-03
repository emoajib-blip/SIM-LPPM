<?php

namespace App\Livewire\Actions;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use App\Services\NotificationService;

class ApproveProposalAction
{
    public function __construct(
        protected NotificationService $notificationService
    ) {}

    /**
     * Approve or reject a proposal.
     * Only possible if all reviewers have completed their reviews.
     */
    public function execute(Proposal $proposal, string $decision): array
    {
        if (! in_array($decision, [ProposalStatus::COMPLETED->value, ProposalStatus::REJECTED->value])) {
            return [
                'success' => false,
                'message' => 'Keputusan harus "completed" atau "rejected".',
            ];
        }

        // Check if all reviewers completed
        if (! $proposal->allReviewersCompleted()) {
            $pendingReviewers = $proposal->getPendingReviewers();

            return [
                'success' => false,
                'message' => sprintf(
                    'Tidak dapat memutuskan proposal. %d reviewer masih belum menyelesaikan review.',
                    $pendingReviewers->count()
                ),
            ];
        }

        // Update proposal status
        $proposal->update(['status' => $decision]);

        // Send Final Notification to Submitter and All Stakeholders
        $this->notificationService->notifyFinalDecision(
            $proposal,
            $decision,
            \Illuminate\Support\Facades\Auth::user(),
            [$proposal->submitter]
        );

        $message = $decision === 'completed'
            ? 'Proposal berhasil disetujui dan selesai.'
            : 'Proposal ditolak.';

        return [
            'success' => true,
            'message' => $message,
        ];
    }
}
