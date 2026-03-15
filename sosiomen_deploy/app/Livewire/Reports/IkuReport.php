<?php

namespace App\Livewire\Reports;

use App\Livewire\Concerns\HasToast;
use App\Livewire\Traits\WithInstitutionalApproval;
use App\Traits\HasIkuCalculations;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app', ['title' => 'Laporan Capaian IKU', 'pageTitle' => 'Laporan Capaian IKU'])]
class IkuReport extends Component
{
    use HasIkuCalculations, HasToast, WithInstitutionalApproval;

    public string $period;

    public string $search = '';

    public ?string $selectedIku = null;

    public function updatedSearch(): void
    {
        // No need to reset page as IKU report detail is not paginated yet in current impl
    }

    public function mount()
    {
        $this->period = request()->query('period', (string) date('Y'));

        // Load metadata from existing report if available
        $report = $this->getInstitutionalReport('iku', (int) $this->period);
        if ($report && $report->metadata) {
            $this->search = $report->metadata['search'] ?? '';
            $this->selectedIku = $report->metadata['selectedIku'] ?? null;
        } else {
            // Check query params if no report metadata
            $this->search = request()->query('search', '');
            $this->selectedIku = request()->query('selectedIku', null);
        }
    }

    public function setPeriod(string $period): void
    {
        $this->period = $period;
        $this->selectedIku = null;
    }

    public function resetFilters(): void
    {
        $this->search = '';
        $this->period = (string) date('Y');
        $this->selectedIku = null;
    }

    public function toggleDetails(?string $ikuCode): void
    {
        if ($this->selectedIku === $ikuCode) {
            $this->selectedIku = null;
        } else {
            $this->selectedIku = $ikuCode;
        }
    }

    public function render(): View
    {
        $ikuMetrics = $this->getIkuMetrics($this->period);
        $ikuDetails = $this->selectedIku ? $this->getIkuDetails($this->selectedIku, $this->period, $this->search) : [];

        $periods = range(date('Y'), 2024);
        $periods = array_map('strval', $periods);

        return view('livewire.reports.iku-report', [
            'ikuMetrics' => $ikuMetrics,
            'ikuDetails' => $ikuDetails,
            'periods' => $periods,
            'institutionalReport' => $this->getInstitutionalReport('iku', (int) $this->period),
            'period' => $this->period,
        ]);
    }
}
