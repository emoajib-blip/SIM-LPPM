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
        </div>
    </x-slot:pageActions>

    @if(count($pendingInvitations) > 0)
        <!-- Premium Invitation Alert -->
        <div class="card bg-warning-lt border-warning shadow-sm mb-4 overflow-hidden border-0 border-start border-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="avatar bg-warning text-warning-fg shadow-sm">
                            <i class="ti ti-user-plus fs-2"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h4 class="fw-bold mb-1">Undangan Kolaborasi Baru!</h4>
                        <div class="text-muted">
                            Anda memiliki {{ count($pendingInvitations) }} undangan anggota tim yang perlu dikonfirmasi.
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="list-group list-group-flush border rounded-3 bg-white bg-opacity-50">
                        @foreach($pendingInvitations as $invitation)
                            @php
                                $type = $invitation->detailable_type === 'App\Models\Research' ? 'Penelitian' : 'Pengabdian';
                                $route = $invitation->detailable_type === 'App\Models\Research' ? 'research.proposal.show' : 'community-service.proposal.show';
                                $variant = $invitation->detailable_type === 'App\Models\Research' ? 'primary' : 'azure';
                            @endphp
                            <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <div>
                                    <span class="badge bg-{{ $variant }}-lt mb-1">{{ $type }}</span>
                                    <div class="fw-bold text-dark">{{ Str::limit($invitation->title, 100) }}</div>
                                    <div class="small text-muted mt-1">
                                        <i class="ti ti-user me-1"></i> Ketua: {{ $invitation->submitter->name }}
                                    </div>
                                </div>
                                <a href="{{ route($route, $invitation) }}" class="btn btn-primary btn-sm rounded-pill px-3" wire:navigate.hover>
                                    Konfirmasi <i class="ti ti-chevron-right ms-1"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif



    <!-- Metrics Section -->
    <div class="row row-deck row-cards mb-4">
        <!-- SINTA Score Card -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-top: 3px solid #206bc4;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-primary fw-bold">SINTA Score Overall</div>
                    <div class="ms-auto d-flex gap-1" style="position: relative; z-index: 2;">
                        @if(auth()->user()->identity?->sinta_id)
                            <button wire:click.prevent="syncSinta" wire:loading.attr="disabled" class="btn btn-icon btn-ghost-primary btn-sm rounded-circle" title="Sinkronkan Data SINTA">
                                <i wire:loading.remove class="ti ti-refresh"></i>
                                <div wire:loading class="spinner-border spinner-border-sm" role="status"></div>
                            </button>
                        @endif
                    </div>
                </div>
                <a href="{{ auth()->user()->identity?->sinta_id ? auth()->user()->identity->getSintaUrl() : 'https://sinta.kemdikbud.go.id/authors' }}" target="_blank" class="text-decoration-none d-block">
                    <div class="h1 mb-1 fw-bold text-primary">{{ number_format(auth()->user()->identity?->sinta_score_v3_overall ?? 0, 0, ',', '.') }}</div>
                    <div class="text-muted small">Algoritma SINTA v3 Overall Score</div>
                </a>
            </div>
        </div>
        </div>

        <!-- Scopus H-Index -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-top: 3px solid #0ca678;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-green fw-bold">Scopus H-Index</div>
                        <div class="ms-auto">
                            @php
                                $scopusUrl = auth()->user()->identity?->getScopusUrl() ?? "https://www.scopus.com/results/authorNamesList.uri?st1=" . urlencode(explode(' ', auth()->user()->name)[0] ?? '') . "&st2=" . urlencode(explode(' ', auth()->user()->name)[1] ?? '');
                            @endphp
                            <div class="text-green opacity-50">
                                <i class="ti ti-brand-chrome fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $scopusUrl }}" target="_blank" class="text-decoration-none d-block">
                        <div class="h1 mb-1 fw-bold text-green">{{ auth()->user()->identity?->scopus_h_index ?? 0 }}</div>
                        <div class="text-muted small">Citations per Publication Ratio</div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Google Scholar H-Index -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-top: 3px solid #f59f00;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-yellow fw-bold">Google Scholar H-Index</div>
                        <div class="ms-auto">
                            @php
                                $gsUrl = auth()->user()->identity?->getGoogleScholarUrl() ?? "https://scholar.google.com/scholar?q=" . urlencode(auth()->user()->name);
                            @endphp
                            <div class="text-yellow opacity-50">
                                <i class="ti ti-brand-google fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $gsUrl }}" target="_blank" class="text-decoration-none d-block">
                        <div class="h1 mb-1 fw-bold text-yellow">{{ auth()->user()->identity?->gs_h_index ?? 0 }}</div>
                        <div class="text-muted small">Visualized by Scholar Library</div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Web of Science (WoS) H-Index -->
        <div class="col-sm-6 col-lg-3">
            <div class="card card-stacked glass-card border-0 shadow-sm overflow-hidden" style="border-top: 3px solid #ae3ec9;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="subheader text-purple fw-bold">Web of Science H-Index</div>
                        <div class="ms-auto">
                            @php
                                $wosUrl = auth()->user()->identity?->wos_id ? "https://www.webofscience.com/wos/author/record/" . auth()->user()->identity->wos_id : "https://www.webofscience.com/wos/author/search?search_mode=AuthorResearcherId&researcher_id=" . urlencode(auth()->user()->name);
                            @endphp
                            <div class="text-purple opacity-50">
                                <i class="ti ti-flask fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $wosUrl }}" target="_blank" class="text-decoration-none d-block">
                        <div class="h1 mb-1 fw-bold text-purple">{{ auth()->user()->identity?->wos_h_index ?? 0 }}</div>
                        <div class="text-muted small">Clarivate Analytics WoS</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Productivity Details -->
    <div class="row row-deck row-cards mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm glass-card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary-lt text-primary avatar border-0 shadow-sm"><i class="ti ti-flask"></i></span>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Penelitian</div>
                            <div class="text-muted small">{{ $stats['my_research'] }} Judul (Ketua)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm glass-card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-azure-lt text-azure avatar border-0 shadow-sm"><i class="ti ti-users"></i></span>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Pengabdian</div>
                            <div class="text-muted small">{{ $stats['my_community_service'] }} Judul (Ketua)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm glass-card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-green-lt text-green avatar border-0 shadow-sm"><i class="ti ti-user-plus"></i></span>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Reviewer</div>
                            <div class="text-muted small">0 Penugasan Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm glass-card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-purple-lt text-purple avatar border-0 shadow-sm"><i class="ti ti-chart-dots"></i></span>
                        </div>
                        <div class="col">
                            <div class="fw-bold">Member</div>
                            <div class="text-muted small">{{ $stats['research_as_member'] + $stats['community_service_as_member'] }} Kolaborasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Section -->
    <div class="row row-cards">
        <div class="col-lg-6">
            <div class="card glass-card border-0 shadow-sm">
                <div class="card-header bg-transparent border-0 py-3 d-flex align-items-center">
                    <div class="avatar bg-primary-lt text-primary shadow-sm avatar-sm me-3 border-0">
                        <i class="ti ti-flask-2"></i>
                    </div>
                    <h3 class="card-title fw-bold mb-0">Penelitian Terbaru</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-light-lt">
                            <tr>
                                <th class="ps-4">Judul</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-4">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentResearch as $research)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-truncate" style="max-width: 250px;" title="{{ $research->title }}">
                                            {{ $research->title }}
                                        </div>
                                        <div class="small text-muted mt-1">
                                            Skema: {{ $research->researchScheme?->name ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <x-tabler.badge :color="$research->status->color()" class="fw-normal">
                                            {{ $research->status->label() }}
                                        </x-tabler.badge>
                                    </td>
                                    <td class="text-end pe-4 text-muted small">
                                        {{ $research->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">Belum ada penelitian</td>
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
                    <h3 class="card-title fw-bold mb-0">PKM Terbaru</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover table-borderless">
                        <thead class="bg-light-lt">
                            <tr>
                                <th class="ps-4">Judul</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-4">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentCommunityService as $communityService)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-truncate" style="max-width: 250px;" title="{{ $communityService->title }}">
                                            {{ $communityService->title }}
                                        </div>
                                        <div class="small text-muted mt-1">
                                            Skema: {{ $communityService->communityServiceScheme?->name ?? '-' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <x-tabler.badge :color="$communityService->status->color()" class="fw-normal">
                                            {{ $communityService->status->label() }}
                                        </x-tabler.badge>
                                    </td>
                                    <td class="text-end pe-4 text-muted small">
                                        {{ $communityService->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">Belum ada PKM</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modal Form Update Metrik -->
    <div class="modal modal-blur fade @if($showEditMetricsModal) show @endif" id="modal-edit-metrics" tabindex="-1" role="dialog" aria-hidden="true" style="@if($showEditMetricsModal) display: block; @endif">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content glass-card">
                <form wire:submit="saveMetrics">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold">
                            <i class="ti ti-pencil me-2 text-primary"></i>
                            Sesuaikan Metrik Publikasi
                        </h5>
                        <button type="button" class="btn-close" wire:click="$set('showEditMetricsModal', false)" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info bg-info-lt mb-4 border-0 shadow-sm">
                            <div class="d-flex">
                                <div><i class="ti ti-info-circle me-3 fs-2 text-info"></i></div>
                                <div>
                                    <h4 class="alert-title mb-1">Informasi Sinkronisasi</h4>
                                    <div class="text-secondary">Anda dapat memperbarui skor metrik secara manual untuk penyesuaian/kalibrasi dengan laporan SINTA yang diunggah oleh LPPM.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">SINTA Score Overall</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text bg-transparent text-primary"><i class="ti ti-star"></i></span>
                                    <input type="number" step="0.01" class="form-control" wire:model="sinta_score_v3_overall">
                                </div>
                                @error('sinta_score_v3_overall') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Scopus H-Index</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text bg-transparent text-green"><i class="ti ti-chart-bar"></i></span>
                                    <input type="number" class="form-control" wire:model="scopus_h_index">
                                </div>
                                @error('scopus_h_index') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Google Scholar H-Index</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text bg-transparent text-yellow"><i class="ti ti-book"></i></span>
                                    <input type="number" class="form-control" wire:model="gs_h_index">
                                </div>
                                @error('gs_h_index') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-bold">Web Of Science (WoS)</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text bg-transparent text-purple"><i class="ti ti-flask"></i></span>
                                    <input type="number" class="form-control" wire:model="wos_h_index" placeholder="H-Index">
                                </div>
                                @error('wos_h_index') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="button" class="btn btn-outline-secondary" wire:click="$set('showEditMetricsModal', false)">
                            <i class="ti ti-x me-2"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary shadow-sm" wire:loading.attr="disabled" wire:target="saveMetrics">
                            <span wire:loading.remove wire:target="saveMetrics">
                                <i class="ti ti-device-floppy me-2"></i> Simpan Metrik
                            </span>
                            <span wire:loading wire:target="saveMetrics">
                                <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if($showEditMetricsModal)
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
