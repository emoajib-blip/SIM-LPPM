<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update proposals table - convert status to uppercase
        $statuses = ['draft', 'submitted', 'need_assignment', 'approved', 'waiting_reviewer', 'under_review', 'reviewed', 'revision_needed', 'completed', 'rejected'];

        foreach ($statuses as $status) {
            DB::table('proposals')
                ->where('status', $status)
                ->update(['status' => strtoupper($status)]);
        }

        // Update proposal_reviewers table if exists
        if (DB::getSchemaBuilder()->hasTable('proposal_reviewers')) {
            $reviewStatuses = ['pending', 'in_progress', 'completed', 're_review_requested'];

            foreach ($reviewStatuses as $status) {
                DB::table('proposal_reviewers')
                    ->where('status', $status)
                    ->update(['status' => strtoupper($status)]);
            }
        }
    }

    public function down(): void
    {
        // Revert to lowercase if needed
        $statuses = ['DRAFT', 'SUBMITTED', 'NEED_ASSIGNMENT', 'APPROVED', 'WAITING_REVIEWER', 'UNDER_REVIEW', 'REVIEWED', 'REVISION_NEEDED', 'COMPLETED', 'REJECTED'];

        foreach ($statuses as $status) {
            DB::table('proposals')
                ->where('status', $status)
                ->update(['status' => strtolower($status)]);
        }

        if (DB::getSchemaBuilder()->hasTable('proposal_reviewers')) {
            $reviewStatuses = ['PENDING', 'IN_PROGRESS', 'COMPLETED', 'RE_REVIEW_REQUESTED'];

            foreach ($reviewStatuses as $status) {
                DB::table('proposal_reviewers')
                    ->where('status', $status)
                    ->update(['status' => strtolower($status)]);
            }
        }
    }
};
