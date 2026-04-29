<?php

namespace App\Livewire\AdminLppm;

use App\Imports\SintaAuthorImport;
use App\Livewire\Concerns\HasToast;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

#[Layout('components.layouts.app', ['title' => 'Sync SINTA Data', 'pageTitle' => 'Sinkronisasi Data SINTA', 'pageSubtitle' => 'Import data dosen dari SINTA'])]
class SyncSinta extends Component
{
    use HasToast, WithFileUploads;

    #[Validate('required|file|mimes:xlsx,xls,csv')]
    public $file;

    // Untuk menyimpan log proses
    public array $logs = [];

    public int $successCount = 0;

    public int $failCount = 0;

    public function updatedFile()
    {
        $this->validate();
    }

    public function import()
    {
        $this->validate();

        try {
            $extension = $this->file->getClientOriginalExtension();

            // Secara eksplisit tentukan tipe reader berdasarkan ekstensi file
            // Ini mencegah PhpSpreadsheet salah mengidentifikasi file (misal .xlsx dianggap .xls)
            $readerType = match (strtolower($extension)) {
                'xlsx' => \Maatwebsite\Excel\Excel::XLSX,
                'xls' => \Maatwebsite\Excel\Excel::XLS,
                'csv' => \Maatwebsite\Excel\Excel::CSV,
                'ods' => \Maatwebsite\Excel\Excel::ODS,
                default => null,
            };

            Excel::import(new SintaAuthorImport, $this->file, null, $readerType);

            $this->toastSuccess('Data SINTA berhasil disinkronisasi.');
            session()->flash('success', 'Sinkronisasi selesai.');

            // Redirect atau tampilkan status sukses
            $this->redirect(route('users.index'), navigate: true);

        } catch (\Exception $e) {
            $this->addError('file', 'Gagal memproses file: '.$e->getMessage());
            $this->toastError('Terjadi kesalahan saat import.');
        }
    }

    public function render()
    {
        return view('livewire.admin-lppm.sync-sinta');
    }
}
