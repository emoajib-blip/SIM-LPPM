<div class="py-4 container-tight">
    <div class="card card-md">
        <div class="card-body">
            <h2 class="mb-4 text-center h2">{{ __('Lupa kata sandi') }}</h2>
            
            <form method="POST" wire:submit.prevent="sendPasswordResetLink" autocomplete="off">
                <div class="mb-3">
                    <label class="form-label">{{ __('Alamat Email') }}</label>
                    <input type="email" wire:model="email" class="form-control" placeholder="email@contoh.com" required autofocus />
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                @if(config('turnstile.site_key'))
                    <div class="mb-3 d-flex justify-content-center" wire:ignore>
                        <div id="turnstile-container"></div>
                    </div>
                @endif

                <div class="form-footer">
                    <button type="submit" class="w-100 btn btn-primary">
                        {{ __('Kirim tautan reset kata sandi') }}
                    </button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}">{{ __('Kembali ke masuk') }}</a>
            </div>

            @if(config('turnstile.site_key'))
                <script>
                    function initTurnstile() {
                        if (typeof turnstile !== 'undefined') {
                            turnstile.render('#turnstile-container', {
                                sitekey: '{{ config('turnstile.site_key') }}',
                                callback: function(token) {
                                    @this.set('captcha', token);
                                },
                            });
                        } else {
                            setTimeout(initTurnstile, 500);
                        }
                    }
                    
                    document.addEventListener('livewire:navigated', initTurnstile);
                    document.addEventListener('DOMContentLoaded', initTurnstile);
                </script>
            @endif
        </div>
    </div>
</div>
