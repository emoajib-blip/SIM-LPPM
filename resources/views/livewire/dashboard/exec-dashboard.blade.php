<div>
    <x-slot:pageActions>
        <div class="d-flex align-items-center gap-2">
            <div class="dropdown">
                <a href="#" class="btn btn-outline-primary dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                    <i class="ti ti-calendar-event fs-2"></i>
                    <span>Tahun: {{ $selectedYear }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach ($availableYears as $year)
                        <a href="#" class="dropdown-item {{ $selectedYear == $year ? 'active' : '' }}"
                            wire:click.preserve-scroll="$set('selectedYear', {{ $year }})">
                            {{ $year }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="btn btn-outline-primary dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                    <i class="ti ti-layers-intersect fs-2"></i>
                    <span>Semester: {{ $selectedSemester === 'all' ? 'Semua' : 'Semester ' . ucfirst($selectedSemester) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item {{ $selectedSemester === 'all' ? 'active' : '' }}"
                        wire:click.preserve-scroll="$set('selectedSemester', 'all')">
                        Semua
                    </a>
                    <a href="#" class="dropdown-item {{ $selectedSemester === 'ganjil' ? 'active' : '' }}"
                        wire:click.preserve-scroll="$set('selectedSemester', 'ganjil')">
                        Semester Ganjil (Sep-Feb)
                    </a>
                    <a href="#" class="dropdown-item {{ $selectedSemester === 'genap' ? 'active' : '' }}"
                        wire:click.preserve-scroll="$set('selectedSemester', 'genap')">
                        Semester Genap (Mar-Ags)
                    </a>
                </div>
            </div>
        </div>
    </x-slot:pageActions>



    <!-- Executive KPI Cards -->
    <div class="row row-deck row-cards mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-left: 4px solid #206bc4;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-primary fw-bold">Total Penelitian</div>
                        <div class="ms-auto text-primary opacity-50">
                            <i class="ti ti-microscope fs-2"></i>
                        </div>
                    </div>
                    <div class="h1 mb-1 fw-bold text-primary">{{ $stats['total_research'] ?? 0 }}</div>
                    <div class="text-muted small">Proposal terdaftar periode ini</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-left: 4px solid #4591ed;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-azure fw-bold">Total PKM</div>
                        <div class="ms-auto text-azure opacity-50">
                            <i class="ti ti-users-group fs-2"></i>
                        </div>
                    </div>
                    <div class="h1 mb-1 fw-bold text-azure">{{ $stats['total_community_service'] ?? 0 }}</div>
                    <div class="text-muted small">Proposal pengabdian terdaftar</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-left: 4px solid #0ca678;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-green fw-bold">Penelitian Disetujui</div>
                        <div class="ms-auto">
                            @php
                                $presPrc = ($stats['total_research'] ?? 0) > 0 ? round(($stats['research_approved'] / $stats['total_research']) * 100, 1) : 0;
                            @endphp
                            <span class="badge bg-green-lt">{{ $presPrc }}%</span>
                        </div>
                    </div>
                    <div class="h1 mb-3 fw-bold text-green">{{ $stats['research_approved'] ?? 0 }}</div>
                    <div class="progress progress-sm card-progress mt-auto">
                        <div class="progress-bar bg-green" style="width: {{ $presPrc }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-left: 4px solid #ae3ec9;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-purple fw-bold">PKM Disetujui</div>
                        <div class="ms-auto">
                            @php
                                $pkmPrc = ($stats['total_community_service'] ?? 0) > 0 ? round(($stats['community_service_approved'] / $stats['total_community_service']) * 100, 1) : 0;
                            @endphp
                            <span class="badge bg-purple-lt">{{ $pkmPrc }}%</span>
                        </div>
                    </div>
                    <div class="h1 mb-3 fw-bold text-purple">{{ $stats['community_service_approved'] ?? 0 }}</div>
                    <div class="progress progress-sm card-progress mt-auto">
                        <div class="progress-bar bg-purple" style="width: {{ $pkmPrc }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Periodic Summary Table -->
    <div class="row row-cards mb-4">
        <div class="col-12">
            <div class="card glass-card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar bg-success-lt text-success shadow-sm avatar-sm me-3 border-0">
                            <i class="ti ti-history"></i>
                        </div>
                        <h3 class="card-title fw-bold mb-0">Ringkasan Pengajuan per Periode</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-light-lt">
                            <tr>
                                <th class="ps-4">Tahun / Semester</th>
                                <th class="text-center">Total Res.</th>
                                <th class="text-center">Res. Approved</th>
                                <th class="text-center">Total PKM</th>
                                <th class="text-center">PKM Approved</th>
                                <th class="text-end pe-4">Success Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($periodicSummary as $item)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold">{{ $item['year'] }}/{{ $item['year'] + 1 }}</div>
                                        <div class="text-muted small">Semester {{ $item['semester'] }}</div>
                                    </td>
                                    <td class="text-center fw-bold">{{ $item['research_total'] }}</td>
                                    <td class="text-center">
                                        <div class="badge bg-green-lt p-1 px-2 fw-normal">{{ $item['research_approved'] }}</div>
                                    </td>
                                    <td class="text-center fw-bold">{{ $item['pkm_total'] }}</td>
                                    <td class="text-center">
                                        <div class="badge bg-purple-lt p-1 px-2 fw-normal">{{ $item['pkm_approved'] }}</div>
                                    </td>
                                    <td class="pe-4">
                                        @php
                                            $total = $item['research_total'] + $item['pkm_total'];
                                            $approved = $item['research_approved'] + $item['pkm_approved'];
                                            $rate = $total > 0 ? round(($approved / $total) * 100, 1) : 0;
                                            $color = $rate >= 75 ? 'green' : ($rate >= 50 ? 'azure' : 'orange');
                                        @endphp
                                        <div class="d-flex align-items-center justify-content-end gap-2">
                                            <div class="progress progress-xs w-50">
                                                <div class="progress-bar bg-{{ $color }}" style="width: {{ $rate }}%"></div>
                                            </div>
                                            <span class="fw-bold text-{{ $color }}">{{ $rate }}%</span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Tidak ada data historis tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Approved Proposals -->
    <div class="row row-cards">
        <div class="col-lg-6">
            <div class="card glass-card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 py-3 d-flex align-items-center">
                    <div class="avatar bg-primary-lt text-primary shadow-sm avatar-sm me-3 border-0">
                        <i class="ti ti-flask-2"></i>
                    </div>
                    <h3 class="card-title fw-bold mb-0">Penelitian Strategis (Approved)</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-light-lt">
                            <tr>
                                <th class="ps-4">Judul & Peneliti</th>
                                <th class="text-end pe-4">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentResearch as $research)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-wrap lh-base" title="{{ $research->title }}">
                                            {{ $research->title }}
                                        </div>
                                        <div class="small text-muted d-flex align-items-center mt-1">
                                            <div class="avatar avatar-xs me-2 border-0 shadow-sm bg-primary-lt">{{ $research->submitter?->initials() }}</div>
                                            {{ $research->submitter?->name }}
                                        </div>
                                    </td>
                                    <td class="text-end pe-4 text-muted small">
                                        {{ $research->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-5 text-muted">Belum ada penelitian disetujui</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card glass-card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 py-3 d-flex align-items-center">
                    <div class="avatar bg-azure-lt text-azure shadow-sm avatar-sm me-3 border-0">
                        <i class="ti ti-users-group"></i>
                    </div>
                    <h3 class="card-title fw-bold mb-0">PKM Strategis (Approved)</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-light-lt">
                            <tr>
                                <th class="ps-4">Judul & Pengaju</th>
                                <th class="text-end pe-4">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentCommunityService as $communityService)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-wrap lh-base" title="{{ $communityService->title }}">
                                            {{ $communityService->title }}
                                        </div>
                                        <div class="small text-muted d-flex align-items-center mt-1">
                                            <div class="avatar avatar-xs me-2 border-0 shadow-sm bg-azure-lt">{{ $communityService->submitter?->initials() }}</div>
                                            {{ $communityService->submitter?->name }}
                                        </div>
                                    </td>
                                    <td class="text-end pe-4 text-muted small">
                                        {{ $communityService->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-5 text-muted">Belum ada PKM disetujui</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
