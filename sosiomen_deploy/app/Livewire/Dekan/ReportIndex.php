<?php

namespace App\Livewire\Dekan;

use App\Enums\ReportStatus;
use App\Models\ProgressReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property-read ?int $dekanFacultyId
 * @property-read \Illuminate\Contracts\Pagination\LengthAwarePaginator $reports
 * @property-read ?string $facultyName
 */
class ReportIndex extends Component
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
        return view('livewire.dekan.report-index');
    }

    #[Computed]
    public function dekanFacultyId(): ?int
    {
        return Auth::user()?->identity?->faculty_id;
    }

    #[Computed]
    public function reports()
    {
        $facultyId = $this->dekanFacultyId;

        $query = ProgressReport::query()
            ->where('reporting_period', 'final')
            ->where('status', ReportStatus::SUBMITTED);

        if (! $facultyId) {
            $query->whereRaw('1 = 0');
        } else {
            $query->whereHas('proposal.submitter.identity', function ($q) use ($facultyId) {
                $q->where('faculty_id', $facultyId);
            });
        }

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
            ->orderBy('submitted_at', 'desc')
            ->paginate(15);
    }

    #[Computed]
    public function facultyName(): ?string
    {
        return Auth::user()?->identity?->faculty?->name;
    }
}
