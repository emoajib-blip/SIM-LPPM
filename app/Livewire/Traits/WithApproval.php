<?php

namespace App\Livewire\Traits;

use App\Enums\ProposalStatus;
use App\Livewire\Concerns\HasToast;
use App\Models\Proposal;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait WithApproval
{
    use HasToast;

    public string $approvalDecision = '';

    public string $approvalNotes = '';

    protected function notificationService(): NotificationService
    {
        return app(NotificationService::class);
    }

    public function processApproval(): void
    {
        $proposal = $this->getProposal();

        $this->validate([
            'approvalDecision' => 'required|in:APPROVED,REJECTED',
            'approvalNotes' => 'required|string',
        ]);

        DB::transaction(function () use ($proposal) {
            $newStatus = match ($this->approvalDecision) {
                'APPROVED' => ProposalStatus::UNDER_REVIEW,
                'REJECTED' => ProposalStatus::REJECTED,
                default => throw new \Exception('Keputusan persetujuan tidak valid.'),
            };

            if (! $proposal->status->canTransitionTo($newStatus)) {
                throw new \Exception('Status transisi tidak valid.');
            }

            $proposal->notes = $this->approvalNotes;
            $proposal->update(['status' => $newStatus->value]);

            if ($newStatus === ProposalStatus::UNDER_REVIEW) {
                $dean = null;
                $submitter = $proposal->submitter;
                $faculty = null;

                if ($submitter && $submitter->identity) {
                    $faculty = $submitter->identity->faculty;
                }

                if ($faculty) {
                    $dean = $faculty->deanUser()->first();
                }

                if ($dean) {
                    // Notify Submitter
                    $this->notificationService()->notifyDekanApprovalDecision(
                        $proposal,
                        $newStatus->value,
                        $dean,
                        [$proposal->submitter]
                    );

                    $this->notificationService()->notifyDekanApprovalDecision(
                        $proposal,
                        $newStatus->value,
                        $dean,
                        [$dean]
                    );
                }
            }
        });

        $message = $this->approvalDecision === 'APPROVED'
            ? 'Proposal berhasil disetujui.'
            : 'Proposal telah ditolak.';

        session()->flash($this->approvalDecision === 'APPROVED' ? 'success' : 'error', $message);
        $this->toastSuccess($message);
        $this->cancelApproval();
    }

    public function cancelApproval(): void
    {
        $this->approvalDecision = '';
        $this->approvalNotes = '';
    }

    public function submitDekanDecision(): void
    {
        $proposal = $this->getProposal();

        $this->validate([
            'approvalDecision' => 'required|in:APPROVED,need_fix,REJECTED',
            'approvalNotes' => 'nullable|string',
        ]);

        DB::transaction(function () use ($proposal) {
            $newStatus = match ($this->approvalDecision) {
                'APPROVED' => ProposalStatus::APPROVED,
                'need_fix' => ProposalStatus::NEED_ASSIGNMENT,
                'REJECTED' => ProposalStatus::REJECTED,
                default => throw new \Exception('Keputusan dekan tidak valid.'),
            };

            if (! $proposal->status->canTransitionTo($newStatus)) {
                throw new \Exception('Status transisi tidak valid.');
            }

            $proposal->notes = $this->approvalNotes;
            $proposal->update(['status' => $newStatus->value]);

            if ($newStatus === ProposalStatus::APPROVED) {
                // Notify Submitter (Dosen) about Dean's approval
                $this->notificationService()->notifyDekanApprovalDecision(
                    $proposal,
                    $newStatus->value,
                    Auth::user(),
                    [$proposal->submitter]
                );

                // Notify Kepala LPPM for next step
                $kepalaLppmUsers = $this->notificationService()
                    ->getUsersByRole('kepala lppm');

                foreach ($kepalaLppmUsers as $kepalaLppm) {
                    $this->notificationService()->notifyDekanApprovalDecision(
                        $proposal,
                        $newStatus->value,
                        Auth::user(),
                        [$kepalaLppm]
                    );
                }
            } else {
                // If rejected or need_fix, notify the submitter directly
                $this->notificationService()->notifyDekanApprovalDecision(
                    $proposal,
                    $newStatus->value,
                    Auth::user(),
                    [$proposal->submitter]
                );
            }
        });

        $message = match ($this->approvalDecision) {
            'APPROVED' => 'Proposal berhasil disetujui dan diteruskan ke Kepala LPPM.',
            'need_fix' => 'Proposal dikembalikan ke pengusul untuk diperbaiki.',
            'REJECTED' => 'Proposal telah ditolak.',
            default => 'Keputusan berhasil disimpan.',
        };

        $flashType = match ($this->approvalDecision) {
            'APPROVED' => 'success',
            'need_fix' => 'warning',
            'REJECTED' => 'error',
            default => 'success',
        };

        session()->flash($flashType, $message);
        $this->toastSuccess($message);
        $this->cancelApproval();
    }

    abstract protected function getProposal(): Proposal;
}
