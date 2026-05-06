<?php

namespace App\Console\Commands;

use App\Models\Proposal;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class SendDailySummaries extends Command
{
    protected $signature = 'reports:send-daily-summary';

    protected $description = 'Send daily summary reports to role-specific users';

    public function handle(NotificationService $notificationService): int
    {
        $today = now()->format('Y-m-d');
        $data = [
            'date' => $today,
            'timestamp' => now()->toDateTimeString(),
        ];

        // Admin LPPM
        $adminData = $this->getAdminData($data);
        $notificationService->notifyDailySummaryReport('admin lppm', $adminData);
        $this->info('Daily summary sent to Admin LPPM');

        // Kepala LPPM
        $kepalaData = $this->getKepalaData($data);
        $notificationService->notifyDailySummaryReport('kepala lppm', $kepalaData);
        $this->info('Daily summary sent to Kepala LPPM');

        // Dekan
        $dekanData = $this->getDekanData($data);
        $notificationService->notifyDailySummaryReport('dekan', $dekanData);
        $this->info('Daily summary sent to Dekan');

        // Reviewers
        $reviewerData = $this->getReviewerData($data);
        $notificationService->notifyDailySummaryReport('reviewer', $reviewerData);
        $this->info('Daily summary sent to Reviewers');

        return 0;
    }

    private function getAdminData(array $data): array
    {
        return array_merge($data, [
            'pending_proposals' => Proposal::where('status', 'SUBMITTED')->count(),
            'UNDER_REVIEW' => Proposal::where('status', 'UNDER_REVIEW')->count(),
            'awaiting_decision' => Proposal::where('status', 'REVIEWED')->count(),
            'total_reviews_pending' => \App\Models\ProposalReviewer::where('status', 'pending')->count(),
        ]);
    }

    private function getKepalaData(array $data): array
    {
        return array_merge($data, [
            'pending_initial_approval' => Proposal::where('status', 'APPROVED')->count(),
            'needing_reviewer_assignment' => Proposal::where('status', 'NEED_ASSIGNMENT')->count(),
            'awaiting_final_decision' => Proposal::where('status', 'REVIEWED')->count(),
            'completed_today' => Proposal::where('status', 'COMPLETED')
                ->whereDate('updated_at', now())
                ->count(),
        ]);
    }

    private function getDekanData(array $data): array
    {
        return array_merge($data, [
            'pending_submissions' => Proposal::where('status', 'SUBMITTED')->count(),
            'approved_today' => Proposal::where('status', 'APPROVED')
                ->whereDate('updated_at', now())
                ->count(),
            'rejected_today' => Proposal::where('status', 'REJECTED')
                ->whereDate('updated_at', now())
                ->count(),
        ]);
    }

    private function getReviewerData(array $data): array
    {
        // Note: This is aggregate data for all reviewers
        // Individual reviewers will receive their own specific counts
        return array_merge($data, [
            'pending_assignments' => \App\Models\ProposalReviewer::where('status', 'pending')->count(),
            'completed_today' => \App\Models\ProposalReviewer::where('status', 'COMPLETED')
                ->whereDate('updated_at', now())
                ->count(),
        ]);
    }
}
