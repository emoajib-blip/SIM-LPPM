<?php

namespace App\Livewire\Auth;

use App\Livewire\Concerns\HasToast;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth', ['title' => 'Lupa Kata Sandi'])]
class ForgotPassword extends Component
{
    use HasToast;

    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        $status = Password::sendResetLink($this->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));
            $this->toastInfo(__($status));
        } else {
            throw ValidationException::withMessages([
                'email' => __($status),
            ]);
        }
    }
}
