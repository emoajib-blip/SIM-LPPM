<?php

namespace App\Services;

use App\Models\Proposal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use setasign\Fpdi\Fpdi;

class ProposalPdfService
{
    /**
     * Export the proposal to a combined PDF.
     * Uses caching to avoid regenerating the same PDF multiple times.
     *
     * @return string Path to the combined PDF file
     */
    public function export(Proposal $proposal): string
    {
        // 0. Cache Check
        $cacheDir = storage_path('app/public/pdf_cache/proposals');
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }

        // Calculate latest timestamp including media
        $latestTimestamp = $proposal->updated_at->timestamp;

        $collections = ['substance_file', 'approval_file'];
        foreach ($collections as $col) {
            /** @var \Illuminate\Database\Eloquent\Model&\Spatie\MediaLibrary\HasMedia $detailable */
            $detailable = $proposal->detailable;
            $media = $detailable->getMedia($col)->first();
            if ($media) {
                $latestTimestamp = max($latestTimestamp, $media->updated_at->timestamp);
            }
        }

        // Check partner commitment letters
        foreach ($proposal->partners as $partner) {
            $commitment = $partner->getMedia('commitment_letter')
                ->where('custom_properties.proposal_id', $proposal->id)
                ->first();
            if ($commitment) {
                $latestTimestamp = max($latestTimestamp, $commitment->updated_at->timestamp);
            }
        }

        $cacheFileName = sprintf(
            'proposal_%s_%s.pdf',
            $proposal->id,
            $latestTimestamp
        );
        $cachePath = $cacheDir . DIRECTORY_SEPARATOR . $cacheFileName;

        if (file_exists($cachePath)) {
            return $cachePath;
        }

        // Cleanup old versions of this proposal's PDF
        $oldPdfs = glob($cacheDir . DIRECTORY_SEPARATOR . "proposal_{$proposal->id}_*.pdf");
        foreach ($oldPdfs as $oldPdf) {
            @unlink($oldPdf);
        }

        /** @var \App\Models\Faculty|null $faculty */
        $faculty = $proposal->submitter->identity?->faculty?->load('deanUser.identity');
        $deanName = '..........................';
        $deanId = '..........................';

        if ($faculty?->deanUser) {
            // Dynamic: use linked user data
            /** @var \App\Models\Identity $identity */
            $identity = $faculty->deanUser->identity;
            $name = $faculty->deanUser->name;
            $prefix = $identity->title_prefix;
            $suffix = $identity->title_suffix;

            // Only prepend prefix if not already present
            if ($prefix && !str_starts_with($name, $prefix) && !str_contains($name, $prefix . ' ')) {
                $name = $prefix . ' ' . $name;
            }

            // Only append suffix if not already present
            if ($suffix && !str_ends_with($name, $suffix) && !str_contains($name, ', ' . $suffix)) {
                $name = $name . ', ' . $suffix;
            }

            $deanName = $name;
            $deanId = $identity->identity_id ?? '';
        } else {
            // Fallback: use static fields in faculty record
            $deanName = $faculty->dean_name ?: $deanName;
            $deanId = $faculty->dean_id ?: $deanId;
        }

        if ($deanName === '..........................') {
            $candidate = \App\Models\User::whereHas('roles', function ($q) {
                $q->where('name', 'dekan');
            })
                ->whereHas('identity', function ($q) use ($faculty) {
                    $q->where('faculty_id', $faculty->id);
                })
                ->with('identity')
                ->first();

            if ($candidate) {
                /** @var \App\Models\Identity $idn */
                $idn = $candidate->identity;
                $nm = $candidate->name;
                $px = $idn->title_prefix;
                $sx = $idn->title_suffix;
                if ($px && !str_starts_with($nm, $px) && !str_contains($nm, $px . ' ')) {
                    $nm = $px . ' ' . $nm;
                }
                if ($sx && !str_ends_with($nm, $sx) && !str_contains($nm, ', ' . $sx)) {
                    $nm = $nm . ', ' . $sx;
                }
                $deanName = $nm;
                $deanId = $idn->identity_id ?? '';
            }
        }

        // Fetch LPPM Head details based on institution
        /** @var \App\Models\Institution|null $institution */
        $institution = $proposal->submitter->identity?->institution?->load('lppmHeadUser.identity');
        $lppmHeadName = '..........................';
        $lppmHeadId = '..........................';

        if ($institution?->lppmHeadUser) {
            /** @var \App\Models\Identity $identity */
            $identity = $institution->lppmHeadUser->identity;
            $fullName = $institution->lppmHeadUser->name;
            $prefix = $identity->title_prefix;
            $suffix = $identity->title_suffix;

            if ($prefix && !str_contains($fullName, $prefix)) {
                $fullName = $prefix . ' ' . $fullName;
            }
            if ($suffix && !str_contains($fullName, $suffix)) {
                $fullName = $fullName . ', ' . $suffix;
            }

            $lppmHeadName = $fullName;
            $lppmHeadId = $identity->identity_id ?? '';
        } else {
            $lppmHeadName = $institution->lppm_head_name ?: (\App\Models\Setting::where('key', 'lppm_head_name')->first()->value ?? $lppmHeadName);
            $lppmHeadId = $institution->lppm_head_id ?: (\App\Models\Setting::where('key', 'lppm_head_id')->first()->value ?? $lppmHeadId);
        }

        if ($lppmHeadName === '..........................') {
            $candidate = \App\Models\User::whereHas('roles', function ($q) {
                $q->where('name', 'kepala lppm');
            })
                ->whereHas('identity', function ($q) use ($institution) {
                    $q->where('institution_id', $institution->id);
                })
                ->with('identity')
                ->first();

            if ($candidate) {
                /** @var \App\Models\Identity $idn */
                $idn = $candidate->identity;
                $nm = $candidate->name;
                $px = $idn->title_prefix;
                $sx = $idn->title_suffix;
                if ($px && !str_contains($nm, $px)) {
                    $nm = $px . ' ' . $nm;
                }
                if ($sx && !str_contains($nm, $sx)) {
                    $nm = $nm . ', ' . $sx;
                }
                $lppmHeadName = $nm;
                $deanId = $idn->identity_id ?? '';
            }
        } else {
            // Ultimate fallback
            $lppmHeadName = \App\Models\Setting::where('key', 'lppm_head_name')->first()->value ?? $lppmHeadName;
            $lppmHeadId = \App\Models\Setting::where('key', 'lppm_head_id')->first()->value ?? $lppmHeadId;
        }

        // Fetch approval logs for signatures
        $deanLog = \App\Models\ProposalStatusLog::where('proposal_id', $proposal->id)
            ->where('status_after', \App\Enums\ProposalStatus::APPROVED)
            ->latest('at')
            ->first();

        $lppmLog = \App\Models\ProposalStatusLog::where('proposal_id', $proposal->id)
            ->whereIn('status_after', [\App\Enums\ProposalStatus::UNDER_REVIEW, \App\Enums\ProposalStatus::WAITING_REVIEWER])
            ->latest('at')
            ->first();

        $submissionLog = \App\Models\ProposalStatusLog::where('proposal_id', $proposal->id)
            ->where('status_after', \App\Enums\ProposalStatus::SUBMITTED)
            ->latest('at')
            ->first();

        $lecturerSignedAt = $submissionLog->at ?? $proposal->created_at;

        // Pre-fetch approval mode once (reused for Blade view & FPDI merge)
        $approvalMode = \App\Models\Setting::where('key', 'proposal_approval_mode')->value('value') ?? 'digital';

        // 1. Generate the basic info PDF using DomPDF
        $infoPdfContent = Pdf::loadView('pdf.proposal-export', [
            'proposal' => $proposal->load([
                'submitter.identity.institution',
                'submitter.identity.studyProgram',
                'submitter.identity.faculty',
                'teamMembers.identity.institution',
                'teamMembers.identity.studyProgram',
                'researchScheme',
                'focusArea',
                'theme',
                'topic',
                'clusterLevel1',
                'keywords',
                'budgetItems.budgetGroup',
                'budgetItems.budgetComponent',
                'partners',
                'detailable.macroResearchGroup',
                'outputs',
            ]),
            'dean_name' => $deanName,
            'dean_id' => $deanId,
            'lppm_head_name' => $lppmHeadName,
            'lppm_head_id' => $lppmHeadId,
            'proposal_approval_mode' => $approvalMode, // reuse already-fetched variable
            'dean_signed_at' => $deanLog?->at,
            'lppm_signed_at' => $lppmLog?->at,
            'lecturer_signed_at' => $lecturerSignedAt,
        ])->setPaper('a4', 'portrait')->output();

        $tempInfoPath = tempnam(sys_get_temp_dir(), 'proposal_info_');
        file_put_contents($tempInfoPath, $infoPdfContent);

        // 2. Prepare FPDI for merging
        $pdf = new Fpdi;

        // Add pages from the generated info PDF
        $pageCount = $pdf->setSourceFile($tempInfoPath);
        for ($i = 1; $i <= $pageCount; $i++) {
            $templateId = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($templateId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);
        }

        if ($approvalMode === 'upload' || $approvalMode === 'both') {
            /** @var \App\Models\Research|\App\Models\CommunityService $detailable */
            $detailable = $proposal->detailable;
            /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $approvalFile */
            $approvalFile = $detailable->getFirstMedia('approval_file');
            if ($approvalFile && file_exists($approvalFile->getPath()) && str_contains($approvalFile->mime_type ?? '', 'pdf')) {
                try {
                    $approvalPageCount = $pdf->setSourceFile($approvalFile->getPath());
                    for ($i = 1; $i <= $approvalPageCount; $i++) {
                        $templateId = $pdf->importPage($i);
                        $size = $pdf->getTemplateSize($templateId);
                        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                        $pdf->useTemplate($templateId);
                    }
                } catch (\Throwable $e) {
                    \Log::warning('FPDI Merge Fail (Approval File) for ' . $proposal->id . ': ' . $e->getMessage());
                }
            }
        }

        // 3. Add pages from the substance file if it exists
        /** @var \App\Models\Research|\App\Models\CommunityService $detailableSubstance */
        $detailableSubstance = $proposal->detailable;
        /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $substanceFile */
        $substanceFile = $detailableSubstance->getFirstMedia('substance_file');
        if ($substanceFile && file_exists($substanceFile->getPath()) && str_contains($substanceFile->mime_type ?? '', 'pdf')) {
            try {
                $substancePageCount = $pdf->setSourceFile($substanceFile->getPath());
                for ($i = 1; $i <= $substancePageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Throwable $e) {
                Log::warning('FPDI Merge Fail (Substance File) for ' . $proposal->id . ': ' . $e->getMessage());
            }
        } elseif ($substanceFile && file_exists($substanceFile->getPath())) {
            Log::warning('Proposal PDF Export: Skipping non-PDF substance file for proposal ' . $proposal->id . ' (MIME: ' . $substanceFile->mime_type . ')');
        }

        // 4. Add pages from partner commitment letters
        foreach ($proposal->partners as $partner) {
            /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $commitmentLetter */
            $commitmentLetter = $partner->getMedia('commitment_letter')
                ->where('custom_properties.proposal_id', $proposal->id)
                ->first();

            if ($commitmentLetter && file_exists($commitmentLetter->getPath()) && str_contains($commitmentLetter->mime_type ?? '', 'pdf')) {
                try {
                    $commitmentPageCount = $pdf->setSourceFile($commitmentLetter->getPath());
                    for ($i = 1; $i <= $commitmentPageCount; $i++) {
                        $templateId = $pdf->importPage($i);
                        $size = $pdf->getTemplateSize($templateId);
                        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                        $pdf->useTemplate($templateId);
                    }
                } catch (\Throwable $e) {
                    Log::warning('FPDI Merge Fail (Partner Commitment Letter) for partner ' . $partner->id . ' in proposal ' . $proposal->id . ': ' . $e->getMessage());
                }
            }
        }

        $pdf->Output('F', $cachePath);

        // Cleanup temporary info PDF
        @unlink($tempInfoPath);

        return $cachePath;
    }

    /**
     * Export a report to PDF.
     */
    public function exportReport(Proposal $proposal, \App\Models\ProgressReport $report): string
    {
        // 0. Cache Check
        $cacheDir = storage_path('app/public/pdf_cache/reports');
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }

        // Calculate latest timestamp including media
        $latestTimestamp = $report->updated_at->timestamp;

        // Check report media
        $collections = ['substance_file', 'realization_file', 'presentation_file', 'signature_page'];
        foreach ($collections as $col) {
            $media = $report->getFirstMedia($col);
            if ($media) {
                $latestTimestamp = max($latestTimestamp, $media->updated_at->timestamp);
            }
        }

        // Check output media
        $outputModels = $report->mandatoryOutputs->concat($report->additionalOutputs);
        foreach ($outputModels as $output) {
            $outputCols = ['journal_article', 'book_document', 'publication_certificate', 'output_file'];
            foreach ($outputCols as $col) {
                $media = $output->getFirstMedia($col);
                if ($media) {
                    $latestTimestamp = max($latestTimestamp, $media->updated_at->timestamp);
                }
            }
        }

        $cacheFileName = sprintf(
            'report_%s_%s.pdf',
            $report->id,
            $latestTimestamp
        );
        $cachePath = $cacheDir . DIRECTORY_SEPARATOR . $cacheFileName;

        if (file_exists($cachePath)) {
            return $cachePath;
        }

        // Cleanup old versions of this report's PDF
        $oldPdfs = glob($cacheDir . DIRECTORY_SEPARATOR . "report_{$report->id}_*.pdf");
        foreach ($oldPdfs as $oldPdf) {
            @unlink($oldPdf);
        }

        // Signatures setup (Same as export)
        /** @var \App\Models\Faculty|null $faculty */
        $faculty = $proposal->submitter->identity?->faculty?->load('deanUser.identity');
        $deanName = '..........................';
        $deanId = '..........................';
        if ($faculty?->deanUser) {
            /** @var \App\Models\Identity $identity */
            $identity = $faculty->deanUser->identity;
            $deanName = format_name($identity->title_prefix, $faculty->deanUser->name, $identity->title_suffix);
            $deanId = $identity->identity_id ?? '';
        } else {
            $deanName = $faculty->dean_name ?: $deanName;
            $deanId = $faculty->dean_id ?: $deanId;
        }

        /** @var \App\Models\Institution|null $institution */
        $institution = $proposal->submitter->identity?->institution?->load('lppmHeadUser.identity');
        $lppmHeadName = '..........................';
        $lppmHeadId = '..........................';
        if ($institution?->lppmHeadUser) {
            /** @var \App\Models\Identity $identity */
            $identity = $institution->lppmHeadUser->identity;
            $lppmHeadName = format_name($identity->title_prefix, $institution->lppmHeadUser->name, $identity->title_suffix);
            $lppmHeadId = $identity->identity_id ?? '';
        } elseif ($institution) {
            $lppmHeadName = $institution->lppm_head_name ?: (\App\Models\Setting::where('key', 'lppm_head_name')->first()->value ?? $lppmHeadName);
            $lppmHeadId = $institution->lppm_head_id ?: (\App\Models\Setting::where('key', 'lppm_head_id')->first()->value ?? $lppmHeadId);
        } else {
            $lppmHeadName = \App\Models\Setting::where('key', 'lppm_head_name')->first()->value ?? $lppmHeadName;
            $lppmHeadId = \App\Models\Setting::where('key', 'lppm_head_id')->first()->value ?? $lppmHeadId;
        }

        if ($institution && $lppmHeadName === '..........................') {
            $candidate = \App\Models\User::whereHas('roles', function ($q) {
                $q->where('name', 'kepala lppm');
            })
                ->whereHas('identity', function ($q) use ($institution) {
                    $q->where('institution_id', $institution->id);
                })
                ->with('identity')
                ->first();

            if ($candidate) {
                /** @var \App\Models\Identity $idn */
                $idn = $candidate->identity;
                $lppmHeadName = format_name($idn->title_prefix, $candidate->name, $idn->title_suffix);
                $lppmHeadId = $idn->identity_id ?? '';
            }
        }

        // Determine signature presence for reports
        // Strict logic: Dean signature appears ONLY IF report is approved_by_dekan OR approved
        // LPPM signature appears ONLY IF report is approved
        $deanSignedAt = null;
        $lppmSignedAt = null;

        $reportStatusVal = $report->status instanceof \BackedEnum ? $report->status->value : $report->status;

        if (in_array($reportStatusVal, ['approved_by_dekan', 'approved', 'accepted'])) {
            $deanSignedAt = $report->updated_at;
        }

        if (in_array($reportStatusVal, ['approved', 'accepted'])) {
            $lppmSignedAt = $report->updated_at;
        }

        $lecturerSignedAt = $report->submitted_at ?? ($report->created_at ?? now());

        // Fetch monev date as reviewer signed date
        $monevDate = \App\Models\ProposalMonev::where('proposal_id', $proposal->id)->latest('monev_date')->value('monev_date');
        $reviewerSignedAt = $monevDate;

        // Generate report content PDF
        $infoPdfContent = Pdf::loadView('pdf.report-export', [
            'proposal' => $proposal->load([
                'submitter.identity.institution',
                'submitter.identity.studyProgram',
                'teamMembers.identity.institution',
                'researchScheme',
            ]),
            'report' => $report->load([
                'mandatoryOutputs.proposalOutput',
                'additionalOutputs.proposalOutput',
            ]),
            'dean_name' => $deanName,
            'dean_id' => $deanId,
            'lppm_head_name' => $lppmHeadName,
            'lppm_head_id' => $lppmHeadId,
            'report_approval_mode' => \App\Models\Setting::where('key', 'report_approval_mode')->value('value') ?? 'digital',
            'dean_signed_at' => $deanSignedAt,
            'lppm_signed_at' => $lppmSignedAt,
            'lecturer_signed_at' => $lecturerSignedAt,
            'reviewer_signed_at' => $reviewerSignedAt,
        ])->setPaper('a4', 'portrait')->output();

        $tempInfoPath = tempnam(sys_get_temp_dir(), 'report_info_');
        file_put_contents($tempInfoPath, $infoPdfContent);

        $pdf = new Fpdi;
        $pageCount = $pdf->setSourceFile($tempInfoPath);
        for ($i = 1; $i <= $pageCount; $i++) {
            $templateId = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($templateId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);
        }

        // 1.5. Add pages from the report's uploaded signature page (if exists)
        /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $signaturePage */
        $signaturePage = $report->getFirstMedia('signature_page');
        if ($signaturePage && file_exists($signaturePage->getPath()) && str_contains($signaturePage->mime_type ?? '', 'pdf')) {
            try {
                $sigPageCount = $pdf->setSourceFile($signaturePage->getPath());
                for ($i = 1; $i <= $sigPageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('FPDI Merge Fail (Report Signature Page) for ' . $report->id . ': ' . $e->getMessage());
            }
        }

        // 2. Add pages from the report's substance file
        /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $substanceFile */
        $substanceFile = $report->getFirstMedia('substance_file');
        // Validate MIME type is application/pdf before merging
        if ($substanceFile && file_exists($substanceFile->getPath()) && str_contains($substanceFile->mime_type ?? '', 'pdf')) {
            try {
                $substancePageCount = $pdf->setSourceFile($substanceFile->getPath());
                for ($i = 1; $i <= $substancePageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('FPDI Merge Fail (Report Substance) for ' . $report->id . ': ' . $e->getMessage());
            }
        }

        // 3. Add pages from Realisasi Keterlibatan file
        /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $realizationFile */
        $realizationFile = $report->getFirstMedia('realization_file');
        if ($realizationFile && file_exists($realizationFile->getPath()) && str_contains($realizationFile->mime_type ?? '', 'pdf')) {
            try {
                $realizationPageCount = $pdf->setSourceFile($realizationFile->getPath());
                for ($i = 1; $i <= $realizationPageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('FPDI Merge Fail (Realization File) for ' . $report->id . ': ' . $e->getMessage());
            }
        }

        // 4. Add pages from Presentation file (Community Service only)
        if ($proposal->detailable_type === 'App\Models\CommunityService') {
            /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $presentationFile */
            $presentationFile = $report->getFirstMedia('presentation_file');
            if ($presentationFile && file_exists($presentationFile->getPath()) && str_contains($presentationFile->mime_type ?? '', 'pdf')) {
                try {
                    $presentationPageCount = $pdf->setSourceFile($presentationFile->getPath());
                    for ($i = 1; $i <= $presentationPageCount; $i++) {
                        $templateId = $pdf->importPage($i);
                        $size = $pdf->getTemplateSize($templateId);
                        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                        $pdf->useTemplate($templateId);
                    }
                } catch (\Throwable $e) {
                    \Illuminate\Support\Facades\Log::warning('FPDI Merge Fail (Presentation File) for ' . $report->id . ': ' . $e->getMessage());
                }
            }
        }

        // Add pages from output files (if they are PDFs)
        $outputModels = $report->mandatoryOutputs->concat($report->additionalOutputs);
        foreach ($outputModels as $outputRecord) {
            // Check all possible PDF-containing collections for outputs
            $collections = ['journal_article', 'book_document', 'publication_certificate', 'output_file'];

            foreach ($collections as $collection) {
                /** @var ?\Spatie\MediaLibrary\MediaCollections\Models\Media $outputMedia */
                $outputMedia = $outputRecord->getFirstMedia($collection);
                if ($outputMedia && file_exists($outputMedia->getPath()) && str_contains($outputMedia->mime_type ?? '', 'pdf')) {
                    try {
                        $outputPageCount = $pdf->setSourceFile($outputMedia->getPath());
                        for ($i = 1; $i <= $outputPageCount; $i++) {
                            $templateId = $pdf->importPage($i);
                            $size = $pdf->getTemplateSize($templateId);
                            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                            $pdf->useTemplate($templateId);
                        }
                    } catch (\Throwable $e) {
                        \Illuminate\Support\Facades\Log::warning("FPDI Merge Fail (Output File - {$collection}) for report " . $report->id . ': ' . $e->getMessage());
                    }
                }
            }
        }

        // Add pages from Daily Notes
        $dailyNotes = \App\Models\DailyNote::where('proposal_id', $proposal->id)
            ->with(['budgetGroup', 'media'])
            ->orderBy('activity_date', 'asc')
            ->get();

        if ($dailyNotes->isNotEmpty()) {
            $notesPdfContent = Pdf::loadView('pdf.daily-notes', [
                'proposal' => $proposal,
                'notes' => $dailyNotes,
                'isSigned' => $proposal->logbook_signed_at !== null,
                'isApproved' => $proposal->logbook_approved_at !== null,
                'logbookApprovalMode' => \App\Models\Setting::where('key', 'logbook_approval_mode')->value('value') ?? 'digital',
            ])->setPaper('a4', 'portrait')->output();

            $tempNotesPath = tempnam(sys_get_temp_dir(), 'report_notes_');
            file_put_contents($tempNotesPath, $notesPdfContent);

            try {
                $notesPageCount = $pdf->setSourceFile($tempNotesPath);
                for ($i = 1; $i <= $notesPageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('FPDI Merge Fail (Daily Notes) for ' . $report->id . ': ' . $e->getMessage());
            }
            @unlink($tempNotesPath);
        }

        $pdf->Output('F', $cachePath);
        @unlink($tempInfoPath);

        return $cachePath;
    }
}
