<div>
    <x-tabler.alert />
    <div class="card">
        <div class="d-flex align-items-center justify-content-between card-header">
            <h3 class="card-title">Pengaturan Anggaran Tahunan</h3>
            <button type="button" class="btn btn-primary" wire:click='create' data-bs-toggle="modal"
                data-bs-target="#modal-budget-cap">
                <x-lucide-plus class="icon" />
                Tambah Pengaturan Anggaran
            </button>
        </div>
        <div class="table-responsive">
            <table class="card-table table table-vcenter">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Batas Anggaran Penelitian</th>
                        <th>Batas Anggaran Pengabdian</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($budgetCaps as $item)
                        <tr wire:key="budget-cap-{{ $item->id }}">
                            <td><span class="bg-blue-lt badge">{{ $item->year }}</span></td>
                            <td>
                                @if ($item->research_budget_cap)
                                    <div class="text-success fw-bold">Global: Rp
                                        {{ number_format($item->research_budget_cap, 0, ',', '.') }}
                                    </div>
                                @else
                                    <div class="text-muted mb-1">Global: Tidak dibatasi</div>
                                @endif
                                @if($item->scheme_caps && isset($item->scheme_caps['research']) && count($item->scheme_caps['research']) > 0)
                                    <div class="hr-text hr-text-left mt-2 mb-1 text-xs">Per Skema</div>
                                    <ul class="list-unstyled text-xs">
                                        @foreach($item->scheme_caps['research'] as $id => $val)
                                            @php $schemeName = $researchSchemes->firstWhere('id', $id)?->name ?? "Skema ID {$id}"; @endphp
                                            <li><span class="text-muted">{{ $schemeName }}:</span> <strong class="text-azure">Rp
                                                    {{ number_format($val, 0, ',', '.') }}</strong></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>
                                @if ($item->community_service_budget_cap)
                                    <div class="text-success fw-bold">Global: Rp
                                        {{ number_format($item->community_service_budget_cap, 0, ',', '.') }}
                                    </div>
                                @else
                                    <div class="text-muted mb-1">Global: Tidak dibatasi</div>
                                @endif
                                @if($item->scheme_caps && isset($item->scheme_caps['community_service']) && count($item->scheme_caps['community_service']) > 0)
                                    <div class="hr-text hr-text-left mt-2 mb-1 text-xs">Per Skema</div>
                                    <ul class="list-unstyled text-xs">
                                        @foreach($item->scheme_caps['community_service'] as $id => $val)
                                            @php $schemeName = $communityServiceSchemes->firstWhere('id', $id)?->name ?? "Skema ID {$id}"; @endphp
                                            <li><span class="text-muted">{{ $schemeName }}:</span> <strong class="text-azure">Rp
                                                    {{ number_format($val, 0, ',', '.') }}</strong></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>
                                <div class="btn-list">
                                    <button type="button" class="btn-outline-warning btn btn-sm"
                                        wire:click="edit('{{ $item->id }}')">
                                        Edit
                                    </button>
                                    <button type="button" class="btn-outline-danger btn btn-sm"
                                        wire:click="confirmDelete('{{ $item->id }}')" wire:loading.attr="disabled">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center">Belum ada pengaturan anggaran</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $budgetCaps->links() }}
        </div>
    </div>




    <x-tabler.modal-confirmation wire:key="modal-confirm-delete-budget-cap" id="modal-confirm-delete-budget-cap"
        title="Konfirmasi Hapus"
        message="Apakah Anda yakin ingin menghapus pengaturan anggaran untuk tahun {{ $deleteItemYear ?? '' }}?"
        confirm-text="Ya, Hapus" cancel-text="Batal" component-id="{{ $this->getId() }}"
        on-confirm="handleConfirmDeleteAction" />
    <x-tabler.modal wire:key="modal-budget-cap" id="modal-budget-cap" :title="$modalTitle" onHide="resetForm"
        component-id="{{ $this->getId() }}">
        <x-slot:body>
            <form wire:submit="save" id="form-budget-cap">
                <div class="mb-3">
                    <label class="form-label required">Tahun Anggaran</label>
                    <input type="number" wire:model="year" class="form-control" placeholder="2025" min="2000"
                        max="2100">
                    @error('year')
                        <div class="d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="hr-text">Penelitian</div>
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Batas Anggaran Global (Opsional)</label>
                    <div class="input-group" x-data="moneyInputSingle('research_budget_cap')">
                        <span class="input-group-text">Rp</span>
                        <input type="text" x-model="display" x-ref="input" @focus="handleFocus" @input="handleInput"
                            class="form-control" placeholder="Misal: 50.000.000">
                    </div>
                </div>

                <h5 class="mt-2 mb-2">Anggaran Spesifik Pengecualian Per-Skema:</h5>
                <div class="row">
                    @foreach($researchSchemes as $scheme)
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-truncate"
                                title="{{ $scheme->name }}"><small>{{ $scheme->name }}</small></label>
                            <div class="input-group" x-data="moneyInputSingle('research_scheme_caps.{{ $scheme->id }}')">
                                <span class="input-group-text p-1"><small>Rp</small></span>
                                <input type="text" x-model="display" x-ref="input" @focus="handleFocus" @input="handleInput"
                                    class="form-control form-control-sm" placeholder="Kosongkan jika ikuti global">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="hr-text">Pengabdian Masyarakat</div>
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Batas Anggaran Global (Opsional)</label>
                    <div class="input-group" x-data="moneyInputSingle('community_service_budget_cap')">
                        <span class="input-group-text">Rp</span>
                        <input type="text" x-model="display" x-ref="input" @focus="handleFocus" @input="handleInput"
                            class="form-control" placeholder="Misal: 30.000.000">
                    </div>
                </div>

                <h5 class="mt-2 mb-2">Anggaran Spesifik Pengecualian Per-Skema:</h5>
                <div class="row">
                    @foreach($communityServiceSchemes as $scheme)
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-truncate"
                                title="{{ $scheme->name }}"><small>{{ $scheme->name }}</small></label>
                            <div class="input-group"
                                x-data="moneyInputSingle('community_service_scheme_caps.{{ $scheme->id }}')">
                                <span class="input-group-text p-1"><small>Rp</small></span>
                                <input type="text" x-model="display" x-ref="input" @focus="handleFocus" @input="handleInput"
                                    class="form-control form-control-sm" placeholder="Kosongkan jika ikuti global">
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </x-slot:body>
        <x-slot:footer>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" form="form-budget-cap" class="btn btn-primary" wire:loading.class="btn-loading"
                wire:target="save">Simpan</button>
        </x-slot:footer>
    </x-tabler.modal>

</div>