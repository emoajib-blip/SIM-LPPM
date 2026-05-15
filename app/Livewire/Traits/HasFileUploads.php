<?php

declare(strict_types=1);

namespace App\Livewire\Traits;

use App\Models\AdditionalOutput;
use App\Models\MandatoryOutput;
use App\Models\ProgressReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

trait HasFileUploads
{
    // Progress Report document files
    public $substanceFile;

    // Final Report additional files
    public $realizationFile;

    public $presentationFile;

    // Temporary file uploads
    public array $tempMandatoryFiles = [];

    public array $tempAdditionalFiles = [];

    public array $tempAdditionalCerts = [];

    /**
     * Validate substance file upload
     */
    public function validateSubstanceFile(): void
    {
        $this->validate([
            'substanceFile' => 'nullable|file|mimes:pdf|max:10240',
        ]);
    }

    /**
     * Validate realization file upload
     */
    public function validateRealizationFile(): void
    {
        $this->validate([
            'realizationFile' => 'nullable|file|mimes:pdf,docx|max:10240',
        ]);
    }

    /**
     * Validate presentation file upload
     */
    public function validatePresentationFile(): void
    {
        $this->validate([
            'presentationFile' => 'nullable|file|mimes:pdf,ppt,pptx|max:51200',
        ]);
    }

    /**
     * Validate mandatory output file upload (journal article)
     */
    public function validateMandatoryFile(int $proposalOutputId): void
    {
        $this->validate([
            "tempMandatoryFiles.{$proposalOutputId}" => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);
    }

    /**
     * Validate additional output file upload (book document)
     */
    public function validateAdditionalFile(int $proposalOutputId): void
    {
        $this->validate([
            "tempAdditionalFiles.{$proposalOutputId}" => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);
    }

    /**
     * Validate additional output certificate upload
     */
    public function validateAdditionalCert(int $proposalOutputId): void
    {
        $this->validate([
            "tempAdditionalCerts.{$proposalOutputId}" => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);
    }

    /**
     * Save substance file to media collection
     */
    protected function saveSubstanceFile(ProgressReport $report, string $reportType = 'progress'): void
    {
        if (! $this->substanceFile || ! $this->substanceFile instanceof TemporaryUploadedFile) {
            return;
        }

        try {
            $report->clearMediaCollection('substance_file');
            $report
                ->addMedia($this->substanceFile->getRealPath())
                ->usingName($this->substanceFile->getClientOriginalName())
                ->usingFileName($this->substanceFile->hashName())
                ->withCustomProperties([
                    'uploaded_by' => Auth::id(),
                    'proposal_id' => $report->proposal_id,
                    'report_type' => $reportType,
                ])
                ->toMediaCollection('substance_file');
        } catch (\Exception $e) {
            Log::error('Upload report substance file failed: '.$e->getMessage());
        }
    }

    /**
     * Save realization file to media collection
     */
    protected function saveRealizationFile(ProgressReport $report, string $reportType = 'final'): void
    {
        if (! $this->realizationFile || ! $this->realizationFile instanceof TemporaryUploadedFile) {
            return;
        }

        try {
            $report->clearMediaCollection('realization_file');
            $report
                ->addMedia($this->realizationFile->getRealPath())
                ->usingName($this->realizationFile->getClientOriginalName())
                ->usingFileName($this->realizationFile->hashName())
                ->withCustomProperties([
                    'uploaded_by' => Auth::id(),
                    'proposal_id' => $report->proposal_id,
                    'report_type' => $reportType,
                ])
                ->toMediaCollection('realization_file');
        } catch (\Exception $e) {
            Log::error('Upload report realization file failed: '.$e->getMessage());
        }
    }

    /**
     * Save presentation file to media collection
     */
    protected function savePresentationFile(ProgressReport $report, string $reportType = 'final'): void
    {
        if (! $this->presentationFile || ! $this->presentationFile instanceof TemporaryUploadedFile) {
            return;
        }

        try {
            $report->clearMediaCollection('presentation_file');
            $report
                ->addMedia($this->presentationFile->getRealPath())
                ->usingName($this->presentationFile->getClientOriginalName())
                ->usingFileName($this->presentationFile->hashName())
                ->withCustomProperties([
                    'uploaded_by' => Auth::id(),
                    'proposal_id' => $report->proposal_id,
                    'report_type' => $reportType,
                ])
                ->toMediaCollection('presentation_file');
        } catch (\Exception $e) {
            Log::error('Upload report presentation file failed: '.$e->getMessage());
        }
    }

    /**
     * Save mandatory output file (journal article)
     */
    protected function saveMandatoryOutputFile(MandatoryOutput $output, int $proposalOutputId, string $reportType = 'progress'): void
    {
        if (! isset($this->tempMandatoryFiles[$proposalOutputId])) {
            return;
        }

        $file = $this->tempMandatoryFiles[$proposalOutputId];

        if (! $file instanceof TemporaryUploadedFile) {
            return;
        }

        try {
            $output->clearMediaCollection('journal_article');
            $output
                ->addMedia($file->getRealPath())
                ->usingName($file->getClientOriginalName())
                ->usingFileName($file->hashName())
                ->withCustomProperties([
                    'uploaded_by' => Auth::id(),
                    'proposal_id' => $output->progressReport->proposal_id,
                    'report_type' => $reportType,
                ])
                ->toMediaCollection('journal_article');
        } catch (\Exception $e) {
            Log::error('Upload report mandatory output file failed: '.$e->getMessage());
        }
    }

    /**
     * Save additional output file (book document)
     */
    protected function saveAdditionalOutputFile(AdditionalOutput $output, int $proposalOutputId, string $reportType = 'progress'): void
    {
        if (! isset($this->tempAdditionalFiles[$proposalOutputId])) {
            return;
        }

        $file = $this->tempAdditionalFiles[$proposalOutputId];

        if (! $file instanceof TemporaryUploadedFile) {
            return;
        }

        try {
            $output->clearMediaCollection('book_document');
            $output
                ->addMedia($file->getRealPath())
                ->usingName($file->getClientOriginalName())
                ->usingFileName($file->hashName())
                ->withCustomProperties([
                    'uploaded_by' => Auth::id(),
                    'proposal_id' => $output->progressReport->proposal_id,
                    'report_type' => $reportType,
                ])
                ->toMediaCollection('book_document');
        } catch (\Exception $e) {
            Log::error('Upload report additional output file failed: '.$e->getMessage());
        }
    }

    /**
     * Save additional output certificate
     */
    protected function saveAdditionalOutputCert(AdditionalOutput $output, int $proposalOutputId, string $reportType = 'progress'): void
    {
        if (! isset($this->tempAdditionalCerts[$proposalOutputId])) {
            return;
        }

        $file = $this->tempAdditionalCerts[$proposalOutputId];

        if (! $file instanceof TemporaryUploadedFile) {
            return;
        }

        try {
            $output->clearMediaCollection('publication_certificate');
            $output
                ->addMedia($file->getRealPath())
                ->usingName($file->getClientOriginalName())
                ->usingFileName($file->hashName())
                ->withCustomProperties([
                    'uploaded_by' => Auth::id(),
                    'proposal_id' => $output->progressReport->proposal_id,
                    'report_type' => $reportType,
                ])
                ->toMediaCollection('publication_certificate');
        } catch (\Exception $e) {
            Log::error('Upload report additional output certificate failed: '.$e->getMessage());
        }
    }

    /**
     * Clear substance file
     */
    public function clearSubstanceFile(): void
    {
        $this->reset('substanceFile');
    }

    /**
     * Clear realization file
     */
    public function clearRealizationFile(): void
    {
        $this->reset('realizationFile');
    }

    /**
     * Clear presentation file
     */
    public function clearPresentationFile(): void
    {
        $this->reset('presentationFile');
    }

    /**
     * Clear mandatory file
     */
    public function clearMandatoryFile(int $proposalOutputId): void
    {
        unset($this->tempMandatoryFiles[$proposalOutputId]);
    }

    /**
     * Clear additional file
     */
    public function clearAdditionalFile(int $proposalOutputId): void
    {
        unset($this->tempAdditionalFiles[$proposalOutputId]);
    }

    /**
     * Clear additional certificate
     */
    public function clearAdditionalCert(int $proposalOutputId): void
    {
        unset($this->tempAdditionalCerts[$proposalOutputId]);
    }

    /**
     * Reset all file uploads
     */
    public function resetFileUploads(): void
    {
        $this->reset([
            'substanceFile',
            'realizationFile',
            'presentationFile',
            'tempMandatoryFiles',
            'tempAdditionalFiles',
            'tempAdditionalCerts',
        ]);
    }
}
