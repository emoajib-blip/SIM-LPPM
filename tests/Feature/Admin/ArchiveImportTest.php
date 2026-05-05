<?php

namespace Tests\Feature\Admin;

use App\Imports\HistoricalProposalImport;
use App\Livewire\Admin\Archive\ManageArchives;
use App\Models\Identity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ArchiveImportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    public function test_admin_can_import_archives_from_excel()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        $ketua = User::factory()->create(['name' => 'Dr. Ketua']);
        $ketua->assignRole('dosen');
        Identity::factory()->create([
            'user_id' => $ketua->id,
            'identity_id' => '12345',
            'type' => 'dosen',
        ]);

        Excel::shouldReceive('import')
            ->once()
            ->andReturnUsing(function (HistoricalProposalImport $importer, $file) {
                $rows = collect([
                    collect([
                        'judul' => 'Arsip Penelitian 2024',
                        'skema' => 'Penelitian',
                        'tahun' => 2024,
                        'nidn' => '',
                        'nama_dosen' => 'Dr. Ketua',
                        'ringkasan' => 'Data historis',
                        'dana' => '10000000',
                        'lama_kegiatan' => 1,
                    ]),
                ]);

                DB::beginTransaction();
                try {
                    $importer->collection($rows);
                    DB::commit();
                } catch (\Throwable $e) {
                    DB::rollBack();
                    throw $e;
                }
            });

        $file = UploadedFile::fake()->create('arsip.xlsx');

        Livewire::actingAs($admin)
            ->test(ManageArchives::class)
            ->set('showImportModal', true)
            ->set('importFile', $file)
            ->call('import')
            ->assertSet('showImportModal', false);

        $this->assertDatabaseHas('proposals', [
            'title' => 'Arsip Penelitian 2024',
            'status' => 'COMPLETED',
        ]);
    }

    public function test_import_shows_warning_when_rows_fail()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        Excel::shouldReceive('import')
            ->once()
            ->andReturnUsing(function (HistoricalProposalImport $importer, $file) {
                $rows = collect([
                    collect([
                        // Hilangkan 'judul' untuk memicu failure
                        'skema' => 'Penelitian',
                        'tahun' => 2024,
                        'nidn' => '99999',
                        'nama_dosen' => 'Tidak Ada',
                    ]),
                ]);
                $importer->collection($rows);
            });

        $file = UploadedFile::fake()->create('arsip.xlsx');

        Livewire::actingAs($admin)
            ->test(ManageArchives::class)
            ->set('showImportModal', true)
            ->set('importFile', $file)
            ->call('import')
            ->assertSet('showImportModal', false);

        $this->assertDatabaseCount('proposals', 0);
    }
}
