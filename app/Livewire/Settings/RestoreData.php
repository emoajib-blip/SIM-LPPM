<?php

namespace App\Livewire\Settings;

use App\Services\DatabaseRestoreService;
use App\Services\StorageRestoreService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class RestoreData extends Component
{
    use WithFileUploads;

    public $sqlFile = null;

    public $zipFile = null;

    public string $output = '';

    public bool $isRunning = false;

    public bool $hasPreview = false;

    public array $preview = [];

    public ?string $uploadedSqlPath = null;

    public ?string $uploadedZipPath = null;

    public function mount(): void
    {
        abort_unless(Auth::user()?->hasRole('admin lppm'), 403);
    }

    public function updatedSqlFile(): void
    {
        $this->validate([
            'sqlFile' => 'file|mimes:sql,text,plain|max:204800',
        ]);

        $this->output = '';
        $this->hasPreview = false;
        $this->preview = [];
        $this->uploadedSqlPath = null;
        $this->zipFile = null;
        $this->uploadedZipPath = null;

        $backupDir = storage_path('app/backup');
        if (! is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $filename = 'upload_restore_'.now()->format('Ymd_His').'.sql';
        $this->sqlFile->move($backupDir, $filename);
        $this->uploadedSqlPath = $backupDir.'/'.$filename;

        if (! file_exists($this->uploadedSqlPath)) {
            $this->output = "❌ Gagal menyimpan file ke {$backupDir}.\n";

            return;
        }

        $service = app(DatabaseRestoreService::class);
        $this->preview = $service->preview($this->uploadedSqlPath);
        $this->hasPreview = true;

        $this->output = "File: {$filename}\n";
        $this->output .= 'Tabel: '.count($this->preview['tables'])."\n";
        $this->output .= "Baris: {$this->preview['allowed']}\n";

        if ($this->preview['blocked_count'] > 0) {
            $this->output .= "\n⚠️ Statement diblokir: {$this->preview['blocked_count']}\n";
            foreach (array_slice($this->preview['blocked'], 0, 5) as $b) {
                $this->output .= "  [{$b['type']}] {$b['preview']}...\n";
            }
        }
    }

    public function updatedZipFile(): void
    {
        $this->validate([
            'zipFile' => 'file|mimes:zip|max:512000',
        ]);

        $this->output = '';
        $this->hasPreview = false;
        $this->preview = [];
        $this->uploadedZipPath = null;
        $this->sqlFile = null;
        $this->uploadedSqlPath = null;

        $backupDir = storage_path('app/backup');
        if (! is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $filename = 'upload_restore_'.now()->format('Ymd_His').'.zip';
        $this->zipFile->move($backupDir, $filename);
        $this->uploadedZipPath = $backupDir.'/'.$filename;

        if (! file_exists($this->uploadedZipPath)) {
            $this->output = "❌ Gagal menyimpan file ke {$backupDir}.\n";

            return;
        }

        $service = app(StorageRestoreService::class);
        $validation = $service->preview($this->uploadedZipPath);

        $this->hasPreview = true;
        $this->preview = $validation['validation'];

        $this->output = "File: {$filename}\n";
        $this->output .= "Entries: {$validation['total_entries']}\n";
        $this->output .= 'Ukuran: '.$this->formatSize($validation['total_size'])."\n";

        if (! $validation['validation']['valid']) {
            $this->output .= "\n⚠️ Masalah terdeteksi:\n";
            foreach ($validation['validation']['issues'] as $issue) {
                $this->output .= "  ❌ {$issue}\n";
            }
        } else {
            $this->output .= "\n✅ File ZIP aman untuk dipulihkan.";
        }
    }

    public function executeRestore(): void
    {
        abort_unless(Auth::user()?->hasRole('admin lppm'), 403);

        if ($this->isRunning) {
            return;
        }

        $this->isRunning = true;
        $this->output = '';

        try {
            if ($this->uploadedSqlPath) {
                $this->output .= "Memulihkan database...\n";
                $service = app(DatabaseRestoreService::class);
                $result = $service->restore($this->uploadedSqlPath, true);

                $this->output .= $result['message']."\n";

                if (! empty($result['errors'])) {
                    foreach (array_slice($result['errors'], 0, 10) as $e) {
                        $this->output .= "  ⚠️ {$e['error']}\n";
                    }
                }
            }

            if ($this->uploadedZipPath) {
                $this->output .= "\nMemulihkan file storage...\n";
                $service = app(StorageRestoreService::class);
                $result = $service->restore($this->uploadedZipPath);

                $this->output .= $result['message']."\n";

                if (! empty($result['skipped'])) {
                    foreach (array_slice($result['skipped'], 0, 5) as $s) {
                        $this->output .= "  ⚠️ Dilewati: {$s}\n";
                    }
                }
            }

            $this->output .= "\n✅ Proses pulihkan selesai!";
        } catch (\Throwable $e) {
            $this->output .= "\n❌ Error: {$e->getMessage()}";
        }

        $this->isRunning = false;
        $this->hasPreview = false;
        $this->preview = [];
    }

    public function resetUpload(): void
    {
        $this->sqlFile = null;
        $this->zipFile = null;
        $this->output = '';
        $this->hasPreview = false;
        $this->preview = [];
        $this->uploadedSqlPath = null;
        $this->uploadedZipPath = null;
    }

    public function render(): View
    {
        return view('livewire.settings.restore-data');
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
