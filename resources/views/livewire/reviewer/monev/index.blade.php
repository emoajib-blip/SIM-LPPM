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
                                        <div class="font-weight-bold">{{ $review->proposal->submitter->name }}</div>
                                        <div class="text-muted text-truncate" style="max-width: 400px;">
                                            {{ $review->proposal->title }}</div>
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
                                            <span class="badge bg-success-lt">{{ $review->status }}</span>
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                @if ($selectedReview)
                    <div class="modal-header">
                        <h5 class="modal-title">Evaluasi Monev: {{ $selectedReview->proposal->submitter->name }}</h5>
                        <button type="button" class="btn-close" wire:click="$set('showReviewModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Judul Proposal</label>
                            <p class="text-muted">{{ $selectedReview->proposal->title }}</p>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label required">Skor Keseluruhan (0-100)</label>
                                    <input type="number" class="form-control" wire:model="score" min="0" max="100">
                                    @error('score') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label required">Rekomendasi Status</label>
                                    <select class="form-select" wire:model="status">
                                        <option value="Sangat Baik">Sangat Baik</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                    </select>
                                    @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label required">Upload Berita Acara (Signed)</label>
                                    <input type="file" class="form-control" wire:model="berita_acara">
                                    @if($selectedReview->hasMedia('berita_acara'))
                                        <div class="mt-1 small text-success">Sudah diunggah: <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(10), ['media' => $selectedReview->getFirstMedia('berita_acara')]) }}" target="_blank">Lihat</a></div>
                                    @endif
                                    @error('berita_acara') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="hr-text">Borang Penilaian (Kriteria Capaian)</div>
                        
                        <div class="mb-3">
                            <label class="form-label">Capaian Luaran Wajib</label>
                            <textarea class="form-control" wire:model="borang_data.luaran_wajib" rows="2" placeholder="Sebutkan status luaran (Diterbitkan, Draft, dll)"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Capaian Luaran Tambahan</label>
                            <textarea class="form-control" wire:model="borang_data.luaran_tambahan" rows="2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kualitas Substansi & Keberlanjutan</label>
                            <textarea class="form-control" wire:model="borang_data.kualitas_substansi" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Catatan / Komentar Reviewer</label>
                            <textarea class="form-control" wire:model="notes" rows="3"></textarea>
                            @error('notes') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary" wire:click="$set('showReviewModal', false)">Batal</button>
                        <button type="button" class="btn btn-primary ms-auto" wire:click="saveReview" wire:loading.attr="disabled">
                            <span wire:loading.remove>Simpan Evaluasi</span>
                            <span wire:loading>Menyimpan...</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if($showReviewModal)
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
