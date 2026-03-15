<?php

namespace Tests\Feature;

use App\Livewire\Settings\MasterData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class FakeSdgTest extends TestCase
{
    use RefreshDatabase;

    public function test_master_data_sdgs_tab_can_render_without_403()
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);

        $user = \App\Models\User::factory()->create();
        $user->assignRole('admin lppm');

        Livewire::actingAs($user)
            ->test(MasterData::class, ['group' => 'academic-content', 'activeTab' => 'sdgs'])
            ->assertStatus(200);
    }
}
