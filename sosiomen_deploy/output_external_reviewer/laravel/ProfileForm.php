<?php

namespace App\Livewire\Reviewer;

use App\Actions\HandleHybridInstitution;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileForm extends Component
{
    // Property Hooks untuk reaktivitas UI
    public string $institutionInput = '';

    public bool $isNewInstitution = false;

    /**
     * Hook yang dipicu saat institutionInput berubah (Livewire v4)
     */
    public function updatedInstitutionInput($value): void
    {
        $this->isNewInstitution = ! \Illuminate\Support\Str::isUuid($value) && ! empty($value);
    }

    public function save(HandleHybridInstitution $action): void
    {
        $user = Auth::user();

        $this->validate([
            'institutionInput' => 'required|string|min:3',
            'nidn' => 'required|unique:users,nidn,'.$user->id,
        ]);

        $institution = $action->execute($this->institutionInput);

        $user->update([
            'institution_id' => $institution->id,
            'is_external' => true,
        ]);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Profile updated. Institution pending verification if new.',
        ]);
    }

    public function render()
    {
        return view('livewire.reviewer.profile-form');
    }
}
