<?php

namespace App\Livewire\Kaprodi;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProposalValidation extends Component
{
    use WithPagination;

    public function mount(): void
    {
        $isKaprodiValidationActive = \App\Models\Setting::get('feature_kaprodi_validation', false);

        if (! $isKaprodiValidationActive) {
            abort(403, 'Maaf Anda tidak memiliki akses ini');
        }
    }

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

    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.kaprodi.proposal-validation');
    }

    /**
     * Get Kaprodi's study program ID for scoping proposals.
     */
    #[Computed]
    public function kaprodiStudyProgramId(): ?int
    {
        return Auth::user()?->identity?->study_program_id;
    }

    /**
     * Apply study program scope to a query (only proposals from Kaprodi's study program).
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Proposal>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Proposal>
     */
    protected function applyStudyProgramScope(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        $studyProgramId = $this->kaprodiStudyProgramId();

        if (! $studyProgramId) {
            $query->whereRaw('1 = 0');
        } else {
            $query->whereHas('submitter.identity', function ($q) use ($studyProgramId) {
                $q->where('study_program_id', $studyProgramId);
            });
        }

        return $query;
    }

    /**
     * Get proposals for validation.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator<int, Proposal>
     */
    #[Computed]
    public function proposals(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $query = Proposal::query()
            ->where('status', ProposalStatus::SUBMITTED);

        // Apply study program scoping: Kaprodi only sees proposals from their study program
        $this->applyStudyProgramScope($query);

        return $query
            ->with(['submitter.identity.studyProgram', 'detailable', 'focusArea', 'researchScheme', 'studyProgramRoadmap'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                        ->orWhere('summary', 'like', "%{$this->search}%");
                });
            })
            ->when($this->typeFilter !== 'all', function ($query) {
                $detailableType = $this->typeFilter === 'research'
                    ? \App\Models\Research::class
                    : \App\Models\CommunityService::class;
                $query->where('detailable_type', $detailableType);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }

    /**
     * Get status stats.
     *
     * @return array{all: int, unvalidated: int, validated: int}
     */
    #[Computed]
    public function statusStats(): array
    {
        $studyProgramId = $this->kaprodiStudyProgramId();

        $baseQuery = Proposal::where('status', ProposalStatus::SUBMITTED);

        if ($studyProgramId) {
            $baseQuery->whereHas('submitter.identity', function ($q) use ($studyProgramId) {
                $q->where('study_program_id', $studyProgramId);
            });
        }

        return [
            'all' => (clone $baseQuery)->count(),
            'unvalidated' => (clone $baseQuery)->where('is_roadmap_validated_by_kaprodi', false)->count(),
            'validated' => (clone $baseQuery)->where('is_roadmap_validated_by_kaprodi', true)->count(),
        ];
    }

    /**
     * Get the study program name for display.
     */
    #[Computed]
    public function studyProgramName(): ?string
    {
        return Auth::user()?->identity?->studyProgram?->name;
    }

    public function validateProposal(string $proposalId): void
    {
        $proposal = Proposal::where('id', $proposalId)
            ->where('status', ProposalStatus::SUBMITTED)
            ->firstOrFail();

        // Ensure Kaprodi is validating their own study program
        if ($proposal->submitter->identity->study_program_id !== $this->kaprodiStudyProgramId()) {
            abort(403, 'Unauthorized action.');
        }

        $proposal->is_roadmap_validated_by_kaprodi = true;
        $proposal->save();

        session()->flash('success', 'Proposal berhasil divalidasi kesesuaiannya dengan pohon penelitian prodi.');
    }
}
