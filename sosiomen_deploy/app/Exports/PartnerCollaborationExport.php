<?php

namespace App\Exports;

use App\Actions\Reports\GetPartnerReportQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PartnerCollaborationExport implements FromView, ShouldAutoSize, WithColumnFormatting, WithStyles
{
    public function __construct(
        protected string $search = '',
        protected string $typeFilter = '',
        protected string $periodFilter = ''
    ) {}

    public function view(): View
    {
        $action = new GetPartnerReportQuery;
        $partners = $action->handle($this->search, $this->typeFilter, $this->periodFilter)->get();

        return view('exports.partner-collaboration', [
            'partners' => $partners,
            'periodFilter' => $this->periodFilter,
            'typeFilter' => $this->typeFilter,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]], // Judul Laporan
            3 => ['font' => ['bold' => true]], // Header Tabel
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => '#,##0', // Total Dana (Rp)
        ];
    }
}
