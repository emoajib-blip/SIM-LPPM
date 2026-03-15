<?php

namespace App\Livewire\KepalaLppm\Monev;

use App\Livewire\Concerns\HasToast;
use App\Models\MonevReview;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class MonevRecap extends Component
{
    use \App\Livewire\Traits\WithInstitutionalApproval, HasToast, WithPagination;

    #[Url]
    public $academicYear = '';

    #[Url]
    public $semester = 'all';

    public $search = '';

    public function mount()
    {
        $userId = Auth::id();
        $user = $userId ? User::find($userId) : null;
        if (! $user || ! $user->hasRole(['kepala lppm', 'rektor'])) {
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
            ->whereNotNull('finalized_by_lppm_at')
            ->whereNotNull('approved_by_kepala_at')
            ->whereNull('reported_to_rektor_at')
            ->get();

        if ($reviews->isEmpty() && ! $this->getInstitutionalReport('monev', (int) $this->academicYear)) {
            $this->toastWarning('Tidak ada data baru untuk dilaporkan.');

            return;
        }

        // Call standard trait method
        $this->submitInstitutionalReport('monev', (int) $this->academicYear, [
            'count' => $reviews->count(),
            'semester' => $this->semester,
        ]);

        // Update individual reviews
        if ($reviews->isNotEmpty()) {
            $reviews->each(function (MonevReview $review) {
                $review->update(['reported_to_rektor_at' => now()]);
            });
        }
    }

    public function approveReview($id)
    {
        $review = MonevReview::findOrFail($id);
        $review->update([
            'approved_by_kepala_at' => now(),
            'approved_by_kepala_by' => Auth::id(),
        ]);

        $this->toastSuccess('Monev berhasil disetujui.');
    }

    public function approveAll()
    {
        $count = MonevReview::query()
            ->where('academic_year', $this->academicYear)
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->whereNotNull('finalized_by_lppm_at')
            ->whereNull('approved_by_kepala_at')
            ->count();

        if ($count === 0) {
            $this->toastWarning('Tidak ada data untuk disetujui.');

            return;
        }

        MonevReview::query()
            ->where('academic_year', $this->academicYear)
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->whereNotNull('finalized_by_lppm_at')
            ->whereNull('approved_by_kepala_at')
            ->update([
                'approved_by_kepala_at' => now(),
                'approved_by_kepala_by' => Auth::id(),
            ]);

        $this->toastSuccess($count.' hasil monev telah disetujui.');
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
            ->whereNotNull('finalized_by_lppm_at')
            ->latest()
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.kepala-lppm.monev.monev-recap', [
            'institutionalReport' => $this->getInstitutionalReport('monev', (int) $this->academicYear),
        ]);
    }
}
