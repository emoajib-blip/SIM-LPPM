<?php

namespace App\Livewire\Reviewer\Monev;

use App\Livewire\Concerns\HasToast;
use App\Models\MonevReview;
use Illuminate\Support\Facades\Auth;
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
        if (!Auth::user()->hasRole('reviewer')) {
            abort(403);
        }
    }

    public function selectReview($id)
    {
        $this->selectedReview = MonevReview::with('proposal.submitter')->findOrFail($id);
        $this->score = $this->selectedReview->score;
        $this->notes = $this->selectedReview->notes;
        $this->status = $this->selectedReview->status ?? 'Baik';
        $this->borang_data = $this->selectedReview->borang_data ?? [
            'luaran_wajib' => '',
            'luaran_tambahan' => '',
            'kualitas_substansi' => '',
        ];
        $this->showReviewModal = true;
    }

    public function saveReview()
    {
        $this->validate([
            'score' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:Sangat Baik,Baik,Cukup',
            'notes' => 'required|string',
            'berita_acara' => [
                !$this->selectedReview?->hasMedia('berita_acara') ? 'required' : 'nullable',
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
            ->with(['proposal.submitter', 'proposal.detailable'])
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

    public function render()
    {
        return view('livewire.reviewer.monev.index');
    }
}
