<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\StudyProgram;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class StudyProgramManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|min:2|max:10')]
    public ?string $code = '';

    #[Validate('required|exists:institutions,id')]
    public ?int $institutionId = null;

    #[Validate('nullable|exists:faculties,id')]
    public ?int $facultyId = null;

    #[Validate('nullable|exists:users,id')]
    public ?string $kaprodiUserId = null;

    public array $researchRoadmap = [
        'period' => '2025-2029',
        'priorities' => [],
        'research_tree' => [],
        'success_indicators' => [],
    ];

    public ?int $editingId = null;

    public string $modalTitle = '';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public ?string $roadmapValidationNotes = '';

    public ?string $validatingProgramId = null;

    public string $activeTab = 'basic';

    public function render()
    {
        return view('livewire.settings.tabs.study-program-manager', [
            'studyPrograms' => StudyProgram::with(['institution', 'faculty', 'kaprodi'])->latest()->paginate(10),
            'institutions' => Institution::all(),
            'faculties' => $this->institutionId ? Faculty::where('institution_id', $this->institutionId)->orderBy('name')->get() : [],
            'kaprodiUsers' => \App\Models\User::role('kaprodi')->orderBy('name')->get(),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'code', 'institutionId', 'facultyId', 'kaprodiUserId', 'researchRoadmap', 'editingId', 'activeTab']);
        $this->researchRoadmap = [
            'period' => '2025-2029',
            'priorities' => [],
            'research_tree' => [],
            'success_indicators' => [],
        ];
        $this->modalTitle = 'Tambah Program Studi';
        $this->activeTab = 'basic';
    }

    public function edit(StudyProgram $studyProgram): void
    {
        $this->editingId = $studyProgram->id;
        $this->name = $studyProgram->name ?? '';
        $this->code = $studyProgram->code ?? '';
        $this->institutionId = $studyProgram->institution_id;
        $this->facultyId = $studyProgram->faculty_id;
        $this->kaprodiUserId = $studyProgram->kaprodi_user_id;
        $this->researchRoadmap = $studyProgram->research_roadmap ?? [
            'period' => '2025-2029',
            'priorities' => [],
            'research_tree' => [],
            'success_indicators' => [],
        ];
        $this->modalTitle = 'Edit Program Studi';
        $this->activeTab = 'basic';
        $this->dispatch('open-modal', modalId: 'modal-study-program');
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'code' => $this->code,
            'institution_id' => $this->institutionId,
            'faculty_id' => $this->facultyId,
            'kaprodi_user_id' => $this->kaprodiUserId,
        ];

        if (\App\Models\Setting::get('feature_roadmap_active', false)) {
            $data['research_roadmap'] = $this->researchRoadmap;
        }

        if ($this->editingId) {
            StudyProgram::findOrFail($this->editingId)->update($data);
        } else {
            StudyProgram::create($data);
        }

        $message = $this->editingId ? 'Program Studi berhasil diubah' : 'Program Studi berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-study-program');
        $this->reset(['name', 'code', 'institutionId', 'facultyId', 'kaprodiUserId', 'researchRoadmap', 'editingId', 'activeTab']);
        $this->researchRoadmap = [
            'period' => '2025-2029',
            'priorities' => [],
            'research_tree' => [],
            'success_indicators' => [],
        ];

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function delete(StudyProgram $studyProgram): void
    {
        $studyProgram->delete();

        $this->resetForm();
        $message = 'Program Studi berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'code', 'institutionId', 'facultyId', 'editingId']);
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            StudyProgram::findOrFail($this->deleteItemId)->delete();

            $message = 'Program Studi berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->resetConfirmDelete();
        }
    }

    public function resetConfirmDelete(): void
    {
        $this->reset(['deleteItemId', 'deleteItemName']);
    }

    public function confirmDelete(int $id): void
    {
        $studyProgram = \App\Models\StudyProgram::find($id);
        if (! $studyProgram) {
            return;
        }

        $this->deleteItemId = $id;
        $this->deleteItemName = $studyProgram->name;
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-study-program');
    }

    public function approveRoadmap(string $programId): void
    {
        $studyProgram = StudyProgram::findOrFail($programId);

        $action = app(DekanValidateStudyProgramRoadmapAction::class);
        $result = $action->execute($studyProgram, 'approved');

        if ($result['success']) {
            session()->flash('success', $result['message']);
            $this->toastSuccess($result['message']);
        } else {
            session()->flash('error', $result['message']);
            $this->toastError($result['message']);
        }
    }

    public function rejectRoadmap(string $programId): void
    {
        $studyProgram = StudyProgram::findOrFail($programId);

        $action = app(DekanValidateStudyProgramRoadmapAction::class);
        $result = $action->execute($studyProgram, 'rejected', $this->roadmapValidationNotes);

        if ($result['success']) {
            session()->flash('success', $result['message']);
            $this->toastSuccess($result['message']);
            $this->resetRoadmapValidation();
        } else {
            session()->flash('error', $result['message']);
            $this->toastError($result['message']);
        }
    }

    public function resetRoadmapValidation(): void
    {
        $this->reset(['roadmapValidationNotes', 'validatingProgramId']);
    }
}
