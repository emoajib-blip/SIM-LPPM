<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class SyncProductionData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-production {--force : Skip confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data dari server produksi ke localhost (Database & Storage)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if (config('app.env') !== 'local' && ! $this->option('force')) {
            $this->error('Command ini hanya boleh dijalankan di lingkungan LOCAL!');

            return 1;
        }

        $remoteUser = 'simlppmi';
        $remoteHost = 'sim-lppm.itsnupekalongan.ac.id';
        $remotePath = '/home/simlppmi/sim-lppm';
        $remoteDb = 'simlppmi_sim_lppm';

        $this->info("🚀 Memulai sinkronisasi dari $remoteHost...");

        // 1. Dump Remote Database
        $this->comment('📥 1/4 Membuat dump database di server remote...');
        $dumpCmd = "ssh $remoteUser@$remoteHost \"mysqldump -u $remoteUser -p $remoteDb > $remotePath/prod_dump_temp.sql\"";
        $result = Process::run($dumpCmd);

        if ($result->failed()) {
            $this->error('Gagal membuat dump di server: '.$result->errorOutput());

            return 1;
        }

        // 2. Download Dump
        $this->comment('🚚 2/4 Mendownload file dump...');
        $scpCmd = "scp $remoteUser@$remoteHost:$remotePath/prod_dump_temp.sql ".base_path('prod_dump_temp.sql');
        Process::run($scpCmd);

        // 3. Import to Local
        $this->comment('💾 3/4 Mengimport data ke database lokal...');
        $dbName = config('database.connections.mysql.database');
        $dbUser = config('database.connections.mysql.username');
        $dbPass = config('database.connections.mysql.password');

        // Deteksi Docker
        $isDocker = config('database.connections.mysql.host') === 'mariadb' || config('database.connections.mysql.host') === 'mysql';

        if ($isDocker) {
            // Jika di dalam container, kita butuh cara untuk kirim file ke container db
            // Tapi biasanya script ini dijalankan di host yang punya akses ke docker exec
            $importCmd = "docker exec -i sim-lppm-mariadb mariadb -u $dbUser -p$dbPass $dbName < ".base_path('prod_dump_temp.sql');
        } else {
            $importCmd = "mysql -u $dbUser -p$dbPass $dbName < ".base_path('prod_dump_temp.sql');
        }

        $importResult = Process::run($importCmd);

        // 4. Sync Files
        $this->comment('📂 4/4 Sinkronisasi file storage (rsync)...');
        $rsyncCmd = "rsync -avz -e ssh $remoteUser@$remoteHost:$remotePath/storage/app/public/ ".storage_path('app/public/');
        Process::run($rsyncCmd);

        // Cleanup
        @unlink(base_path('prod_dump_temp.sql'));
        Process::run("ssh $remoteUser@$remoteHost \"rm $remotePath/prod_dump_temp.sql\"");

        $this->info('✅ Sinkronisasi SELESAI!');

        return 0;
    }
}
