<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Theme;
use App\Models\Topic;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class TopicManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|exists:themes,id')]
    public ?int $themeId = null;

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
        return view('livewire.settings.tabs.topic-manager', [
            'topics' => Topic::with(['theme'])->latest()->paginate(10),
            'themes' => Theme::all(),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'themeId', 'editingId']);
        $this->modalTitle = 'Tambah Topik';
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'theme_id' => $this->themeId,
            'is_active_for_research' => $this->is_active_for_research,
            'is_active_for_community_service' => $this->is_active_for_community_service,
        ];

        if ($this->editingId) {
            Topic::findOrFail($this->editingId)->update($data);
        } else {
            Topic::create($data);
        }

        $message = $this->editingId ? 'Topik berhasil diubah' : 'Topik berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-topic');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(Topic $topic): void
    {
        $this->editingId = $topic->id;
        $this->name = $topic->name;
        $this->themeId = $topic->theme_id;
        $this->is_active_for_research = $topic->is_active_for_research;
        $this->is_active_for_community_service = $topic->is_active_for_community_service;
        $this->modalTitle = 'Edit Topik';
        $this->dispatch('open-modal', modalId: 'modal-topic');
    }

    public function delete(Topic $topic): void
    {
        $topic->delete();

        $this->resetForm();
        $message = 'Topik berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'themeId', 'editingId']);
        $this->is_active_for_research = true;
        $this->is_active_for_community_service = true;
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Topic::findOrFail($this->deleteItemId)->delete();

            $message = 'Topik berhasil dihapus';
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
        $this->deleteItemName = \App\Models\Topic::find($id)->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-topic');
    }
}
