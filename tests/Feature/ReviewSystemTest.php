<?php

namespace Tests\Feature;

use App\Enums\ProposalStatus;
use App\Enums\ReviewStatus;
use App\Models\Proposal;
use App\Models\ProposalReviewer;
use App\Models\Research;
use App\Models\ReviewCriteria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ReviewSystemTest extends TestCase
{
    use RefreshDatabase;

    protected User $reviewer;

    protected User $randomDosen;

    protected Proposal $proposal;

    protected ProposalReviewer $reviewAssignment;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup base roles and data
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        // Generate users
        $this->reviewer = User::factory()->create(['name' => 'Reviewer Ahli']);
        $this->reviewer->assignRole('reviewer');

        $this->randomDosen = User::factory()->create(['name' => 'Dosen Biasa']);
        $this->randomDosen->assignRole('dosen');

        // Generate criteria
        ReviewCriteria::create([
            'id' => 1,
            'criteria' => 'Relevansi Topik',
            'weight' => 30, // 30% weight
            'type' => 'research',
            'order' => 1,
            'is_active' => true,
        ]);

        ReviewCriteria::create([
            'id' => 2,
            'criteria' => 'Metodologi',
            'weight' => 70, // 70% weight
            'type' => 'research',
            'order' => 2,
            'is_active' => true,
        ]);

        // Generate proposal
        $research = Research::factory()->create();
        $this->proposal = Proposal::factory()->create([
            'submitter_id' => $this->randomDosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::UNDER_REVIEW,
        ]);

        // Assing reviewer
        $this->reviewAssignment = ProposalReviewer::create([
            'proposal_id' => $this->proposal->id,
            'user_id' => $this->reviewer->id,
            'status' => 'pending',
            'round' => 1,
            'deadline_at' => now()->addDays(7),
        ]);
    }

    public function test_only_assigned_reviewer_can_submit_review()
    {
        // Random dosen tries to review
        $this->actingAs($this->randomDosen);

        $component = Livewire::test(\App\Livewire\Research\Proposal\ReviewerForm::class, ['proposalId' => $this->proposal->id]);

        // Ensure canReview is false for random dosen
        $this->assertFalse($component->get('canReview'));

        // Attempt to submit
        $component->call('submitReview', app(\App\Livewire\Actions\CompleteReviewAction::class))
            ->assertHasErrors(['reviewNotes', 'recommendation']); // Fails validation first

        // Provide valid data but still should fail authorization inside submitReview
        $component->set('reviewNotes', 'Ini notes review minimal 10 karakter')
            ->set('recommendation', 'approved')
            ->set('scores.1.score', 5)
            ->set('scores.1.acuan', 'Acuan 1')
            ->set('scores.2.score', 4)
            ->set('scores.2.acuan', 'Acuan 2')
            ->call('submitReview', app(\App\Livewire\Actions\CompleteReviewAction::class))
            ->assertDispatched('error');
    }

    public function test_review_score_calculation_math_is_accurate()
    {
        $this->actingAs($this->reviewer);

        $component = Livewire::test(\App\Livewire\Research\Proposal\ReviewerForm::class, ['proposalId' => $this->proposal->id]);

        $this->assertTrue($component->get('canReview'));

        // Input scores:
        // Criteria 1: Score 4 (Weight 30) -> Value = 120
        // Criteria 2: Score 5 (Weight 70) -> Value = 350
        // Total Expected Score = 470
        $component->set('reviewNotes', 'Catatan review ini cukup panjang untuk lolos validasi.')
            ->set('recommendation', 'approved')
            ->set('scores.1.score', 4)
            ->set('scores.1.acuan', 'Kesesuaian topik sangat baik')
            ->set('scores.2.score', 5)
            ->set('scores.2.acuan', 'Metodologi sempurna');

        // Confirm computed total score in UI matches expectation mathematically
        $this->assertEquals(470, $component->get('totalScore'));

        // Submit the review
        $component->call('submitReview', app(\App\Livewire\Actions\CompleteReviewAction::class))
            ->assertHasNoErrors()
            ->assertDispatched('review-submitted');

        // Lock verification: database state MUST match the mathematical calculation
        $this->assertDatabaseHas('review_scores', [
            'proposal_reviewer_id' => $this->reviewAssignment->id,
            'review_criteria_id' => 1,
            'score' => 4,
            'weight_snapshot' => 30,
            'value' => 120, // Mathematically locked
        ]);

        $this->assertDatabaseHas('review_scores', [
            'proposal_reviewer_id' => $this->reviewAssignment->id,
            'review_criteria_id' => 2,
            'score' => 5,
            'weight_snapshot' => 70,
            'value' => 350, // Mathematically locked
        ]);

        // Verify log creation with total score
        $this->assertDatabaseHas('review_logs', [
            'proposal_reviewer_id' => $this->reviewAssignment->id,
            'total_score' => 470,
            'recommendation' => 'approved',
        ]);

        $this->assertEquals(ReviewStatus::COMPLETED, $this->reviewAssignment->fresh()->status);
    }

    public function test_review_score_cannot_exceed_maximum_boundaries()
    {
        $this->actingAs($this->reviewer);

        $component = Livewire::test(\App\Livewire\Research\Proposal\ReviewerForm::class, ['proposalId' => $this->proposal->id]);

        // Attempting to inject a score of 6 (Max is 5)
        $component->set('reviewNotes', 'Catatan review')
            ->set('recommendation', 'approved')
            ->set('scores.1.score', 6) // Invalid over max
            ->set('scores.1.acuan', 'Acuan')
            ->set('scores.2.score', 0) // Invalid under min
            ->set('scores.2.acuan', 'Acuan')
            ->call('submitReview', app(\App\Livewire\Actions\CompleteReviewAction::class))
            ->assertHasErrors(['scores.1.score', 'scores.2.score']);

        // Verify database is completely untouched
        $this->assertDatabaseMissing('review_scores', [
            'proposal_reviewer_id' => $this->reviewAssignment->id,
        ]);
    }
}
