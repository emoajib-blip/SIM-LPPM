<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\CommunityServiceScheme;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class CommunityServiceSchemeManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|min:3|max:255')]
    public string $strata = '';

    public ?int $editingId = null;

    public string $modalTitle = 'Skema Pengabdian';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.community-service-scheme-manager', [
            'communityServiceSchemes' => CommunityServiceScheme::latest()->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'strata', 'editingId']);
        $this->modalTitle = 'Tambah Skema Pengabdian';
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'strata' => $this->strata,
        ];

        if ($this->editingId) {
            CommunityServiceScheme::findOrFail($this->editingId)->update($data);
        } else {
            CommunityServiceScheme::create($data);
        }

        $message = $this->editingId ? 'Skema Pengabdian berhasil diubah' : 'Skema Pengabdian berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-community-service-scheme');
        $this->reset(['name', 'strata', 'editingId']);

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(CommunityServiceScheme $communityServiceScheme): void
    {
        $this->editingId = $communityServiceScheme->id;
        $this->name = $communityServiceScheme->name;
        $this->strata = $communityServiceScheme->strata;
        $this->modalTitle = 'Edit Skema Pengabdian';
        $this->dispatch('open-modal', modalId: 'modal-community-service-scheme');
    }

    public function delete(CommunityServiceScheme $communityServiceScheme): void
    {
        $communityServiceScheme->delete();

        $this->resetForm();
        $message = 'Skema Pengabdian berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'strata', 'editingId']);
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            CommunityServiceScheme::findOrFail($this->deleteItemId)->delete();

            $message = 'Skema Pengabdian berhasil dihapus';
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
        $this->deleteItemName = \App\Models\CommunityServiceScheme::find($id)?->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-community-service-scheme');
    }
}
