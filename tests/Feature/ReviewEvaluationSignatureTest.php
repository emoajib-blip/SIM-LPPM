<?php

namespace Tests\Feature;

use App\Enums\ProposalStatus;
use App\Enums\ReviewStatus;
use App\Models\DocumentSignature;
use App\Models\Proposal;
use App\Models\ProposalReviewer;
use App\Models\Research;
use App\Models\ReviewCriteria;
use App\Models\ReviewScore;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ReviewEvaluationSignatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_review_evaluation_pdf_generates_signature_and_verifies(): void
    {
        Storage::fake('local');

        $reviewer = User::factory()->create();

        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => User::factory()->create()->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::SUBMITTED,
        ]);

        $assignment = ProposalReviewer::create([
            'proposal_id' => $proposal->id,
            'user_id' => $reviewer->id,
            'status' => ReviewStatus::COMPLETED->value,
            'review_notes' => 'Catatan review',
            'recommendation' => 'approved',
            'round' => 1,
            'assigned_at' => now()->subDays(2),
            'started_at' => now()->subDay(),
            'completed_at' => now()->subMinutes(5),
        ]);

        $criteria = ReviewCriteria::create([
            'type' => 'research',
            'criteria' => 'Kelayakan',
            'weight' => 100,
            'order' => 1,
            'is_active' => true,
        ]);

        ReviewScore::create([
            'proposal_reviewer_id' => $assignment->id,
            'review_criteria_id' => $criteria->id,
            'acuan' => 'Baik',
            'score' => 4,
            'weight_snapshot' => 100,
            'value' => 400,
            'round' => 1,
        ]);

        $this->actingAs($reviewer);

        $response = $this->get(route('reviewers.export-pdf', ['proposalReviewer' => $assignment->id]));
        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/pdf');

        $signature = DocumentSignature::query()
            ->where('document_type', $assignment->getMorphClass())
            ->where('document_id', (string) $assignment->id)
            ->where('action', 'REVIEWED')
            ->where('signed_role', 'reviewer')
            ->first();

        $this->assertNotNull($signature);
        $this->assertNotEmpty($signature->document_hash);

        $verifyUrl = URL::signedRoute('signatures.verify', ['documentSignature' => $signature->id]);
        $this->get($verifyUrl)->assertOk()->assertSee('VALID');
    }
}
