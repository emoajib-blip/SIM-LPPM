<?php

namespace App\Actions\Kaprodi;

use App\Enums\KaprodiStatus;
use App\Models\KaprodiApproval;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KaprodiApprovalAction
{
    /**
     * Request kaprodi approval for a proposal.
     *
     * @return array{success: bool, approval: ?\App\Models\KaprodiApproval, message: string}
     */
    public function requestApproval(Proposal $proposal, User $kaprodi): array
    {
        if ($proposal->hasApprovedKaprodi()) {
            return [
                'success' => false,
                'approval' => null,
                'message' => 'Proposal sudah disetujui Kaprodi.',
            ];
        }

        if ($proposal->hasPendingKaprodiApproval()) {
            return [
                'success' => false,
                'approval' => null,
                'message' => 'Proposal sedang menunggu persetujuan Kaprodi.',
            ];
        }

        $approval = DB::transaction(function () use ($proposal, $kaprodi) {
            return KaprodiApproval::create([
                'proposal_id' => $proposal->id,
                'kaprodi_user_id' => $kaprodi->id,
                'status' => KaprodiStatus::PENDING,
            ]);
        });

        return [
            'success' => true,
            'approval' => $approval,
            'message' => 'Permintaan persetujuan Kaprodi berhasil dikirim.',
        ];
    }

    /**
     * Approve a proposal as kaprodi.
     *
     * @return array{success: bool, approval: ?\App\Models\KaprodiApproval, message: string}
     */
    public function approve(Proposal $proposal, User $kaprodi, ?string $notes = null): array
    {
        if (! $this->isAuthorizedKaprodi($kaprodi, $proposal)) {
            return [
                'success' => false,
                'approval' => null,
                'message' => 'Anda tidak berwenang menyetujui proposal ini.',
            ];
        }

        $approval = KaprodiApproval::where('proposal_id', $proposal->id)
            ->where('kaprodi_user_id', $kaprodi->id)
            ->where('status', KaprodiStatus::PENDING)
            ->first();

        if (! $approval) {
            return [
                'success' => false,
                'approval' => null,
                'message' => 'Tidak ada permintaan persetujuan yang menunggu.',
            ];
        }

        DB::transaction(function () use ($approval, $notes) {
            $approval->update([
                'status' => KaprodiStatus::APPROVED,
                'notes' => $notes,
                'approved_at' => now(),
            ]);
        });

        return [
            'success' => true,
            'approval' => $approval,
            'message' => 'Proposal berhasil disetujui.',
        ];
    }

    /**
     * Reject a proposal as kaprodi.
     *
     * @return array{success: bool, approval: ?\App\Models\KaprodiApproval, message: string}
     */
    public function reject(Proposal $proposal, User $kaprodi, string $notes): array
    {
        if (! $this->isAuthorizedKaprodi($kaprodi, $proposal)) {
            return [
                'success' => false,
                'approval' => null,
                'message' => 'Anda tidak berwenang menolak proposal ini.',
            ];
        }

        $approval = KaprodiApproval::where('proposal_id', $proposal->id)
            ->where('kaprodi_user_id', $kaprodi->id)
            ->where('status', KaprodiStatus::PENDING)
            ->first();

        if (! $approval) {
            return [
                'success' => false,
                'approval' => null,
                'message' => 'Tidak ada permintaan persetujuan yang menunggu.',
            ];
        }

        DB::transaction(function () use ($approval, $notes) {
            $approval->update([
                'status' => KaprodiStatus::REJECTED,
                'notes' => $notes,
                'rejected_at' => now(),
            ]);
        });

        return [
            'success' => true,
            'approval' => $approval,
            'message' => 'Proposal ditolak.',
        ];
    }

    /**
     * Check if a user is the authorized kaprodi for a proposal.
     */
    public function isAuthorizedKaprodi(User $kaprodi, Proposal $proposal): bool
    {
        if (! $kaprodi->hasRole('kaprodi')) {
            return false;
        }

        $kaprodiIdentity = $kaprodi->identity;
        if (! $kaprodiIdentity || ! $kaprodiIdentity->study_program_id) {
            return false;
        }

        $submitterIdentity = $proposal->submitter->identity;
        if (! $submitterIdentity || ! $submitterIdentity->study_program_id) {
            return false;
        }

        return $kaprodiIdentity->study_program_id === $submitterIdentity->study_program_id;
    }

    /**
     * Get the kaprodi for a proposal based on submitter's study program.
     */
    public function getKaprodiForProposal(Proposal $proposal): ?User
    {
        $submitterIdentity = $proposal->submitter->identity;
        if (! $submitterIdentity || ! $submitterIdentity->study_program_id) {
            return null;
        }

        $studyProgram = $submitterIdentity->studyProgram;
        if (! $studyProgram || ! $studyProgram->kaprodi_user_id) {
            return null;
        }

        return $studyProgram->kaprodi;
    }

    /**
     * Check if a proposal can be submitted (has kaprodi approval or no kaprodi assigned).
     */
    public function canSubmit(Proposal $proposal): array
    {
        $kaprodi = $this->getKaprodiForProposal($proposal);

        if (! $kaprodi) {
            return [
                'can_submit' => true,
                'reason' => null,
            ];
        }

        if ($proposal->hasApprovedKaprodi()) {
            return [
                'can_submit' => true,
                'reason' => null,
            ];
        }

        if ($proposal->hasPendingKaprodiApproval()) {
            return [
                'can_submit' => false,
                'reason' => 'Proposal sedang menunggu persetujuan Kaprodi.',
            ];
        }

        $kaprodiStatus = $proposal->kaprodiApprovalStatus();
        if ($kaprodiStatus === KaprodiStatus::REJECTED) {
            return [
                'can_submit' => false,
                'reason' => 'Proposal ditolak Kaprodi. Silakan revisi dan ajukan ulang.',
            ];
        }

        return [
            'can_submit' => false,
            'reason' => 'Proposal harus disetujui Kaprodi sebelum diajukan.',
        ];
    }
}
