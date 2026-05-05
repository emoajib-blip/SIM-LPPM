<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sinkronisasi Data Produksi</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        Sinkronkan data terbaru dari server produksi ke localhost. Proses ini akan mendownload database dan file dari server produksi.
                    </p>

                    <div class="mb-3">
                        <strong>Status Terakhir:</strong> {{ $lastSync }}
                    </div>

                    @if ($isRunning)
                        <div class="alert alert-info">
                            <div class="d-flex">
                                <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                                <div>
                                    <strong>Menyinkronkan...</strong><br>
                                    <small>Jangan tutup halaman ini selama proses berlangsung.</small>
                                </div>
                            </div>
                        </div>
                    @endif

                    <button
                        type="button"
                        wire:click="runSync"
                        class="btn btn-primary"
                        wire:loading.attr="disabled"
                        :disabled="$isRunning"
                    >
                        <span wire:loading.remove>
                            <x-lucide-refresh-ccw class="me-2 icon" />
                            Jalankan Sinkronisasi
                        </span>
                        <span wire:loading>
                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                            Menyinkronkan...
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi</h3>
                </div>
                <div class="card-body">
                    <h5>Yang Akan Disinkronkan:</h5>
                    <ul class="list-unstyled">
                        <li><x-lucide-check-circle class="text-success me-1 icon-sm" /> Database MySQL</li>
                        <li><x-lucide-check-circle class="text-success me-1 icon-sm" /> File upload/storage</li>
                        <li><x-lucide-check-circle class="text-success me-1 icon-sm" /> Konfigurasi sistem</li>
                    </ul>

                    <div class="alert alert-warning mt-3">
                        <small>
                            <strong>Perhatian:</strong> Proses ini akan menimpa data lokal dengan data produksi.
                            Pastikan untuk backup data penting terlebih dahulu.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($output))
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Output Proses</h3>
                    </div>
                    <div class="card-body">
                        <pre class="bg-light p-3 rounded" style="font-size: 0.875rem; max-height: 400px; overflow-y: auto;">{{ $output }}</pre>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>