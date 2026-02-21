<?php

namespace App\Services;

use App\Models\Proposal;
use Barryvdh\DomPDF\Facade\Pdf;
use setasign\Fpdi\Fpdi;

class ProposalPdfService
{
    /**
     * Export the proposal to a combined PDF.
     *
     * @return string Path to the temporary combined PDF file
     */
    public function export(Proposal $proposal): string
    {
        // Fetch dean details based on faculty if available, fallback to global settings
        $faculty = $proposal->submitter?->identity?->faculty?->load('deanUser.identity');

        $deanName = '..........................';
        $deanId = '..........................';

        if ($faculty) {
            if ($faculty->deanUser) {
                // Dynamic: use linked user data
                $identity = $faculty->deanUser->identity;
                $name = $faculty->deanUser->name;
                $prefix = $identity?->title_prefix;
                $suffix = $identity?->title_suffix;

                // Only prepend prefix if not already present
                if ($prefix && ! str_starts_with($name, $prefix) && ! str_contains($name, $prefix.' ')) {
                    $name = $prefix.' '.$name;
                }

                // Only append suffix if not already present
                if ($suffix && ! str_ends_with($name, $suffix) && ! str_contains($name, ', '.$suffix)) {
                    $name = $name.', '.$suffix;
                }

                $deanName = $name;
                $deanId = $identity?->identity_id ?? '';
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
                    $idn = $candidate->identity;
                    $nm = $candidate->name;
                    $px = $idn?->title_prefix;
                    $sx = $idn?->title_suffix;
                    if ($px && ! str_starts_with($nm, $px) && ! str_contains($nm, $px.' ')) {
                        $nm = $px.' '.$nm;
                    }
                    if ($sx && ! str_ends_with($nm, $sx) && ! str_contains($nm, ', '.$sx)) {
                        $nm = $nm.', '.$sx;
                    }
                    $deanName = $nm;
                    $deanId = $idn?->identity_id ?? '';
                }
            }
        }

        // Fetch LPPM Head details based on institution
        $institution = $proposal->submitter?->identity?->institution?->load('lppmHeadUser.identity');
        $lppmHeadName = '..........................';
        $lppmHeadId = '..........................';

        if ($institution) {
            if ($institution->lppmHeadUser) {
                $identity = $institution->lppmHeadUser->identity;
                $fullName = $institution->lppmHeadUser->name;
                $prefix = $identity?->title_prefix;
                $suffix = $identity?->title_suffix;

                if ($prefix && ! str_contains($fullName, $prefix)) {
                    $fullName = $prefix.' '.$fullName;
                }
                if ($suffix && ! str_contains($fullName, $suffix)) {
                    $fullName = $fullName.', '.$suffix;
                }

                $lppmHeadName = $fullName;
                $lppmHeadId = $identity?->identity_id ?? '';
            } else {
                $lppmHeadName = $institution->lppm_head_name ?: (\App\Models\Setting::where('key', 'lppm_head_name')->first()?->value ?? $lppmHeadName);
                $lppmHeadId = $institution->lppm_head_id ?: (\App\Models\Setting::where('key', 'lppm_head_id')->first()?->value ?? $lppmHeadId);
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
                    $idn = $candidate->identity;
                    $nm = $candidate->name;
                    $px = $idn?->title_prefix;
                    $sx = $idn?->title_suffix;
                    if ($px && ! str_contains($nm, $px)) {
                        $nm = $px.' '.$nm;
                    }
                    if ($sx && ! str_contains($nm, $sx)) {
                        $nm = $nm.', '.$sx;
                    }
                    $lppmHeadName = $nm;
                    $lppmHeadId = $idn?->identity_id ?? '';
                }
            }
        } else {
            // Ultimate fallback
            $lppmHeadName = \App\Models\Setting::where('key', 'lppm_head_name')->first()?->value ?? $lppmHeadName;
            $lppmHeadId = \App\Models\Setting::where('key', 'lppm_head_id')->first()?->value ?? $lppmHeadId;
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

        $lecturerSignedAt = $submissionLog?->at ?? $proposal->created_at;

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
            'proposal_approval_mode' => \App\Models\Setting::where('key', 'proposal_approval_mode')->first()?->value ?? 'digital',
            'dean_signed_at' => $deanLog?->at,
            'lppm_signed_at' => $lppmLog?->at,
            'lecturer_signed_at' => $lecturerSignedAt,
        ])->setPaper('a4', 'portrait')->output();

        $tempInfoPath = tempnam(sys_get_temp_dir(), 'proposal_info_');
        file_put_contents($tempInfoPath, $infoPdfContent);

        // 2. Prepare FPDI for merging
        // We use a custom class to extend Fpdi if needed, but standard Fpdi works with FPDF
        $pdf = new Fpdi;

        // Add pages from the generated info PDF
        $pageCount = $pdf->setSourceFile($tempInfoPath);
        for ($i = 1; $i <= $pageCount; $i++) {
            $templateId = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($templateId);
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);
        }

        // 2.5 Add pages from the approval file if it exists and mode is upload or both
        $approvalMode = \App\Models\Setting::where('key', 'proposal_approval_mode')->first()?->value ?? 'digital';
        if ($approvalMode === 'upload' || $approvalMode === 'both') {
            $approvalFile = $proposal->detailable?->getFirstMedia('approval_file');
            if ($approvalFile && file_exists($approvalFile->getPath()) && $approvalFile->mime_type === 'application/pdf') {
                try {
                    $approvalPageCount = $pdf->setSourceFile($approvalFile->getPath());
                    for ($i = 1; $i <= $approvalPageCount; $i++) {
                        $templateId = $pdf->importPage($i);
                        $size = $pdf->getTemplateSize($templateId);
                        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                        $pdf->useTemplate($templateId);
                    }
                } catch (\Exception $e) {
                    // Skip if failed
                }
            }
        }

        // 3. Add pages from the substance file if it exists
        $substanceFile = $proposal->detailable?->getFirstMedia('substance_file');
        if ($substanceFile && file_exists($substanceFile->getPath())) {
            try {
                $substancePageCount = $pdf->setSourceFile($substanceFile->getPath());
                for ($i = 1; $i <= $substancePageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Exception $e) {
                // If PDF version is too high for FPDI, we might fail here.
                // In some environments, we'd use Ghostscript to down-convert.
                // For now, we skip or log.
            }
        }

        $outputPath = tempnam(sys_get_temp_dir(), 'proposal_final_');
        $pdf->Output('F', $outputPath);

        // Cleanup temporary info PDF
        @unlink($tempInfoPath);

        return $outputPath;
    }

    /**
     * Export a report to PDF.
     */
    public function exportReport(Proposal $proposal, \App\Models\ProgressReport $report): string
    {
        // Signatures setup (Same as export)
        $faculty = $proposal->submitter?->identity?->faculty?->load('deanUser.identity');
        $deanName = '..........................';
        $deanId = '..........................';
        if ($faculty) {
            if ($faculty->deanUser) {
                $identity = $faculty->deanUser->identity;
                $deanName = ($identity?->title_prefix ? $identity->title_prefix.' ' : '').$faculty->deanUser->name.($identity?->title_suffix ? ', '.$identity->title_suffix : '');
                $deanId = $identity?->identity_id ?? '';
            } else {
                $deanName = $faculty->dean_name ?: $deanName;
                $deanId = $faculty->dean_id ?: $deanId;
            }
        }

        $institution = $proposal->submitter?->identity?->institution?->load('lppmHeadUser.identity');
        $lppmHeadName = '..........................';
        $lppmHeadId = '..........................';
        if ($institution) {
            if ($institution->lppmHeadUser) {
                $identity = $institution->lppmHeadUser->identity;
                $lppmHeadName = ($identity?->title_prefix ? $identity->title_prefix.' ' : '').$institution->lppmHeadUser->name.($identity?->title_suffix ? ', '.$identity->title_suffix : '');
                $lppmHeadId = $identity?->identity_id ?? '';
            } else {
                $lppmHeadName = $institution->lppm_head_name ?: (\App\Models\Setting::where('key', 'lppm_head_name')->first()?->value ?? $lppmHeadName);
                $lppmHeadId = $institution->lppm_head_id ?: (\App\Models\Setting::where('key', 'lppm_head_id')->first()?->value ?? $lppmHeadId);
            }
        } else {
            $lppmHeadName = \App\Models\Setting::where('key', 'lppm_head_name')->first()?->value ?? $lppmHeadName;
            $lppmHeadId = \App\Models\Setting::where('key', 'lppm_head_id')->first()?->value ?? $lppmHeadId;
        }

        // Determine signature presence for reports
        // Since robust report approval workflow might be pending, we rely on report status or proposal completion
        $deanSignedAt = null;
        $lppmSignedAt = null;

        // If Report is Final and Proposal is Completed, assume fully signed
        if ($report->reporting_period === 'final' && $proposal->status === \App\Enums\ProposalStatus::COMPLETED) {
            // Find completion log for LPPM Head signature
            $completionLog = \App\Models\ProposalStatusLog::where('proposal_id', $proposal->id)
                ->where('status_after', \App\Enums\ProposalStatus::COMPLETED)
                ->latest('at')
                ->first();

            $lppmSignedAt = $completionLog?->at ?? $proposal->updated_at;

            // Assume Dean signed slightly before or use same time if no log available
            $deanSignedAt = $lppmSignedAt;
        } elseif ($report->status === 'approved' || $report->status === 'accepted') {
            // If individual report has approved status
            $lppmSignedAt = $report->updated_at;
            $deanSignedAt = $report->updated_at;
        }

        $lecturerSignedAt = $report->submitted_at ?? ($report->created_at ?? now());

        // Fetch monev date as reviewer signed date
        $monevDate = \App\Models\ProposalMonev::where('proposal_id', $proposal->id)->latest('monev_date')->first()?->monev_date;
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
            'report_approval_mode' => \App\Models\Setting::where('key', 'report_approval_mode')->first()?->value ?? 'digital',
            'dean_signed_at' => $deanSignedAt,
            'lppm_signed_at' => $lppmSignedAt,
            'lecturer_signed_at' => $lecturerSignedAt,
            'reviewer_signed_at' => $reviewerSignedAt, ])->setPaper('a4', 'portrait')->output();

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

        // Add pages from the report's substance file if it exists
        $substanceFile = $report->getFirstMedia('substance_file');
        if ($substanceFile && file_exists($substanceFile->getPath()) && $substanceFile->mime_type === 'application/pdf') {
            try {
                $substancePageCount = $pdf->setSourceFile($substanceFile->getPath());
                for ($i = 1; $i <= $substancePageCount; $i++) {
                    $templateId = $pdf->importPage($i);
                    $size = $pdf->getTemplateSize($templateId);
                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                    $pdf->useTemplate($templateId);
                }
            } catch (\Exception $e) {
                // Skip if failed
            }
        }

        $outputPath = tempnam(sys_get_temp_dir(), 'report_final_');
        $pdf->Output('F', $outputPath);
        @unlink($tempInfoPath);

        return $outputPath;
    }
}
