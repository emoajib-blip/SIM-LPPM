<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Institution;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class InstitutionManager extends Component
{
    use HasToast, WithPagination;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('nullable|min:2|max:20')]
    public ?string $code = '';

    #[Validate('required|min:5|max:500')]
    public string $address = '';

    public string $lppmHeadName = '';

    public string $lppmHeadId = '';

    public ?string $lppmHeadUserId = null;

    public ?int $editingId = null;

    public string $modalTitle = 'Institusi';

    public ?int $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.institution-manager', [
            'institutions' => Institution::with(['lppmHeadUser.identity'])->latest()->paginate(10),
            'lecturers' => User::role(['dosen', 'dekan', 'admin lppm', 'kepala lppm'])->with('identity')->get(),
        ]);
    }

    public function create(): void
    {
        $this->reset(['name', 'code', 'address', 'editingId', 'lppmHeadName', 'lppmHeadId', 'lppmHeadUserId']);
        $this->modalTitle = 'Tambah Institusi';
    }

    public function edit(Institution $institution): void
    {
        $this->editingId = $institution->id;
        $this->name = $institution->name ?? '';
        $this->code = $institution->code ?? '';
        $this->address = $institution->address ?? '';
        $this->lppmHeadName = $institution->lppm_head_name ?? '';
        $this->lppmHeadId = $institution->lppm_head_id ?? '';
        $this->lppmHeadUserId = $institution->lppm_head_user_id;
        $this->modalTitle = 'Edit Institusi';
        $this->dispatch('open-modal', modalId: 'modal-institution');
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'code' => $this->code,
            'address' => $this->address,
            'lppm_head_name' => $this->lppmHeadName,
            'lppm_head_id' => $this->lppmHeadId,
            'lppm_head_user_id' => $this->lppmHeadUserId ?: null,
        ];

        if ($this->editingId) {
            Institution::findOrFail($this->editingId)->update($data);
        } else {
            Institution::create($data);
        }

        $message = $this->editingId ? 'Institusi berhasil diubah' : 'Institusi berhasil ditambahkan';

        // close modal
        $this->dispatch('close-modal', modalId: 'modal-institution');
        $this->reset(['name', 'code', 'address', 'editingId', 'lppmHeadName', 'lppmHeadId', 'lppmHeadUserId']);

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function delete(Institution $institution): void
    {
        $institution->delete();

        $this->resetForm();
        $message = 'Institusi berhasil dihapus';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'code', 'address', 'editingId', 'lppmHeadName', 'lppmHeadId', 'lppmHeadUserId']);
    }

    public function updatedLppmHeadUserId($value): void
    {
        if ($value) {
            $user = User::with('identity')->find($value);
            if ($user) {
                $identity = $user->identity;

                // Get base name from user table
                $baseName = $user->name;

                // Get titles from identity table
                $prefix = $identity?->title_prefix;
                $suffix = $identity?->title_suffix;

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

                $this->lppmHeadName = trim($fullName);
                $this->lppmHeadId = $identity?->identity_id ?? '';
            }
        }
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Institution::findOrFail($this->deleteItemId)->delete();

            $message = 'Institusi berhasil dihapus';
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
        $this->deleteItemName = \App\Models\Institution::find($id)?->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-institution');
    }
}
