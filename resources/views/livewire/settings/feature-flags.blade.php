<div class="row g-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Hierarki Riset & Validasi Kaprodi</h3>
                <p class="card-subtitle">
                    Pengaturan ini bersifat eksperimental dan dapat mengubah alur (workflow) pengajuan proposal secara
                    real-time. Pastikan SK/Kebijakan Rektorat telah terbit sebelum mengaktifkan fitur ini.
                </p>

                <div class="mt-4 list-group list-group-flush">
                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar bg-blue-lt">
                                    <x-lucide-git-branch class="icon" />
                                </span>
                            </div>
                            <div class="col text-truncate">
                                <div class="text-body d-block font-weight-medium">Pohon Penelitian & Peta Jalan (Roadmap)</div>
                                <div class="text-muted text-truncate mt-n1">
                                    Mewajibkan Dosen memilih cabang keilmuan Prodi saat pengajuan proposal, serta mengaktifkan Dasbor Roadmap di level Prodi dan Fakultas.
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" wire:model.live="featureRoadmapActive">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="avatar bg-green-lt">
                                    <x-lucide-check-square class="icon" />
                                </span>
                            </div>
                            <div class="col text-truncate">
                                <div class="text-body d-block font-weight-medium">Validasi Berjenjang: Kaprodi</div>
                                <div class="text-muted text-truncate mt-n1">
                                    Dekan tidak dapat melakukan "Setujui" sebelum Kaprodi memberikan stempel validasi pada proposal yang diajukan. (Sistem Check-Point).
                                </div>
                            </div>
                            <div class="col-auto">
                                <label class="form-check form-switch m-0">
                                    <input class="form-check-input" type="checkbox" wire:model.live="featureKaprodiValidation">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
