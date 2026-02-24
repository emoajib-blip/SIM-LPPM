<?php

namespace Tests\Feature\Settings;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProposalTemplateTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // ensure roles exist
        $this->artisan('db:seed', ['--class' => 'Database\\Seeders\\RoleSeeder'])->run();
    }

    public function test_page_loads_for_admin_lppm()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin lppm');

        $this->actingAs($admin)
            ->get(route('settings.proposal-template'))
            ->assertOk()
            ->assertSee('Template Proposal')
            ->assertSee('Template Laporan')
            ->assertSee('Template Monev Internal');
    }

    public function test_non_admin_cannot_access()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('settings.proposal-template'))
            ->assertForbidden();
    }
}
