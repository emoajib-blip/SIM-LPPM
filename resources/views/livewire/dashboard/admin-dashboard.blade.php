<div>
    <div class="d-flex justify-content-end mb-4">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.dashboard.export-research', ['period' => $selectedYear]) }}"
                class="btn btn-success d-none d-md-inline-flex align-items-center gap-2" data-navigate-ignore="true"
                target="_blank">
                <i class="ti ti-file-spreadsheet fs-2"></i>
                <span>Export Excel</span>
            </a>
            <div class="dropdown">
                <a href="#" class="btn btn-outline-primary dropdown-toggle d-flex align-items-center gap-2"
                    data-bs-toggle="dropdown">
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
        </div>
    </div>


    <div class="row row-deck row-cards">
        <!-- KPI Section: Research -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Penelitian (Total)</div>
                        <div class="ms-auto text-primary bg-primary-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;">
                            <i class="ti ti-flask fs-2"></i>
                        </div>
                    </div>
                    <div class="h1 mb-3 fw-bold">{{ $stats['total_research'] ?? 0 }}</div>
                    <div class="d-flex align-items-center gap-3 small text-muted">
                        @php $resApprOnly = $stats['research_approved'] - ($stats['research_completed'] ?? 0); @endphp
                        @if($resApprOnly > 0)
                            <div><span class="badge bg-success badge-blink me-1"></span>{{ $resApprOnly }} Disetujui</div>
                        @endif
                        @if(($stats['research_completed'] ?? 0) > 0)
                            <div><span class="badge bg-teal me-1"></span>{{ $stats['research_completed'] }} Selesai</div>
                        @endif
                        @if(($stats['research_pending'] ?? 0) > 0)
                            <div><span class="badge bg-warning me-1"></span>{{ $stats['research_pending'] }} Pending</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- KPI Section: PKM -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">PKM (Total)</div>
                        <div class="ms-auto text-azure bg-azure-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;">
                            <i class="ti ti-users-group fs-2"></i>
                        </div>
                    </div>
                    <div class="h1 mb-3 fw-bold">{{ $stats['total_community_service'] ?? 0 }}</div>
                    <div class="d-flex align-items-center gap-3 small text-muted">
                        @php $pkmApprOnly = $stats['community_service_approved'] - ($stats['community_service_completed'] ?? 0); @endphp
                        @if($pkmApprOnly > 0)
                            <div><span class="badge bg-success badge-blink me-1"></span>{{ $pkmApprOnly }} Disetujui</div>
                        @endif
                        @if(($stats['community_service_completed'] ?? 0) > 0)
                            <div><span class="badge bg-teal me-1"></span>{{ $stats['community_service_completed'] }} Selesai
                            </div>
                        @endif
                        @if(($stats['community_service_pending'] ?? 0) > 0)
                            <div><span class="badge bg-warning me-1"></span>{{ $stats['community_service_pending'] }}
                                Pending</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- KPI Section: Approval Rate -->
        <div class="col-sm-6 col-lg-3">
            @php
                $totalProp = $stats['total_research'] + $stats['total_community_service'];
                $totalAppr = $stats['research_approved'] + $stats['community_service_approved'];
                $approvalRate = ($totalProp > 0) ? round(($totalAppr / $totalProp) * 100, 1) : 0;
                $totalBudget = ($stats['research_budget'] ?? 0) + ($stats['pkm_budget'] ?? 0);
            @endphp
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Approval Rate</div>
                        <div class="ms-auto text-green bg-green-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;">
                            <i class="ti ti-chart-bar fs-2"></i>
                        </div>
                    </div>
                    <div class="h1 mb-3 fw-bold">{{ $approvalRate }}%</div>
                    <div class="text-muted small mb-2">{{ $totalAppr }} dari {{ $totalProp }} usulan disetujui</div>
                    <div class="progress progress-sm rounded-pill overflow-hidden">
                        <div class="progress-bar bg-green" style="width: {{ $approvalRate }}%" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KPI Section: Total Budget -->
        <div class="col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Total Anggaran</div>
                        <div class="ms-auto text-purple bg-purple-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px;">
                            <i class="ti ti-cash fs-2"></i>
                        </div>
                    </div>
                    <div class="h2 mb-3 fw-bold">Rp {{ number_format($totalBudget, 0, ',', '.') }}</div>
                    <div class="d-flex flex-column gap-1">
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted d-flex align-items-center"><span
                                    class="badge bg-primary me-2"></span>Penelitian</span>
                            <span class="fw-bold">Rp
                                {{ number_format($stats['research_budget'] ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between small">
                            <span class="text-muted d-flex align-items-center"><span
                                    class="badge bg-azure me-2"></span>PKM</span>
                            <span class="fw-bold">Rp {{ number_format($stats['pkm_budget'] ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @php
                        $resBudget = $stats['research_budget'] ?? 0;
                        $pkmBudget = $stats['pkm_budget'] ?? 0;
                        $totBudget = $resBudget + $pkmBudget;
                        $resPrc = $totBudget > 0 ? ($resBudget / $totBudget * 100) : 0;
                        $pkmPrc = $totBudget > 0 ? ($pkmBudget / $totBudget * 100) : 0;
                    @endphp
                    @if($totBudget > 0)
                        <div class="progress progress-sm mt-3 shadow-none rounded-pill overflow-hidden bg-light">
                            <div class="progress-bar bg-primary" style="width: {{ $resPrc }}%" role="progressbar"
                                aria-label="Penelitian {{ round($resPrc) }}%" title="Penelitian {{ round($resPrc) }}%">
                            </div>
                            <div class="progress-bar bg-azure" style="width: {{ $pkmPrc }}%" role="progressbar"
                                aria-label="PKM {{ round($pkmPrc) }}%" title="PKM {{ round($pkmPrc) }}%"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Process Monitoring Section -->
    <div class="d-flex align-items-center mb-3 mt-4">
        <h2 class="h3 mb-0 fw-bold text-dark d-flex align-items-center gap-2">
            <i class="ti ti-activity text-primary"></i> Pantauan Proses Berjalan
        </h2>
        <div class="ms-auto">
            <span class="badge bg-primary-lt">Tahun {{ $selectedYear }}</span>
        </div>
    </div>

    <!-- Phase 1: Pre-Funding (Draft & Approvals) -->
    <div class="row row-deck row-cards mb-3">
        <!-- Draft Proposals -->
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm overflow-hidden h-100" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Proposal Draft</div>
                        <div class="ms-auto text-secondary bg-secondary-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">
                            <i class="ti ti-edit fs-3"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="h2 mb-0 fw-bold me-2">{{ $processStats['draft_total'] }}</div>
                        <div class="me-auto">
                            <span class="text-muted small d-inline-flex align-items-center leading-none">
                                Belum Diajukan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Waiting Dean Approval -->
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm overflow-hidden h-100" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Persetujuan Dekan</div>
                        <div class="ms-auto text-orange bg-orange-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">
                            <i class="ti ti-clock fs-3"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="h2 mb-0 fw-bold me-2">{{ $processStats['dean_waiting'] }}</div>
                        <div class="me-auto">
                            <span class="text-muted small d-inline-flex align-items-center leading-none">
                                Menunggu Validasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Waiting LPPM Approval -->
        <div class="col-sm-4">
            <div class="card border-0 shadow-sm overflow-hidden h-100" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Persetujuan LPPM</div>
                        <div class="ms-auto text-pink bg-pink-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">
                            <i class="ti ti-shield-check fs-3"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="h2 mb-0 fw-bold me-2">{{ $processStats['lppm_waiting'] }}</div>
                        <div class="me-auto">
                            <span class="text-muted small d-inline-flex align-items-center leading-none">
                                Menunggu Pengesahan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phase 2: Post-Funding & Execution (Review, Monev, Laporan, Luaran) -->
    <div class="row row-deck row-cards mb-4">
        <!-- Review Progress -->
        <div class="col-sm-3">
            <a href="{{ route('admin-lppm.review-monitoring') }}" wire:navigate.hover
                class="text-decoration-none h-100">
                <div class="card border-0 shadow-sm overflow-hidden h-100 card-link card-link-pop"
                    style="border-radius: 12px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="subheader text-muted fw-bold">Status Review</div>
                            <div class="ms-auto text-warning bg-warning-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;">
                                <i class="ti ti-star fs-3"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <div class="h2 mb-0 fw-bold me-2">{{ $processStats['review_completed'] }}</div>
                            <div class="me-auto">
                                <span class="text-muted small d-inline-flex align-items-center leading-none">
                                    / {{ $processStats['review_total'] }}
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm rounded-pill overflow-hidden bg-light">
                            <div class="progress-bar bg-warning" style="width: {{ $processStats['review_progress'] }}%"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Monev Progress -->
        <div class="col-sm-3">
            <a href="{{ route('admin-lppm.monev.index') }}" wire:navigate.hover class="text-decoration-none h-100">
                <div class="card border-0 shadow-sm overflow-hidden h-100 card-link card-link-pop"
                    style="border-radius: 12px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="subheader text-muted fw-bold">Status Monev</div>
                            <div class="ms-auto text-info bg-info-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;">
                                <i class="ti ti-checklist fs-3"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <div class="h2 mb-0 fw-bold me-2">{{ $processStats['monev_completed'] }}</div>
                            <div class="me-auto">
                                <span class="text-muted small d-inline-flex align-items-center leading-none">
                                    / {{ $processStats['monev_total'] }}
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm rounded-pill overflow-hidden bg-light">
                            <div class="progress-bar bg-info" style="width: {{ $processStats['monev_progress'] }}%"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Reporting Progress -->
        <div class="col-sm-3">
            <div class="card border-0 shadow-sm overflow-hidden h-100" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-muted fw-bold">Status Pelaporan</div>
                        <div class="ms-auto text-indigo bg-indigo-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">
                            <i class="ti ti-file-report fs-3"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-baseline mb-2">
                        <div class="h2 mb-0 fw-bold me-2">{{ $processStats['report_submitted'] }}</div>
                        <div class="me-auto">
                            <span class="text-muted small d-inline-flex align-items-center leading-none">
                                / {{ $processStats['report_total'] }}
                            </span>
                        </div>
                    </div>
                    <div class="progress progress-sm rounded-pill overflow-hidden bg-light">
                        <div class="progress-bar bg-indigo" style="width: {{ $processStats['report_progress'] }}%"
                            role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Output Progress -->
        <div class="col-sm-3">
            <a href="#" class="text-decoration-none h-100">
                <div class="card border-0 shadow-sm overflow-hidden h-100 card-link card-link-pop"
                    style="border-radius: 12px;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="subheader text-muted fw-bold">Realisasi Luaran</div>
                            <div class="ms-auto text-teal bg-teal-lt rounded-circle p-2 d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;">
                                <i class="ti ti-target fs-3"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-2">
                            <div class="h2 mb-0 fw-bold me-2">{{ $processStats['output_achieved'] }}</div>
                            <div class="me-auto">
                                <span class="text-muted small d-inline-flex align-items-center leading-none">
                                    / {{ $processStats['output_target'] }} Target
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm rounded-pill overflow-hidden bg-light">
                            <div class="progress-bar bg-teal" style="width: {{ $processStats['output_progress'] }}%"
                                role="progressbar"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row row-cards mt-4">
        <!-- Recent Research Table -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-header bg-transparent border-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar bg-primary-lt text-primary shadow-sm avatar-sm me-3 border-0">
                            <i class="ti ti-flask-2"></i>
                        </div>
                        <h3 class="card-title fw-bold mb-0">Penelitian Terbaru</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-transparent text-muted">
                            <tr>
                                <th class="ps-4">Judul & Pengaju</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-4">Waktu</th>
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
                                            <div class="avatar avatar-xs me-2 border border-2 border-white shadow-sm"
                                                style="background-image: url({{ $research->submitter->profile_picture }})">
                                            </div>
                                            {{ $research->submitter->name }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $color = match ($research->status->value) {
                                                'approved', 'completed' => 'success',
                                                'rejected' => 'danger',
                                                'submitted' => 'warning',
                                                'reviewed' => 'info',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $color }}-lt fw-bold px-2 py-1"><span
                                                class="badge bg-{{ $color }} me-1"></span>{{ $research->status->label() }}</span>
                                    </td>
                                    <td class="text-end pe-4 text-muted small">
                                        {{ $research->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <div class="empty bg-transparent">
                                            <div class="empty-icon text-muted opacity-25">
                                                <i class="ti ti-ghost fs-1"></i>
                                            </div>
                                            <p class="empty-title">Data Kosong</p>
                                            <p class="empty-subtitle text-muted">Belum ada usulan penelitian teraktivasi.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent PKM Table -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-header bg-transparent border-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar bg-azure-lt text-azure shadow-sm avatar-sm me-3 border-0">
                            <i class="ti ti-users-group"></i>
                        </div>
                        <h3 class="card-title fw-bold mb-0">PKM Terbaru</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-transparent text-muted">
                            <tr>
                                <th class="ps-4">Judul & Pengaju</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-4">Waktu</th>
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
                                            <div class="avatar avatar-xs me-2 border border-2 border-white shadow-sm"
                                                style="background-image: url({{ $communityService->submitter->profile_picture }})">
                                            </div>
                                            {{ $communityService->submitter->name }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $color = match ($communityService->status->value) {
                                                'approved', 'completed' => 'success',
                                                'rejected' => 'danger',
                                                'submitted' => 'warning',
                                                'reviewed' => 'info',
                                                default => 'secondary'
                                            };
                                        @endphp
                                        <span class="badge bg-{{ $color }}-lt fw-bold px-2 py-1"><span
                                                class="badge bg-{{ $color }} me-1"></span>{{ $communityService->status->label() }}</span>
                                    </td>
                                    <td class="text-end pe-4 text-muted small">
                                        {{ $communityService->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5">
                                        <div class="empty bg-transparent">
                                            <div class="empty-icon text-muted opacity-25">
                                                <i class="ti ti-ghost fs-1"></i>
                                            </div>
                                            <p class="empty-title">Data Kosong</p>
                                            <p class="empty-subtitle text-muted">Belum ada usulan PKM teraktivasi.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>