<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Portal Reviewer Monev
                    </h2>
                    <div class="text-muted mt-1 text-uppercase">Tahun Akademik: {{ date('Y') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                </span>
                                <input type="text" wire:model.live="search" class="form-control" placeholder="Cari judul atau pengusul...">
                            </div>
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
                                <th>Jenis</th>
                                <th>Tahun/Sem</th>
                                <th>Status</th>
                                <th>Skor</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->assignments as $review)
                                <tr>
                                    <td>
                                        <div class="font-weight-bold">{{ $review->proposal?->submitter?->name ?? 'N/A' }}</div>
                                        <div class="text-muted text-truncate" style="max-width: 400px;">
                                            {{ $review->proposal?->title ?? 'Tidak ada judul' }}</div>
                                    </td>
                                    <td>
                                        @if ($review->proposal->detailable_type === \App\Models\Research::class)
                                            <span class="badge bg-blue-lt">Penelitian</span>
                                        @else
                                            <span class="badge bg-green-lt">Pengabdian</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $review->academic_year }} / {{ ucfirst($review->semester) }}
                                    </td>
                                    <td>
                                        @if($review->reviewed_at)
                                            <span class="badge bg-blue-lt">{{ str_replace('_', ' ', strtoupper($review->status)) }}</span>
                                        @else
                                            <span class="badge bg-warning-lt">PENDING</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $review->score ?? '-' }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-white" wire:click="selectReview('{{ $review->id }}')">
                                            Evaluasi
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada penugasan monev.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $this->assignments->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Evaluasi -->
    <div class="modal modal-blur fade @if($showReviewModal) show @endif"
        style="@if($showReviewModal) display: block; @endif" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                @if ($selectedReview)
                    <div class="modal-header border-0 pb-0">
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar avatar-sm bg-blue-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 14l2 2l4 -4" /></svg>
                            </span>
                            <div>
                                <h5 class="modal-title font-weight-bold fs-2 mb-0">Evaluasi Monev</h5>
                                <div class="text-muted small">ID Penugasan: #{{ substr($selectedReview->id, 0, 8) }}</div>
                            </div>
                        </div>
                        <button type="button" class="btn-close" wire:click="$set('showReviewModal', false)"></button>
                    </div>
                    <div class="modal-body pt-3">
                        <div class="row g-4">
                            <!-- Kolom Kiri: Informasi Referensi & Konteks -->
                            <div class="col-md-5">
                                <div class="sticky-top" style="top: 10px;">
                                    <div class="card border-0 shadow-sm mb-3">
                                        <div class="card-body p-4 bg-light-lt rounded-3">
                                            <div class="mb-4">
                                                <div class="text-uppercase text-muted fw-bold small mb-2 d-flex align-items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                                                    Detail Proposal
                                                </div>
                                                <h3 class="fw-bold text-dark lh-base mb-3" style="font-size: 1.1rem;">
                                                    {{ $selectedReview->proposal?->title ?? '-' }}
                                                </h3>
                                                <div class="d-flex flex-wrap gap-2 mb-0">
                                                    <span class="badge bg-primary-lt px-2 py-1">
                                                        {{ $selectedReview->proposal?->detailable_type === \App\Models\Research::class ? 'Penelitian' : 'Pengabdian' }}
                                                    </span>
                                                    <span class="badge bg-azure-lt px-2 py-1">
                                                        TA: {{ $selectedReview->academic_year }}
                                                    </span>
                                                    <span class="badge bg-indigo-lt px-2 py-1">
                                                        Sem: {{ ucfirst($selectedReview->semester) }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="hr-text hr-text-left mt-4 mb-3">Identitas Peneliti/Pelaksana</div>
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="avatar avatar-md rounded-circle bg-blue text-white fw-bold">
                                                    {{ substr($selectedReview->proposal?->submitter?->name, 0, 1) }}
                                                </span>
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $selectedReview->proposal?->submitter?->name ?? 'N/A' }}</div>
                                                    <div class="text-muted small">
                                                        NIDN: {{ $selectedReview->proposal?->submitter?->identity?->identity_id ?? '-' }}<br>
                                                        Jabatan: {{ $selectedReview->proposal?->submitter?->identity?->functional_position ?? '-' }}
                                                    </div>
                                                </div>
                                            </div>

                                            @if($selectedReview->proposal->detailable_type === \App\Models\Research::class)
                                                <div class="mt-3">
                                                    <div class="text-muted small fw-bold">Bidang/Skema:</div>
                                                    <div class="small">{{ $selectedReview->proposal?->focusArea?->name ?? 'General' }} / {{ $selectedReview->proposal?->researchScheme?->name ?? '-' }}</div>
                                                </div>
                                                @if($selectedReview->proposal?->partners->isNotEmpty())
                                                    <div class="mt-3">
                                                        <div class="text-muted small fw-bold">Mitra:</div>
                                                        <div class="small">{{ $selectedReview->proposal?->partners->first()?->name }} ({{ $selectedReview->proposal?->partners->first()?->institution }})</div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="mt-3">
                                                    <div class="text-muted small fw-bold">Anggota Tim:</div>
                                                    <div class="small">
                                                        @foreach($selectedReview->proposal?->teamMembers->take(1) as $member)
                                                            {{ $member->name }} (NIDN: {{ $member->identity?->identity_id ?? '-' }})
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="text-muted small fw-bold">Dana Disetujui:</div>
                                                    <div class="fw-bold text-green">Rp {{ number_format($selectedReview->proposal?->sbk_value ?? 0, 0, ',', '.') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Section Hasil Laporan Akhir --}}
                                    <div class="card border-purple shadow-sm overflow-hidden">
                                        <div class="card-status-start bg-purple"></div>
                                        <div class="card-header bg-purple-lt py-3">
                                            <h3 class="card-title text-purple d-flex align-items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                                Dokumen Laporan Akhir
                                            </h3>
                                        </div>
                                        <div class="card-body p-4">
                                            @if($selectedReview->proposal?->progressReports->isNotEmpty())
                                                @php $finalDoc = $selectedReview->proposal->progressReports->first(); @endphp
                                                <div class="mb-4">
                                                    <div class="text-muted small fw-bold mb-2">Ringkasan Hasil:</div>
                                                    <div class="p-3 rounded-2 bg-white border border-purple-lt italic text-dark" style="font-size: 0.95rem; line-height: 1.6;">
                                                        "{{ $finalDoc->summary_update }}"
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    @if($finalDoc && $finalDoc->hasMedia('substance_file'))
                                                        <div class="col-12">
                                                            <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(10), ['media' => $finalDoc->getFirstMedia('substance_file')]) }}" 
                                                               class="btn btn-purple w-100 py-2 d-flex align-items-center justify-content-center gap-2" target="_blank">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 17v-6" /><path d="M9.5 14.5l2.5 2.5l2.5 -2.5" /></svg>
                                                                Dokumentasi Laporan Utama
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if($finalDoc->hasMedia('presentation_file'))
                                                        <div class="col-6">
                                                            <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(10), ['media' => $finalDoc->getFirstMedia('presentation_file')]) }}" 
                                                               class="btn btn-outline-indigo w-100 btn-sm" target="_blank">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
                                                                PPT / Video
                                                            </a>
                                                        </div>
                                                    @endif
                                                    @if($finalDoc->hasMedia('realization_file'))
                                                        <div class="col-6">
                                                            <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(10), ['media' => $finalDoc->getFirstMedia('realization_file')]) }}" 
                                                               class="btn btn-outline-azure w-100 btn-sm" target="_blank">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v14a1 1 0 0 0 1 1h10a1 1 0 0 0 1 -1v-3" /><path d="M10 12l4 0l-4 0" /><path d="M20 12l-6 0l0 0" /><path d="M20 12l-3 -3" /><path d="M20 12l-3 3" /></svg>
                                                                Anggaran
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="text-center py-4 bg-light rounded-3 border-dashed border-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg text-muted mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v4" /><path d="M12 16h.01" /><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /></svg>
                                                    <div class="text-muted small">Laporan akhir belum diunggah pengusul.</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Form Evaluasi Reviewer -->
                            <div class="col-md-7">
                                <div class="card border-0 bg-white p-2">
                                    <div class="mb-4 d-flex align-items-center gap-2 border-bottom pb-3">
                                        <div class="bg-blue text-white rounded-2 p-2 shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                        </div>
                                        <h4 class="fw-bold mb-0" style="letter-spacing: -0.5px;">
                                            @if($selectedReview->proposal->detailable_type === \App\Models\Research::class)
                                                Borang Monev Internal Penelitian
                                            @else
                                                Borang Monev Pengabdian Masyarakat
                                            @endif
                                        </h4>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <div class="card p-3 border-blue-lt bg-blue-lt">
                                                <label class="form-label font-weight-bold text-blue mb-2 d-flex align-items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-7 -4z" /></svg>
                                                    Skor Evaluasi
                                                </label>
                                                <div class="input-group input-group-flat shadow-sm rounded-3 overflow-hidden">
                                                    <input type="number" class="form-control form-control-lg border-0 fw-bold fs-2" 
                                                           wire:model="score" min="0" max="100" style="height: 60px;">
                                                    <span class="input-group-text bg-blue text-white border-0 fw-bold px-3">/ 100</span>
                                                </div>
                                                @error('score') <span class="text-danger small mt-1 animate__animated animate__fadeIn">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card p-3 border-green-lt bg-green-lt">
                                                <label class="form-label font-weight-bold text-green mb-2 d-flex align-items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
                                                    Status Rekomendasi
                                                </label>
                                                <select class="form-select form-select-lg border-0 fw-bold rounded-3 shadow-sm text-dark h-60px" 
                                                        wire:model="status" style="height: 60px;">
                                                    <option value="sangat_baik">🌟 Sangat Baik</option>
                                                    <option value="baik">✅ Baik</option>
                                                    <option value="cukup">⚠️ Cukup</option>
                                                </select>
                                                @error('status') <span class="text-danger small mt-1 animate__animated animate__fadeIn">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label font-weight-bold d-flex align-items-center gap-2 mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 18h10a2 2 0 0 1 2 2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2a2 2 0 0 1 2 -2z" /><path d="M9 18v-14a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v14" /><path d="M3 12h18" /></svg>
                                            Berita Acara Monev (Sudah TTD)
                                        </label>
                                        <div class="card border-dashed p-2">
                                            <div class="row align-items-center g-2">
                                                <div class="col">
                                                    <input type="file" class="form-control border-0 shadow-none bg-transparent" wire:model="berita_acara">
                                                </div>
                                                @if($selectedReview->hasMedia('berita_acara'))
                                                    <div class="col-auto">
                                                        <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(10), ['media' => $selectedReview->getFirstMedia('berita_acara')]) }}" 
                                                           class="btn btn-icon btn-outline-info shadow-sm" target="_blank" title="Unduh Berita Acara">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M10 11l2 2l2 -2" /><path d="M12 4l0 9" /></svg>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @error('berita_acara') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                                    </div>

                                    @if($selectedReview->proposal->detailable_type === \App\Models\Research::class)
                                        <div class="row g-4">
                                            @php
                                                $criteria = [
                                                    'luaran_wajib' => '1. Kemajuan ketercapaian luaran wajib yang dijanjikan',
                                                    'luaran_tambahan' => '2. Kemajuan ketercapaian luaran tambahan yang dijanjikan (jika ada)',
                                                    'kesesuaian_usulan' => '3. Kesesuaian penelitian dengan usulan',
                                                    'keberlanjutan_hasil' => '4. Potensi keberlanjutan hasil Penelitian',
                                                    'integrasi_pendidikan' => '5. Integrasi terhadap pendidikan atau mata kuliah',
                                                ];
                                            @endphp
                                            @foreach($criteria as $key => $label)
                                                <div class="col-12">
                                                    <div class="form-group border rounded-3 p-3 bg-white shadow-sm transition-focus">
                                                        <label class="form-label fw-bold text-dark mb-2">{{ $label }}</label>
                                                        <textarea class="form-control border-0 p-0 shadow-none" 
                                                                wire:model="borang_data.{{ $key }}" style="height: 80px; resize: none;" 
                                                                placeholder="Berikan komentar reviewer..."></textarea>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="row g-4">
                                            @php
                                                $serviceCriteria = [
                                                    'publikasi_jurnal' => [
                                                        'title' => '1. Publikasi pada Jurnal/ Prosiding',
                                                        'options' => [
                                                            '1' => 'Tidak ada draft artikel',
                                                            '2' => 'Ada draft artikel',
                                                            '3' => 'Ada bukti terkirim',
                                                            '4' => 'Ada bukti diterima/direview',
                                                        ]
                                                    ],
                                                    'publikasi_tambahan' => [
                                                        'title' => '2. Artikel publikasi pada Jurnal/Prosiding (Luaran Tambahan)',
                                                        'options' => [
                                                            '1' => 'Tidak ada draft artikel',
                                                            '2' => 'Ada draft artikel',
                                                            '3' => 'Ada bukti terkirim',
                                                            '4' => 'Ada bukti diterima/direview',
                                                            '5' => 'Terpublikasi prosiding/jurnal ISSN OJS',
                                                            '6' => 'Terpublikasi nasional terindeks Sinta atau Internasional',
                                                        ]
                                                    ],
                                                    'keberdayaan_mitra' => [
                                                        'title' => '3. Peningkatan level keberdayaan mitra (omzet, kuantitas/kualitas, ketrampilan)',
                                                        'options' => [
                                                            '1' => 'Tidak ada (tim pelaksana tidak hadir dalam monev lapangan)',
                                                            '2' => 'Tidak memuaskan',
                                                            '3' => 'Cukup memuaskan',
                                                            '4' => 'Memuaskan',
                                                            '5' => 'Sangat memuaskan',
                                                        ]
                                                    ],
                                                    'hki_produk' => [
                                                        'title' => '4. Jasa, model, rekayasa sosial, buku, sistem, produk/barang HKI',
                                                        'options' => [
                                                            '1' => 'Tidak ada',
                                                            '2' => 'Draft',
                                                            '3' => 'Produk/terdaftar',
                                                            '4' => 'Penerapan/granted',
                                                        ]
                                                    ],
                                                    'video_kegiatan' => [
                                                        'title' => '5. Video Kegiatan (Youtube)',
                                                        'options' => [
                                                            '1' => 'Tidak ada video',
                                                            '2' => 'Kualitas kurang, tidak ada identitas sumber dana',
                                                            '3' => 'Kualitas kurang, sudah ada identitas pemberi sumber dana',
                                                            '4' => 'Kualitas bagus, tidak ada identitas pemberi dana',
                                                            '5' => 'Kualitas bagus, sudah ada identitas pemberi dana',
                                                        ]
                                                    ],
                                                    'rekognisi_mbkm' => [
                                                        'title' => '6. Terdapat rekognisi mahasiswa dalam MBKM',
                                                        'options' => [
                                                            '1' => 'Tidak ada proses rekognisi mahasiswa',
                                                            '2' => 'Ada rekognisi mahasiswa',
                                                            '3' => 'Ada rekognisi didukung sistem PT',
                                                        ]
                                                    ],
                                                ];
                                            @endphp
                                            @foreach($serviceCriteria as $key => $data)
                                                <div class="col-12">
                                                    <div class="form-group border rounded-3 p-3 bg-white shadow-sm transition-focus">
                                                        <label class="form-label fw-bold text-dark mb-3">{{ $data['title'] }}</label>
                                                        <div class="d-flex flex-column gap-2">
                                                            @foreach($data['options'] as $value => $label)
                                                                <label class="form-check cursor-pointer mb-0 p-2 rounded-2 border-transparent transition-all hover-bg-light">
                                                                    <input class="form-check-input" type="radio" value="{{ $value }}" wire:model="borang_data.{{ $key }}">
                                                                    <span class="form-check-label small">{{ $label }}</span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <div class="form-group border border-warning rounded-3 p-3 bg-warning-lt shadow-sm">
                                            <label class="form-label fw-bold text-warning-dark mb-2 d-flex align-items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" /><path d="M12 12l0 .01" /><path d="M12 9l0 3" /></svg>
                                                Komentar Penutup / Rekomendasi
                                            </label>
                                            <textarea class="form-control border-0 p-0 shadow-none bg-transparent text-dark" 
                                                      wire:model="notes" style="height: 100px; resize: none;" 
                                                      placeholder="Berikan saran perbaikan atau catatan penting..."></textarea>
                                            @error('notes') <span class="text-danger small mt-1">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 bg-light-lt rounded-bottom-4 p-4 mt-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <div class="d-none d-md-block">
                                @if($selectedReview)
                                    <a href="{{ route('export.monev.ba', $selectedReview->id) }}" 
                                       class="btn btn-white shadow-sm border-2 px-4 py-2 fw-bold" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                        Cetak Berita Acara
                                    </a>
                                @endif
                            </div>
                            <div class="d-flex gap-2 w-100 w-md-auto ms-auto">
                                <button type="button" class="btn btn-link link-secondary fw-bold px-4" 
                                        wire:click="$set('showReviewModal', false)">Batal</button>
                                <button type="button" class="btn btn-success shadow-sm px-5 py-2 fw-bold" 
                                        wire:click="saveReview" wire:loading.attr="disabled" style="min-width: 200px;">
                                    <span wire:loading.remove>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-md me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-4 0l0 -4" /></svg>
                                        Simpan Evaluasi
                                    </span>
                                    <span wire:loading>
                                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                        Menyimpan...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if($showReviewModal)
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
