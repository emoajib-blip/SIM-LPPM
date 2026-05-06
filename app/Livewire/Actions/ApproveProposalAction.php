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
        // Normalize decision to uppercase to match enum values
        $decision = strtoupper($decision);

        if (! in_array($decision, [ProposalStatus::COMPLETED->value, ProposalStatus::REJECTED->value])) {
            return [
                'success' => false,
                'message' => 'Keputusan harus "COMPLETED" atau "REJECTED".',
            ];
        }

        // Check if all reviewers completed
        if (! $proposal->allReviewsCompleted()) {
            $pendingReviewers = $proposal->getPendingReviewers();

            return [
                'success' => false,
                'message' => sprintf(
                    '%d reviewer masih belum menyelesaikan review.',
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

        $message = $decision === 'COMPLETED'
            ? 'Proposal berhasil disetujui dan selesai.'
            : 'Proposal ditolak.';

        return [
            'success' => true,
            'message' => $message,
        ];
    }
}
