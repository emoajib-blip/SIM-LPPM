<?php

namespace App\Livewire\KepalaLppm\Monev;

use App\Livewire\Concerns\HasToast;
use App\Models\MonevReview;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MonevRecap extends Component
{
    use HasToast, WithPagination;

    #[Url]
    public $academicYear = '';

    #[Url]
    public $semester = 'all';

    public $search = '';

    public function mount()
    {
        if (! Auth::user()->hasRole(['kepala lppm', 'rektor'])) {
            abort(403);
        }
        $this->academicYear = $this->academicYear ?: date('Y');
    }

    public function reportToRektor()
    {
        $reviews = MonevReview::query()
            ->where('academic_year', $this->academicYear)
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->whereNotNull('reviewed_at')
            ->whereNull('reported_at')
            ->get();

        if ($reviews->isEmpty()) {
            $this->toastWarning('Tidak ada data baru untuk dilaporkan.');

            return;
        }

        $reviews->each(function (MonevReview $review) {
            $review->update(['reported_at' => now()]);
        });

        $this->toastSuccess($reviews->count().' hasil monev telah dilaporkan ke Rektor.');
    }

    #[Computed]
    public function academicYears()
    {
        return Proposal::distinct()->pluck('start_year')->filter()->sortDesc();
    }

    #[Computed]
    public function reviews()
    {
        return MonevReview::query()
            ->with(['proposal.submitter', 'reviewer'])
            ->when($this->academicYear, function ($query) {
                $query->where('academic_year', $this->academicYear);
            })
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->when($this->search, function ($query) {
                $query->whereHas('proposal', function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhereHas('submitter', function ($sq) {
                            $sq->where('name', 'like', "%{$this->search}%");
                        });
                });
            })
            ->latest()
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.kepala-lppm.monev.monev-recap');
    }
}
