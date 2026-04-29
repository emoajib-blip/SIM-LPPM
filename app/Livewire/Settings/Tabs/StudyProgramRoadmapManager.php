<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\FacultyRoadmap;
use App\Models\StudyProgram;
use App\Models\StudyProgramRoadmap;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class StudyProgramRoadmapManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|exists:study_programs,id')]
    public ?int $studyProgramId = null;

    #[Validate('nullable|exists:faculty_roadmaps,id')]
    public ?int $facultyRoadmapId = null;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|integer|min:2000|max:2100')]
    public ?int $periodStart = null;

    #[Validate('required|integer|min:2000|max:2100|gte:periodStart')]
    public ?int $periodEnd = null;

    #[Validate('nullable|string')]
    public string $vision = '';

    #[Validate('nullable|string')]
    public string $researchTreeInput = '';

    #[Validate('nullable|string')]
    public string $cplAlignment = '';

    #[Validate('required|integer|min:1|max:9')]
    public int $tktTargetMin = 1;

    #[Validate('required|integer|min:1|max:9|gte:tktTargetMin')]
    public int $tktTargetMax = 9;

    public bool $isActive = true;

    public ?int $editingId = null;
    
    public string $modalTitle = 'Peta Jalan Program Studi';

    public ?int $deleteItemId = null;
    
    public string $deleteItemName = '';

    public function render(): \Illuminate\Contracts\View\View
    {
        $user = auth()->user();
        $query = StudyProgramRoadmap::with(['studyProgram', 'facultyRoadmap'])->latest();
        
        $studyProgramsQuery = StudyProgram::query();
        $facultyRoadmapsQuery = FacultyRoadmap::where('is_active', true);

        if ($user->hasRole('kaprodi')) {
            $studyProgramId = $user->identity->study_program_id;
            $query->where('study_program_id', $studyProgramId);
            $studyProgramsQuery->where('id', $studyProgramId);
            
            // Limit faculty roadmap choices to their own faculty
            $facultyId = $user->identity->faculty_id;
            if ($facultyId) {
                $facultyRoadmapsQuery->where('faculty_id', $facultyId);
            }
        } elseif ($user->hasRole('dekan')) {
            $facultyId = $user->identity->faculty_id;
            // Dekan can see all study programs under their faculty
            $query->whereHas('studyProgram', function($q) use ($facultyId) {
                $q->where('faculty_id', $facultyId);
            });
            $studyProgramsQuery->where('faculty_id', $facultyId);
            $facultyRoadmapsQuery->where('faculty_id', $facultyId);
        }

        return view('livewire.settings.tabs.study-program-roadmap-manager', [
            'roadmaps' => $query->paginate(10),
            'studyPrograms' => $studyProgramsQuery->get(),
            'facultyRoadmaps' => $facultyRoadmapsQuery->get(),
            'canMutate' => !$user->hasRole('dekan') || $user->hasRole('superadmin') || $user->hasRole('admin lppm') // Dekan is read-only unless they have other roles
        ]);
    }

    public function create(): void
    {
        $this->abortIfReadOnly();
        
        $this->resetForm();
        
        $user = auth()->user();
        if ($user->hasRole('kaprodi')) {
            $this->studyProgramId = $user->identity->study_program_id;
        }

        $this->modalTitle = 'Tambah Peta Jalan Prodi';
    }

    public function save(): void
    {
        $this->abortIfReadOnly();
        $this->validate();

        $researchTree = array_filter(array_map('trim', explode("\n", $this->researchTreeInput)));

        $data = [
            'study_program_id' => $this->studyProgramId,
            'faculty_roadmap_id' => $this->facultyRoadmapId ?: null,
            'title' => $this->title,
            'period_start' => $this->periodStart,
            'period_end' => $this->periodEnd,
            'vision' => $this->vision,
            'research_tree' => array_values($researchTree),
            'cpl_alignment' => $this->cplAlignment,
            'tkt_target_min' => $this->tktTargetMin,
            'tkt_target_max' => $this->tktTargetMax,
            'is_active' => $this->isActive,
        ];

        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $user = auth()->user();
        if ($user->hasRole('kaprodi') && $this->studyProgramId !== $user->identity->study_program_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($this->editingId) {
            $roadmap = StudyProgramRoadmap::findOrFail($this->editingId);
            
            if ($user->hasRole('kaprodi') && $roadmap->study_program_id !== $user->identity->study_program_id) {
                abort(403);
            }
            
            $roadmap->update($data);
            $message = 'Peta Jalan Prodi berhasil diubah';
        } else {
            StudyProgramRoadmap::create($data);
            $message = 'Peta Jalan Prodi berhasil ditambahkan';
        }

        $this->dispatch('close-modal', modalId: 'modal-study-program-roadmap');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(StudyProgramRoadmap $roadmap): void
    {
        $this->abortIfReadOnly();
        
        $user = auth()->user();
        if ($user->hasRole('kaprodi') && $roadmap->study_program_id !== $user->identity->study_program_id) {
            abort(403);
        }

        $this->editingId = $roadmap->id;
        $this->studyProgramId = $roadmap->study_program_id;
        $this->facultyRoadmapId = $roadmap->faculty_roadmap_id;
        $this->title = $roadmap->title;
        $this->periodStart = $roadmap->period_start !== null ? (int) $roadmap->period_start : null;
        $this->periodEnd = $roadmap->period_end !== null ? (int) $roadmap->period_end : null;
        $this->vision = $roadmap->vision ?? '';
        
        $this->researchTreeInput = $roadmap->research_tree ? implode("\n", $roadmap->research_tree) : '';
        
        $this->cplAlignment = $roadmap->cpl_alignment ?? '';
        $this->tktTargetMin = $roadmap->tkt_target_min ?? 1;
        $this->tktTargetMax = $roadmap->tkt_target_max ?? 9;
        $this->isActive = $roadmap->is_active;

        $this->modalTitle = 'Edit Peta Jalan Prodi';
        $this->dispatch('open-modal', modalId: 'modal-study-program-roadmap');
    }

    public function resetForm(): void
    {
        $this->reset([
            'studyProgramId', 'facultyRoadmapId', 'title', 'periodStart', 'periodEnd', 'vision', 
            'researchTreeInput', 'cplAlignment', 'tktTargetMin', 'tktTargetMax', 'isActive', 'editingId'
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $this->abortIfReadOnly();
        
        $roadmap = StudyProgramRoadmap::find($id);
        if (!$roadmap) return;

        $user = auth()->user();
        if ($user->hasRole('kaprodi') && $roadmap->study_program_id !== $user->identity->study_program_id) {
            abort(403);
        }

        $this->deleteItemId = $id;
        $this->deleteItemName = $roadmap->title ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-study-program-roadmap');
    }

    public function handleConfirmDeleteAction(): void
    {
        $this->abortIfReadOnly();
        
        if ($this->deleteItemId) {
            $roadmap = StudyProgramRoadmap::findOrFail($this->deleteItemId);
            
            $user = auth()->user();
            if ($user->hasRole('kaprodi') && $roadmap->study_program_id !== $user->identity->study_program_id) {
                abort(403);
            }
            
            $roadmap->delete();

            $message = 'Peta Jalan Prodi berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->reset(['deleteItemId', 'deleteItemName']);
        }
    }
    
    private function abortIfReadOnly(): void
    {
        $user = auth()->user();
        // Dekan can only view, unless they are also admin
        if ($user->hasRole('dekan') && !$user->hasRole('superadmin') && !$user->hasRole('admin lppm') && !$user->hasRole('kaprodi')) {
            abort(403, 'Dekan hanya memiliki akses baca pada Peta Jalan Prodi.');
        }
    }
}
