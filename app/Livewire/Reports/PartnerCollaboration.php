<?php

namespace App\Livewire\Reports;

use App\Actions\Reports\GetPartnerReportQuery;
use App\Enums\ProposalStatus;
use App\Models\Partner;
use App\Models\Proposal;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
#[Layout('components.layouts.app', ['title' => 'Laporan Kerjasama Mitra', 'pageTitle' => 'Laporan Kerjasama Mitra'])]
class PartnerCollaboration extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $typeFilter = '';

    #[Url]
    public string $periodFilter = '';

    public ?string $selectedPartnerId = null;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedTypeFilter(): void
    {
        $this->resetPage();
    }

    public function selectPartner(string $id): void
    {
        $this->selectedPartnerId = ($this->selectedPartnerId === $id) ? null : $id;
    }

    #[Computed]
    public function partnerTypes(): array
    {
        return Partner::query()
            ->whereNotNull('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type')
            ->toArray();
    }

    #[Computed]
    public function periods(): array
    {
        return Proposal::query()
            ->distinct()
            ->whereNotNull('start_year')
            ->orderBy('start_year', 'desc')
            ->pluck('start_year')
            ->map(fn ($y) => (string) $y)
            ->toArray() ?: [(string) date('Y')];
    }

    #[Computed]
    public function summary(): array
    {
        $total = Partner::count();
        $withMou = Partner::whereHas('media', fn ($q) => $q->where('collection_name', 'mou_pks'))->count();
        $withProposal = Partner::whereHas('proposals', fn ($q) => $q->when($this->periodFilter, fn ($q2) => $q2->where('start_year', $this->periodFilter))
        )->count();

        $activeBudget = Proposal::query()
            ->whereHas('partners')
            ->whereIn('status', [ProposalStatus::APPROVED->value, ProposalStatus::COMPLETED->value])
            ->when($this->periodFilter, fn ($q) => $q->where('start_year', $this->periodFilter))
            ->sum('sbk_value');

        return [
            ['label' => 'Total Mitra Terdaftar',   'value' => $total,       'icon' => 'handshake',    'variant' => 'bg-blue-lt text-blue'],
            ['label' => 'Mitra Ber-MOU/PKS',       'value' => $withMou,     'icon' => 'file-check',   'variant' => 'bg-green-lt text-green'],
            ['label' => 'Mitra Aktif (Ada Proposal)', 'value' => $withProposal, 'icon' => 'users',        'variant' => 'bg-purple-lt text-purple'],
            ['label' => 'Total Dana Kerjasama',    'value' => 'Rp '.number_format($activeBudget, 0, ',', '.'), 'icon' => 'currency-dollar', 'variant' => 'bg-yellow-lt text-yellow'],
        ];
    }

    public function exportPdf(GetPartnerReportQuery $action)
    {
        $partners = $action->handle($this->search, $this->typeFilter, $this->periodFilter)->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.partner-collaboration-pdf', [
            'partners' => $partners,
            'periodFilter' => $this->periodFilter,
            'typeFilter' => $this->typeFilter,
        ])->setPaper('a4', 'landscape');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'laporan-mitra-'.now()->format('Y-m-d').'.pdf', [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function exportExcel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\PartnerCollaborationExport(
                $this->search,
                $this->typeFilter,
                $this->periodFilter
            ),
            'laporan-mitra-'.now()->format('Y-m-d').'.xlsx'
        );
    }

    public function render(GetPartnerReportQuery $action): View
    {
        $partners = $action->handle($this->search, $this->typeFilter, $this->periodFilter)->paginate(15);

        // Detail proposal untuk mitra yang dipilih
        $detailProposals = null;
        if ($this->selectedPartnerId) {
            $detailProposals = Proposal::query()
                ->whereHas('partners', fn ($q) => $q->where('partners.id', $this->selectedPartnerId))
                ->when($this->periodFilter, fn ($q) => $q->where('start_year', $this->periodFilter))
                ->with(['submitter.identity', 'detailable'])
                ->latest()
                ->get();
        }

        return view('livewire.reports.partner-collaboration', [
            'partners' => $partners,
            'detailProposals' => $detailProposals,
        ]);
    }
}
