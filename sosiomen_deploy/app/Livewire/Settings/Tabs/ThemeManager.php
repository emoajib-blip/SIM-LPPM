<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\FocusArea;
use App\Models\Theme;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ThemeManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|exists:focus_areas,id')]
    public ?int $focusAreaId = null;

    #[Validate('boolean')]
    public bool $is_active_for_research = true;

    #[Validate('boolean')]
    public bool $is_active_for_community_service = true;

    public ?int $editingId = null;

    public string $modalTitle = '';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.theme-manager', [
            'themes' => Theme::with(['focusArea'])->latest()->paginate(10),
            'focusAreas' => FocusArea::all(),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'focusAreaId', 'editingId']);
        $this->modalTitle = 'Tambah Tema';
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'focus_area_id' => $this->focusAreaId,
            'is_active_for_research' => $this->is_active_for_research,
            'is_active_for_community_service' => $this->is_active_for_community_service,
        ];

        if ($this->editingId) {
            Theme::findOrFail($this->editingId)->update($data);
        } else {
            Theme::create($data);
        }

        $message = $this->editingId ? 'Tema berhasil diubah' : 'Tema berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-theme');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(Theme $theme): void
    {
        $this->editingId = $theme->id;
        $this->name = $theme->name;
        $this->focusAreaId = $theme->focus_area_id;
        $this->is_active_for_research = $theme->is_active_for_research;
        $this->is_active_for_community_service = $theme->is_active_for_community_service;
        $this->modalTitle = 'Edit Tema';
        $this->dispatch('open-modal', modalId: 'modal-theme');
    }

    public function delete(Theme $theme): void
    {
        $theme->delete();

        $this->resetForm();
        $message = 'Tema berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'focusAreaId', 'editingId']);
        $this->is_active_for_research = true;
        $this->is_active_for_community_service = true;
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Theme::findOrFail($this->deleteItemId)->delete();

            $message = 'Tema berhasil dihapus';
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
        $this->deleteItemId = $id;
        $this->deleteItemName = \App\Models\Theme::find($id)->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-theme');
    }
}
