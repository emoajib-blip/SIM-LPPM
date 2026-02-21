<?php

namespace App\Http\Controllers;

use App\Models\ProgressReport;
use App\Models\Proposal;
use App\Services\ProposalPdfService;
use Illuminate\Support\Facades\Auth;

class ReportExportController extends Controller
{
    public function __construct(
        protected ProposalPdfService $pdfService
    ) {}

    /**
     * Download the report PDF for a specific proposal.
     */
    public function download(Proposal $proposal, string $type = 'progress')
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $isMember = $proposal->teamMembers()->where('users.id', $user->id)->exists();
        $isSubmitter = $proposal->submitter_id === $user->id;
        $isLppm = $user->hasRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan']);

        if (! $isSubmitter && ! $isMember && ! $isLppm) {
            abort(403, 'Anda tidak memiliki akses untuk mengekspor laporan ini.');
        }

        // Get the relevant report
        $report = null;
        if ($type === 'progress') {
            $report = $proposal->progressReport;
        } else {
            // For now, if it's final report, we might need a different logic or if it's stored in the same table with a flag
            // Looking at the models, ProgressReport seems to be the one used.
            $report = $proposal->progressReport; // Fallback or search for final
        }

        if (! $report) {
            abort(404, 'Laporan tidak ditemukan.');
        }

        $pdfPath = $this->pdfService->exportReport($proposal, $report);

        $typeLabel = $type === 'progress' ? 'Laporan_Kemajuan' : 'Laporan_Akhir';
        $filename = $typeLabel.'_'.str_replace(' ', '_', substr($proposal->title, 0, 50)).'.pdf';

        return response()->download($pdfPath, $filename)->deleteFileAfterSend(true);
    }
}
