<?php

// Vetted by AI - Manual Review Required by Senior Engineer/Manager

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

/**
 * Handles traditional (non-Livewire) multipart form uploads for proposal templates.
 *
 * This controller bypasses Livewire's /livewire/upload-file endpoint which is
 * frequently blocked by WAF/Cloudflare, causing silent upload failures.
 * Each template has a dedicated POST route that streams the file directly.
 *
 * Technical Assumptions:
 * - Spatie MediaLibrary is configured on the Setting model with 'template' collection.
 * - The 'template' collection uses singleFile() so old files are auto-removed.
 * - Max file size matches PHP upload_max_filesize (currently 10 MB).
 */
class ProposalTemplateUploadController extends Controller
{
    /**
     * Map of route key → Setting key used in database.
     */
    private array $keyMap = [
        'research' => 'research_proposal_template',
        'community-service' => 'community_service_proposal_template',
        'partner-commitment' => 'partner_commitment_template',
        'research-final-report' => 'research_final_report_template',
        'community-service-final-report' => 'community_service_final_report_template',
        'monev-berita-acara' => 'monev_berita_acara_template',
        'monev-borang' => 'monev_borang_template',
        'monev-rekap-penilaian' => 'monev_rekap_penilaian_template',
        'proposal-approval-page' => 'proposal_approval_page_template',
        'report-approval-page' => 'report_approval_page_template',
    ];

    /**
     * Handle the upload for any template type.
     */
    public function upload(Request $request, string $type)
    {
        if (! array_key_exists($type, $this->keyMap)) {
            abort(404, "Template type [{$type}] not found.");
        }

        $request->validate([
            'template_file' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ], [
            'template_file.required' => 'Silakan pilih file sebelum mengunggah.',
            'template_file.mimes' => 'Format file harus DOC, DOCX, atau PDF.',
            'template_file.max' => 'Ukuran file maksimum adalah 10 MB.',
        ]);

        $settingKey = $this->keyMap[$type];
        $file = $request->file('template_file');

        $setting = Setting::firstOrCreate(['key' => $settingKey]);
        $setting->clearMediaCollection('template');

        $tmpPath = $file->getRealPath();
        \Illuminate\Support\Facades\Log::info('Upload debug', [
            'tmp_path' => $tmpPath,
            'tmp_exists' => file_exists($tmpPath),
            'tmp_readable' => is_readable($tmpPath),
        ]);

        $media = $setting->addMedia($tmpPath)
            ->usingName($file->getClientOriginalName())
            ->usingFileName($file->getClientOriginalName())
            ->toMediaCollection('template');

        \Illuminate\Support\Facades\Log::info('Template uploaded', [
            'key' => $settingKey,
            'file' => $file->getClientOriginalName(),
            'media_id' => $media->id,
            'path' => $media->getPath(),
            'final_exists' => file_exists(storage_path('app/public/' . $media->getPath())),
        ]);

        return redirect()
            ->route('settings.proposal-template')
            ->with('success', 'Template berhasil diunggah: '.$file->getClientOriginalName());
    }
}
