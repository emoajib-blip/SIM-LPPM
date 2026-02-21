<?php

namespace App\Livewire\Reviewer;

use App\Livewire\Forms\ReviewerProfileForm;
use App\Models\Institution;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProfileEditor extends Component
{
    public ReviewerProfileForm $form;

    public function mount()
    {
        $this->form.setReviewer(auth()->user());
    }

    public function save()
    {
        $this->form.store(new \App\Actions\HandleHybridInstitution);

        session()->flash('success', 'Profil reviewer berhasil diperbarui.');
        $this->dispatch('profile-updated');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.reviewer.profile-editor', [
            'institutions' => Institution::where('is_verified', true)->get(),
        ]);
    }
}
