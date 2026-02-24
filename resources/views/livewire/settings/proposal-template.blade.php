<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Template Proposal
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            {{-- show a global note about file requirements --}}
            <div class="alert alert-info">
                Unggah dokumen <strong>DOC/DOCX/PDF</strong> maksimum 10&nbsp;MB untuk masing‑masing template.
            </div>

            <p class="text-secondary small mb-4">
                Halaman ini memungkinkan admin LPPM mengganti berkas template standar yang
                digunakan oleh dosen ketika membuat proposal dan laporan. Nama file di bawah akan
                muncul sebagai link unduhan sehingga dosen bisa membuka atau menyalin formatnya.
                Jika belum ada berkas, upload terlebih dahulu di kolom yang tersedia.
            </p>

            @php
                $proposalTemplates = [
                    [
                        'title' => 'Template Penelitian',
                        'media' => 'researchTemplateMedia',
                        'uploadModel' => 'research_template',
                        'saveAction' => 'saveResearchTemplate',
                        'downloadAction' => 'downloadResearchTemplate',
                    ],
                    [
                        'title' => 'Template Pengabdian Masyarakat',
                        'media' => 'communityServiceTemplateMedia',
                        'uploadModel' => 'community_service_template',
                        'saveAction' => 'saveCommunityServiceTemplate',
                        'downloadAction' => 'downloadCommunityServiceTemplate',
                    ],
                ];
            @endphp

            <div class="row row-cards">
                @foreach($proposalTemplates as $template)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $template['title'] }}</h3>
                                <p class="text-muted small mb-0">
                                    {{ $template['title'] == 'Template Penelitian' ? 'Digunakan untuk proposal penelitian.' : 'Digunakan untuk proposal pengabdian masyarakat.' }}
                                </p>
                            </div>
                            <div class="card-body">
                                <form wire:submit.prevent="{{ $template['saveAction'] }}">
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="{{ $template['uploadModel'] }}">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Unggah</button>
                                    </div>
                                    @error($template['uploadModel'])<span class="text-danger">{{ $message }}</span>@enderror
                                </form>

                                @if($this->{$template['media']})
                                    <div class="mt-2">
                                        <button wire:click="{{ $template['downloadAction'] }}" class="btn btn-link btn-sm p-0">
                                            <x-lucide-download class="icon icon-sm" />
                                            {{ $this->{$template['media']}->file_name }}
                                        </button>
                                        <div class="text-secondary small">
                                            {{ $this->{$template['media']}->human_readable_size }} &middot; terakhir diubah
                                            {{ $this->{$template['media']}->updated_at->format('Y-m-d') }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row row-cards mt-3">
                <div class="col-12">
                    <h2 class="page-title mb-3">Template Laporan (Kemajuan & Akhir)</h2>
                    <p class="text-secondary small mb-4">
                        Empat berkas berikut digunakan saat dosen membuat laporan kemajuan dan akhir
                        untuk penelitian ataupun pengabdian; klik nama file untuk mengunduh template
                        yang sedang aktif.
                    </p>
                </div>
                @php
                    $reportSections = [
                        'Laporan Penelitian' => [
                            ['label' => 'Template Laporan Kemajuan', 'media' => 'researchProgressReportTemplateMedia', 'uploadModel' => 'research_progress_report_template', 'saveAction' => 'saveResearchProgressReportTemplate', 'downloadAction' => 'downloadResearchProgressReportTemplate'],
                            ['label' => 'Template Laporan Akhir', 'media' => 'researchFinalReportTemplateMedia', 'uploadModel' => 'research_final_report_template', 'saveAction' => 'saveResearchFinalReportTemplate', 'downloadAction' => 'downloadResearchFinalReportTemplate'],
                        ],
                        'Laporan Pengabdian' => [
                            ['label' => 'Template Laporan Kemajuan', 'media' => 'communityServiceProgressReportTemplateMedia', 'uploadModel' => 'community_service_progress_report_template', 'saveAction' => 'saveCommunityServiceProgressReportTemplate', 'downloadAction' => 'downloadCommunityServiceProgressReportTemplate'],
                            ['label' => 'Template Laporan Akhir', 'media' => 'communityServiceFinalReportTemplateMedia', 'uploadModel' => 'community_service_final_report_template', 'saveAction' => 'saveCommunityServiceFinalReportTemplate', 'downloadAction' => 'downloadCommunityServiceFinalReportTemplate'],
                        ],
                    ];
                @endphp

                @foreach($reportSections as $sectionTitle => $templates)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $sectionTitle }}</h3>
                            </div>
                            <div class="card-body">
                                @foreach($templates as $template)
                                    <div class="mb-4">
                                        <form wire:submit.prevent="{{ $template['saveAction'] }}">
                                            <label class="form-label">{{ $template['label'] }}</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" wire:model="{{ $template['uploadModel'] }}">
                                            </div>
                                            @error($template['uploadModel']) <span class="text-danger">{{ $message }}</span> @enderror
                                        </form>
                                        @if($this->{$template['media']})
                                            <div class="mt-2">
                                                <button wire:click="{{ $template['downloadAction'] }}" class="btn btn-link btn-sm p-0">
                                                    <x-lucide-download class="icon icon-sm" />
                                                    {{ $this->{$template['media']}->file_name }}
                                                    <small class="text-muted">({{ $this->{$template['media']}->human_readable_size }})</small>
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

            <div class="row row-cards mt-3">
                <div class="col-12">
                    <h2 class="page-title mb-3">Konfigurasi Persetujuan & Pengesahan</h2>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="saveApprovalSettings">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Metode Persetujuan Proposal (Dekan & LPPM)</label>
                                            <select class="form-select" wire:model="proposal_approval_mode">
                                                <option value="digital">Opsi A: Digital (Otomatis di PDF)</option>
                                                <option value="upload">Opsi B: Upload (Scan Lembar Basah)</option>
                                                <option value="both">Keduanya (A dan B)</option>
                                            </select>
                                            <small class="text-muted">Menentukan apakah dosen perlu mengunggah scan lembar persetujuan atau sistem yang membuat otomatis di PDF.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Metode Pengesahan Laporan (Akhir)</label>
                                            <select class="form-select" wire:model="report_approval_mode">
                                                <option value="digital">Opsi A: Digital (Otomatis di PDF)</option>
                                                <option value="upload">Opsi B: Upload (Scan Lembar Basah)</option>
                                                <option value="both">Keduanya (A dan B)</option>
                                            </select>
                                            <small class="text-muted">Menentukan apakah dosen perlu mengunggah scan lembar pengesahan pada laporan akhir.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">
                                        <x-lucide-save class="icon" /> Simpan Konfigurasi
                                    </button>
                                </div>
                            </form>
                            
                            <hr class="my-4">
                            @if(in_array($proposal_approval_mode, ['upload', 'both']))
                            <div class="row align-items-center mb-4">
                                <div class="col-md-6">
                                    <h4 class="mb-2">Template Halaman Persetujuan untuk ajuan proposal (Manual)</h4>
                                    <p class="text-secondary small mb-0">
                                        Karena Anda memilih opsi Upload pada Proposal, unggah template Word/PDF kosong di sini agar dosen dapat mengunduhnya saat menyusun proposal.
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <form wire:submit.prevent="saveProposalApprovalPageTemplate">
                                        <div class="input-group">
                                            <input type="file" class="form-control" wire:model="proposal_approval_page_template">
                                            <button type="submit" class="btn btn-azure" wire:loading.attr="disabled">
                                                Simpan
                                            </button>
                                        </div>
                                        @error('proposal_approval_page_template') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </form>
                                    @if ($this->proposalApprovalPageTemplateMedia)
                                        <div class="mt-2 text-end">
                                            <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('media.download', ['media' => $this->proposalApprovalPageTemplateMedia]) }}" class="btn btn-link btn-sm p-0" data-navigate-ignore="true" download="{{ $this->proposalApprovalPageTemplateMedia->file_name }}">
            <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->proposalApprovalPageTemplateMedia->file_name }}
        </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endif

                            @if(in_array($report_approval_mode, ['upload', 'both']))
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-2">Template Halaman Pengesahan untuk laporan proposal (Manual)</h4>
                                    <p class="text-secondary small mb-0">
                                        Karena Anda memilih opsi Upload pada Laporan, unggah template Word/PDF kosong di sini agar dosen dapat mengunduhnya saat menyusun laporan akhir.
                                    </p>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <form wire:submit.prevent="saveReportApprovalPageTemplate">
                                        <div class="input-group">
                                            <input type="file" class="form-control" wire:model="report_approval_page_template">
                                            <button type="submit" class="btn btn-azure" wire:loading.attr="disabled">
                                                Simpan
                                            </button>
                                        </div>
                                        @error('report_approval_page_template') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </form>
                                    @if ($this->reportApprovalPageTemplateMedia)
                                        <div class="mt-2 text-end">
                                            <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('media.download', ['media' => $this->reportApprovalPageTemplateMedia]) }}" class="btn btn-link btn-sm p-0" data-navigate-ignore="true" download="{{ $this->reportApprovalPageTemplateMedia->file_name }}">
            <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->reportApprovalPageTemplateMedia->file_name }}
        </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="row row-cards mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-azure-lt">
                            <h3 class="card-title">Template Khusus Mitra</h3>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-2">Surat Kesanggupan Mitra</h4>
                                        <div class="col-md-12">
                                            <h2 class="page-title mb-3">Template Monev Internal</h2>
                                        </div>
                                        @php
                                            $monevTemplates = [
                                                ['title' => 'Berita Acara Monev', 'media' => 'monevBeritaAcaraTemplateMedia', 'uploadModel' => 'monev_berita_acara_template', 'saveAction' => 'saveMonevBeritaAcaraTemplate', 'downloadAction' => 'downloadMonevBeritaAcaraTemplate'],
                                                ['title' => 'Borang Monev', 'media' => 'monevBorangTemplateMedia', 'uploadModel' => 'monev_borang_template', 'saveAction' => 'saveMonevBorangTemplate', 'downloadAction' => 'downloadMonevBorangTemplate'],
                                                ['title' => 'Rekap Penilaian Monev', 'media' => 'monevRekapPenilaianTemplateMedia', 'uploadModel' => 'monev_rekap_penilaian_template', 'saveAction' => 'saveMonevRekapPenilaianTemplate', 'downloadAction' => 'downloadMonevRekapPenilaianTemplate'],
                                            ];
                                        @endphp
                                        @foreach($monevTemplates as $template)
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">{{ $template['title'] }}</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form wire:submit.prevent="{{ $template['saveAction'] }}">
                                                            <div class="mb-3">
                                                                <label class="form-label">Unggah Template Baru</label>
                                                                <input type="file" class="form-control" wire:model="{{ $template['uploadModel'] }}">
                                                                @error($template['uploadModel'])<span class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Unggah</button>
                                                        </form>
                                                        @if($this->{$template['media']})
                                                            <div class="mt-3">
                                                                <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('media.download', ['media' => $this->{$template['media']}]) }}" class="btn btn-ghost-primary w-100" data-navigate-ignore="true" download="{{ $this->{$template['media']}->file_name }}">
                                                                    Unduh: {{ $this->{$template['media']}->file_name }}
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                <!-- Monev Rekap Penilaian -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rekap Penilaian Monev</h3>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="saveMonevRekapPenilaianTemplate">
                                <div class="mb-3">
                                    <label class="form-label">Unggah Template Baru</label>
                                    <input type="file" class="form-control" wire:model="monev_rekap_penilaian_template">
                                    @error('monev_rekap_penilaian_template')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                    Unggah
                                </button>
                            </form>
                            @if ($this->monevRekapPenilaianTemplateMedia)
                                <div class="mt-3">
                                    <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('media.download', ['media' => $this->monevRekapPenilaianTemplateMedia]) }}" class="btn btn-ghost-primary w-100" data-navigate-ignore="true" download="{{ $this->monevRekapPenilaianTemplateMedia->file_name }}">
            Unduh: {{ $this->monevRekapPenilaianTemplateMedia->file_name }}
        </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
