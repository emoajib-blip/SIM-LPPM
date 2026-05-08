<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Process;
use Livewire\Component;

class DataSync extends Component
{
    public string $output = '';

    public bool $isRunning = false;

    public string $lastSync = '';

    public string $syncType = 'all';

    public string $sshHost = '';

    public string $sshUser = '';

    public string $sshPort = '22';

    public string $remotePath = '';

    public string $remoteDb = '';

    public string $remoteDbUser = '';

    public bool $configComplete = false;

    public bool $showConfig = false;

    public function mount(): void
    {
        abort_unless(Auth::user()?->hasRole('admin lppm'), 403);

        $this->lastSync = cache('last_data_sync', 'Belum pernah');
        $this->loadConfig();
    }

    public function loadConfig(): void
    {
        $this->sshHost = config('sync.ssh_host', '');
        $this->sshUser = config('sync.ssh_user', '');
        $this->sshPort = config('sync.ssh_port', '22');
        $this->remotePath = config('sync.remote_path', '');
        $this->remoteDb = config('sync.remote_db', '');
        $this->remoteDbUser = config('sync.remote_db_user', '');

        $this->configComplete = ! empty($this->sshHost) && ! empty($this->sshUser);
    }

    public function testConnection(): void
    {
        if ($this->isRunning) {
            return;
        }

        $this->output = 'Menguji koneksi SSH...'."\n";
        $this->isRunning = true;

        $sshHost = config('sync.ssh_host');
        $sshUser = config('sync.ssh_user');
        $sshPort = config('sync.ssh_port', 22);
        $sshKey = config('sync.ssh_key_path');

        $cmd = ['ssh', '-p', (string) $sshPort, '-o', 'ConnectTimeout=10', '-o', 'StrictHostKeyChecking=accept-new'];
        if ($sshKey) {
            $cmd[] = '-i';
            $cmd[] = $sshKey;
        }
        $cmd[] = "{$sshUser}@{$sshHost}";
        $cmd[] = 'echo "Koneksi berhasil ke $(hostname) pada $(date)"';

        $process = Process::run($cmd, function ($type, $output) {
            $this->output .= $output;
        });

        $this->isRunning = false;

        if ($process->successful()) {
            $this->output .= "\n✅ Koneksi SSH berhasil! Server produksi dapat dijangkau.";
        } else {
            $this->output .= "\n❌ Koneksi SSH gagal. Periksa:\n";
            $this->output .= "   • Host: {$sshHost}\n";
            $this->output .= "   • User: {$sshUser}\n";
            $this->output .= "   • Port: {$sshPort}\n";
            $this->output .= '   • SSH Key: '.($sshKey ?: 'default')."\n";
            $this->output .= "   • Pastikan SSH key sudah terdaftar di server produksi.\n";
            $this->output .= "   • Error: {$process->errorOutput()}\n";
        }
    }

    public function runSync(): void
    {
        if ($this->isRunning) {
            return;
        }

        if (! $this->configComplete) {
            $this->output = "⚠️ Konfigurasi SSH belum lengkap.\nMinta admin IT untuk mengisi konfigurasi di file .env\n";

            return;
        }

        $this->isRunning = true;
        $this->output = "Memulai sinkronisasi data dari produksi...\n\n";

        $process = Process::run(
            ['bash', base_path('sync-from-prod.sh'), $this->syncType],
            function ($type, $output) {
                $this->output .= $output;
            }
        );

        $this->isRunning = false;

        if ($process->successful()) {
            $this->output .= "\n✅ Sinkronisasi selesai!";
            cache(['last_data_sync' => now()->format('d M Y H:i:s')]);
            $this->lastSync = cache('last_data_sync');
        } else {
            $this->output .= "\n❌ Sinkronisasi gagal.";
            $this->output .= "\nError: ".$process->errorOutput();
            $this->output .= "\n\nPeriksa koneksi dan konfigurasi, lalu coba lagi.";
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.settings.data-sync');
    }
}
