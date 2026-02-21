<?php

namespace App\Exports;

use App\Models\Proposal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CommunityServiceReportExport implements FromView, ShouldAutoSize, WithColumnFormatting, WithStyles
{
    public function __construct(protected string $period) {}

    public function view(): View
    {
        $proposals = Proposal::query()
            ->where('detailable_type', 'App\Models\CommunityService')
            ->when($this->period, fn ($q) => $q->where('start_year', $this->period))
            ->with(['submitter.identity.faculty', 'submitter.identity.studyProgram', 'researchScheme'])
            ->latest()
            ->get();

        return view('exports.community-service', [
            'proposals' => $proposals,
            'period' => $this->period,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]],
            3 => ['font' => ['bold' => true]],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => '#,##0', // Kolom Dana Disetujui
        ];
    }
}
