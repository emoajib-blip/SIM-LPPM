<?php

namespace Tests\Feature;

use App\Enums\ProposalStatus;
use App\Models\DocumentSignature;
use App\Models\MonevReview;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\ReviewCriteria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class MonevBaSignatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_monev_ba_pdf_generates_signatures_and_verification_page(): void
    {
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        Storage::fake('local');

        $adminLppm = User::factory()->create();
        $adminLppm->assignRole('admin lppm');

        $kepala = User::factory()->create();
        $kepala->assignRole('kepala lppm');

        $reviewer = User::factory()->create();
        $reviewer->assignRole('reviewer');

        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => User::factory()->create()->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
            'start_year' => (int) date('Y'),
            'semester' => 'ganjil',
        ]);

        ReviewCriteria::create([
            'type' => 'monev_research',
            'criteria' => 'Kelayakan program',
            'weight' => 100,
            'order' => 1,
            'is_active' => true,
        ]);

        $review = MonevReview::create([
            'proposal_id' => $proposal->id,
            'reviewer_id' => $reviewer->id,
            'academic_year' => (string) $proposal->start_year,
            'semester' => 'ganjil',
            'score' => 80,
            'status' => 'baik',
            'notes' => 'OK',
            'borang_data' => ['kelayakan_program_score' => 4, 'kelayakan_program_notes' => 'Baik'],
            'reviewed_at' => now()->subMinutes(30),
            'finalized_by_lppm_at' => now()->subMinutes(20),
            'finalized_by_lppm_by' => $adminLppm->id,
            'approved_by_kepala_at' => now()->subMinutes(10),
            'approved_by_kepala_by' => $kepala->id,
        ]);

        $this->actingAs($adminLppm);
        $response = $this->get(route('export.monev.ba', ['id' => $review->id]));
        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/pdf');

        $this->assertDatabaseCount('document_signatures', 3);

        $signatures = DocumentSignature::query()
            ->where('document_type', $review->getMorphClass())
            ->where('document_id', (string) $review->id)
            ->where('variant', 'final')
            ->get()
            ->keyBy('signed_role');

        $this->assertTrue($signatures->has('reviewer'));
        $this->assertTrue($signatures->has('admin_lppm'));
        $this->assertTrue($signatures->has('kepala_lppm'));

        $verifyUrl = URL::signedRoute('signatures.verify', ['documentSignature' => $signatures->get('kepala_lppm')->id]);
        $this->get($verifyUrl)->assertOk()->assertSee('VALID');
    }
}
