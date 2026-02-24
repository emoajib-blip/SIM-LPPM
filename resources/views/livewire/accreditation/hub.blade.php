<div>
    <x-slot:title>Pusat Data Akreditasi</x-slot:title>

    <div class="row row-cards">
        <!-- Quick Stats / Shortcuts -->
        <div class="col-12">
            <div class="card card-md shadow-sm border-0 bg-primary-lt">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="h1 mb-1 text-primary">Selamat Datang di Hub Akreditasi</h2>
                            <p class="text-secondary opacity-75">Temukan dokumen Borang, Laporan Penelitian, Pengabdian,
                                dan Luaran dalam satu pintu untuk kebutuhan akreditasi BAN-PT/LAM.</p>
                        </div>
                        <div class="col-auto">
                            <div class="btn-list">
                                <a href="#templates" class="btn btn-primary shadow-sm">
                                    <i class="ti ti-file-download me-2"></i> Template Borang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Section -->
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="flex-grow-1">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <i class="ti ti-search text-muted"></i>
                                </span>
                                <input type="text" wire:model.live="form.search"
                                    class="form-control form-control-flush border-bottom"
                                    placeholder="Cari judul penelitian atau nama dosen...">
                            </div>
                        </div>
                        <div style="width: 150px;">
                            <select wire:model.live="form.period" class="form-select border-0 bg-light">
                                <option value="">Semua Tahun</option>
                                @foreach($this->periods as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-vcenter table-nowrap card-table">
                        <thead>
                            <tr>
                                <th>Judul & Peneliti</th>
                                <th>Jenis</th>
                                <th class="text-center">Proposal</th>
                                <th class="text-center">Luaran</th>
                                <th class="text-center">Laporan Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($this->results as $proposal)
                                <tr>
                                    <td>
                                        <div class="font-weight-medium text-wrap" style="max-width: 400px;">
                                            {{ $proposal->title }}</div>
                                        <div class="text-secondary small mt-1">
                                            <i class="ti ti-user me-1"></i> {{ $proposal->submitter->name }}
                                            <span class="mx-1">•</span>
                                            <i class="ti ti-calendar me-1"></i> {{ $proposal->start_year }}
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $proposal->detailable_type === 'App\Models\Research' ? 'bg-blue-lt' : 'bg-green-lt' }} badge-outline">
                                            {{ $proposal->detailable_type === 'App\Models\Research' ? 'Penelitian' : 'Pengabdian' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('proposals.export-pdf', $proposal) }}"
                                            class="btn btn-icon btn-ghost-primary" title="Unduh Proposal"
                                            data-bs-toggle="tooltip" data-navigate-ignore="true">
                                            <i class="ti ti-file-download fs-2"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        @if($proposal->progressReports->count() > 0)
                                            <a href="{{ route('reports.outputs', ['search' => $proposal->title]) }}"
                                                class="btn btn-icon btn-ghost-info" title="Lihat Luaran"
                                                data-bs-toggle="tooltip">
                                                <i class="ti ti-external-link fs-2"></i>
                                            </a>
                                        @else
                                            <span class="text-muted small italic">N/A</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('reports.export-pdf', $proposal) }}"
                                            class="btn btn-icon btn-ghost-success" title="Unduh Laporan Akhir"
                                            data-bs-toggle="tooltip" data-navigate-ignore="true">
                                            <i class="ti ti-certificate fs-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-5 text-center">
                                        <div class="empty">
                                            <div class="empty-icon"><i class="ti ti-search fs-1"></i></div>
                                            <p class="empty-title">Data tidak ditemukan</p>
                                            <p class="empty-subtitle text-secondary">Coba gunakan kata kunci lain atau
                                                periksa filter tahun Anda.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($this->results->hasPages())
                    <div class="card-footer d-flex align-items-center">
                        {{ $this->results->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Templates Section -->
        <div class="col-12" id="templates">
            <h3 class="mb-3 mt-4">Manual & Template Borang Akreditasi</h3>
            <div class="row row-cards">
                @foreach($this->templates as $template)
                    <div class="col-md-4 col-xl-3">
                        <div
                            class="card card-sm shadow-sm border-0 text-center p-3 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="avatar avatar-md bg-blue-lt mb-3">
                                    <i class="ti ti-file-text"></i>
                                </div>
                                <h4 class="mb-1 text-capitalize">{{ $template['name'] }}</h4>
                                <p class="text-secondary small">{{ $template['media']->file_name }}</p>
                            </div>
                            <div class="mt-3">
                                <a href="{{ URL::signedRoute('media.download', ['media' => $template['media']->id]) }}"
                                    class="btn btn-outline-primary w-100 btn-sm" data-navigate-ignore="true">
                                    <i class="ti ti-download me-1"></i> Unduh Template
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>