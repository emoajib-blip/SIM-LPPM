<?php

namespace App\Console\Commands;

use App\Models\ProposalReviewer;
use App\Services\NotificationService;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * Send notifications for overdue reviews
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class CheckOverdueReviews extends Command
{
    protected $signature = 'reviews:check-overdue';

    protected $description = 'Send notifications for overdue reviews';

    public function handle(NotificationService $notificationService): int
    {
        // Find all reviews that are overdue
        $now = Carbon::now()->startOfDay();

        $reviewers = ProposalReviewer::query()
            ->where('status', 'pending')
            ->where('deadline_at', '<', $now)
            ->with(['proposal', 'user'])
            ->get();

        /** @var ProposalReviewer $review */
        foreach ($reviewers as $review) {
            $daysOverdue = $review->deadline_at ? (int) $review->deadline_at->diffInDays(now()) : 0;
            $notificationService->notifyReviewOverdue(
                $review->proposal,
                $review->user,
                $daysOverdue
            );

            $this->info("Overdue notification sent to {$review->user->name} for proposal: {$review->proposal->title}");
        }

        $this->info("Sent {$reviewers->count()} overdue review notifications");

        return 0;
    }
}
