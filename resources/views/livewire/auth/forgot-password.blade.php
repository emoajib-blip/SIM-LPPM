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
                        {{-- Container kosong tanpa atribut data untuk menghindari blokir WAF --}}
                        <div id="turnstile-verification-container"></div>
                    </div>
                    
                    {{-- Input untuk menampung token --}}
                    <input type="hidden" id="captcha-token-field" wire:model="captcha">
                    
                    @error('captcha')
                        <div class="text-danger small text-center mb-3">{{ $message }}</div>
                    @enderror

                    <script>
                        (function() {
                            function renderTurnstile() {
                                const container = document.getElementById('turnstile-verification-container');
                                if (!container || typeof turnstile === 'undefined') {
                                    setTimeout(renderTurnstile, 500);
                                    return;
                                }

                                // Reset container untuk mencegah duplikasi
                                container.innerHTML = '';
                                
                                turnstile.render('#turnstile-verification-container', {
                                    sitekey: '{{ config('turnstile.site_key') }}',
                                    callback: function(token) {
                                        const field = document.getElementById('captcha-token-field');
                                        if (field) {
                                            field.value = token;
                                            field.dispatchEvent(new Event('input'));
                                        }
                                    }
                                });
                            }

                            // Jalankan saat load dan saat navigasi Livewire
                            if (document.readyState === 'complete') renderTurnstile();
                            else window.addEventListener('load', renderTurnstile);
                            document.addEventListener('livewire:navigated', renderTurnstile);
                        })();
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
