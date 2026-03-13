<div>
    <x-slot:title>Manajemen Profil Reviewer</x-slot:title>

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Pengaturan Akun Eksternal</h2>
                    <div class="text-muted small mt-1">
                        Status Keamanan: 
                        <span class="badge {{ auth()->user()->mfa_enabled_at ? 'bg-green' : 'bg-red' }}">
                            {{ auth()->user()->mfa_status }}
                        </span>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <a href="/dashboard" wire:navigate.hover class="btn btn-outline-secondary">
                        <x-tabler-arrow-left class="icon" /> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <form wire:submit="save">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <x-tabler-input 
                                    label="Nama Lengkap" 
                                    wire:model="form.name" 
                                    placeholder="Masukkan nama sesuai ijazah"
                                    required 
                                />
                            </div>
                            <div class="col-md-6">
                                <x-tabler-input 
                                    label="NIDN" 
                                    wire:model="form.nidn" 
                                    placeholder="10 digit nomor induk"
                                    required 
                                />
                            </div>
                            <div class="col-12">
                                <x-tabler-select 
                                    label="Institusi Asal" 
                                    wire:model="form.institution_input"
                                    hint="Pilih dari daftar atau ketik nama institusi baru jika tidak ditemukan"
                                >
                                    <option value="">Pilih Institusi...</option>
                                    @foreach($institutions as $inst)
                                        <option value="{{ $inst->id }}">{{ $inst->name }}</option>
                                    @endforeach
                                    @if($form->institution_input && !Str::isUuid($form->institution_input))
                                        <option value="{{ $form->institution_input }}" selected>
                                            [Baru] {{ $form->institution_input }}
                                        </option>
                                    @endif
                                </x-tabler-select>
                                
                                <div class="mt-2">
                                    <small class="text-muted">Tidak menemukan institusi Anda? Ketik langsung di kolom pencarian di atas.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="text-muted small">
                                <x-tabler-shield-lock class="icon icon-inline text-yellow" />
                                Sesi berakhir dalam: {{ 120 - now()->diffInMinutes(auth()->user()->last_login_at) }} menit
                            </span>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading class="spinner-border spinner-border-sm me-2"></span>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>