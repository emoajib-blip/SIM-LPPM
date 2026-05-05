<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Process;
use Livewire\Component;

class DataSync extends Component
{
    public string $output = '';

    public bool $isRunning = false;

    public string $lastSync = '';

    public function mount(): void
    {
        $this->lastSync = cache('last_data_sync', 'Belum pernah');
    }

    public function runSync(): void
    {
        if ($this->isRunning) {
            return;
        }

        $this->isRunning = true;
        $this->output = "Memulai sinkronisasi...\n";

        // Run the sync script
        $process = Process::run(['bash', base_path('sync-from-prod.sh')], function ($type, $output) {
            $this->output .= $output;
        });

        $this->isRunning = false;

        if ($process->successful()) {
            $this->output .= "\n✅ Sinkronisasi berhasil!";
            cache(['last_data_sync' => now()->format('d M Y H:i:s')]);
            $this->lastSync = cache('last_data_sync');
        } else {
            $this->output .= "\n❌ Sinkronisasi gagal. Periksa koneksi SSH dan kredensial.";
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.settings.data-sync');
    }
}
