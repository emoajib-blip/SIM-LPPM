<?php

namespace App\Livewire\Actions;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Support\Facades\DB;

class SubmitProposalAction
{
    public function __construct(
        protected NotificationService $notificationService
    ) {}

    /**
     * Submit a proposal (change status to SUBMITTED).
     */
    public function execute(Proposal $proposal): array
    {
        // Authorization check - only submitter can submit
        $user = \Illuminate\Support\Facades\Auth::user();
        if (! $user || ($proposal->submitter_id !== $user->getAuthIdentifier())) {
            return [
                'success' => false,
                'message' => 'Anda tidak memiliki akses untuk mengajukan proposal ini.',
            ];
        }

        // Validate before submit
        app(\App\Services\ProposalService::class)->validateProposalBeforeSubmit($proposal);

        try {
            DB::transaction(function () use ($proposal) {
                $proposal->update(['status' => ProposalStatus::SUBMITTED->value]);
            });

            // Send notifications
            $this->sendNotifications($proposal);

            return [
                'success' => true,
                'message' => 'Proposal berhasil diajukan.',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Gagal mengajukan proposal: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Send notifications to relevant stakeholders
     */
    protected function sendNotifications(Proposal $proposal): void
    {
        // Get recipients: Dean, Team Members
        $submitter = $proposal->submitter;
        $faculty = null;
        $dean = null;

        if ($submitter && $submitter->identity) {
            $faculty = $submitter->identity->faculty;
        }

        if ($faculty) {
            $dean = $faculty->deanUser()->first() ?? User::role('dekan')->whereHas('identity', function ($query) use ($faculty) {
                $query->where('faculty_id', $faculty->id);
            })->first();
        }

        if (! $dean) {
            $dean = User::role('dekan')->first();
        }

        $teamMembers = $proposal->teamMembers()->where('user_id', '!=', $proposal->submitter_id)->get();

        $recipients = collect()
            ->push($dean)
            ->merge($teamMembers)
            ->filter()
            ->unique('id')
            ->values();

        $this->notificationService->notifyProposalSubmitted(
            $proposal,
            $submitter,
            $recipients
        );
    }
}
