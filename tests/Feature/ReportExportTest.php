<?php

namespace Tests\Feature;

use App\Models\Research;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ReportExportTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected string $currentYear;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('superadmin');

        $this->currentYear = date('Y');
    }

    public function test_components_can_render()
    {
        $this->actingAs($this->admin);

        Livewire::test(\App\Livewire\Reports\Research::class)->assertStatus(200);
        Livewire::test(\App\Livewire\Reports\CommunityService::class)->assertStatus(200);
        Livewire::test(\App\Livewire\Reports\PartnerCollaboration::class)->assertStatus(200);
        Livewire::test(\App\Livewire\Reports\OutputReports::class)->assertStatus(200);
    }

    public function test_research_export_logic()
    {
        $this->actingAs($this->admin);

        $component = Livewire::test(\App\Livewire\Reports\Research::class)
            ->set('period', $this->currentYear);

        $component->call('exportPdf')->assertStatus(200);
        $component->call('exportExcel')->assertStatus(200);
    }

    public function test_community_service_export_logic()
    {
        $this->actingAs($this->admin);

        $component = Livewire::test(\App\Livewire\Reports\CommunityService::class)
            ->set('period', $this->currentYear);

        $component->call('exportPdf')->assertStatus(200);
        $component->call('exportExcel')->assertStatus(200);
    }

    public function test_partner_collaboration_export_logic()
    {
        $this->actingAs($this->admin);

        $component = Livewire::test(\App\Livewire\Reports\PartnerCollaboration::class)
            ->set('periodFilter', $this->currentYear);

        $component->call('exportPdf')->assertStatus(200);
        $component->call('exportExcel')->assertStatus(200);
    }

    public function test_output_report_export_logic()
    {
        $this->actingAs($this->admin);

        // Research tab
        $component = Livewire::test(\App\Livewire\Reports\OutputReports::class)
            ->set('activeTab', 'research');
        $component->call('exportPdf')->assertStatus(200);
        $component->call('exportExcel')->assertStatus(200);

        // PKM tab
        $component = Livewire::test(\App\Livewire\Reports\OutputReports::class)
            ->set('activeTab', 'community_service');
        $component->call('exportPdf')->assertStatus(200);
        $component->call('exportExcel')->assertStatus(200);
    }
}
