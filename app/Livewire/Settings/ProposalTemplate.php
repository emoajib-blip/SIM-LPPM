<?php

namespace App\Livewire\Settings;

use App\Livewire\Concerns\HasToast;
use App\Models\Setting;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProposalTemplate extends Component
{
    use HasToast, WithFileUploads;

    public $research_template;

    public $community_service_template;

    public $research_progress_report_template;

    public $research_final_report_template;

    public $community_service_progress_report_template;

    public $community_service_final_report_template;

    public $monev_berita_acara_template;

    public $monev_borang_template;

    public $monev_rekap_penilaian_template;

    public $partner_commitment_template;

    public $proposal_approval_page_template;

    public $report_approval_page_template;

    public $proposal_approval_mode = 'digital'; // 'digital', 'upload', 'both'

    public $report_approval_mode = 'digital'; // 'digital', 'upload', 'both'

    public function mount()
    {
        $this->proposal_approval_mode = Setting::where('key', 'proposal_approval_mode')->first()?->value ?? 'digital';
        $this->report_approval_mode = Setting::where('key', 'report_approval_mode')->first()?->value ?? 'digital';
    }

    public function saveResearchTemplate()
    {
        $this->validate([
            'research_template' => 'required|file|mimes:doc,docx,pdf|max:10240', // 10MB max
        ]);

        $setting = Setting::firstOrCreate(['key' => 'research_proposal_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->research_template->getRealPath())
            ->usingName($this->research_template->getClientOriginalName())
            ->usingFileName($this->research_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->research_template = null;
        unset($this->researchTemplateMedia); // Invalidate computed property

        $message = 'Template penelitian berhasil diunggah.';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function saveCommunityServiceTemplate()
    {
        $this->validate([
            'community_service_template' => 'required|file|mimes:doc,docx,pdf|max:10240', // 10MB max
        ]);

        $setting = Setting::firstOrCreate(['key' => 'community_service_proposal_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->community_service_template->getRealPath())
            ->usingName($this->community_service_template->getClientOriginalName())
            ->usingFileName($this->community_service_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->community_service_template = null;
        unset($this->communityServiceTemplateMedia); // Invalidate computed property

        $message = 'Template pengabdian berhasil diunggah.';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function saveMonevBeritaAcaraTemplate()
    {
        $this->validate([
            'monev_berita_acara_template' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ]);

        $setting = Setting::firstOrCreate(['key' => 'monev_berita_acara_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->monev_berita_acara_template->getRealPath())
            ->usingName($this->monev_berita_acara_template->getClientOriginalName())
            ->usingFileName($this->monev_berita_acara_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->monev_berita_acara_template = null;
        unset($this->monevBeritaAcaraTemplateMedia);

        $this->toastSuccess('Template Berita Acara Monev berhasil diunggah.');
    }

    public function saveMonevBorangTemplate()
    {
        $this->validate([
            'monev_borang_template' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ]);

        $setting = Setting::firstOrCreate(['key' => 'monev_borang_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->monev_borang_template->getRealPath())
            ->usingName($this->monev_borang_template->getClientOriginalName())
            ->usingFileName($this->monev_borang_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->monev_borang_template = null;
        unset($this->monevBorangTemplateMedia);

        $this->toastSuccess('Template Borang Monev berhasil diunggah.');
    }

    public function saveMonevRekapPenilaianTemplate()
    {
        $this->validate([
            'monev_rekap_penilaian_template' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ]);

        $setting = Setting::firstOrCreate(['key' => 'monev_rekap_penilaian_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->monev_rekap_penilaian_template->getRealPath())
            ->usingName($this->monev_rekap_penilaian_template->getClientOriginalName())
            ->usingFileName($this->monev_rekap_penilaian_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->monev_rekap_penilaian_template = null;
        unset($this->monevRekapPenilaianTemplateMedia);

        $this->toastSuccess('Template Rekap Penilaian Monev berhasil diunggah.');
    }

    public function savePartnerCommitmentTemplate()
    {
        $this->validate([
            'partner_commitment_template' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ]);

        $setting = Setting::firstOrCreate(['key' => 'partner_commitment_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->partner_commitment_template->getRealPath())
            ->usingName($this->partner_commitment_template->getClientOriginalName())
            ->usingFileName($this->partner_commitment_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->partner_commitment_template = null;
        unset($this->partnerCommitmentTemplateMedia);

        $this->toastSuccess('Template Surat Kesanggupan Mitra berhasil diunggah.');
    }

    public function saveProposalApprovalPageTemplate()
    {
        $this->validate([
            'proposal_approval_page_template' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ]);

        $setting = Setting::firstOrCreate(['key' => 'proposal_approval_page_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->proposal_approval_page_template->getRealPath())
            ->usingName($this->proposal_approval_page_template->getClientOriginalName())
            ->usingFileName($this->proposal_approval_page_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->proposal_approval_page_template = null;
        unset($this->proposalApprovalPageTemplateMedia);

        $this->toastSuccess('Template Halaman Persetujuan berhasil diunggah.');
    }

    public function saveReportApprovalPageTemplate()
    {
        $this->validate([
            'report_approval_page_template' => 'required|file|mimes:doc,docx,pdf|max:10240',
        ]);

        $setting = Setting::firstOrCreate(['key' => 'report_approval_page_template']);
        $setting->clearMediaCollection('template');
        $setting->addMedia($this->report_approval_page_template->getRealPath())
            ->usingName($this->report_approval_page_template->getClientOriginalName())
            ->usingFileName($this->report_approval_page_template->getClientOriginalName())
            ->toMediaCollection('template');

        $this->report_approval_page_template = null;
        unset($this->reportApprovalPageTemplateMedia);

        $this->toastSuccess('Template Halaman Pengesahan berhasil diunggah.');
    }

    public function saveResearchProgressReportTemplate()
    {
        $this->validate(['research_progress_report_template' => 'required|file|mimes:doc,docx,pdf|max:10240']);
        $this->saveTemplate('research_progress_report_template', $this->research_progress_report_template);
        $this->research_progress_report_template = null;
        unset($this->researchProgressReportTemplateMedia);
        $this->toastSuccess('Template Laporan Kemajuan Penelitian berhasil diunggah.');
    }

    public function saveResearchFinalReportTemplate()
    {
        $this->validate(['research_final_report_template' => 'required|file|mimes:doc,docx,pdf|max:10240']);
        $this->saveTemplate('research_final_report_template', $this->research_final_report_template);
        $this->research_final_report_template = null;
        unset($this->researchFinalReportTemplateMedia);
        $this->toastSuccess('Template Laporan Akhir Penelitian berhasil diunggah.');
    }

    public function saveCommunityServiceProgressReportTemplate()
    {
        $this->validate(['community_service_progress_report_template' => 'required|file|mimes:doc,docx,pdf|max:10240']);
        $this->saveTemplate('community_service_progress_report_template', $this->community_service_progress_report_template);
        $this->community_service_progress_report_template = null;
        unset($this->communityServiceProgressReportTemplateMedia);
        $this->toastSuccess('Template Laporan Kemajuan Pengabdian berhasil diunggah.');
    }

    public function saveCommunityServiceFinalReportTemplate()
    {
        $this->validate(['community_service_final_report_template' => 'required|file|mimes:doc,docx,pdf|max:10240']);
        $this->saveTemplate('community_service_final_report_template', $this->community_service_final_report_template);
        $this->community_service_final_report_template = null;
        unset($this->communityServiceFinalReportTemplateMedia);
        $this->toastSuccess('Template Laporan Akhir Pengabdian berhasil diunggah.');
    }

    protected function saveTemplate($key, $file)
    {
        $setting = Setting::firstOrCreate(['key' => $key]);
        $setting->clearMediaCollection('template');
        $setting->addMedia($file->getRealPath())
            ->usingName($file->getClientOriginalName())
            ->usingFileName($file->getClientOriginalName())
            ->toMediaCollection('template');
    }

    public function saveApprovalSettings()
    {
        $this->validate([
            'proposal_approval_mode' => 'required|in:digital,upload,both',
            'report_approval_mode' => 'required|in:digital,upload,both',
        ]);

        Setting::updateOrCreate(['key' => 'proposal_approval_mode'], ['value' => $this->proposal_approval_mode]);
        Setting::updateOrCreate(['key' => 'report_approval_mode'], ['value' => $this->report_approval_mode]);

        $this->toastSuccess('Pengaturan metode persetujuan berhasil disimpan.');
    }

    public function downloadResearchTemplate()
    {
        $setting = Setting::where('key', 'research_proposal_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $message = 'Template belum tersedia.';
        session()->flash('error', $message);
        $this->toastError($message);
    }

    public function downloadCommunityServiceTemplate()
    {
        $setting = Setting::where('key', 'community_service_proposal_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $message = 'Template belum tersedia.';
        session()->flash('error', $message);
        $this->toastError($message);
    }

    public function downloadMonevBeritaAcaraTemplate()
    {
        $setting = Setting::where('key', 'monev_berita_acara_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $this->toastError('Template belum tersedia.');
    }

    public function downloadMonevBorangTemplate()
    {
        $setting = Setting::where('key', 'monev_borang_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $this->toastError('Template belum tersedia.');
    }

    public function downloadMonevRekapPenilaianTemplate()
    {
        $setting = Setting::where('key', 'monev_rekap_penilaian_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $this->toastError('Template belum tersedia.');
    }

    public function downloadResearchProgressReportTemplate()
    {
        return $this->downloadTemplate('research_progress_report_template');
    }

    public function downloadResearchFinalReportTemplate()
    {
        return $this->downloadTemplate('research_final_report_template');
    }

    public function downloadCommunityServiceProgressReportTemplate()
    {
        return $this->downloadTemplate('community_service_progress_report_template');
    }

    public function downloadCommunityServiceFinalReportTemplate()
    {
        return $this->downloadTemplate('community_service_final_report_template');
    }

    public function downloadPartnerCommitmentTemplate()
    {
        return $this->downloadTemplate('partner_commitment_template');
    }

    public function downloadProposalApprovalPageTemplate()
    {
        return $this->downloadTemplate('proposal_approval_page_template');
    }

    public function downloadReportApprovalPageTemplate()
    {
        return $this->downloadTemplate('report_approval_page_template');
    }

    protected function downloadTemplate($key)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $this->toastError('Template belum tersedia.');
    }

    #[Computed]
    public function researchTemplateMedia()
    {
        $setting = Setting::where('key', 'research_proposal_template')->first();

        return $setting ? $setting->getFirstMedia('template') : null;
    }

    #[Computed]
    public function communityServiceTemplateMedia()
    {
        $setting = Setting::where('key', 'community_service_proposal_template')->first();

        return $setting ? $setting->getFirstMedia('template') : null;
    }

    #[Computed]
    public function monevBeritaAcaraTemplateMedia()
    {
        $setting = Setting::where('key', 'monev_berita_acara_template')->first();

        return $setting ? $setting->getFirstMedia('template') : null;
    }

    #[Computed]
    public function monevBorangTemplateMedia()
    {
        $setting = Setting::where('key', 'monev_borang_template')->first();

        return $setting ? $setting->getFirstMedia('template') : null;
    }

    #[Computed]
    public function monevRekapPenilaianTemplateMedia()
    {
        $setting = Setting::where('key', 'monev_rekap_penilaian_template')->first();

        return $setting ? $setting->getFirstMedia('template') : null;
    }

    #[Computed]
    public function researchProgressReportTemplateMedia()
    {
        return Setting::where('key', 'research_progress_report_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function researchFinalReportTemplateMedia()
    {
        return Setting::where('key', 'research_final_report_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function communityServiceProgressReportTemplateMedia()
    {
        return Setting::where('key', 'community_service_progress_report_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function communityServiceFinalReportTemplateMedia()
    {
        return Setting::where('key', 'community_service_final_report_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function partnerCommitmentTemplateMedia()
    {
        return Setting::where('key', 'partner_commitment_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function proposalApprovalPageTemplateMedia()
    {
        return Setting::where('key', 'proposal_approval_page_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function reportApprovalPageTemplateMedia()
    {
        return Setting::where('key', 'report_approval_page_template')->first()?->getFirstMedia('template');
    }

    public function render()
    {
        return view('livewire.settings.proposal-template');
    }
}
