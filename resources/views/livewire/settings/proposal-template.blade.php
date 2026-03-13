{{-- Vetted by AI - Manual Review Required by Senior Engineer/Manager --}}
<div>
    {{-- ═══════════════════════════════════════════════════════════════════
    PAGE HEADER
    ═══════════════════════════════════════════════════════════════════ --}}
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <x-lucide-file-text class="icon me-2" /> Template Proposal & Laporan
                    </h2>
                    <div class="text-secondary mt-1">
                        Kelola semua template dokumen yang digunakan dosen untuk menyusun proposal, laporan, dan monev.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════
    PAGE BODY
    ═══════════════════════════════════════════════════════════════════ --}}
    <div class="page-body">
        <div class="container-xl">

            {{-- Info Banner --}}
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <x-lucide-info class="icon me-2 flex-shrink-0" />
                <div>
                    Unggah dokumen <strong>DOC/DOCX/PDF</strong> maksimum 10&nbsp;MB untuk masing‑masing template.
                    Klik tombol <strong>"Unduh"</strong> untuk mengunduh template yang sedang aktif.
                </div>
            </div>

            {{-- ───────────────────────────────────────────────────────────
            SECTION 1: Template Proposal Utama
            ─────────────────────────────────────────────────────────── --}}
            <h3 class="mb-3">
                <x-lucide-file-edit class="icon me-1" /> Template Proposal Utama
            </h3>
            <p class="text-secondary small mb-3">
                Template ini digunakan oleh dosen saat membuat proposal penelitian atau pengabdian masyarakat.
            </p>

            @php
                $proposalTemplates = [
                    [
                        'title' => 'Template Penelitian',
                        'description' => 'Digunakan untuk proposal penelitian.',
                        'media' => 'researchTemplateMedia',
                        'uploadModel' => 'research_template',
                        'saveAction' => 'saveResearchTemplate',
                        'downloadAction' => 'downloadResearchTemplate',
                    ],
                    [
                        'title' => 'Template Pengabdian Masyarakat',
                        'description' => 'Digunakan untuk proposal pengabdian masyarakat.',
                        'media' => 'communityServiceTemplateMedia',
                        'uploadModel' => 'community_service_template',
                        'saveAction' => 'saveCommunityServiceTemplate',
                        'downloadAction' => 'downloadCommunityServiceTemplate',
                    ],
                    [
                        'title' => 'Template Kesanggupan Mitra',
                        'description' => 'Format surat kesanggupan mitra untuk penelitian/pengabdian terapan.',
                        'media' => 'partnerCommitmentTemplateMedia',
                        'uploadModel' => 'partner_commitment_template',
                        'saveAction' => 'savePartnerCommitmentTemplate',
                        'downloadAction' => 'downloadPartnerCommitmentTemplate',
                    ],
                ];
            @endphp

            <div class="row row-cards mb-4">
                @foreach($proposalTemplates as $template)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">{{ $template['title'] }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-muted small mb-3">{{ $template['description'] }}</p>
                                <form wire:submit.prevent="{{ $template['saveAction'] }}">
                                    <label class="form-label">Pilih file untuk diunggah:</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="{{ $template['uploadModel'] }}">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                            <x-lucide-upload class="icon icon-sm me-1" /> Unggah
                                        </button>
                                    </div>
                                    @error($template['uploadModel'])
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </form>

                                @if($this->{$template['media']})
                                    <div class="mt-3 p-2 bg-light rounded d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <x-lucide-file-check class="icon text-success me-2" />
                                            <div>
                                                <div class="fw-medium small">{{ $this->{$template['media']}->file_name }}</div>
                                                <div class="text-secondary" style="font-size: 0.75rem;">
                                                    {{ $this->{$template['media']}->human_readable_size }} &middot;
                                                    diubah {{ $this->{$template['media']}->updated_at->format('d M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        <button wire:click="{{ $template['downloadAction'] }}"
                                            class="btn btn-outline-primary btn-sm ms-2">
                                            <x-lucide-download class="icon icon-sm me-1" /> Unduh
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ───────────────────────────────────────────────────────────
            SECTION 2: Template Laporan Akhir
            ─────────────────────────────────────────────────────────── --}}
            <h3 class="mb-3">
                <x-lucide-clipboard-list class="icon me-1" /> Template Laporan Akhir
            </h3>
            <p class="text-secondary small mb-3">
                Berkas berikut digunakan saat dosen membuat laporan akhir untuk penelitian ataupun
                pengabdian.
            </p>

            @php
                $reportSections = [
                    'Laporan Penelitian' => [
                        ['label' => 'Template Laporan Akhir', 'media' => 'researchFinalReportTemplateMedia', 'uploadModel' => 'research_final_report_template', 'saveAction' => 'saveResearchFinalReportTemplate', 'downloadAction' => 'downloadResearchFinalReportTemplate'],
                    ],
                    'Laporan Pengabdian' => [
                        ['label' => 'Template Laporan Akhir', 'media' => 'communityServiceFinalReportTemplateMedia', 'uploadModel' => 'community_service_final_report_template', 'saveAction' => 'saveCommunityServiceFinalReportTemplate', 'downloadAction' => 'downloadCommunityServiceFinalReportTemplate'],
                    ],
                ];
            @endphp

            <div class="row row-cards mb-4">
                @foreach($reportSections as $sectionTitle => $templates)
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">{{ $sectionTitle }}</h3>
                            </div>
                            <div class="card-body">
                                @foreach($templates as $idx => $template)
                                    <div class="{{ !$loop->last ? 'mb-4 pb-4 border-bottom' : '' }}">
                                        <label class="form-label fw-semibold">{{ $template['label'] }}</label>
                                        <form wire:submit.prevent="{{ $template['saveAction'] }}">
                                            <div class="input-group">
                                                <input type="file" class="form-control"
                                                    wire:model="{{ $template['uploadModel'] }}">
                                                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                                    <x-lucide-upload class="icon icon-sm me-1" /> Unggah
                                                </button>
                                            </div>
                                            @error($template['uploadModel'])
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </form>
                                        @if($this->{$template['media']})
                                            <div
                                                class="mt-2 p-2 bg-light rounded d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <x-lucide-file-check class="icon text-success me-2" />
                                                    <div>
                                                        <div class="fw-medium small">{{ $this->{$template['media']}->file_name }}
                                                        </div>
                                                        <div class="text-secondary" style="font-size: 0.75rem;">
                                                            {{ $this->{$template['media']}->human_readable_size }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <button wire:click="{{ $template['downloadAction'] }}"
                                                    class="btn btn-outline-primary btn-sm ms-2">
                                                    <x-lucide-download class="icon icon-sm me-1" /> Unduh
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ───────────────────────────────────────────────────────────
            SECTION 3: Konfigurasi Persetujuan & Pengesahan
            ─────────────────────────────────────────────────────────── --}}
            <h3 class="mb-3">
                <x-lucide-settings class="icon me-1" /> Konfigurasi Persetujuan & Pengesahan
            </h3>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form wire:submit.prevent="saveApprovalSettings">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Metode Persetujuan Proposal (Dekan &
                                        LPPM)</label>
                                    <select class="form-select" wire:model="proposal_approval_mode">
                                        <option value="digital">Opsi A: Digital (Otomatis di PDF)</option>
                                        <option value="upload">Opsi B: Upload (Scan Lembar Basah)</option>
                                        <option value="both">Keduanya (A dan B)</option>
                                    </select>
                                    <small class="text-muted">Menentukan apakah dosen perlu mengunggah scan lembar
                                        persetujuan atau sistem yang membuat otomatis di PDF.</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Metode Pengesahan Laporan (Akhir)</label>
                                    <select class="form-select" wire:model="report_approval_mode">
                                        <option value="digital">Opsi A: Digital (Otomatis di PDF)</option>
                                        <option value="upload">Opsi B: Upload (Scan Lembar Basah)</option>
                                        <option value="both">Keduanya (A dan B)</option>
                                    </select>
                                    <small class="text-muted">Menentukan apakah dosen perlu mengunggah scan lembar
                                        pengesahan pada laporan akhir.</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Metode Pengesahan Catatan Harian &
                                        Keuangan</label>
                                    <select class="form-select" wire:model="logbook_approval_mode">
                                        <option value="digital">Opsi A: Digital (Otomatis di PDF)</option>
                                        <option value="upload">Opsi B: Upload (Scan Lembar Basah)</option>
                                        <option value="both">Keduanya (A dan B)</option>
                                    </select>
                                    <small class="text-muted">Menentukan apakah dosen perlu mengunggah scan lembar
                                        pengesahan pada catatan harian & keuangan.</small>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                <x-lucide-save class="icon me-1" /> Simpan Konfigurasi
                            </button>
                        </div>
                    </form>

                    {{-- Template Persetujuan Proposal (Muncul jika mode = upload/both) --}}
                    @if(in_array($proposal_approval_mode, ['upload', 'both']))
                        <hr class="my-4">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <h4 class="mb-1">Template Halaman Persetujuan Proposal</h4>
                                <p class="text-secondary small mb-0">
                                    Unggah template Word/PDF kosong agar dosen dapat mengunduhnya saat menyusun proposal.
                                </p>
                            </div>
                            <div class="col-md-7 mt-3 mt-md-0">
                                <form wire:submit.prevent="saveProposalApprovalPageTemplate">
                                    <div class="input-group">
                                        <input type="file" class="form-control"
                                            wire:model="proposal_approval_page_template">
                                        <button type="submit" class="btn btn-azure" wire:loading.attr="disabled">
                                            Simpan
                                        </button>
                                    </div>
                                    @error('proposal_approval_page_template')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </form>
                                @if ($this->proposalApprovalPageTemplateMedia)
                                    <div class="mt-2 p-2 bg-light rounded d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <x-lucide-file-check class="icon text-success me-2" />
                                            <span
                                                class="small fw-medium">{{ $this->proposalApprovalPageTemplateMedia->file_name }}</span>
                                        </div>
                                        <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5)), ['media' => $this->proposalApprovalPageTemplateMedia]) }}"
                                            class="btn btn-outline-primary btn-sm" data-navigate-ignore="true" target="_blank"
                                            download="{{ $this->proposalApprovalPageTemplateMedia->file_name }}">
                                            <x-lucide-download class="icon icon-sm me-1" /> Unduh
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Template Pengesahan Laporan (Muncul jika mode = upload/both) --}}
                    @if(in_array($report_approval_mode, ['upload', 'both']))
                        <hr class="my-4">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <h4 class="mb-1">Template Halaman Pengesahan Laporan</h4>
                                <p class="text-secondary small mb-0">
                                    Unggah template Word/PDF kosong agar dosen dapat mengunduhnya saat menyusun laporan
                                    akhir.
                                </p>
                            </div>
                            <div class="col-md-7 mt-3 mt-md-0">
                                <form wire:submit.prevent="saveReportApprovalPageTemplate">
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="report_approval_page_template">
                                        <button type="submit" class="btn btn-azure" wire:loading.attr="disabled">
                                            Simpan
                                        </button>
                                    </div>
                                    @error('report_approval_page_template')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </form>
                                @if ($this->reportApprovalPageTemplateMedia)
                                    <div class="mt-2 p-2 bg-light rounded d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <x-lucide-file-check class="icon text-success me-2" />
                                            <span
                                                class="small fw-medium">{{ $this->reportApprovalPageTemplateMedia->file_name }}</span>
                                        </div>
                                        <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5)), ['media' => $this->reportApprovalPageTemplateMedia]) }}"
                                            class="btn btn-outline-primary btn-sm" data-navigate-ignore="true" target="_blank"
                                            download="{{ $this->reportApprovalPageTemplateMedia->file_name }}">
                                            <x-lucide-download class="icon icon-sm me-1" /> Unduh
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- ───────────────────────────────────────────────────────────
            SECTION 4: Template Monev Internal
            ─────────────────────────────────────────────────────────── --}}
            <h3 class="mb-3">
                <x-lucide-clipboard-check class="icon me-1" /> Template Monev Internal
            </h3>
            <p class="text-secondary small mb-3">
                Template berikut digunakan untuk keperluan monitoring dan evaluasi internal.
            </p>

            @php
                $monevTemplates = [
                    ['title' => 'Berita Acara Monev', 'media' => 'monevBeritaAcaraTemplateMedia', 'uploadModel' => 'monev_berita_acara_template', 'saveAction' => 'saveMonevBeritaAcaraTemplate', 'downloadAction' => 'downloadMonevBeritaAcaraTemplate'],
                    ['title' => 'Borang Monev', 'media' => 'monevBorangTemplateMedia', 'uploadModel' => 'monev_borang_template', 'saveAction' => 'saveMonevBorangTemplate', 'downloadAction' => 'downloadMonevBorangTemplate'],
                    ['title' => 'Rekap Penilaian Monev', 'media' => 'monevRekapPenilaianTemplateMedia', 'uploadModel' => 'monev_rekap_penilaian_template', 'saveAction' => 'saveMonevRekapPenilaianTemplate', 'downloadAction' => 'downloadMonevRekapPenilaianTemplate'],
                ];
            @endphp

            <div class="row row-cards mb-4">
                @foreach($monevTemplates as $template)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-azure-lt">
                                <h3 class="card-title">{{ $template['title'] }}</h3>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="{{ $template['saveAction'] }}">
                                    <label class="form-label">Unggah Template Baru</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="{{ $template['uploadModel'] }}">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                            <x-lucide-upload class="icon icon-sm me-1" /> Unggah
                                        </button>
                                    </div>
                                    @error($template['uploadModel'])
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </form>
                                @if($this->{$template['media']})
                                    <div class="mt-3 p-2 bg-light rounded d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <x-lucide-file-check class="icon text-success me-2" />
                                            <div>
                                                <div class="fw-medium small">{{ $this->{$template['media']}->file_name }}</div>
                                            </div>
                                        </div>
                                        <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5)), ['media' => $this->{$template['media']}]) }}"
                                            class="btn btn-outline-primary btn-sm" data-navigate-ignore="true" target="_blank"
                                            download="{{ $this->{$template['media']}->file_name }}">
                                            <x-lucide-download class="icon icon-sm me-1" /> Unduh
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>{{-- /.container-xl --}}
    </div>{{-- /.page-body --}}
</div>