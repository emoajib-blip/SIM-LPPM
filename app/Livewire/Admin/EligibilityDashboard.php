<?php

namespace App\Livewire\Admin;

use App\Models\ResearchScheme;
use App\Services\EligibilityService;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class EligibilityDashboard extends Component
{
    public ?string $selectedSchemeId = null;

    public array $selectedSchemeBreakdown = [];

    public array $allSchemesStats = [];

    public string $activeTab = 'eligible';

    protected EligibilityService $eligibilityService;

    public function mount(): void
    {
        $this->eligibilityService = app(EligibilityService::class);
        $this->loadDashboardData();
    }

    public function loadDashboardData(): void
    {
        $schemes = ResearchScheme::where('is_active', true)
            ->orderBy('name')
            ->get();

        $this->allSchemesStats = $schemes->map(function (ResearchScheme $scheme) {
            $breakdown = $this->eligibilityService->getResearchSchemeEligibilityBreakdown($scheme);

            return [
                'id' => $scheme->id,
                'name' => $scheme->name,
                'description' => $scheme->description,
                'total_dosen' => $breakdown['total_dosen'],
                'eligible_count' => $breakdown['eligible'],
                'ineligible_count' => $breakdown['ineligible'],
                'eligible_percentage' => $breakdown['total_dosen'] > 0
                    ? round(($breakdown['eligible'] / $breakdown['total_dosen']) * 100, 1)
                    : 0,
                'breakdown' => $breakdown,
            ];
        })->toArray();
    }

    public function selectScheme(string $schemeId): void
    {
        $this->selectedSchemeId = $schemeId;

        $scheme = ResearchScheme::find($schemeId);
        if ($scheme) {
            $this->selectedSchemeBreakdown = $this->eligibilityService->getResearchSchemeEligibilityBreakdown($scheme);
        }
    }

    #[Computed]
    public function eligibleDosenForSelectedScheme(): Collection
    {
        if (! $this->selectedSchemeId) {
            return collect();
        }

        $scheme = ResearchScheme::find($this->selectedSchemeId);
        if (! $scheme) {
            return collect();
        }

        return $this->eligibilityService->getDetailedResearchSchemeEligibility($scheme)
            ->filter(fn ($item) => $item['eligible']);
    }

    #[Computed]
    public function ineligibleDosenForSelectedScheme(): Collection
    {
        if (! $this->selectedSchemeId) {
            return collect();
        }

        $scheme = ResearchScheme::find($this->selectedSchemeId);
        if (! $scheme) {
            return collect();
        }

        return $this->eligibilityService->getDetailedResearchSchemeEligibility($scheme)
            ->filter(fn ($item) => ! $item['eligible']);
    }

    public function exportEligibilityReport(string $schemeId): void
    {
        $scheme = ResearchScheme::find($schemeId);
        if (! $scheme) {
            $this->dispatch('toast', message: 'Skema tidak ditemukan', type: 'error');

            return;
        }

        $detailedEligibility = $this->eligibilityService->getDetailedResearchSchemeEligibility($scheme);

        // Create CSV data
        $csvData = [['Nama', 'NIP', 'Status', 'Alasan Tidak Eligible']];

        foreach ($detailedEligibility as $item) {
            $status = $item['eligible'] ? 'Eligible' : 'Tidak Eligible';
            $reasons = implode('; ', array_column($item['failed_checks'], 'message'));

            $csvData[] = [
                $item['name'],
                $item['nip'],
                $status,
                $reasons,
            ];
        }

        // Store in session and redirect to download endpoint
        session()->put('eligibility_export', $csvData);
        $this->dispatch('download-eligibility-report', schemeId: $schemeId, schemeName: $scheme->name);
    }

    public function render()
    {
        return view('livewire.admin.eligibility-dashboard');
    }
}
