<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Reverted to lowercase to maintain consistency with Enums and existing logic
        $statuses = ['draft', 'submitted', 'need_assignment', 'approved', 'waiting_reviewer', 'under_review', 'reviewed', 'revision_needed', 'completed', 'rejected'];

        if (DB::getSchemaBuilder()->hasTable('proposals')) {
            foreach ($statuses as $status) {
                DB::table('proposals')
                    ->where('status', strtoupper($status))
                    ->update(['status' => $status]);
            }
        }

        if (DB::getSchemaBuilder()->hasTable('proposal_status_logs')) {
            foreach ($statuses as $status) {
                DB::table('proposal_status_logs')
                    ->where('status_before', strtoupper($status))
                    ->update(['status_before' => $status]);

                DB::table('proposal_status_logs')
                    ->where('status_after', strtoupper($status))
                    ->update(['status_after' => $status]);
            }
        }

        // Update proposal_reviewers table if exists
        if (DB::getSchemaBuilder()->hasTable('proposal_reviewers')) {
            $reviewStatuses = ['pending', 'in_progress', 'completed', 're_review_requested'];

            foreach ($reviewStatuses as $status) {
                DB::table('proposal_reviewers')
                    ->where('status', strtoupper($status))
                    ->update(['status' => $status]);
            }
        }
    }

    public function down(): void
    {
        // Revert back to uppercase if needed
        $statuses = ['draft', 'submitted', 'need_assignment', 'approved', 'waiting_reviewer', 'under_review', 'reviewed', 'revision_needed', 'completed', 'rejected'];

        if (DB::getSchemaBuilder()->hasTable('proposals')) {
            foreach ($statuses as $status) {
                DB::table('proposals')
                    ->where('status', $status)
                    ->update(['status' => strtoupper($status)]);
            }
        }
    }
};
