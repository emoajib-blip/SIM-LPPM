<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Strata;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class StrataManager extends Component
{
    use HasToast, WithPagination;


    #[Validate('required|min:2|max:255')]
    public string $name = '';

    #[Validate('required|in:research,community_service')]
    public string $category = 'research';

    public ?int $editingId = null;

    public string $modalTitle = 'Strata';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.strata-manager', [
            'strata' => Strata::latest()->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalTitle = 'Tambah Strata';
        $this->dispatch('open-modal', modalId: 'modal-strata');
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            Strata::findOrFail($this->editingId)->update([
                'name' => $this->name,
                'category' => $this->category,
            ]);
        } else {
            Strata::create([
                'name' => $this->name,
                'category' => $this->category,
            ]);
        }

        $message = $this->editingId ? 'Strata berhasil diubah' : 'Strata berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-strata');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(Strata $strata): void
    {
        $this->editingId = $strata->id;
        $this->name = $strata->name;
        $this->category = $strata->category;
        $this->modalTitle = 'Edit Strata';
        $this->dispatch('open-modal', modalId: 'modal-strata');
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'category', 'editingId']);
        $this->category = 'research';
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Strata::findOrFail($this->deleteItemId)->delete();

            $message = 'Strata berhasil dihapus';
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
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager
        $item = \App\Models\Strata::find($id);
        $this->deleteItemName = $item->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-strata');
    }
}
