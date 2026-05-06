<?php

use App\Models\Faculty;
use App\Models\Institution;
use App\Models\StudyProgram;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RoleSeeder::class);
});

it('stores research_roadmap data only when feature flag is active', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $user = User::factory()->create();
    $user->assignRole('admin lppm');

    \App\Models\Setting::set('feature_roadmap_active', true, 'boolean');

    $program = StudyProgram::create([
        'name' => 'Teknik Informatika',
        'code' => 'TI',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => [
            'period' => '2025-2029',
            'priorities' => [
                ['year' => 2025, 'themes' => 'AI, IoT', 'tkt_focus' => '1-3'],
            ],
        ],
    ]);

    expect($program->research_roadmap)->toHaveKey('period', '2025-2029');
    expect($program->research_roadmap['priorities'])->toHaveCount(1);
});

it('gates roadmap UI behind feature flag in view', function () {
    \App\Models\Setting::set('feature_roadmap_active', false, 'boolean');

    $user = User::factory()->create();
    $user->assignRole('admin lppm');

    $response = $this->actingAs($user)->get(route('settings.master-data', ['group' => 'academic-structure']));

    // View should not contain roadmap fields when flag is off
    $response->assertDontSee('Peta Jalan (Roadmap)');
    $response->assertDontSee('Periode Roadmap');
});

it('shows roadmap UI when feature flag is active', function () {
    \App\Models\Setting::set('feature_roadmap_active', true, 'boolean');

    $user = User::factory()->create();
    $user->assignRole('admin lppm');

    // Check master data page shows roadmap sidebar links when flag is on
    $response = $this->actingAs($user)->get(route('settings.master-data', ['group' => 'academic-structure']));

    // Sidebar should contain roadmap links
    $response->assertSee('Peta Jalan Fakultas');
    $response->assertSee('Peta Jalan Prodi');
});

it('tracks roadmap status for study programs', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);

    $program = StudyProgram::create([
        'name' => 'Sistem Informasi',
        'code' => 'SI',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'roadmap_status' => 'draft',
    ]);

    expect($program->roadmap_status)->toBe('draft');

    $program->update(['roadmap_status' => 'submitted']);
    expect($program->fresh()->roadmap_status)->toBe('submitted');
});

it('casts research_roadmap to array automatically', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);

    $program = StudyProgram::create([
        'name' => 'Teknik Elektro',
        'code' => 'TE',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => [
            'period' => '2025-2029',
            'research_tree' => ['Fundamental', 'Applied'],
        ],
    ]);

    expect($program->research_roadmap)->toBeArray();
    expect($program->research_roadmap['period'])->toBe('2025-2029');

    // Fetch fresh from DB
    $fresh = StudyProgram::find($program->id);
    expect($fresh->research_roadmap)->toBeArray();
    expect($fresh->research_roadmap['research_tree'])->toContain('Fundamental');
});
