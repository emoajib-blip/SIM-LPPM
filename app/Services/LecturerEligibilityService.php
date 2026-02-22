<?php

namespace App\Services;

use App\Enums\ProposalStatus;
use App\Models\ProgressReport;
use App\Models\Proposal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Service to check if a lecturer is eligible to submit a new proposal.
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class LecturerEligibilityService
{
    /**
     * Check if a lecturer is eligible to submit a new proposal as Chairperson.
     * Checks are based on the immediate previous academic semester.
     *
     * @return array ['eligible' => bool, 'reasons' => array, 'period' => array]
     */
    public function checkEligibility(User $user): array
    {
        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->month;

        // Determination of academic periods:
        // Ganjil: Sept (9) to Feb (2)
        // Genap: March (3) to Aug (8)

        if ($currentMonth >= 9 || $currentMonth <= 2) {
            // We are in Ganjil semester
            $currentSemester = 'ganjil';
            $prevSemester = 'genap';
            $prevYear = ($currentMonth >= 9) ? $currentYear : $currentYear - 1;
        } else {
            // We are in Genap semester
            $currentSemester = 'genap';
            $prevSemester = 'ganjil';
            $prevYear = $currentYear - 1;
        }

        $reasons = [];

        // --- 1. Schedule Validation ---
        $scheduleInfo = $this->getScheduleStatus();
        if (! $scheduleInfo['research_open'] && ! $scheduleInfo['pkm_open']) {
            $reasons[] = 'Sistem saat ini ditutup untuk pengajuan usulan baru (bukan periode pendaftaran).';
        }

        // --- 2. Historical Obligation Checks ---
        // Find all proposals where user was chairperson in the previous period
        $prevProposals = Proposal::where('submitter_id', $user->id)
            ->whereIn('status', [ProposalStatus::APPROVED, ProposalStatus::COMPLETED])
            ->where(function ($query) use ($prevYear, $prevSemester) {
                if ($prevSemester === 'ganjil') {
                    $query->where(function ($q) use ($prevYear) {
                        $q->where(function ($sq) use ($prevYear) {
                            $sq->whereYear('created_at', $prevYear)->whereMonth('created_at', '>=', 9);
                        })->orWhere(function ($sq) use ($prevYear) {
                            $sq->whereYear('created_at', $prevYear + 1)->whereMonth('created_at', '<=', 2);
                        });
                    });
                } else {
                    $query->whereYear('created_at', $prevYear)->whereMonth('created_at', '>=', 3)->whereMonth('created_at', '<=', 8);
                }
            })
            ->get();

        foreach ($prevProposals as $proposal) {
            // Check for Final Report
            $hasFinalReport = ProgressReport::where('proposal_id', $proposal->id)->where('reporting_period', 'final')->whereIn('status', ['approved', 'completed'])->exists();
            if (! $hasFinalReport) {
                $reasons[] = "Proposal '{$proposal->title}' belum memiliki Laporan Akhir yang disetujui.";
            }

            // Check for Mandatory Outputs
            $targets = $proposal->outputs()->where('category', 'Wajib')->get();
            foreach ($targets as $target) {
                $isSubmitted = DB::table('mandatory_outputs')->join('progress_reports', 'mandatory_outputs.progress_report_id', '=', 'progress_reports.id')->where('progress_reports.proposal_id', $proposal->id)->where('mandatory_outputs.proposal_output_id', $target->id)->exists();
                if (! $isSubmitted) {
                    $reasons[] = "Proposal '{$proposal->title}' belum memenuhi luaran wajib: {$target->type}.";
                }
            }
        }

        return [
            'eligible' => empty($reasons),
            'reasons' => $reasons,
            'period' => [
                'current_semester' => $currentSemester,
                'current_year' => $currentYear,
                'checked_semester' => $prevSemester,
                'checked_year' => $prevYear,
            ],
            'schedule' => $scheduleInfo,
        ];
    }

    /**
     * Get the open/closed status for research and pkm based on admin settings.
     */
    public function getScheduleStatus(): array
    {
        $now = Carbon::now();

        $resStart = \App\Models\Setting::where('key', 'research_proposal_start_date')->value('value');
        $resEnd = \App\Models\Setting::where('key', 'research_proposal_end_date')->value('value');
        $pkmStart = \App\Models\Setting::where('key', 'community_service_proposal_start_date')->value('value');
        $pkmEnd = \App\Models\Setting::where('key', 'community_service_proposal_end_date')->value('value');

        return [
            'research_open' => $resStart && $resEnd && $now->between($resStart, $resEnd),
            'research_dates' => ['start' => $resStart, 'end' => $resEnd],
            'research_schemes' => \App\Models\ResearchScheme::pluck('name')->toArray(),
            'pkm_open' => $pkmStart && $pkmEnd && $now->between($pkmStart, $pkmEnd),
            'pkm_dates' => ['start' => $pkmStart, 'end' => $pkmEnd],
            'pkm_schemes' => \App\Models\CommunityServiceScheme::pluck('name')->toArray(),
        ];
    }
}
