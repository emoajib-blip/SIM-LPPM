<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('sets active role automatically when user has roles', function () {
    // Run the database seeder to create roles
    $this->artisan('db:seed', ['--class' => 'Database\Seeders\RoleSeeder'])->run();

    // Create user with multiple roles
    $user = User::factory()->create();
    $user->assignRole('admin lppm');
    $user->assignRole('dosen');

    // Act as user
    $this->actingAs($user)->get('/dashboard');

    // Check that active role is set
    $activeRole = session('active_role');
    expect($activeRole)->toBeIn(['admin lppm', 'dosen']);
});

it('formats role names correctly', function () {
    expect(format_role_name('admin lppm'))->toBe('Admin Lppm');
    expect(format_role_name('dosen'))->toBe('Dosen');
    expect(format_role_name('kepala lppm'))->toBe('Kepala Lppm');
});

it('format_name helper combines prefix and suffix correctly', function () {
    expect(format_name('Dr.', 'Budi Santoso', 'M.Sc.'))
        ->toBe('Dr. Budi Santoso, M.Sc.');

    expect(format_name('Dr.', 'Dr. Budi', ''))
        ->toBe('Dr. Budi');

    expect(format_name('', 'Anna', 'S.T.'))
        ->toBe('Anna, S.T.');

    expect(format_name('', 'Candra', ''))->toBe('Candra');
});
