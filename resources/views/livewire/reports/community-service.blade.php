<div>
    <x-slot:pageHeader>
        {{-- Header empty as requested --}}
    </x-slot:pageHeader>


    <x-slot:pageActions>
        <div class="btn-list">
            <div class="dropdown">
                <button class="btn btn-white dropdown-toggle shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-calendar-event me-2 text-success"></i>
                    {{ __('Periode') }}: <span class="fw-bold ms-1">{{ $period }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                    <li class="dropdown-header">{{ __('Pilih Tahun Anggaran') }}</li>
                    @foreach ($periods as $availablePeriod)
                        <li>
                            <button type="button" class="dropdown-item d-flex justify-content-between align-items-center {{ $period === $availablePeriod ? 'active' : '' }}"
                                wire:click="setPeriod('{{ $availablePeriod }}')">
                                {{ $availablePeriod }}
                                @if($period === $availablePeriod) <i class="ti ti-check ms-2"></i> @endif
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="hr-vertical mx-1 d-none d-md-block"></div>
            <button onclick="Livewire.dispatch('report-export-excel')" class="btn btn-outline-success shadow-sm" wire:loading.attr="disabled">
                <i class="ti ti-table me-2"></i>
                {{ __('Unduh Excel') }}
            </button>
            <button onclick="Livewire.dispatch('report-export-pdf')" class="btn btn-outline-danger shadow-sm" wire:loading.attr="disabled">
                <i class="ti ti-file-type-pdf me-2"></i>
                {{ __('Unduh PDF') }}
            </button>
        </div>
    </x-slot:pageActions>

    <!-- KPI Cards with Visual Enhancements -->
    <div class="mb-4 row row-deck">
        @foreach ($summary as $card)
            <div class="col-sm-6 col-xl-4">
                <div class="card card-stacked shadow-sm border-0">
                    <div class="d-flex align-items-center gap-3 card-body">
                        <div class="p-3 bg-opacity-10 {{ str_replace('bg-', 'bg-opacity-10 text-', explode(' ', $card['variant'])[0]) }} rounded-3 d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                            <i class="ti ti-{{ $card['icon'] }} fs-1"></i>
                        </div>
                        <div>
                            <div class="text-secondary small fw-medium mb-1">{{ $card['label'] }}</div>
                            <h2 class="mb-0 fw-bold">{{ $card['value'] }}</h2>
                        </div>
                    </div>
                    <div class="progress progress-xs card-progress">
                        <div class="progress-bar {{ explode(' ', $card['variant'])[0] }}" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <!-- Analytics Section 1: Schemes, Focus Areas, Faculties -->
    <div class="row row-cards mb-3">
        <!-- Distribution by Scheme -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Distribusi Skema PKM') }}</h3>
                </div>
                <div class="p-0 card-body overflow-auto" style="max-height: 300px;">
                    <table class="card-table table table-vcenter">
                        <thead>
                            <tr>
                                <th>{{ __('Skema') }}</th>
                                <th class="text-center">{{ __('Jumlah') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schemes as $scheme)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $scheme['name'] }}</div>
                                        <div class="text-muted small">Rp {{ number_format($scheme['budget'], 0, ',', '.') }}</div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-blue-lt">{{ $scheme['count'] }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-4 text-center text-muted">
                                        {{ __('Tidak ada data skema') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Distribution by Focus Area -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Bidang Fokus PKM') }}</h3>
                </div>
                <div class="p-0 card-body overflow-auto" style="max-height: 300px;">
                    <table class="card-table table table-vcenter">
                        <thead>
                            <tr>
                                <th>{{ __('Bidang Fokus') }}</th>
                                <th class="text-center">{{ __('Prosentase') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalPkm = $schemes->sum('count'); @endphp
                            @forelse ($focusAreas as $area)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $area['name'] }}</div>
                                        <div class="text-muted small">{{ $area['count'] }} {{ __('PKM') }}</div>
                                    </td>
                                    <td class="text-center">
                                        @php $percent = $totalPkm > 0 ? round(($area['count'] / $totalPkm) * 100) : 0; @endphp
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="progress progress-xs flex-fill" style="min-width: 50px;">
                                                <div class="progress-bar bg-primary" style="width: {{ $percent }}%"></div>
                                            </div>
                                            <span class="small text-muted">{{ $percent }}%</span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-4 text-center text-muted">
                                        {{ __('Tidak ada data bidang fokus') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Productivity by Faculty -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Produktivitas Fakultas (PKM)') }}</h3>
                </div>
                <div class="p-0 card-body overflow-auto" style="max-height: 300px;">
                    <table class="card-table table table-vcenter">
                        <thead>
                            <tr>
                                <th>{{ __('Fakultas') }}</th>
                                <th class="text-center">{{ __('Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faculties as $faculty)
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-truncate" style="max-width: 180px;">{{ $faculty['name'] }}</div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-green-lt">{{ $faculty['count'] }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-4 text-center text-muted">
                                        {{ __('Tidak ada data fakultas') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics Section 2: Output Analytics -->
    <div class="row row-cards mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Analitik Luaran PKM') }} — {{ $period }}</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($outputStats as $stat)
                            <div class="col-sm-6 col-md-4 col-lg-2">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    {{ $stat['category'] }}
                                                </div>
                                                <div class="text-secondary small">
                                                    {{ $stat['count'] }} {{ __('Total') }}
                                                </div>
                                                <div class="mt-1">
                                                    <span class="text-success fw-bold">{{ $stat['published'] }}</span>
                                                    <span class="text-muted small"> {{ __('Terbit') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-4 text-muted">
                                {{ __('Belum ada luaran yang dilaporkan pada periode ini.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent PKM Section -->
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Daftar Seluruh PKM') }} — {{ $period }}</h3>
                </div>
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="card-table table table-vcenter text-nowrap">
                            <thead>
                                <tr>
                                    <th class="w-1">No</th>
                                    <th>{{ __('Judul & Ketua') }}</th>
                                    <th>{{ __('Fakultas / Prodi') }}</th>
                                    <th>{{ __('Skema & Status') }}</th>
                                    <th>{{ __('Anggaran (Rp)') }}</th>
                                    <th class="w-1 text-center">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($proposals as $index => $pkm)
                                    <tr>
                                        <td>{{ ($proposals->currentPage() - 1) * $proposals->perPage() + $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-sm avatar-rounded me-2" style="background-image: url({{ $pkm->submitter->profile_picture }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium text-wrap" style="max-width: 400px;" title="{{ $pkm->title }}">
                                                        <a href="{{ route('community-service.proposal.show', $pkm) }}" class="text-reset" wire:navigate.hover>
                                                            {{ $pkm->title }}
                                                        </a>
                                                    </div>
                                                    <div class="text-muted small">
                                                        {{ $pkm->submitter->name }} ({{ $pkm->submitter->identity->nidn ?? '-' }})
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="small fw-bold">{{ $pkm->submitter->identity->faculty->name ?? '-' }}</div>
                                            <div class="small text-muted">{{ $pkm->submitter->identity->studyProgram->name ?? '-' }}</div>
                                        </td>
                                        <td>
                                            <div class="text-muted small mb-1">
                                                {{ $pkm->researchScheme->name ?? '-' }}
                                            </div>
                                            <x-tabler.badge :color="$pkm->status->color()">
                                                {{ $pkm->status->label() }}
                                            </x-tabler.badge>
                                        </td>
                                        <td class="text-end">
                                            <div class="fw-bold">
                                                {{ number_format($pkm->sbk_value, 0, ',', '.') }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('community-service.proposal.show', $pkm) }}" 
                                               class="btn btn-sm btn-icon btn-outline-info" 
                                               title="Lihat Detail Detail" 
                                               wire:navigate.hover>
                                                <x-lucide-eye class="icon" />
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-5 text-center text-muted">
                                            {{ __('Belum ada data PKM untuk periode ini.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($proposals->hasPages())
                    <div class="card-footer d-flex align-items-center">
                        {{ $proposals->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
