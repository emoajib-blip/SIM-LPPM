<?php

namespace Tests\Feature;

use App\Enums\ProposalStatus;
use App\Enums\ReviewStatus;
use App\Livewire\Actions\ApproveProposalAction;
use App\Livewire\Actions\AssignReviewersAction;
use App\Livewire\Actions\CompleteReviewAction;
use App\Livewire\Actions\DekanApprovalAction;
use App\Livewire\Actions\RequestReReviewAction;
use App\Livewire\Actions\SubmitProposalAction;
use App\Models\BudgetCap;
use App\Models\CommunityService;
use App\Models\Faculty;
use App\Models\FocusArea;
use App\Models\Identity;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\ResearchScheme;
use App\Models\ScienceCluster;
use App\Models\Theme;
use App\Models\Topic;
use App\Models\User;
use App\Services\ProposalService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ProposalWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected User $dosen;

    protected User $dekan;

    protected User $kepalaLppm;

    protected User $adminLppm;

    protected User $reviewer1;

    protected User $reviewer2;

    protected Faculty $faculty;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed roles
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        // Setup Master Data
        $institution = \App\Models\Institution::first();
        $this->faculty = Faculty::factory()->create([
            'name' => 'Fakultas Teknik',
            'institution_id' => $institution->id,
        ]);
        $scheme = ResearchScheme::factory()->create(['name' => 'Penelitian Dosen Pemula']);
        $focusArea = FocusArea::factory()->create(['name' => 'Energi']);
        $theme = Theme::factory()->create(['focus_area_id' => $focusArea->id, 'name' => 'Energi Terbarukan']);
        $topic = Topic::factory()->create(['theme_id' => $theme->id, 'name' => 'Panel Surya']);

        \App\Models\ReviewCriteria::create([
            'id' => 1,
            'criteria' => 'Relevansi',
            'weight' => 20,
            'type' => 'research',
            'order' => 1,
            'is_active' => true,
        ]);

        ScienceCluster::factory()->create(['level' => 1, 'name' => 'Teknik']);

        // Create users
        $this->dosen = User::factory()->create(['name' => 'Dosen Pengusul']);
        $this->dosen->assignRole('dosen');
        Identity::factory()->create(['user_id' => $this->dosen->id, 'faculty_id' => $this->faculty->id]);

        $this->dekan = User::factory()->create(['name' => 'Dekan Fakultas']);
        $this->dekan->assignRole('dekan');
        Identity::factory()->create(['user_id' => $this->dekan->id, 'faculty_id' => $this->faculty->id]);

        // Create a second faculty and dekan for cross-faculty testing
        $this->otherFaculty = Faculty::factory()->create([
            'name' => 'Fakultas Kedokteran',
            'institution_id' => $institution->id,
        ]);
        $this->otherDekan = User::factory()->create(['name' => 'Dekan Fakultas Kedokteran']);
        $this->otherDekan->assignRole('dekan');
        Identity::factory()->create(['user_id' => $this->otherDekan->id, 'faculty_id' => $this->otherFaculty->id]);

        $this->kepalaLppm = User::factory()->create(['name' => 'Kepala LPPM']);
        $this->kepalaLppm->assignRole('kepala lppm');
        Identity::factory()->create(['user_id' => $this->kepalaLppm->id, 'faculty_id' => $this->faculty->id]);

        $this->adminLppm = User::factory()->create(['name' => 'Admin LPPM']);
        $this->adminLppm->assignRole('admin lppm');
        Identity::factory()->create(['user_id' => $this->adminLppm->id, 'faculty_id' => $this->faculty->id]);

        $this->reviewer1 = User::factory()->create(['name' => 'Reviewer 1']);
        $this->reviewer1->assignRole('reviewer');
        Identity::factory()->create(['user_id' => $this->reviewer1->id, 'faculty_id' => $this->faculty->id]);

        $this->reviewer2 = User::factory()->create(['name' => 'Reviewer 2']);
        $this->reviewer2->assignRole('reviewer');
        Identity::factory()->create(['user_id' => $this->reviewer2->id, 'faculty_id' => $this->faculty->id]);

        Notification::fake();
    }

    public function test_complete_proposal_workflow_happy_path()
    {
        // 1. Creation Phase (Dosen)
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::DRAFT,
            'research_scheme_id' => ResearchScheme::first()->id,
            'focus_area_id' => FocusArea::first()->id,
            'theme_id' => Theme::first()->id,
            'topic_id' => Topic::first()->id,
            'cluster_level1_id' => ScienceCluster::first()->id,
        ]);

        // Add Ketua (Submitter) to team members
        $proposal->teamMembers()->attach($this->dosen->id, [
            'role' => 'ketua',
            'status' => 'accepted',
            'tasks' => 'Principal Investigator',
        ]);

        // Add Anggota Tim
        $teamMember = User::factory()->create(['name' => 'Anggota Tim']);
        $teamMember->assignRole('dosen');
        $proposal->teamMembers()->attach($teamMember->id, [
            'role' => 'anggota',
            'status' => 'pending',
            'tasks' => 'Supporting research',
        ]);

        $this->assertEquals(ProposalStatus::DRAFT, $proposal->status);

        // Attempt submission should fail because team member hasn't accepted
        $submitAction = app(SubmitProposalAction::class);
        $this->actingAs($this->dosen);
        $result = $submitAction->execute($proposal);
        $this->assertFalse($result['success']);

        // Team member accepts
        $this->actingAs($teamMember);
        $proposal->teamMembers()->updateExistingPivot($teamMember->id, ['status' => 'accepted']);

        // 3. Submission Phase (Dosen)
        $this->actingAs($this->dosen);
        $result = $submitAction->execute($proposal->fresh());
        $this->assertTrue($result['success']);
        $this->assertEquals(ProposalStatus::SUBMITTED, $proposal->fresh()->status);

        // 4. Dekan Approval Phase
        $this->actingAs($this->dekan);
        $dekanAction = app(DekanApprovalAction::class);
        $result = $dekanAction->execute($proposal->fresh(), 'APPROVED', 'I am from other faculty', $this->otherDekan);

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('Dekan hanya dapat menyetujui proposal dari fakultas yang sama', $result['message']);
        $this->assertEquals(ProposalStatus::SUBMITTED, $proposal->fresh()->status);
    }

    public function test_dosen_cannot_submit_if_member_rejected()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::DRAFT,
        ]);

        $proposal->teamMembers()->attach($this->dosen->id, ['role' => 'ketua', 'status' => 'accepted']);

        $teamMember = User::factory()->create();
        $teamMember->assignRole('dosen');
        $proposal->teamMembers()->attach($teamMember->id, [
            'role' => 'anggota',
            'status' => 'rejected',
        ]);

        $this->actingAs($this->dosen);
        $submitAction = app(SubmitProposalAction::class);
        $result = $submitAction->execute($proposal);

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('anggota masih belum menerima undangan', $result['message']);
    }

    public function test_admin_lppm_cannot_assign_reviewer_to_draft_proposal()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::DRAFT,
        ]);

        $this->actingAs($this->adminLppm);
        $assignAction = app(AssignReviewersAction::class);
        $result = $assignAction->execute($proposal, $this->reviewer1->id);

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('Proposal harus dalam status menunggu penugasan reviewer', $result['message']);
    }

    public function test_reviewer_cannot_complete_review_twice()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::UNDER_REVIEW,
        ]);

        $this->actingAs($this->adminLppm);
        app(AssignReviewersAction::class)->execute($proposal, $this->reviewer1->id);

        $this->actingAs($this->reviewer1);
        $review = $proposal->fresh()->reviewers()->first();
        $review->markAsStarted();

        $completeReviewAction = app(CompleteReviewAction::class);
        \App\Models\ReviewScore::create([
            'proposal_reviewer_id' => $review->id,
            'review_criteria_id' => 1,
            'score' => 5,
            'round' => 1,
            'acuan' => 'Evidence',
            'weight_snapshot' => 10,
            'value' => 50,
        ]);
        $result1 = $completeReviewAction->execute($review, 'First attempt', 'approved');
        $this->assertTrue($result1['success']);

        $result2 = $completeReviewAction->execute($review->fresh(), 'Second attempt', 'approved');
        $this->assertFalse($result2['success']);
        $this->assertStringContainsString('Review sudah selesai dan tidak dapat diubah', $result2['message']);
    }

    public function test_kepala_lppm_cannot_make_final_decision_before_all_reviews_completed()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::UNDER_REVIEW,
        ]);

        $this->actingAs($this->adminLppm);
        app(AssignReviewersAction::class)->execute($proposal, $this->reviewer1->id);
        app(AssignReviewersAction::class)->execute($proposal, $this->reviewer2->id);

        // Only one reviewer completes
        $this->actingAs($this->reviewer1);
        $review1 = $proposal->fresh()->reviewers()->where('user_id', $this->reviewer1->id)->first();
        \App\Models\ReviewScore::create(['proposal_reviewer_id' => $review1->id, 'review_criteria_id' => 1, 'score' => 5, 'round' => 1, 'acuan' => 'Evidence', 'weight_snapshot' => 10, 'value' => 50]);
        $review1->markAsStarted();
        app(CompleteReviewAction::class)->execute($review1, 'I am fast', 'approved');

        // Attempt final decision by Kepala LPPM
        $this->actingAs($this->kepalaLppm);
        $finalDecisionAction = app(ApproveProposalAction::class);
        $result = $finalDecisionAction->execute($proposal->fresh(), 'completed');

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('reviewer masih belum menyelesaikan review', $result['message']);
        $this->assertNotEquals(ProposalStatus::COMPLETED, $proposal->fresh()->status);
    }

    public function test_dekan_can_reject_proposal()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::SUBMITTED,
        ]);

        $this->actingAs($this->dekan);
        $dekanAction = app(DekanApprovalAction::class);
        $result = $dekanAction->execute($proposal, 'NEED_ASSIGNMENT', 'Perbaiki tim', $this->dekan);

        $this->assertTrue($result['success']);
        $this->assertEquals(ProposalStatus::NEED_ASSIGNMENT, $proposal->fresh()->status);
    }

    public function test_kepala_lppm_can_reject_proposal_at_final_decision()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::WAITING_REVIEWER,
        ]);

        // Reviewers must be completed
        $this->actingAs($this->adminLppm);
        app(AssignReviewersAction::class)->execute($proposal, $this->reviewer1->id);

        $this->actingAs($this->reviewer1);
        $review = $proposal->fresh()->reviewers()->first();
        \App\Models\ReviewScore::create(['proposal_reviewer_id' => $review->id, 'review_criteria_id' => 1, 'score' => 2, 'round' => 1, 'acuan' => 'Evidence', 'weight_snapshot' => 10, 'value' => 20]);
        $review->markAsStarted();
        app(CompleteReviewAction::class)->execute($review, 'Rejected review', 'rejected');

        $this->assertEquals(ProposalStatus::REVIEWED, $proposal->fresh()->status);

        $this->actingAs($this->kepalaLppm);
        $finalAction = app(ApproveProposalAction::class);
        $result = $finalAction->execute($proposal->fresh(), 'rejected');

        $this->assertTrue($result['success']);
        $this->assertEquals(ProposalStatus::REJECTED, $proposal->fresh()->status);
    }

    public function test_community_service_workflow_happy_path()
    {
        // 1. Creation
        $service = CommunityService::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $service->id,
            'detailable_type' => CommunityService::class,
            'status' => ProposalStatus::DRAFT,
        ]);

        $proposal->teamMembers()->attach($this->dosen->id, ['role' => 'ketua', 'status' => 'accepted']);

        // 2. Submission
        $this->actingAs($this->dosen);
        app(SubmitProposalAction::class)->execute($proposal);
        $this->assertEquals(ProposalStatus::SUBMITTED, $proposal->fresh()->status);

        // 3. Dekan Approval
        $this->actingAs($this->dekan);
        app(DekanApprovalAction::class)->execute($proposal->fresh(), 'APPROVED', 'Oke', $this->dekan);
        $this->assertEquals(ProposalStatus::APPROVED, $proposal->fresh()->status);

        // 4. Initial Kepala LPPM
        $this->actingAs($this->kepalaLppm);
        $proposal->fresh()->update(['status' => ProposalStatus::WAITING_REVIEWER]);

        // 5. Admin Assign Reviewer
        $this->actingAs($this->adminLppm);
        app(AssignReviewersAction::class)->execute($proposal->fresh(), $this->reviewer1->id);

        // 6. Reviewer Completes
        $this->actingAs($this->reviewer1);
        $review = $proposal->fresh()->reviewers()->first();
        \App\Models\ReviewScore::create([
            'proposal_reviewer_id' => $review->id,
            'review_criteria_id' => 1,
            'score' => 5,
            'round' => 1,
            'acuan' => 'Evidence',
            'weight_snapshot' => 10,
            'value' => 50,
        ]);
        $review->markAsStarted();
        app(CompleteReviewAction::class)->execute($review, 'Bagus untuk pengabdian', 'approved');

        // 7. Final Decision
        $this->actingAs($this->kepalaLppm);
        app(ApproveProposalAction::class)->execute($proposal->fresh(), 'completed');

        $this->assertEquals(ProposalStatus::COMPLETED, $proposal->fresh()->status);
    }

    public function test_proposal_isolation_between_dosen()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::DRAFT,
        ]);

        $otherDosen = User::factory()->create();
        $otherDosen->assignRole('dosen');

        $this->assertEquals($this->dosen->id, $proposal->submitter_id);
        $this->assertNotEquals($otherDosen->id, $proposal->submitter_id);
    }

    public function test_proposal_cannot_exceed_budget_cap()
    {
        $year = (int) date('Y');
        BudgetCap::create([
            'year' => $year,
            'research_budget_cap' => 10000000, // 10 Million
            'community_service_budget_cap' => 5000000,
        ]);

        $budgetItems = [
            ['total' => 6000000, 'budget_group_id' => 1],
            ['total' => 5000000, 'budget_group_id' => 1],
        ]; // Total 11 Million > 10 Million

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        app(\App\Services\BudgetValidationService::class)->validateBudgetCap($budgetItems, 'research', $year);
    }

    public function test_dekan_can_return_to_need_assignment()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::SUBMITTED,
        ]);

        $this->actingAs($this->dekan);
        $dekanAction = app(DekanApprovalAction::class);
        $result = $dekanAction->execute($proposal, 'NEED_ASSIGNMENT', 'Anggota tim belum sesuai kriteria', $this->dekan);

        $this->assertTrue($result['success']);
        $this->assertEquals(ProposalStatus::NEED_ASSIGNMENT, $proposal->fresh()->status);
    }

    public function test_request_re_review_action_resets_reviewers()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::WAITING_REVIEWER,
        ]);

        // Initial assignment & completion
        $this->actingAs($this->adminLppm);
        app(AssignReviewersAction::class)->execute($proposal, $this->reviewer1->id);

        $this->actingAs($this->reviewer1);
        $review = $proposal->fresh()->reviewers()->first();
        \App\Models\ReviewScore::create(['proposal_reviewer_id' => $review->id, 'review_criteria_id' => 1, 'score' => 2, 'round' => 1, 'acuan' => 'Evidence', 'weight_snapshot' => 10, 'value' => 20]);
        $review->markAsStarted();
        app(CompleteReviewAction::class)->execute($review, 'Needs fix', 'revision_needed');

        $this->assertEquals(ProposalStatus::REVIEWED, $proposal->fresh()->status);
        $this->assertEquals(ReviewStatus::COMPLETED, $review->fresh()->status);
        $this->assertEquals(1, $review->fresh()->round);

        // Simulate resubmission after revision
        $this->actingAs($this->kepalaLppm);
        $proposal->fresh()->update(['status' => ProposalStatus::REVISION_NEEDED]);

        // This usually happens during Kepala LPPM Initial Approval after Dosen resubmits
        $reReviewAction = app(RequestReReviewAction::class);
        $result = $reReviewAction->execute($proposal->fresh());

        $this->assertTrue($result['success']);
        $this->assertEquals(ReviewStatus::RE_REVIEW_REQUESTED, $review->fresh()->status);
        $this->assertEquals(2, $review->fresh()->round);
        $this->assertNull($review->fresh()->review_notes);
    }

    public function test_cannot_delete_proposal_if_not_draft()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::SUBMITTED,
        ]);

        $this->actingAs($this->dosen);
        $proposalService = app(ProposalService::class);

        $this->expectException(\Illuminate\Auth\Access\AuthorizationException::class);
        $this->expectExceptionMessage('This action is unauthorized.');

        $proposalService->deleteProposal($proposal);
    }
}
