<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Sdg;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class SdgManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('nullable|string')]
    public ?string $description = null;

    public ?int $editingId = null;

    public string $modalTitle = 'SDG';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.sdg-manager', [
            'sdgs' => Sdg::orderBy('id', 'asc')->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'description', 'editingId']);
        $this->modalTitle = 'Tambah SDG';
    }

    public function edit(Sdg $sdg): void
    {
        $this->editingId = $sdg->id;
        $this->name = $sdg->name;
        $this->description = $sdg->description;
        $this->modalTitle = 'Edit SDG';
        $this->dispatch('open-modal', modalId: 'modal-sdg');
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            Sdg::findOrFail($this->editingId)->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
        } else {
            Sdg::create([
                'name' => $this->name,
                'description' => $this->description,
            ]);
        }

        $message = $this->editingId ? 'SDG berhasil diubah' : 'SDG berhasil ditambahkan';

        $this->dispatch('close-modal', modalId: 'modal-sdg');
        $this->reset(['name', 'description', 'editingId']);

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Sdg::findOrFail($this->deleteItemId)->delete();

            $message = 'SDG berhasil dihapus';
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
        $this->deleteItemName = Sdg::find($id)->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-sdg');
    }
}
