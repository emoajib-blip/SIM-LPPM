<?php

namespace App\Livewire\KepalaLppm;

use App\Enums\ReportStatus;
use App\Models\ProgressReport;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property-read \Illuminate\Pagination\LengthAwarePaginator $reports
 */
class ReportApproval extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $typeFilter = 'all';

    public function resetFilters(): void
    {
        $this->search = '';
        $this->typeFilter = 'all';
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.kepala-lppm.report-approval');
    }

    #[Computed]
    public function reports()
    {
        $user = auth()->user();
        $query = ProgressReport::query()
            ->where('reporting_period', 'final');

        // Only show reports approved by Dekan to Kepala LPPM
        $query->where('status', ReportStatus::APPROVED_BY_DEKAN);

        return $query
            ->with(['proposal.submitter.identity.studyProgram', 'proposal.detailable', 'proposal.researchScheme'])
            ->when($this->search, function ($query) {
                $query->whereHas('proposal', function ($q) {
                    $q->where('title', 'like', "%{$this->search}%");
                });
            })
            ->when($this->typeFilter !== 'all', function ($query) {
                $detailableType = $this->typeFilter === 'research'
                    ? \App\Models\Research::class
                    : \App\Models\CommunityService::class;
                $query->whereHas('proposal', function ($q) use ($detailableType) {
                    $q->where('detailable_type', $detailableType);
                });
            })
            ->orderBy('updated_at', 'asc') // Oldest first
            ->paginate(15);
    }
}
