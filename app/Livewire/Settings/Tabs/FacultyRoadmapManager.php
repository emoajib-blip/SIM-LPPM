<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Faculty;
use App\Models\FacultyRoadmap;
use App\Models\FocusArea;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class FacultyRoadmapManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|exists:faculties,id')]
    public ?int $facultyId = null;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|integer|min:2000|max:2100')]
    public ?int $periodStart = null;

    #[Validate('required|integer|min:2000|max:2100|gte:periodStart')]
    public ?int $periodEnd = null;

    #[Validate('nullable|string')]
    public string $vision = '';

    #[Validate('nullable|string')]
    public string $strategicThemesInput = '';

    /** @var array<int, int|string> */
    #[Validate('nullable|array')]
    public array $focusAreaIds = [];

    #[Validate('nullable|url|max:2000')]
    public string $documentUrl = '';

    public bool $isActive = true;

    public ?int $editingId = null;

    public string $modalTitle = 'Peta Jalan Fakultas';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render(): \Illuminate\Contracts\View\View
    {
        $user = auth()->user();
        $query = FacultyRoadmap::with('faculty')->latest();

        // RBAC: Dekan hanya melihat roadmap fakultasnya sendiri
        if ($user->hasRole('dekan')) {
            $query->where('faculty_id', $user->identity?->faculty_id);
        }

        $facultiesQuery = Faculty::query();
        if ($user->hasRole('dekan')) {
            $facultiesQuery->where('id', $user->identity?->faculty_id);
        }

        return view('livewire.settings.tabs.faculty-roadmap-manager', [
            'roadmaps' => $query->paginate(10),
            'faculties' => $facultiesQuery->get(),
            'focusAreas' => FocusArea::all(),
        ]);
    }

    public function create(): void
    {
        $this->resetForm();

        $user = auth()->user();
        if ($user->hasRole('dekan')) {
            $this->facultyId = $user->identity?->faculty_id;
        }

        $this->modalTitle = 'Tambah Peta Jalan Fakultas';
    }

    public function save(): void
    {
        $this->validate();

        // Convert strategic themes textarea to JSON array
        $strategicThemes = array_filter(array_map('trim', explode("\n", $this->strategicThemesInput)));

        $data = [
            'faculty_id' => $this->facultyId,
            'title' => $this->title,
            'period_start' => $this->periodStart,
            'period_end' => $this->periodEnd,
            'vision' => $this->vision,
            'strategic_themes' => array_values($strategicThemes),
            'focus_area_ids' => $this->focusAreaIds,
            'document_url' => $this->documentUrl,
            'is_active' => $this->isActive,
        ];

        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        // Ensure Dekan cannot spoof faculty_id
        $user = auth()->user();
        if ($user->hasRole('dekan') && $this->facultyId !== $user->identity?->faculty_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($this->editingId) {
            $roadmap = FacultyRoadmap::findOrFail($this->editingId);

            // Re-verify ownership for Dekan on update
            if ($user->hasRole('dekan') && $roadmap->faculty_id !== $user->identity?->faculty_id) {
                abort(403);
            }

            $roadmap->update($data);
            $message = 'Peta Jalan Fakultas berhasil diubah';
        } else {
            FacultyRoadmap::create($data);
            $message = 'Peta Jalan Fakultas berhasil ditambahkan';
        }

        $this->dispatch('close-modal', modalId: 'modal-faculty-roadmap');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(FacultyRoadmap $roadmap): void
    {
        $user = auth()->user();
        if ($user->hasRole('dekan') && $roadmap->faculty_id !== $user->identity?->faculty_id) {
            abort(403);
        }

        $this->editingId = $roadmap->id;
        $this->facultyId = $roadmap->faculty_id;
        $this->title = $roadmap->title;
        $this->periodStart = $roadmap->period_start !== null ? (int) $roadmap->period_start : null;
        $this->periodEnd = $roadmap->period_end !== null ? (int) $roadmap->period_end : null;
        $this->vision = $roadmap->vision ?? '';

        // Convert JSON array back to textarea string
        $this->strategicThemesInput = $roadmap->strategic_themes ? implode("\n", $roadmap->strategic_themes) : '';

        $this->focusAreaIds = $roadmap->focus_area_ids ?? [];
        $this->documentUrl = $roadmap->document_url ?? '';
        $this->isActive = $roadmap->is_active;

        $this->modalTitle = 'Edit Peta Jalan Fakultas';
        $this->dispatch('open-modal', modalId: 'modal-faculty-roadmap');
    }

    public function resetForm(): void
    {
        $this->reset([
            'facultyId', 'title', 'periodStart', 'periodEnd', 'vision',
            'strategicThemesInput', 'focusAreaIds', 'documentUrl', 'isActive', 'editingId',
        ]);
    }

    public function confirmDelete(int $id): void
    {
        $roadmap = FacultyRoadmap::find($id);
        if (! $roadmap) {
            return;
        }

        $user = auth()->user();
        if ($user->hasRole('dekan') && $roadmap->faculty_id !== $user->identity?->faculty_id) {
            abort(403);
        }

        $this->deleteItemId = $id;
        $this->deleteItemName = $roadmap->title;
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-faculty-roadmap');
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            $roadmap = FacultyRoadmap::findOrFail($this->deleteItemId);

            $user = auth()->user();
            if ($user->hasRole('dekan') && $roadmap->faculty_id !== $user->identity?->faculty_id) {
                abort(403);
            }

            $roadmap->delete();

            $message = 'Peta Jalan Fakultas berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->reset(['deleteItemId', 'deleteItemName']);
        }
    }
}
