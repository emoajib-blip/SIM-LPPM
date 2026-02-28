<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\IkuOutputType;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class IkuOutputTypeManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|in:publication,hki,product,pakar')]
    public string $group = 'publication';

    public bool $is_active = true;

    public ?int $editingId = null;

    public string $modalTitle = 'Jenis Luaran IKU';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.iku-output-type-manager', [
            'items' => IkuOutputType::latest()->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'group', 'is_active', 'editingId']);
        $this->modalTitle = 'Tambah Jenis Luaran IKU';
    }

    public function edit(IkuOutputType $item): void
    {
        $this->editingId = $item->id;
        $this->name = $item->name;
        $this->group = $item->group;
        $this->is_active = $item->is_active;
        $this->modalTitle = 'Edit Jenis Luaran IKU';
        $this->dispatch('open-modal', modalId: 'modal-iku-output-type');
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'group' => $this->group,
            'is_active' => $this->is_active,
        ];

        if ($this->editingId) {
            IkuOutputType::findOrFail($this->editingId)->update($data);
        } else {
            IkuOutputType::create($data);
        }

        $message = $this->editingId ? 'Jenis Luaran IKU berhasil diubah' : 'Jenis Luaran IKU berhasil ditambahkan';

        $this->dispatch('close-modal', modalId: 'modal-iku-output-type');
        $this->reset(['name', 'group', 'is_active', 'editingId']);

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function toggleStatus(IkuOutputType $item): void
    {
        $item->update(['is_active' => ! $item->is_active]);
        $this->toastSuccess('Status berhasil diubah');
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'group', 'is_active', 'editingId']);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteItemId = $id;
        $this->deleteItemName = IkuOutputType::find($id)->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-iku-output-type');
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            IkuOutputType::findOrFail($this->deleteItemId)->delete();

            $message = 'Jenis Luaran IKU berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->resetConfirmDelete();
        }
    }

    public function resetConfirmDelete(): void
    {
        $this->reset(['deleteItemId', 'deleteItemName']);
    }
}
