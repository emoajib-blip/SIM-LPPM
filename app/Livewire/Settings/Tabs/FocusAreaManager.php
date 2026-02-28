<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\FocusArea;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class FocusAreaManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('boolean')]
    public bool $is_active_for_research = true;

    #[Validate('boolean')]
    public bool $is_active_for_community_service = true;

    public ?int $editingId = null;

    public string $modalTitle = 'Area Fokus';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.focus-area-manager', [
            'focusAreas' => FocusArea::latest()->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'editingId']);
        $this->modalTitle = 'Tambah Area Fokus';
        $this->dispatch('open-modal', modalId: 'modal-focus-area');
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            FocusArea::findOrFail($this->editingId)->update([
                'name' => $this->name,
                'is_active_for_research' => $this->is_active_for_research,
                'is_active_for_community_service' => $this->is_active_for_community_service,
            ]);
        } else {
            FocusArea::create([
                'name' => $this->name,
                'is_active_for_research' => $this->is_active_for_research,
                'is_active_for_community_service' => $this->is_active_for_community_service,
            ]);
        }

        $message = $this->editingId ? 'Area Fokus berhasil diubah' : 'Area Fokus berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-focus-area');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(FocusArea $focusArea): void
    {
        $this->editingId = $focusArea->id;
        $this->name = $focusArea->name;
        $this->is_active_for_research = $focusArea->is_active_for_research;
        $this->is_active_for_community_service = $focusArea->is_active_for_community_service;
        $this->modalTitle = 'Edit Area Fokus';
        $this->dispatch('open-modal', modalId: 'modal-focus-area');
    }

    public function delete(FocusArea $focusArea): void
    {
        $focusArea->delete();

        $this->resetForm();
        $message = 'Area Fokus berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'editingId']);
        $this->is_active_for_research = true;
        $this->is_active_for_community_service = true;
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            FocusArea::findOrFail($this->deleteItemId)->delete();

            $message = 'Area Fokus berhasil dihapus';
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
        $this->deleteItemName = \App\Models\FocusArea::find($id)->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-focus-area');
    }
}
