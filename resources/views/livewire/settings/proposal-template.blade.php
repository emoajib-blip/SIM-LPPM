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
            <div class="row row-cards">
                <!-- Research Template -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Template Penelitian</h3>
                        </div>
                        <div class="card-body">
                            @if (session('success_research'))
                                <div class="alert alert-success">
                                    {{ session('success_research') }}
                                </div>
                            @endif
                            @if (session('error_research'))
                                <div class="alert alert-danger">
                                    {{ session('error_research') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="saveResearchTemplate">
                                <div class="mb-3" x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <label class="form-label">Unggah Template Baru</label>
                                    <input type="file" class="form-control" wire:model="research_template">
                                    @error('research_template')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="progress mt-2" x-show="uploading" style="display: none;">
                                        <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"
                                            :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden" x-text="`${progress}% Complete`"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="saveResearchTemplate">Unggah</span>
                                        <span wire:loading wire:target="saveResearchTemplate">Mengunggah...</span>
                                    </button>
                                </div>
                            </form>

                            @if ($this->researchTemplateMedia)
                                <div class="mt-3">
                                    <label class="form-label">Template Saat Ini</label>
                                    <button wire:click="downloadResearchTemplate" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-download" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                        {{ $this->researchTemplateMedia->file_name }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Community Service Template -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Template Pengabdian Masyarakat</h3>
                        </div>
                        <div class="card-body">
                            @if (session('success_community_service'))
                                <div class="alert alert-success">
                                    {{ session('success_community_service') }}
                                </div>
                            @endif
                            @if (session('error_community_service'))
                                <div class="alert alert-danger">
                                    {{ session('error_community_service') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="saveCommunityServiceTemplate">
                                <div class="mb-3" x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <label class="form-label">Unggah Template Baru</label>
                                    <input type="file" class="form-control" wire:model="community_service_template">
                                    @error('community_service_template')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="progress mt-2" x-show="uploading" style="display: none;">
                                        <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"
                                            :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">
                                            <span class="visually-hidden" x-text="`${progress}% Complete`"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                        <span wire:loading.remove
                                            wire:target="saveCommunityServiceTemplate">Unggah</span>
                                        <span wire:loading
                                            wire:target="saveCommunityServiceTemplate">Mengunggah...</span>
                                    </button>
                                </div>
                            </form>

                            @if ($this->communityServiceTemplateMedia)
                                <div class="mt-3">
                                    <label class="form-label">Template Saat Ini</label>
                                    <button wire:click="downloadCommunityServiceTemplate"
                                        class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-download" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <path d="M7 11l5 5l5 -5"></path>
                                            <path d="M12 4l0 12"></path>
                                        </svg>
                                        {{ $this->communityServiceTemplateMedia->file_name }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cards mt-3">
                <div class="col-12">
                    <h2 class="page-title mb-3">Template Laporan (Kemajuan & Akhir)</h2>
                </div>

                <!-- Research Report Templates -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Penelitian</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <form wire:submit.prevent="saveResearchProgressReportTemplate">
                                    <label class="form-label">Template Laporan Kemajuan</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="research_progress_report_template">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
                                    </div>
                                    @error('research_progress_report_template') <span class="text-danger">{{ $message }}</span> @enderror
                                </form>
                                @if ($this->researchProgressReportTemplateMedia)
                                    <div class="mt-2">
                                        <button wire:click="downloadResearchProgressReportTemplate" class="btn btn-link btn-sm p-0">
                                            <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->researchProgressReportTemplateMedia->file_name }}
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <form wire:submit.prevent="saveResearchFinalReportTemplate">
                                    <label class="form-label">Template Laporan Akhir</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="research_final_report_template">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
                                    </div>
                                    @error('research_final_report_template') <span class="text-danger">{{ $message }}</span> @enderror
                                </form>
                                @if ($this->researchFinalReportTemplateMedia)
                                    <div class="mt-2">
                                        <button wire:click="downloadResearchFinalReportTemplate" class="btn btn-link btn-sm p-0">
                                            <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->researchFinalReportTemplateMedia->file_name }}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Community Service Report Templates -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Laporan Pengabdian</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <form wire:submit.prevent="saveCommunityServiceProgressReportTemplate">
                                    <label class="form-label">Template Laporan Kemajuan</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="community_service_progress_report_template">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
                                    </div>
                                    @error('community_service_progress_report_template') <span class="text-danger">{{ $message }}</span> @enderror
                                </form>
                                @if ($this->communityServiceProgressReportTemplateMedia)
                                    <div class="mt-2">
                                        <button wire:click="downloadCommunityServiceProgressReportTemplate" class="btn btn-link btn-sm p-0">
                                            <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->communityServiceProgressReportTemplateMedia->file_name }}
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <form wire:submit.prevent="saveCommunityServiceFinalReportTemplate">
                                    <label class="form-label">Template Laporan Akhir</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" wire:model="community_service_final_report_template">
                                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
                                    </div>
                                    @error('community_service_final_report_template') <span class="text-danger">{{ $message }}</span> @enderror
                                </form>
                                @if ($this->communityServiceFinalReportTemplateMedia)
                                    <div class="mt-2">
                                        <button wire:click="downloadCommunityServiceFinalReportTemplate" class="btn btn-link btn-sm p-0">
                                            <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->communityServiceFinalReportTemplateMedia->file_name }}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <button wire:click="downloadProposalApprovalPageTemplate" class="btn btn-link btn-sm p-0">
                                                <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->proposalApprovalPageTemplateMedia->file_name }}
                                            </button>
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
                                            <button wire:click="downloadReportApprovalPageTemplate" class="btn btn-link btn-sm p-0">
                                                <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->reportApprovalPageTemplateMedia->file_name }}
                                            </button>
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
                                    <p class="text-secondary small mb-0">
                                        Template ini dapat diunduh oleh dosen saat mengisi data mitra pada usulan baru.
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <form wire:submit.prevent="savePartnerCommitmentTemplate">
                                        <div class="input-group">
                                            <input type="file" class="form-control" wire:model="partner_commitment_template">
                                            <button type="submit" class="btn btn-azure" wire:loading.attr="disabled">
                                                Simpan
                                            </button>
                                        </div>
                                        @error('partner_commitment_template') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </form>
                                    @if ($this->partnerCommitmentTemplateMedia)
                                        <div class="mt-2 text-end">
                                            <button wire:click="downloadPartnerCommitmentTemplate" class="btn btn-link btn-sm p-0">
                                                <x-lucide-download class="icon icon-sm" /> Unduh: {{ $this->partnerCommitmentTemplateMedia->file_name }}
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cards mt-3">
                <div class="col-12">
                    <h2 class="page-title mb-3">Template Monev Internal</h2>
                </div>
                <!-- Monev Berita Acara -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Berita Acara Monev</h3>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="saveMonevBeritaAcaraTemplate">
                                <div class="mb-3">
                                    <label class="form-label">Unggah Template Baru</label>
                                    <input type="file" class="form-control" wire:model="monev_berita_acara_template">
                                    @error('monev_berita_acara_template')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                    Unggah
                                </button>
                            </form>
                            @if ($this->monevBeritaAcaraTemplateMedia)
                                <div class="mt-3">
                                    <button wire:click="downloadMonevBeritaAcaraTemplate" class="btn btn-ghost-primary w-100">
                                        Unduh: {{ $this->monevBeritaAcaraTemplateMedia->file_name }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Monev Borang -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Borang Monev</h3>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="saveMonevBorangTemplate">
                                <div class="mb-3">
                                    <label class="form-label">Unggah Template Baru</label>
                                    <input type="file" class="form-control" wire:model="monev_borang_template">
                                    @error('monev_borang_template')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                    Unggah
                                </button>
                            </form>
                            @if ($this->monevBorangTemplateMedia)
                                <div class="mt-3">
                                    <button wire:click="downloadMonevBorangTemplate" class="btn btn-ghost-primary w-100">
                                        Unduh: {{ $this->monevBorangTemplateMedia->file_name }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

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
                                    <button wire:click="downloadMonevRekapPenilaianTemplate" class="btn btn-ghost-primary w-100">
                                        Unduh: {{ $this->monevRekapPenilaianTemplateMedia->file_name }}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
