<?php

namespace App\Actions\Proposal;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use App\Models\User;

class IdentityEligibilityAction
{
    /**
     * Evaluate if a user is eligible for a scheme based on their academic profile.
     *
     * @param  mixed  $scheme  (ResearchScheme|CommunityServiceScheme)
     * @param  string  $role  (leader|member)
     * @return array{is_eligible: bool, reason: string|null}
     */
    public function execute(User $user, $scheme, string $role = 'leader'): array
    {
        $rules = $scheme->eligibility_rules ?? [];
        if (empty($rules)) {
            return ['is_eligible' => true, 'reason' => null];
        }

        $identity = $user->identity;

        // 1. Functional Position (Leader only usually)
        if ($role === 'leader' && ! empty($rules['allowed_functional_positions'])) {
            $userPosition = $identity->functional_position ?? 'Tenaga Pengajar';
            if (! in_array($userPosition, $rules['allowed_functional_positions'])) {
                return [
                    'is_eligible' => false,
                    'reason' => "Jabatan fungsional Anda ($userPosition) tidak memenuhi syarat pimpinan untuk skema ini.",
                ];
            }
        }

        // 2. SINTA Score (Leader only usually)
        if ($role === 'leader') {
            $minSinta = $rules['min_sinta_score'] ?? null;
            if ($minSinta && ($identity->sinta_score_v3_overall ?? 0) < $minSinta) {
                return [
                    'is_eligible' => false,
                    'reason' => 'Skor SINTA Anda ('.($identity->sinta_score_v3_overall ?? 0).") kurang dari batas minimal ($minSinta).",
                ];
            }
        }

        // 3. Scopus Score (H-Index) (Leader only usually)
        if ($role === 'leader') {
            $minScopus = $rules['min_scopus_score'] ?? null;
            if ($minScopus && ($identity->scopus_h_index ?? 0) < $minScopus) {
                return [
                    'is_eligible' => false,
                    'reason' => 'Skor Scopus (H-Index) Anda ('.($identity->scopus_h_index ?? 0).") kurang dari batas minimal ($minScopus).",
                ];
            }
        }

        // 4. Quota Check (Active proposals)
        $activeStatuses = [
            ProposalStatus::DRAFT,
            ProposalStatus::SUBMITTED,
            ProposalStatus::NEED_ASSIGNMENT,
            ProposalStatus::APPROVED,
            ProposalStatus::WAITING_REVIEWER,
            ProposalStatus::UNDER_REVIEW,
            ProposalStatus::REVIEWED,
            ProposalStatus::REVISION_NEEDED,
        ];

        if ($role === 'leader' && isset($rules['max_proposals_as_head'])) {
            $query = Proposal::where('submitter_id', $user->id)
                ->whereIn('status', $activeStatuses);

            if ($scheme instanceof \App\Models\ResearchScheme) {
                $query->whereNotNull('research_scheme_id');
            } elseif ($scheme instanceof \App\Models\CommunityServiceScheme) {
                $query->whereNotNull('community_service_scheme_id');
            }

            $headCount = $query->count();

            if ($headCount >= $rules['max_proposals_as_head']) {
                return [
                    'is_eligible' => false,
                    'reason' => 'Anda sudah mencapai batas maksimal usulan sebagai Ketua di skema ini.',
                ];
            }
        }

        // 4.1 Total Quota Check (across all schemes of the same type)
        if ($role === 'leader' && isset($rules['max_total_proposals_as_head'])) {
            $query = Proposal::where('submitter_id', $user->id)
                ->whereIn('status', $activeStatuses);

            if ($scheme instanceof \App\Models\ResearchScheme) {
                $query->whereNotNull('research_scheme_id');
            } elseif ($scheme instanceof \App\Models\CommunityServiceScheme) {
                $query->whereNotNull('community_service_scheme_id');
            }

            $totalHeadCount = $query->count();

            if ($totalHeadCount >= $rules['max_total_proposals_as_head']) {
                return [
                    'is_eligible' => false,
                    'reason' => 'Anda sudah mencapai batas maksimal total usulan sebagai Ketua untuk kategori ini.',
                ];
            }
        }

        if ($role === 'member' && isset($rules['max_proposals_as_member'])) {
            $query = \Illuminate\Support\Facades\DB::table('proposal_user')
                ->join('proposals', 'proposal_user.proposal_id', '=', 'proposals.id')
                ->where('proposal_user.user_id', $user->id)
                ->where('proposal_user.role', '!=', 'Ketua')
                ->whereIn('proposals.status', $activeStatuses);

            if ($scheme instanceof \App\Models\ResearchScheme) {
                $query->whereNotNull('proposals.research_scheme_id');
            } elseif ($scheme instanceof \App\Models\CommunityServiceScheme) {
                $query->whereNotNull('proposals.community_service_scheme_id');
            }

            $memberCount = $query->count();

            if ($memberCount >= $rules['max_proposals_as_member']) {
                return [
                    'is_eligible' => false,
                    'reason' => 'Dosen ini sudah mencapai batas maksimal keterlibatan sebagai Anggota di skema ini.',
                ];
            }
        }

        // 4.2 Total Member Quota Check (across all proposals of the same type)
        if ($role === 'member' && isset($rules['max_total_proposals_as_member'])) {
            $query = \Illuminate\Support\Facades\DB::table('proposal_user')
                ->join('proposals', 'proposal_user.proposal_id', '=', 'proposals.id')
                ->where('proposal_user.user_id', $user->id)
                ->where('proposal_user.role', '!=', 'Ketua')
                ->whereIn('proposals.status', $activeStatuses);

            if ($scheme instanceof \App\Models\ResearchScheme) {
                $query->whereNotNull('proposals.research_scheme_id');
            } elseif ($scheme instanceof \App\Models\CommunityServiceScheme) {
                $query->whereNotNull('proposals.community_service_scheme_id');
            }

            $totalMemberCount = $query->distinct('proposal_user.proposal_id')
                ->count('proposal_user.proposal_id');

            if ($totalMemberCount >= $rules['max_total_proposals_as_member']) {
                return [
                    'is_eligible' => false,
                    'reason' => 'Dosen ini sudah mencapai batas maksimal total keterlibatan sebagai Anggota untuk kategori ini.',
                ];
            }
        }

        // 5. Pending Reports Block (Granular Rule)
        $blockRole = $rules['pending_report_block_role'] ?? 'none';
        $shouldBlock = ($role === 'leader' && in_array($blockRole, ['leader', 'both'])) ||
            ($role === 'member' && in_array($blockRole, ['member', 'both']));

        if ($shouldBlock) {
            $pendingCount = Proposal::where('submitter_id', $user->id)
                ->where('start_year', '<', date('Y'))
                ->whereNotIn('status', [ProposalStatus::COMPLETED, ProposalStatus::REJECTED])
                ->count();

            if ($pendingCount > 0) {
                return [
                    'is_eligible' => false,
                    'reason' => "Dosen memiliki $pendingCount tanggungan usulan tahun sebelumnya yang belum diselesaikan.",
                ];
            }
        }

        return ['is_eligible' => true, 'reason' => null];
    }
}
