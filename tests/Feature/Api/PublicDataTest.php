<?php

namespace Tests\Feature\Api;

use App\Enums\ProposalStatus;
use App\Models\CommunityService;
use App\Models\Faculty;
use App\Models\FocusArea;
use App\Models\Institution;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\ResearchScheme;
use App\Models\ScienceCluster;
use App\Models\Theme;
use App\Models\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicDataTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed roles and base data
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        // Setup common data
        $institution = Institution::first();
        $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);

        ResearchScheme::factory()->create();
        FocusArea::factory()->create();
        Theme::factory()->create();
        Topic::factory()->create();
        ScienceCluster::factory()->create(['level' => 1]);
    }

    public function test_can_access_completed_research_via_public_api()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        $response = $this->getJson(route('api.v1.public.research.index'));

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $research->id)
            ->assertJsonPath('data.0.title', $proposal->title);
    }

    public function test_cannot_see_draft_research_in_public_api()
    {
        $research = Research::factory()->create();
        Proposal::factory()->create([
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::DRAFT,
        ]);

        $response = $this->getJson(route('api.v1.public.research.index'));

        $response->assertStatus(200)
            ->assertJsonCount(0, 'data');
    }

    public function test_can_access_completed_community_service_via_public_api()
    {
        $pkm = CommunityService::factory()->create();
        $proposal = Proposal::factory()->create([
            'detailable_id' => $pkm->id,
            'detailable_type' => CommunityService::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        $response = $this->getJson(route('api.v1.public.community-service.index'));

        $response->assertStatus(200)
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $pkm->id)
            ->assertJsonPath('data.0.title', $proposal->title);
    }

    public function test_research_api_does_not_expose_sensitive_budget_data()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
            'sbk_value' => 50000000,
        ]);

        $response = $this->getJson(route('api.v1.public.research.index'));

        $response->assertStatus(200);
        $json = $response->json('data.0');

        $this->assertArrayNotHasKey('sbk_value', $json);
        $this->assertArrayNotHasKey('budget_items', $json);
    }

    public function test_can_view_single_public_research_detail()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        $response = $this->getJson(route('api.v1.public.research.show', ['id' => $research->id]));

        $response->assertStatus(200)
            ->assertJsonPath('data.id', $research->id)
            ->assertJsonPath('data.title', $proposal->title);
    }

    public function test_can_access_public_stats()
    {
        // Research
        $research = Research::factory()->create();
        Proposal::factory()->create([
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        // PKM
        $pkm = CommunityService::factory()->create();
        Proposal::factory()->create([
            'detailable_id' => $pkm->id,
            'detailable_type' => CommunityService::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        $response = $this->getJson(route('api.v1.public.stats.index'));

        $response->assertStatus(200)
            ->assertJsonPath('data.total_research', 1)
            ->assertJsonPath('data.total_community_service', 1)
            ->assertJsonPath('data.total_projects', 2);
    }
}
