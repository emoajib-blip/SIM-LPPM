<?php

namespace App\Console\Commands;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use App\Models\ProposalStatusLog;
use Illuminate\Console\Command;

class FixProposalSignatures extends Command
{
    protected $signature = 'proposals:fix-signatures {--proposal-id= : Fix specific proposal}';

    protected $description = 'Fix signatures for existing proposals - ensure signed_at is set';

    public function handle()
    {
        $proposalId = $this->option('proposal-id');

        $query = Proposal::whereIn('status', [
            ProposalStatus::SUBMITTED->value,
            ProposalStatus::NEED_ASSIGNMENT->value,
            ProposalStatus::APPROVED->value,
            ProposalStatus::WAITING_REVIEWER->value,
            ProposalStatus::UNDER_REVIEW->value,
            ProposalStatus::REVIEWED->value,
            ProposalStatus::COMPLETED->value,
        ]);

        if ($proposalId) {
            $query->where('id', $proposalId);
        }

        $proposals = $query->get();

        $this->info("Fixing {$proposals->count()} proposals...");

        foreach ($proposals as $proposal) {
            $this->fixProposal($proposal);
        }

        $this->info('Done!');

        return 0;
    }

    protected function fixProposal(Proposal $proposal): void
    {
        // Get or create submission log timestamp
        $submissionLog = ProposalStatusLog::where('proposal_id', $proposal->id)
            ->where('status_after', ProposalStatus::SUBMITTED)
            ->latest('at')
            ->first();

        $signedAt = $submissionLog ? $submissionLog->at : ($proposal->created_at ?? now());

        // Update lecturer signature signed_at if null
        $proposal->signatures()
            ->where('signed_role', 'lecturer')
            ->where('action', 'submitted')
            ->where('variant', 'final')
            ->whereNull('signed_at')
            ->update(['signed_at' => $signedAt]);

        $this->line("Fixed: {$proposal->title} ({$proposal->id})");
    }
}
