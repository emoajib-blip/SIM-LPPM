<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class FacultyManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|min:2|max:10')]
    public ?string $code = '';

    #[Validate('required|exists:institutions,id')]
    public ?int $institutionId = null;

    #[Validate('nullable|string|max:255')]
    public string $deanName = '';

    #[Validate('nullable|string|max:50')]
    public string $deanId = '';

    public ?string $deanUserId = null;

    public ?int $editingId = null;

    public string $modalTitle = 'Fakultas';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.faculty-manager', [
            'faculties' => Faculty::with(['institution', 'deanUser.identity'])->latest()->paginate(10),
            'institutions' => Institution::all(),
            'lecturers' => User::role(['dosen', 'dekan'])->with('identity')->get(),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'code', 'institutionId', 'editingId', 'deanName', 'deanId', 'deanUserId']);
        $this->modalTitle = 'Tambah Fakultas';
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'code' => $this->code,
            'institution_id' => $this->institutionId,
            'dean_name' => $this->deanName,
            'dean_id' => $this->deanId,
            'dean_user_id' => $this->deanUserId ?: null,
        ];

        if ($this->editingId) {
            Faculty::findOrFail($this->editingId)->update($data);
        } else {
            Faculty::create($data);
        }

        $message = $this->editingId ? 'Fakultas berhasil diubah' : 'Fakultas berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-faculty');
        $this->reset(['name', 'code', 'institutionId', 'editingId', 'deanName', 'deanId', 'deanUserId']);

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(Faculty $faculty): void
    {
        $this->editingId = $faculty->id;
        $this->name = $faculty->name;
        $this->code = $faculty->code;
        // Vetted by AI - Manual Review Required by Senior Engineer/Manager

        $this->institutionId = $faculty->institution_id !== null ? (int) $faculty->institution_id : null;
        $this->deanName = $faculty->dean_name ?? '';
        $this->deanId = $faculty->dean_id ?? '';
        $this->deanUserId = $faculty->dean_user_id;
        $this->modalTitle = 'Edit Fakultas';
        $this->dispatch('open-modal', modalId: 'modal-faculty');
    }

    public function delete(Faculty $faculty): void
    {
        $faculty->delete();

        $this->resetForm();
        $message = 'Fakultas berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'code', 'institutionId', 'editingId', 'deanName', 'deanId', 'deanUserId']);
    }

    public function updatedDeanUserId($value): void
    {
        if ($value) {
            $user = User::with('identity')->find($value);
            if ($user) {
                $identity = $user->identity;

                // Get base name from user table
                $baseName = $user->name;

                // Get titles from identity table
                $prefix = $identity->title_prefix;
                $suffix = $identity->title_suffix;

                // Construct full name with smart title handling
                $fullName = $baseName;

                // Add prefix if defined and not already in name
                if ($prefix && ! str_contains($fullName, $prefix)) {
                    $fullName = $prefix.' '.$fullName;
                }

                // Add suffix if defined and not already in name
                if ($suffix && ! str_contains($fullName, $suffix)) {
                    $fullName = $fullName.', '.$suffix;
                }

                $this->deanName = trim($fullName);
                $this->deanId = $identity->identity_id ?? '';
            }
        }
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Faculty::findOrFail($this->deleteItemId)->delete();

            $message = 'Fakultas berhasil dihapus';
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
        $this->deleteItemName = \App\Models\Faculty::find($id)?->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-faculty');
    }
}
