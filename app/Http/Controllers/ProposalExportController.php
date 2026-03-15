<?php

namespace App\Http\Controllers;

use App\Models\ProgressReport;
use App\Models\Proposal;
use App\Services\DocumentSignatureService;
use App\Services\ProposalPdfService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProposalExportController extends Controller
{
    public function __construct(
        protected ProposalPdfService $pdfService,
        protected DocumentSignatureService $signatureService
    ) {}

    /**
     * Download the combined proposal PDF.
     */
    public function download(\Illuminate\Http\Request $request, Proposal $proposal)
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
            $pdfPath = $this->pdfService->export($proposal, $request->has('preview'));
            $pdfBinary = file_get_contents($pdfPath);

            $this->upsertProposalSignatures($proposal, $pdfBinary);

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
    public function preview(\Illuminate\Http\Request $request, Proposal $proposal)
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
            $pdfPath = $this->pdfService->export($proposal, true);
            $pdfBinary = file_get_contents($pdfPath);

            $this->upsertProposalSignatures($proposal, $pdfBinary);

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
            $pdfPath = $this->pdfService->exportReport($proposal, $report, $request->has('preview'));
            $pdfBinary = file_get_contents($pdfPath);

            $this->upsertReportSignatures($proposal, $report, $pdfBinary);

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

            return response()->file($pdfPath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"',
            ]);
        } catch (\Exception $e) {
            \Log::error('Report PDF Export Error: '.$e->getMessage());

            return back()->with('error', 'Gagal memulihkan dan mengunduh laporan PDF: '.$e->getMessage());
        }
    }

    /**
     * Upsert digital signatures for the report.
     */
    protected function upsertReportSignatures(Proposal $proposal, ProgressReport $report, string $pdfBinary): void
    {
        $hash = hash('sha256', $pdfBinary);
        $kid = config('document-signatures.current_kid', 'v1');
        $variant = $report->reporting_period === 'final' ? 'final' : 'progress';

        $reportStatusVal = $report->status instanceof \BackedEnum ? $report->status->value : $report->status;

        // Signatories mapping: role => [action, condition, signed_at]
        $signatories = [
            'lecturer' => ['submitted', true, $report->submitted_at ?? $report->created_at],
            'dekan' => [
                'approved',
                in_array($reportStatusVal, ['approved_by_dekan', 'approved', 'accepted']),
                $report->updated_at,
            ],
            'kepala_lppm' => [
                'finalized',
                in_array($reportStatusVal, ['approved', 'accepted']),
                $report->updated_at,
            ],
        ];

        /** @var \Illuminate\Support\Collection<string, \App\Models\DocumentSignature> $reportSigs */
        $reportSigs = $report->signatures()
            ->get()
            ->keyBy(function (\Illuminate\Database\Eloquent\Model $s) {
                /** @var \App\Models\DocumentSignature $s */
                return (string) "{$s->action}|{$s->signed_role}";
            });

        foreach ($signatories as $role => $config) {
            [$action, $condition, $signedAt] = $config;

            if (! $condition) {
                continue;
            }

            $user = [
                'lecturer' => $proposal->submitter,
                'dekan' => $proposal->submitter->identity?->faculty?->deanUser,
                'kepala_lppm' => \App\Models\User::role('kepala lppm')->first(),
            ][$role] ?? null;

            if (! $user) {
                continue;
            }

            $signatureRecord = $reportSigs->get("{$action}|{$role}");

            $nonce = $signatureRecord?->payload['nonce'] ?? Str::random(32);

            $payload = [
                'ver' => 1,
                'doc_type' => 'report',
                'doc_id' => (string) $report->id,
                'variant' => $variant,
                'action' => $action,
                'signed_role' => $role,
                'signed_by' => (string) $user->id,
                'signed_at' => \Carbon\Carbon::parse($signedAt)->copy()->utc()->toIso8601ZuluString(),
                'pdf_hash_alg' => 'SHA-256',
                'pdf_hash' => $hash,
                'kid' => $kid,
                'nonce' => $nonce,
            ];

            $report->signatures()->updateOrCreate(
                [
                    'signed_role' => $role,
                    'action' => $action,
                    'variant' => $variant,
                ],
                [
                    'signed_by' => $user->id,
                    'signed_at' => $signedAt,
                    'hash_alg' => 'sha256',
                    'document_hash' => $hash,
                    'kid' => $kid,
                    'payload' => $payload,
                    'signature' => $this->signatureService->signPayload($payload, $kid),
                ]
            );
        }
    }

    /**
     * Upsert digital signatures for the proposal.
     */
    protected function upsertProposalSignatures(Proposal $proposal, string $pdfBinary): void
    {
        $hash = hash('sha256', $pdfBinary);
        $kid = config('document-signatures.current_kid', 'v1');

        // Signatories mapping: role => [action, condition]
        $signatories = [
            'lecturer' => ['submitted', true],
            'dekan' => ['approved', in_array($proposal->status->value, ['approved', 'waiting_reviewer', 'under_review', 'reviewed', 'completed'])],
            'kepala_lppm' => ['finalized', in_array($proposal->status->value, ['waiting_reviewer', 'under_review', 'reviewed', 'completed'])],
        ];

        /** @var \Illuminate\Support\Collection<string, \App\Models\DocumentSignature> $proposalSigs */
        $proposalSigs = $proposal->signatures()
            ->get()
            ->keyBy(function (\Illuminate\Database\Eloquent\Model $s) {
                /** @var \App\Models\DocumentSignature $s */
                return (string) "{$s->action}|{$s->signed_role}";
            });

        foreach ($signatories as $role => $config) {
            [$action, $condition] = $config;

            if (! $condition) {
                continue;
            }

            $user = [
                'lecturer' => $proposal->submitter,
                'dekan' => $proposal->submitter->identity?->faculty?->deanUser,
                'kepala_lppm' => \App\Models\User::role('kepala lppm')->first(),
            ][$role] ?? null;

            if (! $user) {
                continue;
            }

            $signatureRecord = $proposalSigs->get("{$action}|{$role}");

            $nonce = $signatureRecord?->payload['nonce'] ?? Str::random(32);
            $signedAt = [
                'lecturer' => $proposal->created_at,
                'dekan' => \App\Models\ProposalStatusLog::where('proposal_id', $proposal->id)->where('status_after', \App\Enums\ProposalStatus::APPROVED)->value('at') ?? now(),
                'kepala_lppm' => \App\Models\ProposalStatusLog::where('proposal_id', $proposal->id)->whereIn('status_after', [\App\Enums\ProposalStatus::WAITING_REVIEWER, \App\Enums\ProposalStatus::UNDER_REVIEW])->value('at') ?? now(),
            ][$role] ?? $proposal->updated_at ?? now();

            $payload = [
                'ver' => 1,
                'doc_type' => 'proposal',
                'doc_id' => (string) $proposal->id,
                'variant' => 'final',
                'action' => $action,
                'signed_role' => $role,
                'signed_by' => (string) $user->id,
                'signed_at' => \Carbon\Carbon::parse($signedAt)->copy()->utc()->toIso8601ZuluString(),
                'pdf_hash_alg' => 'SHA-256',
                'pdf_hash' => $hash,
                'kid' => $kid,
                'nonce' => $nonce,
            ];

            $proposal->signatures()->updateOrCreate(
                [
                    'signed_role' => $role,
                    'action' => $action,
                    'kid' => $kid,
                    'payload' => $payload,
                    'signature' => $this->signatureService->signPayload($payload, $kid),
                ]
            );
        }
    }
}
