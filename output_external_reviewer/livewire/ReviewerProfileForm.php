<?php

namespace App\Livewire\Forms;

use App\Actions\HandleHybridInstitution;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReviewerProfileForm extends Form
{
    public ?User $user;

    #[Validate('required|string|min:3')]
    public string $name = '';

    #[Validate('required|numeric|digits:10|unique:users,nidn')]
    public string $nidn = '';

    #[Validate('required')]
    public string $institution_input = '';

    public function setReviewer(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->nidn = $user->nidn ?? '';
        $this->institution_input = $user->institution_id ?? '';
    }

    public function store(HandleHybridInstitution $handler)
    {
        $this->validate();

        $institutionId = $handler->execute($this->institution_input);

        $this->user->update([
            'name' => $this->name,
            'nidn' => $this->nidn,
            'institution_id' => $institutionId,
            'is_external' => true,
            'security_metadata' => array_merge($this->user->security_metadata ?? [], [
                'profile_updated_at' => now()->toIso8601String(),
                'ip_address' => request()->ip(),
            ]),
        ]);
    }
}
