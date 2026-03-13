<?php

use App\Livewire\Iku\IkuDashboard;
use App\Models\Identity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'Database\Seeders\RoleSeeder']);
    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'Database\Seeders\MasterIkuSeeder']);
});

test('it can render the dashboard', function () {
    $user = User::factory()->create();
    $user->assignRole('admin lppm');

    Livewire::actingAs($user)
        ->test(IkuDashboard::class)
        ->assertStatus(200)
        ->assertSee('Sinkronisasi Data IKU & SINTA', false);
});

test('it calculates iku4 correctly', function () {
    // 1 lecturer with recognition, 1 without
    Identity::factory()->create(['type' => 'dosen', 'scopus_id' => '123']);
    Identity::factory()->create(['type' => 'dosen', 'scopus_id' => null, 'sinta_id' => null, 'wos_id' => null]);

    $user = User::factory()->create();
    $user->assignRole('admin lppm');

    Livewire::actingAs($user)
        ->test(IkuDashboard::class)
        ->assertSee('50.0%');
});
