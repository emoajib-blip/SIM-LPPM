<?php

namespace App\Livewire\AdminLppm\Monev;

use App\Livewire\Concerns\HasToast;
use App\Models\Proposal;
use App\Models\ProposalMonev;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MonevIndex extends Component
{
    use HasToast, WithFileUploads, WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $typeFilter = 'all';

    #[Url]
    public string $academicYear = '';

    #[Url]
    public string $semester = 'all';

    public $selectedProposal;

    public $selectedMonev;
    public $selectedMonevReview;
    public $reviewer_id;

    public $monev_date;

    public $progress_percentage = 0;

    public $notes;

    public $berita_acara;

    public $borang;

    public $rekap_penilaian;

    public $showListModal = false;

    public $showFormModal = false;

    public function mount()
    {
        if (! Auth::user()->hasRole('admin lppm')) {
            abort(403);
        }

        $this->academicYear = $this->academicYear ?: date('Y');

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
            if (! \Illuminate\Support\Facades\Schema::hasColumn('monev_reviews', 'approved_by_kepala_at')) {
                \Illuminate\Support\Facades\Schema::table('monev_reviews', function (\Illuminate\Database\Schema\Blueprint $table) {
                    $table->timestamp('approved_by_kepala_at')->nullable()->after('finalized_by_lppm_at');
                });
            }

            // Automate seeding if Monev criteria are empty
            if (\App\Models\ReviewCriteria::where('type', 'like', 'monev_%')->count() === 0) {
                (new \Database\Seeders\ReviewCriteriaSeeder())->run();
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Monev Self-Healing Failed: " . $e->getMessage());
        }
    }

    public function assignReviewer()
    {
        $this->validate([
            'reviewer_id' => 'required|exists:users,id',
        ]);

        // 1. CONFLICT OF INTEREST CHECK: Submitter
        if ($this->selectedProposal->submitter_id === $this->reviewer_id) {
            $this->toastError('Pelanggaran CoI: Pengusul tidak boleh menjadi reviewer bagi proposalnya sendiri.');
            return;
        }

        // 2. CONFLICT OF INTEREST CHECK: Team Members
        $isTeamMember = $this->selectedProposal->teamMembers()->where('users.id', $this->reviewer_id)->exists();
        if ($isTeamMember) {
            $this->toastError('Pelanggaran CoI: Anggota tim proposal tidak boleh menjadi reviewer.');
            return;
        }

        \App\Models\MonevReview::updateOrCreate(
            [
                'proposal_id' => $this->selectedProposal->id,
                'academic_year' => $this->selectedProposal->start_year,
                'semester' => $this->selectedProposal->semester ?? 'ganjil',
            ],
            [
                'reviewer_id' => $this->reviewer_id,
            ]
        );

        $this->toastSuccess('Reviewer berhasil ditugaskan.');
        $this->loadSelectedProposal();
        $this->showListModal = false;
    }

    public function finalizeReview(string $id)
    {
        $review = \App\Models\MonevReview::findOrFail($id);
        $review->update(['finalized_by_lppm_at' => now()]);
        $this->toastSuccess('Hasil evaluasi berhasil difinalisasi.');
        $this->loadSelectedProposal();
    }

    public function selectProposal(string $id)
    {
        $this->selectedProposal = Proposal::with([
            'monevs', 
            'monevReviews' => function ($q) {
                $q->where('academic_year', $this->academicYear)
                    ->when($this->semester !== 'all', fn ($sq) => $sq->where('semester', $this->semester));
            }, 
            'monevReviews.reviewer',
            'progressReports' => fn($q) => $q->where('reporting_period', 'final')
        ])->findOrFail($id);
        $this->showListModal = true;
    }

    protected function loadSelectedProposal()
    {
        if ($this->selectedProposal) {
            $this->selectedProposal->load([
                'monevs' => function ($q) {
                    $q->where('academic_year', $this->academicYear)
                        ->when($this->semester !== 'all', fn ($sq) => $sq->where('semester', $this->semester))
                        ->latest();
                },
                'monevReviews' => function ($q) {
                    $q->where('academic_year', $this->academicYear)
                        ->when($this->semester !== 'all', fn ($sq) => $sq->where('semester', $this->semester));
                },
                'monevReviews.reviewer',
                'progressReports' => fn($q) => $q->where('reporting_period', 'final')
            ]);
        }
    }

    public function addMonev()
    {
        $this->reset(['selectedMonev', 'monev_date', 'progress_percentage', 'notes', 'berita_acara', 'borang', 'rekap_penilaian']);
        $this->monev_date = now()->format('Y-m-d');
        $this->progress_percentage = 0;
        $this->showFormModal = true;
    }

    public function editMonev(string $id)
    {
        $this->selectedMonev = ProposalMonev::findOrFail($id);
        $this->monev_date = $this->selectedMonev->monev_date->format('Y-m-d');
        $this->progress_percentage = $this->selectedMonev->progress_percentage;
        $this->notes = $this->selectedMonev->notes;
        $this->showFormModal = true;
    }

    public function saveMonev()
    {
        $isNew = ! $this->selectedMonev;

        $this->validate([
            'monev_date' => 'required|date',
            'progress_percentage' => 'required|integer|min:0|max:100',
            'notes' => 'nullable|string',
            'berita_acara' => [
                $isNew || ! $this->selectedMonev?->hasMedia('berita_acara') ? 'required' : 'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:10240',
            ],
            'borang' => [
                $isNew || ! $this->selectedMonev?->hasMedia('borang') ? 'required' : 'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:10240',
            ],
            'rekap_penilaian' => [
                $isNew || ! $this->selectedMonev?->hasMedia('rekap_penilaian') ? 'required' : 'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:10240',
            ],
        ], [
            'berita_acara.required' => 'File Berita Acara wajib diunggah.',
            'borang.required' => 'File Borang Monev wajib diunggah.',
            'rekap_penilaian.required' => 'File Rekap Penilaian wajib diunggah.',
        ]);

        $monev = $this->selectedMonev ?? new ProposalMonev(['proposal_id' => $this->selectedProposal->id]);
        $monev->monev_date = \Carbon\Carbon::parse($this->monev_date);
        $monev->progress_percentage = $this->progress_percentage;
        $monev->notes = $this->notes;
        
        // Ensure period is saved (fallback to current filter or proposal data)
        $monev->academic_year = $this->academicYear ?: $this->selectedProposal->start_year;
        $monev->semester = ($this->semester !== 'all') ? $this->semester : ($this->selectedProposal->semester ?: 'ganjil');
        
        $monev->save();

        if ($this->berita_acara) {
            $monev->clearMediaCollection('berita_acara');
            $monev->addMedia($this->berita_acara->getRealPath())
                ->usingFileName($this->berita_acara->getClientOriginalName())
                ->toMediaCollection('berita_acara');
        }

        if ($this->borang) {
            $monev->clearMediaCollection('borang');
            $monev->addMedia($this->borang->getRealPath())
                ->usingFileName($this->borang->getClientOriginalName())
                ->toMediaCollection('borang');
        }

        if ($this->rekap_penilaian) {
            $monev->clearMediaCollection('rekap_penilaian');
            $monev->addMedia($this->rekap_penilaian->getRealPath())
                ->usingFileName($this->rekap_penilaian->getClientOriginalName())
                ->toMediaCollection('rekap_penilaian');
        }

        $this->toastSuccess('Data Monev berhasil disimpan.');
        $this->selectedProposal->load('monevs');
        $this->reset(['showFormModal', 'berita_acara', 'borang', 'rekap_penilaian']);
    }

    public function deleteMonev(string $id)
    {
        $monev = ProposalMonev::findOrFail($id);
        $monev->delete();
        $this->toastSuccess('Data Monev berhasil dihapus.');
        $this->selectedProposal->load('monevs');
    }

    public function downloadTemplate($key)
    {
        $setting = Setting::where('key', $key)->first();
        if ($setting && $setting->hasMedia('template')) {
            return response()->download($setting->getFirstMedia('template')->getPath(), $setting->getFirstMedia('template')->file_name);
        }
        $this->toastError('Template belum tersedia.');
    }

    #[Computed]
    public function monevBeritaAcaraMedia()
    {
        return Setting::where('key', 'monev_berita_acara_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function monevBorangMedia()
    {
        return Setting::where('key', 'monev_borang_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function monevRekapPenilaianMedia()
    {
        return Setting::where('key', 'monev_rekap_penilaian_template')->first()?->getFirstMedia('template');
    }

    #[Computed]
    public function reviewers()
    {
        return \App\Models\User::role('reviewer')->with('identity')->get();
    }

    #[Computed]
    public function academicYears()
    {
        return Proposal::distinct()->pluck('start_year')->filter()->sortDesc();
    }

    #[Computed]
    public function proposals()
    {
        return Proposal::query()
            ->where('status', \App\Enums\ProposalStatus::COMPLETED)
            ->with([
                'submitter', 
                'detailable', 
                'monevs' => function ($q) {
                    // Only filter by year/semester if columns exist to prevent 500 errors during transition
                    $q->when(\Illuminate\Support\Facades\Schema::hasColumn('proposal_monevs', 'academic_year'), function($sq) {
                        $sq->where('academic_year', $this->academicYear)
                          ->when($this->semester !== 'all', fn ($ssq) => $ssq->where('semester', $this->semester));
                    })->latest();
                },
                'monevReviews' => function ($q) {
                    $q->where('academic_year', $this->academicYear)
                        ->when($this->semester !== 'all', fn ($sq) => $sq->where('semester', $this->semester));
                },
                'monevReviews.reviewer',
                'progressReports' => fn($q) => $q->where('reporting_period', 'final')
            ])
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhereHas('submitter', function ($q) {
                        $q->where('name', 'like', "%{$this->search}%");
                    });
            })
            ->when($this->academicYear, function ($query) {
                $query->where('start_year', $this->academicYear);
            })
            ->when($this->semester !== 'all', function ($query) {
                $query->where('semester', $this->semester);
            })
            ->when($this->typeFilter !== 'all', function ($query) {
                $detailableType = $this->typeFilter === 'research'
                    ? \App\Models\Research::class
                    : \App\Models\CommunityService::class;
                $query->where('detailable_type', $detailableType);
            })
            ->latest()
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.admin-lppm.monev.monev-index');
    }
}
