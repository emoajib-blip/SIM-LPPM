<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminReportExportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup roles
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);
    }

    public function test_admin_can_download_iku_report()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'module_iku']);
        $admin->givePermissionTo('module_iku');

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

        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'module_laporan']);
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
