<?php

namespace App\Livewire\Settings;

use App\Livewire\Concerns\HasToast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Password extends Component
{
    use HasToast;

    public string $current_password = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', PasswordRule::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
            'original_password' => $validated['password'],
        ]);

        \App\Models\ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => 'password_update',
            'description' => 'User memperbarui kata sandi',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');

        $message = 'Kata sandi berhasil diperbarui.';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    /**
     * Reset the form to original values.
     */
    public function resetForm(): void
    {
        $this->reset('current_password', 'password', 'password_confirmation');
        $this->resetErrorBag();
    }
}
