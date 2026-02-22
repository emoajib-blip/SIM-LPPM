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
            // Current cycle: (Year)/ (Year+1) or (Year-1)/ (Year)
            $prevSemester = 'genap';
            $prevYear = ($currentMonth >= 9) ? $currentYear : $currentYear - 1;
        } else {
            // We are in Genap semester
            $currentSemester = 'genap';
            $prevSemester = 'ganjil';
            $prevYear = $currentYear - 1; // Ganjil started in the previous calendar year
        }

        $reasons = [];

        // Find all proposals where user was chairperson in the previous period
        // We only care about approved/completed proposals that have reporting obligations
        $prevProposals = Proposal::where('submitter_id', $user->id)
            ->whereIn('status', [ProposalStatus::APPROVED, ProposalStatus::COMPLETED])
            ->where(function ($query) use ($prevYear, $prevSemester) {
                // Match the month range logic from dashboards
                if ($prevSemester === 'ganjil') {
                    // Ganjil spans two years (Sept Y to Feb Y+1)
                    // We look for creation in Sept-Dec of prevYear OR Jan-Feb of prevYear+1
                    $query->where(function ($q) use ($prevYear) {
                        $q->where(function ($sq) use ($prevYear) {
                            $sq->whereYear('created_at', $prevYear)
                                ->whereMonth('created_at', '>=', 9);
                        })->orWhere(function ($sq) use ($prevYear) {
                            $sq->whereYear('created_at', $prevYear + 1)
                                ->whereMonth('created_at', '<=', 2);
                        });
                    });
                } else {
                    // Genap is within one calendar year (March to August)
                    $query->whereYear('created_at', $prevYear)
                        ->whereMonth('created_at', '>=', 3)
                        ->whereMonth('created_at', '<=', 8);
                }
            })
            ->get();

        foreach ($prevProposals as $proposal) {
            // 1. Check for Final Report
            // A final report must exist and be either approved or completed
            $hasFinalReport = ProgressReport::where('proposal_id', $proposal->id)
                ->where('reporting_period', 'final')
                ->whereIn('status', ['approved', 'completed'])
                ->exists();

            if (! $hasFinalReport) {
                $reasons[] = "Proposal '{$proposal->title}' periode ".ucfirst($prevSemester).' '.($prevSemester === 'ganjil' ? "$prevYear/".($prevYear + 1) : $prevYear).' belum memiliki Laporan Akhir yang disetujui.';
            }

            // 2. Check for Mandatory Outputs
            // Get all target outputs defined for this proposal
            $targets = $proposal->outputs()->where('category', 'Wajib')->get();
            foreach ($targets as $target) {
                // Check if there is a corresponding MandatoryOutput submitted in any report for this proposal
                $isSubmitted = DB::table('mandatory_outputs')
                    ->join('progress_reports', 'mandatory_outputs.progress_report_id', '=', 'progress_reports.id')
                    ->where('progress_reports.proposal_id', $proposal->id)
                    ->where('mandatory_outputs.proposal_output_id', $target->id)
                    ->exists();

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
        ];
    }
}
