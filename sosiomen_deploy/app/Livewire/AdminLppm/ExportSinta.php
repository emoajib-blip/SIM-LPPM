<?php

namespace App\Livewire\AdminLppm;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use Livewire\Attributes\Layout;
use Livewire\Component;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
#[Layout('components.layouts.app', [
    'title' => 'Export SINTA',
    'pageTitle' => 'Export Data ke SINTA',
    'pageSubtitle' => 'Ekspor data penelitian & PKM sesuai format upload SINTA Author Verification',
])]
class ExportSinta extends Component
{
    public string $selectedYear = '';

    public array $availableYears = [];

    public array $summary = [];

    public function mount(): void
    {
        $this->selectedYear = (string) date('Y');
        $this->availableYears = $this->getYears();
        $this->loadSummary();
    }

    public function updatedSelectedYear(): void
    {
        $this->loadSummary();
    }

    private function getYears(): array
    {
        $years = Proposal::query()
            ->distinct()
            ->whereNotNull('start_year')
            ->whereIn('status', [ProposalStatus::APPROVED->value, ProposalStatus::COMPLETED->value])
            ->orderBy('start_year', 'desc')
            ->pluck('start_year')
            ->map(fn ($y) => (string) $y)
            ->toArray();

        return empty($years) ? [(string) date('Y')] : $years;
    }

    private function loadSummary(): void
    {
        $researchCount = Proposal::query()
            ->where('detailable_type', 'App\Models\Research')
            ->whereIn('status', [ProposalStatus::APPROVED->value, ProposalStatus::COMPLETED->value])
            ->when($this->selectedYear, fn ($q) => $q->where('start_year', $this->selectedYear))
            ->count();

        $pkmCount = Proposal::query()
            ->where('detailable_type', 'App\Models\CommunityService')
            ->whereIn('status', [ProposalStatus::APPROVED->value, ProposalStatus::COMPLETED->value])
            ->when($this->selectedYear, fn ($q) => $q->where('start_year', $this->selectedYear))
            ->count();

        $this->summary = [
            'research' => $researchCount,
            'pkm' => $pkmCount,
        ];
    }

    public function exportResearch()
    {
        // Redirect ke HTTP controller route untuk download yang benar (dengan nama file & ekstensi .xlsx)
        return redirect()->route('export-sinta.research', ['year' => $this->selectedYear]);
    }

    public function exportPkm()
    {
        // Redirect ke HTTP controller route untuk download yang benar (dengan nama file & ekstensi .xlsx)
        return redirect()->route('export-sinta.pkm', ['year' => $this->selectedYear]);
    }

    public function render()
    {
        return view('livewire.admin-lppm.export-sinta');
    }
}
