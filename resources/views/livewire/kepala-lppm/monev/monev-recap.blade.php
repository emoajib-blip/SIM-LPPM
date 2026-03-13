<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Rekapitulasi Monev Kolektif (Kepala LPPM)
                    </h2>
                    <div class="text-muted mt-1 text-uppercase">Tahun Akademik: {{ $academicYear }} | Semester:
                        {{ $semester }}</div>
                    <div class="mt-2">
                        <span class="badge bg-purple-lt shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 9h.01" /><path d="M11 12h1v4h1" /></svg>
                            Terintegrasi dengan Laporan Institusi Pusat
                        </span>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <button class="btn btn-primary" wire:click="reportToRektor" wire:loading.attr="disabled"
                        onclick="confirm('Apakah Anda yakin ingin melaporkan hasil monev periode ini ke Rektor?') || event.stopImmediatePropagation()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 11l4 4l-4 4m4 -4h-11a4 4 0 0 1 0 -8h1" />
                        </svg>
                        Laporkan ke Rektor
                    </button>
                    <button class="btn btn-teal ms-2" wire:click="approveAll"
                        onclick="confirm('Setujui semua hasil monev yang telah difinalisasi LPPM?') || event.stopImmediatePropagation()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        Setujui Semua
                    </button>
                    <a href="{{ route('export.monev.recap', ['academic_year' => $academicYear, 'semester' => $semester]) }}"
                        class="btn btn-success ms-2" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <path d="M7 11l5 5l5 -5" />
                            <path d="M12 4l0 12" />
                        </svg>
                        Ekspor Excel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                </span>
                                <input type="text" wire:model.live="search" class="form-control"
                                    placeholder="Cari judul/dosen...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="academicYear" class="form-select">
                                @foreach($this->academicYears as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select wire:model.live="semester" class="form-select">
                                <option value="all">Semua Semester</option>
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th>Pengusul & Judul</th>
                                <th>Reviewer</th>
                                <th>Skor</th>
                                <th>Status Akhir</th>
                                <th>Status Approval</th>
                                <th>BA</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->reviews as $review)
                                <tr>
                                    <td>
                                        <div class="font-weight-bold">{{ $review->proposal->submitter->name }}</div>
                                        <div class="text-muted text-truncate" style="max-width: 350px;">
                                            {{ $review->proposal->title }}</div>
                                    </td>
                                    <td>{{ $review->reviewer->name }}</td>
                                    <td>{{ $review->score ?? '-' }}</td>
                                    <td>
                                        @if($review->status)
                                            <span class="badge bg-blue-lt">{{ $review->status }}</span>
                                        @else
                                            <span class="text-muted italic">Belum dinilai</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($review->reported_to_rektor_at)
                                            <span class="badge bg-purple-lt">Dilaporkan ke Rektor</span>
                                        @elseif($review->approved_by_kepala_at)
                                            <span class="badge bg-success-lt">Disetujui Kepala</span>
                                        @elseif($review->finalized_by_lppm_at)
                                            <span class="badge bg-warning-lt">Menunggu Approval</span>
                                        @else
                                            <span class="badge bg-secondary-lt">Proses LPPM</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$review->approved_by_kepala_at)
                                            <button class="btn btn-sm btn-success" wire:click="approveReview('{{ $review->id }}')" 
                                                title="Setujui Monev">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                            </button>
                                        @else
                                            <span class="text-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Tidak ada data monev untuk periode
                                        ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $this->reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</div>