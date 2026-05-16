<div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="card-title mb-3">
                <x-lucide-database class="icon me-1" />
                Backup Database & Storage
            </h3>

            <p class="text-secondary mb-3">
                Unduh cadangan (backup) database dan file storage untuk
                <strong>backup</strong> dan <strong>pengembangan</strong> lokal.
            </p>

            <div class="mb-3">
                <strong>Backup terakhir:</strong>
                <span class="text-secondary">{{ $lastBackup }}</span>
            </div>

            <div class="d-flex gap-2 flex-wrap">
                <button
                    type="button"
                    wire:click="backupDatabase"
                    class="btn btn-outline-primary"
                    wire:loading.attr="disabled"
                    @disabled($isRunning)
                >
                    <span wire:loading.remove wire:target="backupDatabase">
                        <x-lucide-download class="icon me-1" />
                        Backup Database
                    </span>
                    <span wire:loading wire:target="backupDatabase">
                        <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                        Backup Database...
                    </span>
                </button>

                <button
                    type="button"
                    wire:click="backupStorage"
                    class="btn btn-outline-info"
                    wire:loading.attr="disabled"
                    @disabled($isRunning)
                >
                    <span wire:loading.remove wire:target="backupStorage">
                        <x-lucide-archive class="icon me-1" />
                        Backup Storage
                    </span>
                    <span wire:loading wire:target="backupStorage">
                        <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                        Backup Storage...
                    </span>
                </button>

                <a
                    href="{{ route('settings.download-db') }}"
                    class="btn btn-success @if(!$lastDbFile || $isRunning) disabled @endif"
                >
                    <x-lucide-file-text class="icon me-1" />
                    Download SQL
                </a>

                <a
                    href="{{ route('settings.download-storage') }}"
                    class="btn btn-success @if(!$lastStorageFile || $isRunning) disabled @endif"
                >
                    <x-lucide-file-archive class="icon me-1" />
                    Download ZIP
                </a>
            </div>

            @if (!empty($output))
                <div class="mt-4">
                    <h3 class="card-title mb-2">Output Proses</h3>
                    <pre
                        class="bg-dark text-light p-3 rounded mb-0"
                        style="font-size: 0.8rem; max-height: 500px; overflow-y: auto; font-family: 'JetBrains Mono', 'Cascadia Code', 'Fira Code', monospace;"
                    >{{ $output }}</pre>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="d-flex flex-column gap-3">
                <div>
                    <h4 class="subheader">Yang Akan Di-backup</h4>
                    <ul class="list-unstyled mb-0 mt-2">
                        <li class="py-1 d-flex align-items-center gap-2">
                            <x-lucide-check-circle class="text-success icon" />
                            <div>
                                Database
                                <small class="text-secondary d-block ms-0">MySQL dump (.sql)</small>
                            </div>
                        </li>
                        <li class="py-1 d-flex align-items-center gap-2">
                            <x-lucide-check-circle class="text-success icon" />
                            <div>
                                File Upload / Storage
                                <small class="text-secondary d-block ms-0">Folder public storage (.zip)</small>
                            </div>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="subheader">Informasi Penting</h4>
                    <div class="d-flex flex-column gap-2 mt-2">
                        <div class="alert alert-info mb-0 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <x-lucide-info class="icon" />
                                <small>
                                    Backup sebelumnya akan otomatis dihapus saat membuat yang baru.
                                </small>
                            </div>
                        </div>

                        <div class="alert alert-warning mb-0 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <x-lucide-alert-triangle class="icon" />
                                <small>
                                    Pastikan ada cukup ruang disk sebelum memulai backup.
                                </small>
                            </div>
                        </div>

                        <div class="alert alert-secondary mb-0 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <x-lucide-terminal class="icon" />
                                <small>
                                    Membutuhkan perintah <code>mysqldump</code> di server.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
