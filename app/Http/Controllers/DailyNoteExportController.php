<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DailyNoteExportController extends Controller
{
    /**
     * Download the daily notes PDF.
     */
    public function download(Proposal $proposal, \Illuminate\Http\Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $isMember = $proposal->teamMembers()->where('users.id', $user->id)->exists();
        $isSubmitter = $proposal->submitter_id === $user->id;
        $isLppm = $user->hasRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan']);

        if (! $isSubmitter && ! $isMember && ! $isLppm) {
            abort(403, 'Anda tidak memiliki akses untuk mengekspor catatan harian ini.');
        }

        $proposal->load([
            'dailyNotes' => fn ($q) => $q->with(['media.model', 'budgetGroup'])->latest('activity_date'),
            'submitter.identity.studyProgram',
            'researchScheme',
            'communityServiceScheme',
        ]);

        $isSigned = $proposal->logbook_signed_at !== null || $request->query('signed') === 'true';

        $pdf = Pdf::loadView('pdf.daily-notes', [
            'proposal' => $proposal,
            'notes' => $proposal->dailyNotes,
            'isSigned' => $isSigned,
        ])->setPaper('a4', 'portrait');

        $title = preg_replace('/[^A-Za-z0-9_\-]/', '_', substr($proposal->title, 0, 50));
        $filename = 'Catatan_Harian_'.$title.'.pdf';

        if (ob_get_level()) {

        }

        if ($request->query('download') === 'true') {
            return $pdf->download($filename);
        }

        return $pdf->stream($filename);
    }
}
