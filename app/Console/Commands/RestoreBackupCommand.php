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

            if (! $this->option('force')) {
                $preview = $dbRestore->preview($sqlPath);
                $this->info('Preview restore database:');
                $this->line("  Total statement: {$preview['total_statements']}");
                $this->line("  Statement diizinkan: {$preview['allowed']}");
                $this->line("  Statement diblokir: {$preview['blocked_count']}");

                if (! empty($preview['tables'])) {
                    $this->line('  Tabel yang akan diisi:');
                    foreach ($preview['tables'] as $table => $count) {
                        $this->line("    - {$table}: {$count} baris");
                    }
                }

                if (! $this->confirm('Lanjutkan restore database?', false)) {
                    $this->warn('Dibatalkan.');

                    return 0;
                }
            }

            $result = $dbRestore->restore($sqlPath, ! $this->option('no-backup'));

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
