<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\InstitutionSeeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class AdminReportExportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup roles
        $this->seed(RoleSeeder::class);
        $this->seed(InstitutionSeeder::class);
    }

    public function test_admin_can_download_iku_report()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        Permission::firstOrCreate(['name' => 'module_laporan']);
        $admin->givePermissionTo('module_laporan');

        // Note: No Rektor or LPPM Head created intentionally to test null-safety

        $response = $this->actingAs($admin)
            ->get(route('admin.iku.export-pdf', ['period' => date('Y')]));

        if ($response->isRedirect()) {
            var_dump(session('error'));
        }

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    public function test_admin_can_download_research_recap()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        Permission::firstOrCreate(['name' => 'module_laporan']);
        $admin->givePermissionTo('module_laporan');

        $response = $this->actingAs($admin)
            ->get(route('reports.research.pdf', ['period' => date('Y')]));

        if ($response->isRedirect()) {
            var_dump(session('error'));
        }

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
