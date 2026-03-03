<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Services\ProposalPdfService;
use Illuminate\Support\Facades\Auth;

class ProposalExportController extends Controller
{
    public function __construct(
        protected ProposalPdfService $pdfService
    ) {}

    /**
     * Download the combined proposal PDF.
     */
    public function download(Proposal $proposal)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $isMember = $proposal->teamMembers()->where('users.id', $user->id)->exists();
        $isSubmitter = $proposal->submitter_id === $user->id;
        $isLppm = $user->hasRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan']);
        $isAssignedReviewer = $proposal->reviewers()->where('user_id', $user->id)->exists();

        if (! $isSubmitter && ! $isMember && ! $isLppm && ! $isAssignedReviewer) {
            abort(403, 'Anda tidak memiliki akses untuk mengekspor proposal ini.');
        }

        try {
            $pdfPath = $this->pdfService->export($proposal);

            $title = preg_replace('/[^A-Za-z0-9_\-]/', '_', substr($proposal->title, 0, 50));
            $filename = 'Proposal_'.$title.'.pdf';

            while (ob_get_level() > 0) {
                @ob_end_clean();

            }

            // Since we use caching, we do NOT delete the file after sending
            return response()->download($pdfPath, $filename);
        } catch (\Exception $e) {
            \Log::error('Proposal PDF Download Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mengunduh proposal PDF: '.$e->getMessage());
        }
    }

    /**
     * Preview the combined proposal PDF in browser.
     */
    public function preview(Proposal $proposal)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $isMember = $proposal->teamMembers()->where('users.id', $user->id)->exists();
        $isSubmitter = $proposal->submitter_id === $user->id;
        $isLppm = $user->hasRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan']);
        $isAssignedReviewer = $proposal->reviewers()->where('user_id', $user->id)->exists();

        if (! $isSubmitter && ! $isMember && ! $isLppm && ! $isAssignedReviewer) {
            abort(403, 'Anda tidak memiliki akses untuk melihat proposal ini.');
        }

        try {
            $pdfPath = $this->pdfService->export($proposal);

            while (ob_get_level() > 0) {
                @ob_end_clean();

            }

            // Return the cached file directly without deleting it
            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline',
            ]);
        } catch (\Exception $e) {
            \Log::error('Proposal PDF Preview Error: '.$e->getMessage());

            return back()->with('error', 'Gagal mempratinjau proposal PDF: '.$e->getMessage());
        }
    }

    /**
     * Download the report (Progress/Final) PDF.
     */
    public function downloadReport(\Illuminate\Http\Request $request, Proposal $proposal)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $isMember = $proposal->teamMembers()->where('users.id', $user->id)->exists();
        $isSubmitter = $proposal->submitter_id === $user->id;
        $isLppm = $user->hasRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan']);
        $isAssignedReviewer = $proposal->reviewers()->where('user_id', $user->id)->exists();

        if (! $isSubmitter && ! $isMember && ! $isLppm && ! $isAssignedReviewer) {
            abort(403, 'Anda tidak memiliki akses untuk mengekspor laporan ini.');
        }

        $type = $request->query('type', 'progress');

        // Find the report based on type
        if ($type === 'final') {
            $report = $proposal->progressReports()
                ->where('reporting_period', 'final')
                ->latest()
                ->first();
        } else {
            // For progress, we take the latest non-final report
            // or specific version if needed (but UI currently only passes 'progress')
            $report = $proposal->progressReports()
                ->where('reporting_period', '!=', 'final')
                ->latest()
                ->first();
        }

        if (! $report) {
            $message = 'Data Laporan '.($type === 'final' ? 'Akhir' : 'Kemajuan').' belum tersedia. Harap simpan draft laporan terlebih dahulu.';

            return back()->with('error', $message);
        }

        try {
            /** @var \App\Models\ProgressReport $report */
            $pdfPath = $this->pdfService->exportReport($proposal, $report);

            $title = preg_replace('/[^A-Za-z0-9_\-]/', '_', substr($proposal->title, 0, 50));
            $filename = ucfirst($type).'_Report_'.$title.'.pdf';

            if (! app()->environment('testing')) {
                while (ob_get_level() > 0) {
                    @ob_end_clean();

                }
            }

            if ($request->query('download') === 'true') {
                return response()->download($pdfPath, $filename);
            }

            // Return as inline for target="_blank" support in browsers (Preview)
            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
            ]);
        } catch (\Exception $e) {
            \Log::error('Report PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal memulihkan dan mengunduh laporan PDF: '.$e->getMessage());
        }
    }
}
