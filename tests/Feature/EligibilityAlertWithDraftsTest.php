<?php

use App\Enums\ProposalStatus;
use App\Models\CommunityService;
use App\Models\CommunityServiceScheme;
use App\Models\Identity;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\ResearchScheme;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RoleSeeder::class);
});

it('hides scheme eligibility alert when user has submittable draft proposals', function () {
    $user = User::factory()->create();
    $user->assignRole('dosen');

    $identity = Identity::factory()->create([
        'user_id' => $user->id,
        'sinta_score_v3_overall' => 0.5,
    ]);

    $researchScheme = ResearchScheme::factory()->create([
        'eligibility_rules' => [
            'min_sinta_score' => 3.0,
        ],
    ]);

    \App\Models\Setting::updateOrCreate(
        ['key' => 'research_proposal_start_date'],
        ['value' => now()->subDay()->toDateString()]
    );
    \App\Models\Setting::updateOrCreate(
        ['key' => 'research_proposal_end_date'],
        ['value' => now()->addDay()->toDateString()]
    );

    $research = Research::factory()->create();
    Proposal::factory()->create([
        'submitter_id' => $user->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'research_scheme_id' => $researchScheme->id,
        'status' => ProposalStatus::DRAFT,
    ]);

    $hasSubmittable = Proposal::where('submitter_id', $user->id)
        ->whereIn('status', [
            ProposalStatus::DRAFT,
            ProposalStatus::NEED_ASSIGNMENT,
            ProposalStatus::REVISION_NEEDED,
        ])
        ->exists();

    expect($hasSubmittable)->toBeTrue();

    $response = $this->actingAs($user)
        ->get(route('research.proposal.index'));

    $response->assertStatus(200);
    $response->assertDontSee('Status Eligibilitas Skema: Tidak Memenuhi Syarat');
});

it('shows scheme eligibility alert when user has no submittable proposals', function () {
    $user = User::factory()->create();
    $user->assignRole('dosen');

    Identity::factory()->create([
        'user_id' => $user->id,
        'sinta_score_v3_overall' => 0.5,
    ]);

    \App\Models\Setting::updateOrCreate(
        ['key' => 'research_proposal_start_date'],
        ['value' => now()->subDay()->toDateString()]
    );
    \App\Models\Setting::updateOrCreate(
        ['key' => 'research_proposal_end_date'],
        ['value' => now()->addDay()->toDateString()]
    );

    expect(Proposal::where('submitter_id', $user->id)->exists())->toBeFalse();

    $response = $this->actingAs($user)
        ->get(route('research.proposal.index'));

    $response->assertStatus(200);
    $response->assertSee('Status Eligibilitas Skema: Tidak Memenuhi Syarat');
});

it('keeps scheme eligibility strict for new proposal creation', function () {
    $user = User::factory()->create();
    $user->assignRole('dosen');

    $identity = Identity::factory()->create([
        'user_id' => $user->id,
        'sinta_score_v3_overall' => 0.5,
    ]);

    $researchScheme = ResearchScheme::factory()->create([
        'eligibility_rules' => [
            'min_sinta_score' => 3.0,
        ],
    ]);

    \App\Models\Setting::updateOrCreate(
        ['key' => 'research_proposal_start_date'],
        ['value' => now()->subDay()->toDateString()]
    );
    \App\Models\Setting::updateOrCreate(
        ['key' => 'research_proposal_end_date'],
        ['value' => now()->addDay()->toDateString()]
    );

    $eligibilityService = app(\App\Services\EligibilityService::class);
    $canSubmit = $eligibilityService->canSubmitResearchProposal($identity, $researchScheme);

    expect($canSubmit)->toBeFalse();

    $eligibleSchemes = $eligibilityService->getEligibleResearchSchemes($identity);
    expect($eligibleSchemes->contains($researchScheme))->toBeFalse();
});

it('hides alert for NEED_ASSIGNMENT and REVISION_NEEDED statuses', function () {
    $user = User::factory()->create();
    $user->assignRole('dosen');

    Identity::factory()->create([
        'user_id' => $user->id,
        'sinta_score_v3_overall' => 0.5,
    ]);

    $researchScheme = ResearchScheme::factory()->create(['eligibility_rules' => ['min_sinta_score' => 3.0]]);
    $pkmScheme = CommunityServiceScheme::create([
        'name' => 'PKM Internal',
        'strata' => 'Internal',
        'eligibility_rules' => ['min_sinta_score' => 3.0],
    ]);

    \App\Models\Setting::updateOrCreate(['key' => 'research_proposal_start_date'], ['value' => now()->subDay()->toDateString()]);
    \App\Models\Setting::updateOrCreate(['key' => 'research_proposal_end_date'], ['value' => now()->addDay()->toDateString()]);
    \App\Models\Setting::updateOrCreate(['key' => 'community_service_proposal_start_date'], ['value' => now()->subDay()->toDateString()]);
    \App\Models\Setting::updateOrCreate(['key' => 'community_service_proposal_end_date'], ['value' => now()->addDay()->toDateString()]);

    $research = Research::factory()->create();
    Proposal::factory()->create([
        'submitter_id' => $user->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'research_scheme_id' => $researchScheme->id,
        'status' => ProposalStatus::NEED_ASSIGNMENT,
    ]);

    $response = $this->actingAs($user)->get(route('research.proposal.index'));
    $response->assertDontSee('Status Eligibilitas Skema: Tidak Memenuhi Syarat');

    $communityService = CommunityService::factory()->create();
    Proposal::factory()->create([
        'submitter_id' => $user->id,
        'detailable_id' => $communityService->id,
        'detailable_type' => CommunityService::class,
        'community_service_scheme_id' => $pkmScheme->id,
        'status' => ProposalStatus::REVISION_NEEDED,
    ]);

    $response = $this->actingAs($user)->get(route('community-service.proposal.index'));
    $response->assertDontSee('Status Eligibilitas Skema: Tidak Memenuhi Syarat');
});
