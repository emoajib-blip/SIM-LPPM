<?php

namespace App\Livewire\Settings\Tabs;

use App\Livewire\Concerns\HasToast;
use App\Models\Partner;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class PartnerManager extends Component
{
    use HasToast, WithFileUploads, WithPagination;

    /** Pilihan jenis mitra yang tersedia */
    public const TYPES = [
        'Industri' => 'Industri / Perusahaan Swasta',
        'BUMN' => 'BUMN / Perusahaan Negara',
        'Pemerintah' => 'Instansi Pemerintah (Dinas/Lembaga)',
        'Perguruan Tinggi' => 'Perguruan Tinggi / Universitas',
        'Sekolah' => 'Sekolah / Lembaga Pendidikan',
        'NGO' => 'LSM / NGO / Yayasan Nirlaba',
        'UMKM' => 'UMKM / Usaha Kecil Menengah',
        'Komunitas' => 'Komunitas / Organisasi Masyarakat',
        'Internasional' => 'Mitra Internasional / Luar Negeri',
        'Lainnya' => 'Lainnya',
    ];

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('nullable|email|max:255')]
    public string $email = '';

    #[Validate('nullable|min:3|max:255')]
    public string $institution = '';

    #[Validate('required|in:Industri,BUMN,Pemerintah,Perguruan Tinggi,Sekolah,NGO,UMKM,Komunitas,Internasional,Lainnya')]
    public string $type = '';

    #[Validate('nullable|min:2|max:100')]
    public string $country = 'Indonesia';

    #[Validate('nullable|string')]
    public string $address = '';

    /** Dokumen MOU/PKS — diupload Admin, level institusi */
    #[Validate('nullable|file|mimes:pdf|max:5120')]
    public $mouPksFile = null;

    public ?string $editingId = null;

    public string $modalTitle = 'Mitra';

    public ?string $deleteItemId = null;

    public string $deleteItemName = '';

    public function render()
    {
        return view('livewire.settings.tabs.partner-manager', [
            'partners' => Partner::latest()->paginate(10),
        ]);
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalTitle = 'Tambah Mitra';
        $this->dispatch('open-modal', modalId: 'modal-partner');
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email ?: null,
            'institution' => $this->institution ?: null,
            'type' => $this->type,
            'country' => $this->country ?: 'Indonesia',
            'address' => $this->address ?: null,
        ];

        if ($this->editingId) {
            $partner = Partner::findOrFail($this->editingId);
            $partner->update($data);
        } else {
            $partner = Partner::create($data);
        }

        // Upload dokumen MOU/PKS jika ada (koleksi admin)
        if ($this->mouPksFile) {
            $partner->clearMediaCollection('mou_pks');
            $partner->addMedia($this->mouPksFile->getRealPath())
                ->usingName($this->mouPksFile->getClientOriginalName())
                ->usingFileName($this->mouPksFile->hashName())
                ->toMediaCollection('mou_pks');
        }

        $message = $this->editingId ? 'Mitra berhasil diubah' : 'Mitra berhasil ditambahkan';

        $this->dispatch('close-modal', modalId: 'modal-partner');
        $this->resetForm();

        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    public function edit(Partner $partner): void
    {
        $this->editingId = $partner->id;
        $this->name = $partner->name;
        $this->email = $partner->email ?? '';
        $this->institution = $partner->institution ?? '';
        $this->type = $partner->type ?? '';
        $this->country = $partner->country ?? 'Indonesia';
        $this->address = $partner->address ?? '';
        $this->mouPksFile = null; // file tidak bisa di-preload
        $this->modalTitle = 'Edit Mitra: '.$partner->name;
        $this->dispatch('open-modal', modalId: 'modal-partner');
    }

    public function resetForm(): void
    {
        $this->reset(['name', 'email', 'institution', 'type', 'country', 'address', 'editingId', 'mouPksFile']);
        $this->country = 'Indonesia';
    }

    public function handleConfirmDeleteAction(): void
    {
        if ($this->deleteItemId) {
            Partner::findOrFail($this->deleteItemId)->delete();

            $message = 'Mitra berhasil dihapus';
            session()->flash('success', $message);
            $this->toastSuccess($message);
            $this->resetConfirmDelete();
        }
    }

    public function resetConfirmDelete(): void
    {
        $this->reset(['deleteItemId', 'deleteItemName']);
    }

    public function confirmDelete(string $id): void
    {
        $this->deleteItemId = $id;
        $this->deleteItemName = Partner::find($id)->name ?? '';
        $this->dispatch('open-modal', modalId: 'modal-confirm-delete-partner');
    }
}
