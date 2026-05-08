<div>
    <div class="row">
        <div class="col-md-8">
            {{-- Kartu Utama --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <x-lucide-refresh-ccw class="icon me-1" />
                        Sinkron dari Produksi
                    </h3>
                </div>
                <div class="card-body">
                    <p class="text-secondary mb-3">
                        Tarik data terbaru dari server produksi ke localhost untuk
                        <strong>backup</strong> dan <strong>pengembangan</strong>.
                    </p>

                    {{-- Status Konfigurasi --}}
                    @if ($configComplete)
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <x-lucide-check-circle class="icon me-2" />
                            <div>Konfigurasi server <strong>{{ $sshUser }}@{{ $sshHost }}</strong> siap.</div>
                        </div>
                    @else
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <x-lucide-alert-triangle class="icon me-2" />
                            <div>
                                <strong>Konfigurasi server belum lengkap.</strong><br>
                                <small>Minta admin IT untuk mengisi konfigurasi SSH di file <code>.env</code>.</small>
                            </div>
                        </div>
                    @endif

                    {{-- Info Sinkronisasi Terakhir --}}
                    <div class="mb-3">
                        <strong>Sinkronisasi terakhir:</strong>
                        <span class="text-secondary">{{ $lastSync }}</span>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="d-flex gap-2 flex-wrap">
                        {{-- Uji Koneksi --}}
                        <button
                            type="button"
                            wire:click="testConnection"
                            class="btn btn-outline-primary"
                            wire:loading.attr="disabled"
                            @disabled($isRunning || !$configComplete)
                        >
                            <x-lucide-plug class="icon me-1" />
                            Uji Koneksi
                        </button>

                        {{-- Sinkronkan --}}
                        <button
                            type="button"
                            wire:click="runSync"
                            class="btn btn-primary"
                            wire:loading.attr="disabled"
                            @disabled($isRunning || !$configComplete)
                        >
                            <span wire:loading.remove>
                                <x-lucide-download class="icon me-1" />
                                Sinkronkan Data
                            </span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                                Menyinkronkan...
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Output Proses --}}
            @if (!empty($output))
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Output Proses</h3>
                    </div>
                    <div class="card-body p-0">
                        <pre
                            class="bg-dark text-light p-3 rounded-bottom mb-0"
                            style="font-size: 0.8rem; max-height: 500px; overflow-y: auto; font-family: 'JetBrains Mono', 'Cascadia Code', 'Fira Code', monospace;"
                        >{{ $output }}</pre>
                    </div>
                </div>
            @endif
        </div>

        {{-- Panel Informasi --}}
        <div class="col-md-4">
            {{-- Yang Akan Disinkronkan --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Yang Akan Disinkronkan</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="py-1">
                            <x-lucide-check-circle class="text-success me-1 icon-sm" />
                            Database
                            <small class="text-secondary d-block ms-3">MySQL/PostgreSQL dari produksi</small>
                        </li>
                        <li class="py-1">
                            <x-lucide-check-circle class="text-success me-1 icon-sm" />
                            File Upload / Storage
                            <small class="text-secondary d-block ms-3">File media, dokumen, dan lampiran</small>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Informasi Penting --}}
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Informasi Penting</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-0">
                        <x-lucide-info class="icon alert-icon" />
                        <small>
                            <strong>Untuk Admin Non-IT:</strong><br>
                            Cukup klik tombol <strong>"Sinkronkan Data"</strong>.
                            Proses berjalan otomatis.
                        </small>
                    </div>

                    <div class="alert alert-warning mt-2 mb-0">
                        <x-lucide-alert-triangle class="icon alert-icon" />
                        <small>
                            <strong>Perhatian:</strong><br>
                            Data lokal akan ditimpa. Pastikan tidak ada perubahan penting yang belum tersimpan.
                        </small>
                    </div>

                    <div class="alert alert-secondary mt-2 mb-0">
                        <x-lucide-terminal class="icon alert-icon" />
                        <small>
                            <strong>Konfigurasi SSH:</strong><br>
                            Admin IT dapat mengisi detail koneksi di file <code>.env</code>:
                            <code class="d-block mt-1 bg-light p-2 rounded small">
SYNC_SSH_HOST=hostname<br>
SYNC_SSH_USER=username<br>
SYNC_SSH_KEY_PATH=~/.ssh/key
                            </code>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
