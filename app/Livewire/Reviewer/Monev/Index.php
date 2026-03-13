<?php

namespace App\Livewire\Reviewer\Monev;

use App\Livewire\Concerns\HasToast;
use App\Models\MonevReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use HasToast, WithFileUploads, WithPagination;

    public $search = '';

    public $showReviewModal = false;

    public $selectedReview;

    // Evaluation fields
    public $score;

    public $notes;

    public $status; // Sangat Baik, Baik, Cukup

    public $berita_acara;

    public $borang_data = []; // Structured criteria

    public function mount()
    {
        if (! Auth::user()->hasRole('reviewer')) {
            abort(403);
        }

        // Self-Healing Database: Ensure columns exist to avoid 500 errors
        try {
            if (! \Illuminate\Support\Facades\Schema::hasColumn('proposal_monevs', 'academic_year')) {
                \Illuminate\Support\Facades\Schema::table('proposal_monevs', function (\Illuminate\Database\Schema\Blueprint $table) {
                    $table->string('academic_year')->nullable()->after('proposal_id');
                    $table->enum('semester', ['ganjil', 'genap'])->nullable()->after('academic_year');
                });

                // Populate initial data
                \Illuminate\Support\Facades\DB::statement("
                    UPDATE proposal_monevs 
                    INNER JOIN proposals ON proposal_monevs.proposal_id = proposals.id
                    SET proposal_monevs.academic_year = proposals.start_year,
                        proposal_monevs.semester = IFNULL(proposals.semester, 'ganjil')
                    WHERE proposal_monevs.academic_year IS NULL
                ");
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Reviewer Monev Self-Healing Failed: " . $e->getMessage());
        }
    }

    public function selectReview($id)
    {
        $this->selectedReview = MonevReview::with([
            'proposal.submitter.identity', 
            'proposal.progressReports' => fn($q) => $q->where('reporting_period', 'final'),
            'proposal.detailable',
            'proposal.teamMembers.identity'
        ])->findOrFail($id);
        $this->score = $this->selectedReview->score;
        $this->notes = $this->selectedReview->notes;
        $this->status = $this->selectedReview->status ?? 'baik';
        
        if ($this->selectedReview->borang_data) {
            $this->borang_data = $this->selectedReview->borang_data;
        } else {
            $this->borang_data = [];
            foreach ($this->activeCriteria as $criteria) {
                // Use snake case of the criteria name as key
                $this->borang_data[Str::snake($criteria->criteria)] = '';
            }
        }
        
        $this->showReviewModal = true;
    }

    public function saveReview()
    {
        $this->validate([
            'score' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:sangat_baik,baik,cukup',
            'notes' => 'required|string',
            'berita_acara' => [
                ! $this->selectedReview?->hasMedia('berita_acara') ? 'required' : 'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:10240',
            ],
        ]);

        $this->selectedReview->update([
            'score' => $this->score,
            'status' => $this->status,
            'notes' => $this->notes,
            'borang_data' => $this->borang_data,
            'reviewed_at' => now(),
        ]);

        if ($this->berita_acara) {
            $this->selectedReview->clearMediaCollection('berita_acara');
            $this->selectedReview->addMedia($this->berita_acara->getRealPath())
                ->usingFileName($this->berita_acara->getClientOriginalName())
                ->toMediaCollection('berita_acara');
        }

        $this->toastSuccess('Evaluasi Monev berhasil disimpan.');
        $this->showReviewModal = false;
        $this->reset(['berita_acara']);
    }

    #[Computed]
    public function assignments()
    {
        return MonevReview::query()
            ->where('reviewer_id', Auth::id())
            ->with([
                'proposal.submitter', 
                'proposal.detailable',
                'proposal.progressReports' => fn($q) => $q->where('reporting_period', 'final')
            ])
            ->when($this->search, function ($query) {
                $query->whereHas('proposal', function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhereHas('submitter', function ($sq) {
                            $sq->where('name', 'like', "%{$this->search}%");
                        });
                });
            })
            ->latest()
            ->paginate(10);
    }

    #[Computed]
    public function activeCriteria()
    {
        if (! $this->selectedReview) {
            return collect();
        }

        $type = $this->selectedReview->proposal->detailable_type === \App\Models\Research::class
            ? 'monev_research'
            : 'monev_community_service';

        return \App\Models\ReviewCriteria::where('type', $type)
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('livewire.reviewer.monev.index');
    }
}
