<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RealHttpGetTest extends TestCase
{
    use RefreshDatabase;

    public function test_master_data_get_request()
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $user = \App\Models\User::factory()->create();
        $user->assignRole('admin lppm');

        $response = $this->actingAs($user)
            ->get('/settings/master-data?group=academic-content&tab=sdgs');

        $response->assertStatus(200);
    }
}
