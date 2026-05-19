<?php

namespace App\Http\Controllers;

use App\Models\DocumentSignature;
use App\Models\InstitutionalReport;
use App\Services\DocumentSignatureService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ReportVerificationController extends Controller
{
    public function show(Request $request, InstitutionalReport $institutionalReport, DocumentSignatureService $signatureService): View
    {
        $typeLabels = [
            'research' => 'Penelitian',
            'pkm' => 'Pengabdian (PKM)',
            'output' => 'Luaran',
            'partner' => 'Kerjasama Mitra',
            'iku' => 'Rekap IKU',
            'monev' => 'Monitoring & Evaluasi (Monev)',
        ];

        $requestedVariant = (string) $request->query('variant', '');
        $variant = in_array($requestedVariant, ['submitted', 'approved'], true)
            ? $requestedVariant
            : ((string) ($institutionalReport->status->value) === 'approved' ? 'approved' : 'submitted');

        $signatures = DocumentSignature::query()
            ->where('document_type', $institutionalReport->getMorphClass())
            ->where('document_id', $institutionalReport->id)
            ->where('variant', $variant)
            ->whereIn('action', ['submitted', 'approved'])
            ->orderByDesc('signed_at')
            ->get()
            ->groupBy('action')
            ->map(fn ($items) => $items->first());

        $submittedSignature = $signatures->get('submitted');
        $approvedSignature = $signatures->get('approved');

        return view('reports.verify', [
            'report' => $institutionalReport->load(['submitter.identity', 'approver.identity']),
            'typeLabel' => $typeLabels[$institutionalReport->type] ?? ucfirst($institutionalReport->type),
            'variant' => $variant,
            'submittedSignature' => $submittedSignature,
            'approvedSignature' => $approvedSignature,
            'submittedValid' => $submittedSignature ? $signatureService->verify($submittedSignature) : null,
            'approvedValid' => $approvedSignature ? $signatureService->verify($approvedSignature) : null,
        ]);
    }
}
