<?php

namespace App\Exports;

use App\Traits\HasIkuCalculations;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IkuReportExport implements FromView, ShouldAutoSize, WithStyles, WithTitle
{
    use HasIkuCalculations;

    public function __construct(protected string $period) {}

    public function title(): string
    {
        return 'Rekap Capaian IKU '.$this->period;
    }

    public function view(): View
    {
        $ikuMetrics = $this->getIkuMetrics($this->period);

        return view('exports.iku', [
            'ikuMetrics' => $ikuMetrics,
            'period' => $this->period,
            'institution' => \App\Models\Institution::first(),
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            2 => ['font' => ['bold' => true, 'size' => 12]],
            4 => ['font' => ['bold' => true]],
        ];
    }
}
