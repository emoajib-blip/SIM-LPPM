<?php

namespace App\Livewire\Review;

use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Research extends Component
{
    use \Livewire\WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $selectedYear = '';

    #[Url]
    public string $statusFilter = 'all'; // all, pending, completed

    public function mount(): void
    {
        if (! Auth::user()->hasRole('reviewer')) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    #[On('resetFilters')]
    public function resetFilters(): void
    {
        $this->reset(['search', 'selectedYear', 'statusFilter']);
        $this->resetPage();
    }

    #[Computed]
    public function proposals()
    {
        $query = Proposal::where('detailable_type', 'App\Models\Research')
            ->whereHas('reviewers', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with([
                'submitter',
                'detailable',
                'focusArea',
                'reviewers' => function ($query) {
                    $query->where('user_id', Auth::id());
                },
            ]);

        if (! empty($this->search)) {
            $searchTerm = '%'.$this->search.'%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', $searchTerm)
                    ->orWhereHas('submitter', function ($sq) use ($searchTerm) {
                        $sq->where('name', 'LIKE', $searchTerm);
                    });
            });
        }

        if (! empty($this->selectedYear)) {
            $query->whereYear('created_at', $this->selectedYear);
        }

        if ($this->statusFilter !== 'all') {
            $query->whereHas('reviewers', function ($q) {
                $q->where('user_id', Auth::id())
                    ->where('status', $this->statusFilter);
            });
        }

        return $query->latest()->paginate(10);
    }

    #[Computed]
    public function availableYears(): array
    {
        return Proposal::where('detailable_type', 'App\Models\Research')
            ->whereHas('reviewers', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->selectRaw('DISTINCT '.sql_year().' as year')
            ->orderByDesc('year')
            ->pluck('year')
            ->toArray();
    }

    #[Computed]
    public function statusStats(): array
    {
        $baseQuery = Proposal::where('detailable_type', 'App\Models\Research')
            ->whereHas('reviewers', function ($query) {
                $query->where('user_id', Auth::id());
            });

        return [
            'all' => (clone $baseQuery)->count(),
            'pending' => (clone $baseQuery)->whereHas('reviewers', function ($q) {
                $q->where('user_id', Auth::id())->where('status', \App\Enums\ReviewStatus::PENDING);
            })->count(),
            'completed' => (clone $baseQuery)->whereHas('reviewers', function ($q) {
                $q->where('user_id', Auth::id())->where('status', \App\Enums\ReviewStatus::COMPLETED);
            })->count(),
            're_review' => (clone $baseQuery)->whereHas('reviewers', function ($q) {
                $q->where('user_id', Auth::id())->where('status', \App\Enums\ReviewStatus::RE_REVIEW_REQUESTED);
            })->count(),
        ];
    }

    public function render()
    {
        return view('livewire.review.research');
    }
}
