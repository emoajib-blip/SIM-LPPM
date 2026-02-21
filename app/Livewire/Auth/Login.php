<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Rules\Turnstile;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Features;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|string')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public int $n1 = 0;

    public int $n2 = 0;

    public string $math_answer = '';

    public string $username_honeypot = '';

    public bool $remember = false;

    public string $captcha = '';

    public function mount(): void
    {
        $this->generateMathQuestion();
    }

    public function generateMathQuestion(): void
    {
        $this->n1 = rand(1, 9);
        $this->n2 = rand(1, 9);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        try {
            $rules = [
                'email' => 'required|string',
                'password' => 'required|string',
            ];

            if (! app()->environment('testing')) {
                if (! empty($this->captcha)) {
                    $rules['captcha'] = [new Turnstile];
                } else {
                    $rules['math_answer'] = [
                        'required',
                        function ($attribute, $value, $fail) {
                            if ((int) $value !== ($this->n1 + $this->n2)) {
                                $fail('Jawaban keamanan salah.');
                            }
                        },
                    ];
                }
            }

            $this->validate($rules);

            // Manual Honey Pot Check
            if (! empty($this->username_honeypot)) {
                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

            $this->ensureIsNotRateLimited();

            $user = $this->validateCredentials();

            if (Features::canManageTwoFactorAuthentication() && $user->hasEnabledTwoFactorAuthentication()) {
                Session::put([
                    'login.id' => $user->getKey(),
                    'login.remember' => $this->remember,
                ]);

                $this->redirect(route('two-factor.login'), navigate: false);

                return;
            }

            Auth::login($user, $this->remember);

            RateLimiter::clear($this->throttleKey());
            Session::regenerate();

            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: false);
        } catch (ValidationException $e) {
            $this->generateMathQuestion();
            $this->math_answer = '';
            throw $e;
        }
    }

    public function devLogin(string $roleName): void
    {
        if (! app()->environment('local')) {
            return;
        }

        $user = User::role($roleName)->first();

        if (! $user) {
            $this->addError('email', "No user found with role: $roleName");

            return;
        }

        Auth::login($user, true);
        Session::regenerate();
        session(['active_role' => $roleName]);

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: false);
    }

    /**
     * Validate the user's credentials.
     */
    protected function validateCredentials(): User
    {
        // Try to find user by email, username, or identity_id
        $user = User::where('email', $this->email)
            ->orWhere(function ($query) {
                if (! empty($this->email)) {
                    $query->where('username', $this->email);
                }
            })
            ->orWhereHas('identity', function ($query) {
                $query->where('identity_id', $this->email);
            })
            ->first();

        if (! $user || ! Auth::getProvider()->validateCredentials($user, ['password' => $this->password])) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        return $user;
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
