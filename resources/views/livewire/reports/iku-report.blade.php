<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Rekapitulasi Capaian IKU
                    </h2>
                    <div class="text-muted mt-1">
                        Halaman khusus untuk ekspor laporan IKU (Kepmen 358/M/KEP/2025) ke format PDF dan Excel.
                    </div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <div class="dropdown">
                            <button class="btn btn-white dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <x-lucide-calendar class="icon me-2" />
                                Tahun: {{ $period }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                @foreach($periods as $p)
                                    <button class="dropdown-item @if($p == $period) active @endif"
                                        wire:click="setPeriod('{{ $p }}')">
                                        {{ $p }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{ route('admin.iku.export-pdf', ['period' => $period]) }}" class="btn btn-primary"
                            data-navigate-ignore="true" target="_blank">
                            <x-lucide-printer class="icon me-2" />
                            Ekspor PDF
                        </a>
                        <a href="{{ route('admin.iku.export-excel', ['period' => $period]) }}" class="btn btn-success"
                            data-navigate-ignore="true" target="_blank">
                            <x-lucide-file-spreadsheet class="icon me-2" />
                            Ekspor Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th class="w-1">Kode</th>
                                <th>Indikator Kinerja Utama</th>
                                <th class="text-center">Target</th>
                                <th class="text-center">Capaian</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ikuMetrics as $metric)
                                <tr>
                                    <td class="text-muted">{{ $metric['code'] }}</td>
                                    <td>
                                        <div class="font-weight-medium">{{ $metric['name'] }}</div>
                                        <div class="text-muted small">{{ $metric['description'] }}</div>
                                    </td>
                                    <td class="text-center">{{ number_format($metric['target'], 1) }}%</td>
                                    <td class="text-center">
                                        <div class="font-weight-bold">{{ number_format($metric['achievement'], 1) }}%</div>
                                    </td>
                                    <td class="text-center">
                                        @if($metric['achievement'] >= $metric['target'])
                                            <span class="badge bg-success-lt">Tercapai</span>
                                        @else
                                            <span class="badge bg-warning-lt">Belum Tercapai</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>