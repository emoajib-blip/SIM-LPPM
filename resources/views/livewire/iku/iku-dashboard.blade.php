<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 font-weight-bold mb-0 text-primary">{{ $pageTitle }}</h2>
            <p class="text-muted mb-0">{{ $pageSubtitle }}</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="dropdown">
                <button class="btn btn-white shadow-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <x-lucide-calendar class="icon me-2 text-primary" />
                    Tahun: {{ $period }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                    @foreach($this->periods as $availablePeriod)
                        <li>
                            <button class="dropdown-item @if($availablePeriod == $period) active @endif"
                                wire:click="setPeriod('{{ $availablePeriod }}')">
                                {{ $availablePeriod }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="{{ route('admin.iku.export-pdf', ['period' => $period]) }}" class="btn btn-primary shadow-sm"
                data-navigate-ignore="true" target="_blank">
                <x-lucide-printer class="icon me-2" />
                Cetak PDF
            </a>
            <a href="{{ route('admin.iku.export-excel', ['period' => $period]) }}" class="btn btn-success shadow-sm"
                data-navigate-ignore="true" target="_blank">
                <x-lucide-file-spreadsheet class="icon me-2" />
                Export Excel
            </a>
        </div>
    </div>

    <div class="row g-4 mb-4">
        @foreach($this->ikuMetrics as $key => $metric)
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden" style="border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="badge px-3 py-2 rounded-pill bg-soft-primary text-primary text-uppercase font-weight-bold"
                                style="font-size: 0.7rem; background: rgba(37, 99, 235, 0.1);">
                                {{ strtoupper($key) }}
                            </div>
                            @if($metric['achievement'] >= $metric['target'])
                                <x-lucide-check-circle class="icon text-success" />
                            @else
                                <x-lucide-info class="icon text-warning" />
                            @endif
                        </div>

                        <h3 class="h2 font-weight-bold mb-1">{{ number_format($metric['achievement'], 1) }}%</h3>
                        <h4 class="h6 font-weight-semi-bold text-dark mb-3">{{ $metric['name'] }}</h4>

                        <p class="small text-muted mb-4">{{ $metric['description'] }}</p>

                        <div class="progress mb-2" style="height: 6px; border-radius: 10px; background: #f1f5f9;">
                            <div class="progress-bar @if($metric['achievement'] >= $metric['target']) bg-success @else bg-primary @endif"
                                role="progressbar"
                                style="width: {{ min($metric['achievement'], 100) }}%; border-radius: 10px;"
                                aria-valuenow="{{ $metric['achievement'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex justify-content-between small">
                            <span class="text-muted">Progres: {{ round($metric['achievement'], 1) }}%</span>
                            <span class="font-weight-bold text-dark">Target: {{ $metric['target'] }}%</span>
                        </div>
                    </div>

                    @if($metric['achievement'] >= $metric['target'])
                        <div class="bg-success py-1 text-center text-white small" style="font-size: 0.65rem;">
                            TARGET TERCAPAI
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Info Section (Premium Look) -->
    <div class="card border-0 shadow-sm"
        style="border-radius: 16px; background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: #e2e8f0;">
        <div class="card-body p-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="h3 font-weight-bold text-white mb-3">Sinkronisasi Data IKU & SINTA</h2>
                    <p class="lead mb-4" style="opacity: 0.8;">Modul ini mengintegrasikan data manajemen hibah LPPM
                        dengan Indikator Kinerja Utama Perguruan Tinggi secara real-time. Memastikan setiap luaran
                        publikasi (Scopus/SINTA) dan kerjasama terdeteksi secara otomatis.</p>
                    <div class="d-flex gap-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-primary p-2 me-3 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">
                                <x-lucide-refresh-ccw class="icon text-white" style="width: 20px;" />
                            </div>
                            <div>
                                <h5 class="mb-0 text-white" style="font-size: 0.9rem;">Auto-Sync</h5>
                                <span class="small" style="opacity: 0.6;">Dari Data Hibah</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-success p-2 me-3 d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;">
                                <x-lucide-shield-check class="icon text-white" style="width: 20px;" />
                            </div>
                            <div>
                                <h5 class="mb-0 text-white" style="font-size: 0.9rem;">Kepmen 358/2025</h5>
                                <span class="small" style="opacity: 0.6;">Standar Kepatuhan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center">
                    <div class="display-1 text-white opacity-25">
                        <x-lucide-gauge style="width: 150px; height: 150px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .icon {
            width: 1.25rem;
            height: 1.25rem;
        }

        .bg-soft-primary {
            background-color: rgba(37, 99, 235, 0.1);
        }

        .font-weight-semi-bold {
            font-weight: 600;
        }

        .font-weight-bold {
            font-weight: 700;
        }
    </style>
</div>