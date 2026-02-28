<?php

namespace Tests\Feature;

use App\Livewire\Settings\MasterData;
use Livewire\Livewire;
use Tests\TestCase;

class FakeSdgTest extends TestCase
{
    public function test_master_data_sdgs_tab_can_render_without_403()
    {
        // Avoid running migrations, use existing DB
        config(['database.default' => config('database.default', 'mysql')]);

        $user = \App\Models\User::role(['admin lppm', 'superadmin'])->first();
        if ($user) {
            \Illuminate\Support\Facades\Auth::login($user);
            session()->put('active_role', $user->getRoleNames()->first());
        }

        Livewire::actingAs($user)
            ->test(MasterData::class, ['group' => 'academic-content', 'activeTab' => 'sdgs'])
            ->assertStatus(200);
    }
}
