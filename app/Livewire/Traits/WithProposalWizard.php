<?php

namespace App\Livewire\Traits;

use Illuminate\Support\Facades\DB;

trait WithProposalWizard
{
    public function addOutput(): void
    {
        $this->form->outputs[] = [
            'year' => 1,
            'category' => 'Wajib',
            'group' => '',
            'type' => '',
            'status' => '',
            'description' => '',
        ];
    }

    public function removeOutput(int $index): void
    {
        unset($this->form->outputs[$index]);
        $this->form->outputs = array_values($this->form->outputs);
    }

    public function addBudgetItem(): void
    {
        $this->form->budget_items[] = [
            'year' => 1,
            'budget_group_id' => '',
            'budget_component_id' => '',
            'group' => '',
            'component' => '',
            'item' => '',
            'unit' => '',
            'volume' => 1,
            'unit_price' => 0,
            'total' => 0,
        ];
    }

    public function removeBudgetItem(int $index): void
    {
        unset($this->form->budget_items[$index]);
        $this->form->budget_items = array_values($this->form->budget_items);
    }

    public function calculateTotal(int $index): void
    {
        $volume = (float) ($this->form->budget_items[$index]['volume'] ?? 0);
        $price = (float) ($this->form->budget_items[$index]['unit_price'] ?? 0);
        $this->form->budget_items[$index]['total'] = $volume * $price;
    }

    public function saveNewPartner(): void
    {
        $isPkm = $this->getProposalTypeForValidation() === 'community-service';

        $this->validate([
            'form.new_partner.name' => 'required|string|max:255',
            'form.new_partner.email' => 'nullable|email|max:255',
            'form.new_partner.institution' => 'required|string|max:255',
            'form.new_partner.country' => 'required|string|max:255',
            'form.new_partner.type' => ['required', 'string', 'max:255', \Illuminate\Validation\Rule::in(\App\Constants\ProposalConstants::PARTNER_TYPES)],
            'form.new_partner.address' => 'nullable|string',
            'form.new_partner_commitment_file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        DB::transaction(function () {
            $partner = \App\Models\Partner::create([
                'name' => $this->form->new_partner['name'],
                'email' => $this->form->new_partner['email'],
                'institution' => $this->form->new_partner['institution'],
                'country' => $this->form->new_partner['country'],
                'type' => $this->form->new_partner['type'],
                'address' => $this->form->new_partner['address'],
            ]);

            if ($this->form->new_partner_commitment_file && $this->form->proposal) {
                $partner
                    ->addMedia($this->form->new_partner_commitment_file->getRealPath())
                    ->usingName($this->form->new_partner_commitment_file->getClientOriginalName())
                    ->usingFileName($this->form->new_partner_commitment_file->hashName())
                    ->withCustomProperties(['proposal_id' => $this->form->proposal->id])
                    ->toMediaCollection('commitment_letter');
            }

            $this->form->partner_ids[] = $partner->id;

            $this->form->new_partner = [
                'name' => '',
                'email' => '',
                'institution' => '',
                'country' => '',
                'type' => '',
                'address' => '',
            ];

            $this->form->new_partner_commitment_file = null;
        });

        $this->dispatch('partner-created');
        $this->dispatch('close-modal', modalId: 'modal-partner');
    }

    /**
     * Tambah mitra yang sudah ada di database ke proposal ini.
     * Digunakan saat dosen memilih mitra existing dari daftar.
     */
    public function addExistingPartner(string $partnerId): void
    {
        // Validasi partner ID ada di database
        $partner = \App\Models\Partner::find($partnerId);
        if (! $partner) {
            $this->addError('existing_partner_id', 'Mitra tidak ditemukan.');

            return;
        }

        // Hindari duplikasi
        if (in_array($partnerId, $this->form->partner_ids ?? [])) {
            $this->addError('existing_partner_id', 'Mitra "'.$partner->name.'" sudah ditambahkan.');

            return;
        }

        $this->form->partner_ids[] = $partnerId;
        $this->dispatch('partner-created');
        $this->dispatch('close-modal', modalId: 'modal-partner');
    }

    /**
     * Buka modal upload Surat Kesediaan untuk mitra tertentu.
     */
    public function prepareCommitmentUpload(string $partnerId): void
    {
        // Pastikan mitra memang sudah ada di proposal ini
        if (! in_array($partnerId, $this->form->partner_ids ?? [])) {
            $this->addError('commitmentUploadFile', 'Mitra tidak ditemukan di proposal ini.');

            return;
        }

        $this->commitmentUploadPartnerId = $partnerId;
        $this->commitmentUploadFile = null;
        $this->dispatch('open-modal', modalId: 'modal-upload-kesediaan');
    }

    /**
     * Simpan Surat Kesediaan Mitra ke koleksi `commitment_letter` di model Partner.
     */
    public function uploadCommitmentLetter(): void
    {
        $this->validate([
            'commitmentUploadFile' => 'required|file|mimes:pdf|max:5120',
        ]);

        $partner = \App\Models\Partner::find($this->commitmentUploadPartnerId);
        if (! $partner) {
            $this->addError('commitmentUploadFile', 'Mitra tidak ditemukan.');

            return;
        }

        if ($this->form->proposal) {
            $proposalId = $this->form->proposal->id;

            // Hapus file lama HANYA untuk proposal ini
            $partner->getMedia('commitment_letter')
                ->where('custom_properties.proposal_id', $proposalId)
                ->each(fn ($media) => $media->delete());

            $partner->addMedia($this->commitmentUploadFile->getRealPath())
                ->usingName($this->commitmentUploadFile->getClientOriginalName())
                ->usingFileName($this->commitmentUploadFile->hashName())
                ->withCustomProperties(['proposal_id' => $proposalId])
                ->toMediaCollection('commitment_letter');
        }

        $this->resetCommitmentUpload();
        $this->dispatch('close-modal', modalId: 'modal-upload-kesediaan');

        // Refresh computed partners agar tampilan tabel terupdate
        unset($this->partners);
    }

    /**
     * Reset state upload surat kesediaan.
     */
    public function resetCommitmentUpload(): void
    {
        $this->commitmentUploadPartnerId = null;
        $this->commitmentUploadFile = null;
    }

    public function validateBudgetRealtime(): void
    {
        try {
            if (! empty($this->form->budget_items)) {
                $schemeId = $this->getProposalTypeForValidation() === 'research'
                    ? (int) $this->form->research_scheme_id
                    : (int) $this->form->community_service_scheme_id;

                app(\App\Services\BudgetValidationService::class)->validateBudgetGroupPercentages(
                    $this->form->budget_items,
                    $this->getProposalTypeForValidation(),
                    (int) date('Y'),
                    $schemeId
                );

                app(\App\Services\BudgetValidationService::class)->validateBudgetCap(
                    $this->form->budget_items,
                    $this->getProposalTypeForValidation(),
                    (int) date('Y'),
                    $schemeId
                );
            }

            $this->budgetValidationErrors = [];
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->budgetValidationErrors = $e->errors()['budget_items'] ?? [];
        }
    }

    abstract protected function getProposalTypeForValidation(): string;
}
