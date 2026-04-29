<?php

namespace App\Livewire\Auth;

use App\Livewire\Concerns\HasToast;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class ForgotPassword extends Component
{
    use HasToast;

    public string $email = '';

    public string $captcha = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $rules = [
            'email' => ['required', 'string', 'email'],
        ];

        if (!app()->environment('testing') && config('turnstile.site_key')) {
            $rules['captcha'] = ['required', new \App\Rules\Turnstile];
        }

        $this->validate($rules);

        Password::sendResetLink($this->only('email'));

        $message = __('A reset link will be sent if the account exists.');
        session()->flash('status', $message);
        $this->toastInfo($message);
    }
}
