<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Process;
use Illuminate\View\View;
use Livewire\Component;
use ZipArchive;

class BackupData extends Component
{
    public string $output = '';

    public bool $isRunning = false;

    public string $lastBackup = '';

    public ?string $lastDbFile = null;

    public ?string $lastStorageFile = null;

    public function mount(): void
    {
        abort_unless(Auth::user()?->hasRole('admin lppm'), 403);

        $this->lastBackup = cache('backup_last_time', 'Belum pernah');
        $this->lastDbFile = cache('backup_last_db_file');
        $this->lastStorageFile = cache('backup_last_storage_file');
    }

    public function backupDatabase(): void
    {
        abort_unless(Auth::user()?->hasRole('admin lppm'), 403);

        if ($this->isRunning) {
            return;
        }

        $this->isRunning = true;
        $this->output = "Membuat backup database...\n";

        $dbName = config('database.connections.mysql.database');
        $dbUser = config('database.connections.mysql.username');
        $dbPass = config('database.connections.mysql.password');
        $dbHost = config('database.connections.mysql.host');
        $dbPort = config('database.connections.mysql.port');

        $backupDir = storage_path('app/backup');
        if (! is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $timestamp = now()->format('Ymd_His');
        $filename = "db_{$timestamp}.sql";
        $path = "{$backupDir}/{$filename}";

        $this->output .= "Database : {$dbName}\n";
        $this->output .= "Menulis ke: {$filename}\n\n";

        $this->cleanOldBackups('db_*');

        $cmd = ['mysqldump'];
        if ($dbHost && $dbHost !== '127.0.0.1' && $dbHost !== 'localhost') {
            $cmd[] = '-h';
            $cmd[] = $dbHost;
        }
        if ($dbPort && (int) $dbPort !== 3306) {
            $cmd[] = '-P';
            $cmd[] = (string) $dbPort;
        }
        $cmd[] = '-u';
        $cmd[] = $dbUser;
        if ($dbPass) {
            $cmd[] = "-p{$dbPass}";
        }
        $cmd[] = $dbName;

        $result = Process::run($cmd, function ($type, $line) {
            $this->output .= $line;
        });

        if ($result->successful()) {
            file_put_contents($path, $result->output());

            if (file_exists($path) && filesize($path) > 0) {
                cache([
                    'backup_last_time' => now()->format('d M Y H:i:s'),
                    'backup_last_db_file' => $filename,
                ]);
                $this->lastBackup = cache('backup_last_time');
                $this->lastDbFile = $filename;

                $size = $this->formatSize(filesize($path));
                $this->output .= "\n✅ Backup database berhasil! ({$size})";
            } else {
                $this->output .= "\n❌ File backup kosong atau gagal ditulis.";
            }
        } else {
            $error = $result->errorOutput();
            if (str_contains($error, 'not found') || str_contains($error, 'command not found')) {
                $this->output .= "\n❌ perintah `mysqldump` tidak tersedia di server ini.";
                $this->output .= "\n   Gunakan alternatif: export manual via phpMyAdmin.";
            } else {
                $this->output .= "\n❌ Backup database gagal: {$error}";
            }
        }

        $this->isRunning = false;
    }

    public function backupStorage(): void
    {
        abort_unless(Auth::user()?->hasRole('admin lppm'), 403);

        if ($this->isRunning) {
            return;
        }

        $this->isRunning = true;
        $this->output = "Membuat backup file storage...\n";

        $backupDir = storage_path('app/backup');
        if (! is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $timestamp = now()->format('Ymd_His');
        $filename = "storage_{$timestamp}.zip";
        $path = "{$backupDir}/{$filename}";
        $storagePath = storage_path('app/public');

        if (! is_dir($storagePath)) {
            $this->output .= "\n❌ Folder storage/app/public tidak ditemukan.";
            $this->output .= "\n   Pastikan symlink storage sudah dibuat.";
            $this->isRunning = false;

            return;
        }

        $this->cleanOldBackups('storage_*');

        try {
            $zip = new ZipArchive;
            if ($zip->open($path, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                $this->output .= "\n❌ Gagal membuat file zip.";
                $this->isRunning = false;

                return;
            }

            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($storagePath),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            $count = 0;
            foreach ($files as $file) {
                if (! $file->isFile()) {
                    continue;
                }
                $relativePath = substr($file->getPathname(), strlen($storagePath) + 1);
                $zip->addFile($file->getPathname(), $relativePath);
                $count++;
            }
            $zip->close();

            if ($count > 0) {
                cache(['backup_last_storage_file' => $filename]);
                $this->lastStorageFile = $filename;

                $size = $this->formatSize(filesize($path));
                $this->output .= "\n✅ Backup storage berhasil! ({$count} file, {$size})";
            } else {
                @unlink($path);
                $this->output .= "\n⚠️ Tidak ada file storage untuk di-backup.";
                $this->output .= "\n   Upload file terlebih dahulu melalui aplikasi.";
            }
        } catch (\Exception $e) {
            $this->output .= "\n❌ Error: ".$e->getMessage();
            @unlink($path);
        }

        $this->isRunning = false;
    }

    public function render(): View
    {
        return view('livewire.settings.backup-data');
    }

    private function cleanOldBackups(string $pattern): void
    {
        $files = glob(storage_path("app/backup/{$pattern}"));
        if ($files) {
            foreach ($files as $file) {
                @unlink($file);
            }
        }
    }

    private function formatSize(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2).' '.$units[$i];
    }
}
