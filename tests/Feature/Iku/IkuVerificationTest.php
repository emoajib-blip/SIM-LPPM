<?php

use App\Livewire\Iku\IkuVerification;
use App\Models\MandatoryOutput;
use App\Models\ProgressReport;
use App\Models\Proposal;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Artisan;
use Livewire\Livewire;

beforeEach(function () {
    Artisan::call('db:seed', ['--class' => RoleSeeder::class]);
    $this->admin = User::factory()->create();
    $this->admin->assignRole('admin lppm');

    // Grant required permission dynamically
    \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'module_laporan']);
    $this->admin->givePermissionTo('module_laporan');
});

test('iku verification page is accessible to admin', function () {
    $this->actingAs($this->admin);

    $response = $this->get(route('accreditation.verification'));
    $response->assertStatus(200);
});

test('admin can verify a mandatory output', function () {
    $proposal = \App\Models\Proposal::factory()->create();
    $report = \App\Models\ProgressReport::factory()->create([
        'proposal_id' => $proposal->id,
        'reporting_year' => (int) date('Y'),
        'reporting_period' => 'annual',
    ]);

    $pOutput = \App\Models\ProposalOutput::factory()->create([
        'category' => 'journal',
        'type' => 'article',
    ]);

    $output = MandatoryOutput::factory()->create([
        'progress_report_id' => $report->id,
        'proposal_output_id' => $pOutput->id,
        'is_verified' => false,
    ]);

    Livewire::actingAs($this->admin)
        ->test(IkuVerification::class)
        ->call('verify', $output->id, 'mandatory')
        ->assertDispatched('notify');

    $output->refresh();
    expect($output->is_verified)->toBeTrue();
    expect($output->verified_by)->toBe($this->admin->id);
});

test('admin can update output rank', function () {
    $proposal = Proposal::factory()->create();
    $report = ProgressReport::factory()->create([
        'proposal_id' => $proposal->id,
        'reporting_year' => (int) date('Y'),
        'reporting_period' => 'annual',
    ]);

    $pOutput = \App\Models\ProposalOutput::factory()->create([
        'category' => 'journal',
        'type' => 'article',
    ]);

    $output = MandatoryOutput::factory()->create([
        'progress_report_id' => $report->id,
        'proposal_output_id' => $pOutput->id,
        'rank' => null,
    ]);

    Livewire::actingAs($this->admin)
        ->test(IkuVerification::class)
        ->call('updateRank', $output->id, 'mandatory', 'S2')
        ->assertDispatched('notify');

    $output->refresh();
    expect($output->rank)->toBe('S2');
});
