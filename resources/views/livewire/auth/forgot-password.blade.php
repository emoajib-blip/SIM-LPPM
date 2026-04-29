<div class="py-4 container-tight">
    <div class="mb-4 text-center">
        <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="/logo.png" alt="Logo" width="100" height="100">
        </a>
    </div>
    <div class="card card-md shadow-sm border-0">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center h2 fw-bold text-primary">{{ __('Lupa kata sandi') }}</h2>
            <p class="mb-4 text-secondary text-center small">
                {{ __('Masukkan email Anda untuk menerima tautan reset kata sandi') }}
            </p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" wire:submit.prevent="sendPasswordResetLink" autocomplete="off" novalidate>
                <div class="mb-3">
                    <label class="form-label fw-bold">{{ __('Alamat Email') }}</label>
                    <input type="email" wire:model="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                        placeholder="email@contoh.com" autocomplete="email" required autofocus />
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                @if(config('turnstile.site_key'))
                    <div class="mb-4 d-flex justify-content-center" wire:ignore>
                        <div class="cf-turnstile" 
                            data-sitekey="{{ config('turnstile.site_key') }}" 
                            data-callback="onTurnstileFinished"></div>
                    </div>
                    
                    <input type="hidden" id="captcha-token" wire:model="captcha">
                    
                    @error('captcha')
                        <div class="text-danger small text-center mb-3">{{ $message }}</div>
                    @enderror

                    <script>
                        function onTurnstileFinished(token) {
                            const input = document.getElementById('captcha-token');
                            if (input) {
                                input.value = token;
                                input.dispatchEvent(new Event('input'));
                            }
                        }
                    </script>
                @endif

                <div class="form-footer">
                    <button type="submit" class="w-100 btn btn-primary btn-lg fw-bold shadow-sm">
                        <span wire:loading class="spinner-border spinner-border-sm me-2" role="status"></span>
                        {{ __('Kirim tautan reset kata sandi') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-4 text-center text-secondary">
        {{ __('Atau, kembali ke') }} <a href="{{ route('login') }}" class="fw-bold text-decoration-none" wire:navigate>{{ __('masuk') }}</a>
    </div>
</div>
