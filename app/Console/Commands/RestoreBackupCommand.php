<?php

namespace App\Console\Commands;

use App\Services\DatabaseRestoreService;
use App\Services\StorageRestoreService;
use Illuminate\Console\Command;

class RestoreBackupCommand extends Command
{
    protected $signature = 'app:restore-backup
        {--sql= : Path ke file SQL backup}
        {--storage= : Path ke file ZIP storage backup}
        {--replace : Hapus data lama sebelum INSERT (sinkronisasi, default: INSERT-only)}
        {--force : Skip konfirmasi}
        {--no-backup : Jangan backup database sebelum restore}';

    protected $description = 'Pulihkan database dan/atau storage dari file backup';

    public function handle(
        DatabaseRestoreService $dbRestore,
        StorageRestoreService $storageRestore,
    ): int {
        $sqlPath = $this->option('sql');
        $storagePath = $this->option('storage');

        if (! $sqlPath && ! $storagePath) {
            $this->error('Gunakan --sql=file.sql dan/atau --storage=file.zip');

            return 1;
        }

        if ($sqlPath) {
            if (! file_exists($sqlPath)) {
                $this->error("File SQL tidak ditemukan: {$sqlPath}");

                return 1;
            }

            $replaceMode = $this->option('replace');

            if (! $this->option('force')) {
                $preview = $dbRestore->preview($sqlPath);
                $modeLabel = $replaceMode ? 'Sinkron' : 'Tambah';
                $this->info("Preview restore database (mode: {$modeLabel}):");
                $this->line("  Total statement: {$preview['total_statements']}");
                $this->line("  Statement diizinkan: {$preview['allowed']}");
                $this->line("  Statement diblokir: {$preview['blocked_count']}");

                if (! empty($preview['tables'])) {
                    $this->line('  Tabel:');
                    $preserved = $dbRestore->getPreservedTableInfo($preview['tables']);
                    foreach ($preview['tables'] as $table => $count) {
                        $status = isset($preserved[$table]) ? '(dipertahankan)' : ($replaceMode ? '(diganti)' : '(ditambah)');
                        $this->line("    - {$table}: {$count} baris {$status}");
                    }
                }

                if ($replaceMode && ! empty($preserved)) {
                    $this->line('  Tabel sistem dipertahankan: '.implode(', ', array_keys($preserved)));
                }

                if (! $this->confirm('Lanjutkan restore database?', false)) {
                    $this->warn('Dibatalkan.');

                    return 0;
                }
            }

            $result = $replaceMode
                ? $dbRestore->restoreWithReplace($sqlPath, ! $this->option('no-backup'))
                : $dbRestore->restore($sqlPath, ! $this->option('no-backup'));

            if ($result['success']) {
                $this->info($result['message']);
                if ($result['backup_path'] && file_exists($result['backup_path'])) {
                    $this->line('Backup pra-restore: '.$result['backup_path']);
                }
            } else {
                $this->error($result['message']);

                return 1;
            }
        }

        if ($storagePath) {
            if (! file_exists($storagePath)) {
                $this->error("File ZIP tidak ditemukan: {$storagePath}");

                return 1;
            }

            if (! $this->option('force')) {
                if (! $this->confirm('Lanjutkan restore storage? File dengan nama sama akan ditimpa.', false)) {
                    $this->warn('Dibatalkan.');

                    return 0;
                }
            }

            $result = $storageRestore->restore($storagePath);

            if ($result['success']) {
                $this->info($result['message']);
            } else {
                $this->error($result['message']);

                return 1;
            }
        }

        return 0;
    }
}
