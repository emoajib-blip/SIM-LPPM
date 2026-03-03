<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="align-items-center row g-2">
                <div class="col">
                    <h2 class="page-title">
                        Dashboard Kepala LPPM
                    </h2>
                    <div class="mt-1 text-muted">
                        Selamat datang, {{ auth()->user()->name }} ({{ $roleName }})
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-2">
                        <div class="dropdown">
                            <a href="#" class="btn-outline-primary btn dropdown-toggle" data-bs-toggle="dropdown">
                                <x-lucide-calendar class="me-2 icon" />
                                Tahun: {{ $selectedYear }}
                            </a>
                            <div class="dropdown-menu">
                                @foreach ($availableYears as $year)
                                    <a href="#" class="dropdown-item {{ $selectedYear == $year ? 'active' : '' }}"
                                        wire:click.preserve-scroll="$set('selectedYear', {{ $year }})">
                                        {{ $year }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <!-- Approval Summary -->
            <div class="row row-deck row-cards mb-3">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-primary-lt text-primary avatar border-0 shadow-sm">
                                        <x-lucide-clipboard-check class="icon" />
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $stats['pending_initial_approval'] ?? 0 }} Usulan
                                    </div>
                                    <div class="text-secondary">
                                        Persetujuan Awal Proposal
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-success-lt text-success avatar border-0 shadow-sm">
                                        <x-lucide-check-square class="icon" />
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $stats['pending_final_decision'] ?? 0 }} Usulan
                                    </div>
                                    <div class="text-secondary">
                                        Keputusan Akhir Proposal
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info-lt text-info avatar border-0 shadow-sm">
                                        <x-lucide-file-check class="icon" />
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $stats['final_report_pending'] ?? 0 }} Laporan
                                    </div>
                                    <div class="text-secondary">
                                        Persetujuan Laporan Akhir
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-purple-lt text-purple avatar border-0 shadow-sm">
                                        <x-lucide-award class="icon" />
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $stats['total_outputs'] ?? 0 }} Capaian
                                    </div>
                                    <div class="text-secondary">
                                        Monitoring Luaran
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- General Stats -->
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="subheader">Total Penelitian</div>
                            <div class="mb-3 h1">{{ $stats['total_research'] ?? 0 }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="subheader">Total PKM</div>
                            <div class="mb-3 h1">{{ $stats['total_community_service'] ?? 0 }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="subheader">Penelitian Pending</div>
                            <div class="mb-3 h1">{{ $stats['research_pending'] ?? 0 }}</div>
                            <div class="progress progress-sm">
                                @php
                                    $p = ($stats['total_research'] ?? 0) > 0 ? ($stats['research_pending'] / $stats['total_research']) * 100 : 0;
                                @endphp
                                <div class="bg-warning progress-bar" x-data :style="'width: ' + {{ $p }} + '%'"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body">
                            <div class="subheader">PKM Pending</div>
                            <div class="mb-3 h1">{{ $stats['community_service_pending'] ?? 0 }}</div>
                            <div class="progress progress-sm">
                                @php
                                    $p = ($stats['total_community_service'] ?? 0) > 0 ? ($stats['community_service_pending'] / $stats['total_community_service']) * 100 : 0;
                                @endphp
                                <div class="bg-warning progress-bar" x-data :style="'width: ' + {{ $p }} + '%'"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 row row-cards">
                <!-- Penelitian Terbaru -->
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-header bg-transparent border-0 py-3 d-flex align-items-center">
                            <div class="avatar bg-primary-lt text-primary shadow-sm avatar-sm me-3 border-0">
                                <i class="ti ti-flask-2"></i>
                            </div>
                            <h3 class="card-title fw-bold mb-0">Penelitian Terbaru</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="card-table table table-vcenter table-borderless table-hover">
                                <thead class="bg-transparent text-muted">
                                    <tr>
                                        <th>Judul</th>
                                        <th>Pengaju</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentResearch as $research)
                                        <tr wire:key="res-{{ $research->id }}">
                                            <td>
                                                <div class="text-wrap lh-base">
                                                    {{ $research->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center py-1">
                                                    <span
                                                        class="avatar avatar-sm me-2">{{ $research->submitter?->initials() }}</span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $research->submitter?->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-{{ $research->status->color() }}-lt fw-bold px-2 py-1"><span
                                                        class="badge bg-{{ $research->status->color() }} me-1"></span>{{ $research->status->label() }}</span>
                                            </td>
                                            <td class="text-muted">
                                                {{ $research->created_at->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-4 text-muted text-center">Belum ada penelitian</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- PKM Terbaru -->
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-header bg-transparent border-0 py-3 d-flex align-items-center">
                            <div class="avatar bg-azure-lt text-azure shadow-sm avatar-sm me-3 border-0">
                                <i class="ti ti-users-group"></i>
                            </div>
                            <h3 class="card-title fw-bold mb-0">PKM Terbaru</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="card-table table table-vcenter table-borderless table-hover">
                                <thead class="bg-transparent text-muted">
                                    <tr>
                                        <th>Judul</th>
                                        <th>Pengaju</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentCommunityService as $communityService)
                                        <tr wire:key="pkm-{{ $communityService->id }}">
                                            <td>
                                                <div class="text-wrap lh-base">
                                                    {{ $communityService->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center py-1">
                                                    <span
                                                        class="avatar avatar-sm me-2">{{ $communityService->submitter?->initials() }}</span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">
                                                            {{ $communityService->submitter?->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-{{ $communityService->status->color() }}-lt fw-bold px-2 py-1"><span
                                                        class="badge bg-{{ $communityService->status->color() }} me-1"></span>{{ $communityService->status->label() }}</span>
                                            </td>
                                            <td class="text-muted">
                                                {{ $communityService->created_at->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-4 text-muted text-center">Belum ada PKM</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>