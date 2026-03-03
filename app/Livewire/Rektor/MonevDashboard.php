<?php

namespace App\Livewire\Rektor;

use App\Models\MonevReview;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class MonevDashboard extends Component
{
    #[Url]
    public $academicYear = '';

    #[Url]
    public $semester = 'all';

    public function mount()
    {
        if (! Auth::user()->hasRole('rektor')) {
            abort(403);
        }
        $this->academicYear = $this->academicYear ?: date('Y');
    }

    #[Computed]
    public function stats()
    {
        $baseQuery = MonevReview::query()
            ->where('academic_year', $this->academicYear)
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->whereNotNull('reported_at');

        return [
            'total' => $baseQuery->count(),
            'sangat_baik' => (clone $baseQuery)->where('status', 'Sangat Baik')->count(),
            'baik' => (clone $baseQuery)->where('status', 'Baik')->count(),
            'cukup' => (clone $baseQuery)->where('status', 'Cukup')->count(),
        ];
    }

    #[Computed]
    public function academicYears()
    {
        return Proposal::distinct()->pluck('start_year')->filter()->sortDesc();
    }

    #[Computed]
    public function recentReports()
    {
        return MonevReview::query()
            ->with(['proposal.submitter', 'reviewer'])
            ->where('academic_year', $this->academicYear)
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->whereNotNull('reported_at')
            ->latest('reported_at')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.rektor.monev-dashboard');
    }
}
