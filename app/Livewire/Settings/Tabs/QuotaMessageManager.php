<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\QuotaMessage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class QuotaMessageManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|string|max:255|unique:quota_messages,key')]
    public string $key = '';

    #[Validate('required|string')]
    public string $message = '';

    public ?int $editingId = null;

    public string $modalTitle = 'Pesan Kuota';

    public ?int $deleteItemId = null;

    public string $deleteItemKey = '';

    public function render(): \Illuminate\Contracts\View\View
    {
        /** @var view-string $viewName */
        $viewName = 'livewire.settings.tabs.quota-message-manager';

        return view($viewName, [
            'quotaMessages' => QuotaMessage::latest()->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalTitle = 'Tambah Pesan Kuota';
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editingId) {
            QuotaMessage::findOrFail($this->editingId)->update([
                'key' => $this->key,
                'message' => $this->message,
            ]);
        } else {
            QuotaMessage::create([
                'key' => $this->key,
                'message' => $this->message,
            ]);
        }

        $message = $this->editingId ? 'Pesan Kuota berhasil diubah' : 'Pesan Kuota berhasil ditambahkan';

        $this->dispatch('close-modal', modalId: 'modal-quota-message');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(QuotaMessage $quotaMessage): void
    {
        $this->editingId = $quotaMessage->id;
        $this->key = $quotaMessage->key;
        $this->message = $quotaMessage->message;

        $this->modalTitle = 'Edit Pesan Kuota';
        $this->dispatch('open-modal', modalId: 'modal-quota-message');
    }

    public function delete(QuotaMessage $quotaMessage): void
    {
        $quotaMessage->delete();

        $this->resetForm();
        $message = 'Pesan Kuota berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset([
            'key',
            'message',
            'editingId',
        ]);
        $this->resetValidation();
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            QuotaMessage::findOrFail($this->deleteItemId)->delete();

            $message = 'Pesan Kuota berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->resetConfirmDelete();
        }
    }

    public function resetConfirmDelete(): void
    {
        $this->reset(['deleteItemId', 'deleteItemKey']);
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteItemId = $id;
        $this->deleteItemKey = QuotaMessage::find($id)->key ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-quota-message');
    }
}
