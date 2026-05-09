<div>
    <div class="row">
        <div class="col-md-8">
            <h3 class="card-title mb-3">
                <x-lucide-cloud-upload class="icon me-1" />
                Pulihkan Data
            </h3>

            <p class="text-secondary mb-3">
                Upload file backup (.sql / .zip) untuk memulihkan data setelah <strong>disaster recovery</strong> atau
                <strong>deploy fresh</strong>.
            </p>

            <div class="mb-4">
                <div class="alert alert-warning d-flex align-items-center gap-2" role="alert">
                    <x-lucide-alert-triangle class="icon" />
                    <div>
                        <strong>Perhatian:</strong> Data yang ada saat ini akan ditimpa.
                        Sistem akan membuat <strong>backup otomatis</strong> sebelum memulihkan.
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <x-lucide-database class="icon me-1" />
                                Database
                            </h4>
                            <p class="text-secondary small">File .sql hasil backup database.</p>
                            <input
                                type="file"
                                wire:model.live="sqlFile"
                                accept=".sql,.txt"
                                class="form-control"
                                @disabled($isRunning)
                            >
                            @error('sqlFile') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <x-lucide-archive class="icon me-1" />
                                Storage
                            </h4>
                            <p class="text-secondary small">File .zip hasil backup storage.</p>
                            <input
                                type="file"
                                wire:model.live="zipFile"
                                accept=".zip"
                                class="form-control"
                                @disabled($isRunning)
                            >
                            @error('zipFile') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            @if ($hasPreview && !empty($preview))
                @if (isset($preview['valid']))
                    <div class="mb-3">
                        <h4 class="subheader">Preview File ZIP</h4>
                        @if ($preview['valid'])
                            <div class="alert alert-success d-flex align-items-center gap-2">
                                <x-lucide-check-circle class="icon" />
                                <div>File ZIP aman untuk dipulihkan.</div>
                            </div>
                        @else
                            <div class="alert alert-danger d-flex align-items-center gap-2">
                                <x-lucide-alert-octagon class="icon" />
                                <div>
                                    <strong>File ZIP mengandung masalah:</strong>
                                    <ul class="mb-0 mt-1">
                                        @foreach ($preview['issues'] as $issue)
                                            <li>{{ $issue }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="mb-3">
                        <h4 class="subheader">Preview Restore Database</h4>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Tabel</th>
                                        <th class="text-end">Baris</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preview['tables'] as $table => $count)
                                        <tr>
                                            <td>{{ $table }}</td>
                                            <td class="text-end">{{ number_format($count) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($preview['blocked_count'] > 0)
                            <div class="alert alert-info d-flex align-items-center gap-2">
                                <x-lucide-info class="icon" />
                                <div>
                                    <strong>{{ $preview['blocked_count'] }} statement</strong> diblokir (DROP, ALTER, dll.)
                                    akan dilewati.
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                @if (!isset($preview['valid']) || $preview['valid'])
                    <button
                        type="button"
                        wire:click="executeRestore"
                        class="btn btn-primary"
                        wire:loading.attr="disabled"
                        @disabled($isRunning)
                    >
                        <span wire:loading.remove>
                            <x-lucide-play class="icon me-1" />
                            Pulihkan Data
                        </span>
                        <span wire:loading>
                            <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                            Memulihkan...
                        </span>
                    </button>
                @endif

                <button
                    type="button"
                    wire:click="resetUpload"
                    class="btn btn-outline-secondary"
                    @disabled($isRunning)
                >
                    <x-lucide-x class="icon me-1" />
                    Batal
                </button>
            @endif

            @if (!empty($output))
                <div class="mt-4">
                    <h3 class="card-title mb-2">Log Proses</h3>
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
                    <h4 class="subheader">Yang Akan Dipulihkan</h4>
                    <ul class="list-unstyled mb-0 mt-2">
                        <li class="py-1 d-flex align-items-center gap-2">
                            <x-lucide-database class="icon" />
                            <div>
                                Database
                                <small class="text-secondary d-block ms-0">File .sql → INSERT into tabel</small>
                            </div>
                        </li>
                        <li class="py-1 d-flex align-items-center gap-2">
                            <x-lucide-archive class="icon" />
                            <div>
                                File Storage
                                <small class="text-secondary d-block ms-0">File .zip → extract ke storage</small>
                            </div>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="subheader">Informasi Penting</h4>
                    <div class="d-flex flex-column gap-2 mt-2">
                        <div class="alert alert-info mb-0 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <x-lucide-shield class="icon" />
                                <small>
                                    <strong>Keamanan:</strong><br>
                                    Statement berbahaya (DROP, ALTER, DELETE) otomatis diblokir.
                                </small>
                            </div>
                        </div>

                        <div class="alert alert-info mb-0 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <x-lucide-database class="icon" />
                                <small>
                                    <strong>Backup Otomatis:</strong><br>
                                    Database saat ini akan di-backup sebelum restore.
                                </small>
                            </div>
                        </div>

                        <div class="alert alert-secondary mb-0 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <x-lucide-terminal class="icon" />
                                <small>
                                    <strong>Alternatif CLI:</strong><br>
                                    <code class="d-block mt-1">
php artisan app:restore-backup --sql=file.sql --storage=file.zip
                                    </code>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
