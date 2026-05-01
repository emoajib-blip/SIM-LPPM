<div>
    <x-tabler.alert />

    <div class="card">
        <div class="d-flex align-items-center justify-content-between card-header">
            <h3 class="card-title">Pesan Kuota</h3>
            <button type="button" class="btn btn-primary" wire:click='create' data-bs-toggle="modal"
                data-bs-target="#modal-quota-message">
                <x-lucide-plus class="icon" />
                Tambah Pesan Kuota
            </button>
        </div>
        <div class="table-responsive">
            <table class="card-table table table-vcenter">
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Pesan</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotaMessages as $item)
                        <tr wire:key="message-{{ $item->id }}">
                            <td>{{ $item->key }}</td>
                            <td>{{ Str::limit($item->message, 50) }}</td>
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
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $quotaMessages->links() }}
        </div>
    </div>

    <!-- Create/Edit Modal -->
    <x-tabler.modal wire:key="modal-quota-message" id="modal-quota-message" :title="$modalTitle" size="lg">
        <form wire:submit="save">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Key <span class="text-danger">*</span></label>
                        <input type="text" wire:model="key" class="form-control"
                            placeholder="button_tooltip, access_denied, dll">
                        <x-form-error field="key" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Pesan <span class="text-danger">*</span></label>
                        <textarea wire:model="message" class="form-control" rows="3"
                            placeholder="Pesan dengan placeholder {limit}, {current}, dll"></textarea>
                        <x-form-error field="message" />
                        <small class="form-hint">Gunakan placeholder: {limit}, {current}, {draft_count}</small>
                    </div>
                </div>
            </div>
        </form>
    </x-tabler.modal>

    <!-- Confirm Delete Modal -->
    <x-tabler.modal-confirmation wire:key="modal-confirm-delete-quota-message"
        wire:model="deleteItemId"
        title="Hapus Pesan Kuota"
        message="Apakah Anda yakin ingin menghapus pesan kuota '{{ $deleteItemKey }}'? Tindakan ini tidak dapat dibatalkan."
        confirmMethod="handleConfirmDeleteAction" />

</div>