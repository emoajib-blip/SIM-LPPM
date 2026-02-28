<?php

namespace App\Livewire\Reports;

use App\Traits\HasIkuCalculations;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app', ['title' => 'Laporan Capaian IKU', 'pageTitle' => 'Laporan Capaian IKU'])]
class IkuReport extends Component
{
    use HasIkuCalculations;

    public string $period;

    public function mount()
    {
        $this->period = (string) date('Y');
    }

    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }

    public function exportPdf(): void
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $this->dispatch('download-file', url: route('admin.iku.export-pdf', ['period' => $this->period]));
    }

    public function exportExcel(): void
    {
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $this->dispatch('download-file', url: route('admin.iku.export-excel', ['period' => $this->period]));
    }

    public function render(): View
    {
        $ikuMetrics = $this->getIkuMetrics($this->period);

        $periods = range(date('Y'), 2024); // Adjust as needed
        $periods = array_map('strval', $periods);

        return view('livewire.reports.iku-report', [
            'ikuMetrics' => $ikuMetrics,
            'periods' => $periods,
        ]);
    }
}
