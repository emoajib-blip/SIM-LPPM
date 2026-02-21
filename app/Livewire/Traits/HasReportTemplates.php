<?php

declare(strict_types=1);

namespace App\Livewire\Traits;

use App\Models\Setting;
use App\Services\MasterDataService;
use Livewire\Attributes\Computed;

trait HasReportTemplates
{
    /**
     * Get the template URL based on proposal type and report type.
     */
    #[Computed]
    public function templateUrl(): ?string
    {
        $proposalType = $this->proposal->detailable_type === \App\Models\Research::class ? 'research' : 'community-service';
        $reportType = $this->getReportType(); // 'progress' or 'final'

        $type = "{$proposalType}-{$reportType}";

        return resolve(MasterDataService::class)->getTemplateUrl($type);
    }

    /**
     * Get the approval mode setting.
     */
    #[Computed]
    public function reportApprovalMode(): string
    {
        return Setting::where('key', 'report_approval_mode')->first()?->value ?? 'digital';
    }

    /**
     * Get the proposal approval mode setting.
     */
    #[Computed]
    public function proposalApprovalMode(): string
    {
        return Setting::where('key', 'proposal_approval_mode')->first()?->value ?? 'digital';
    }

    protected function getReportType(): string
    {
        if (isset($this->form) && isset($this->form->type)) {
            return $this->form->type;
        }

        if (str_contains(get_class($this), 'FinalReport')) {
            return 'final';
        }

        return 'progress';
    }

    #[Computed]
    public function reportApprovalPageTemplateUrl(): ?string
    {
        return resolve(MasterDataService::class)->getTemplateUrl('report-approval-page');
    }

    public function downloadReportApprovalPageTemplate()
    {
        $setting = \App\Models\Setting::where('key', 'report_approval_page_template')->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }

        $this->toastError('Template belum tersedia.');

    }
}
