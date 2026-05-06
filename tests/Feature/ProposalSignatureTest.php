<?php

namespace Tests\Feature;

use App\Enums\ProposalStatus;
use App\Models\Faculty;
use App\Models\Identity;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProposalSignatureTest extends TestCase
{
    use RefreshDatabase;

    protected User $dosen;

    protected User $dekan;

    protected User $kepalaLppm;

    protected function setUp(): void
    {
        parent::setUp();

        if (! file_exists(storage_path('app/.installed'))) {
            file_put_contents(storage_path('app/.installed'), '');
        }

        config(['document-signatures.current_kid' => 'v1']);
        config(['document-signatures.keys.v1' => 'test-secret-standard-itsnu']);

        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        $institution = \App\Models\Institution::first();
        $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);

        $this->dosen = User::factory()->create(['name' => 'Dosen']);
        $this->dosen->assignRole('dosen');
        $this->dosen->markEmailAsVerified();
        Identity::factory()->create(['user_id' => $this->dosen->id, 'faculty_id' => $faculty->id]);

        $this->dekan = User::factory()->create(['name' => 'Dekan']);
        $this->dekan->assignRole('dekan');
        $this->dekan->markEmailAsVerified();
        $idn = Identity::factory()->create(['user_id' => $this->dekan->id, 'faculty_id' => $faculty->id]);
        $faculty->update([
            'dean_id' => $idn->id,
            'dean_user_id' => $this->dekan->id,
        ]);

        $this->kepalaLppm = User::factory()->create(['name' => 'Kepala LPPM']);
        $this->kepalaLppm->assignRole('kepala lppm');
        $this->kepalaLppm->markEmailAsVerified();
        Identity::factory()->create(['user_id' => $this->kepalaLppm->id, 'faculty_id' => $faculty->id]);
    }

    public function test_export_proposal_creates_digital_signatures()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::SUBMITTED,
        ]);

        $this->actingAs($this->dosen);

        $response = $this->get(route('proposals.export-pdf', $proposal));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');

        // Verify DocumentSignature created for lecturer
        $this->assertDatabaseHas('document_signatures', [
            'document_id' => $proposal->id,
            'document_type' => get_class($proposal),
            'signed_role' => 'lecturer',
            'action' => 'SUBMITTED',
        ]);
    }

    public function test_approved_proposal_has_dekan_signature()
    {
        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::APPROVED,
        ]);

        // Mock status log for dekan approval
        \App\Models\ProposalStatusLog::create([
            'proposal_id' => $proposal->id,
            'status_before' => ProposalStatus::SUBMITTED,
            'status_after' => ProposalStatus::APPROVED,
            'at' => now(),
            'user_id' => $this->dekan->id,
        ]);

        $this->actingAs($this->dosen);

        $this->get(route('proposals.export-pdf', $proposal));

        $this->assertDatabaseHas('document_signatures', [
            'document_id' => $proposal->id,
            'signed_role' => 'dekan',
            'action' => 'APPROVED',
        ]);

        $this->assertDatabaseHas('document_signatures', [
            'document_id' => $proposal->id,
            'signed_role' => 'lecturer',
            'action' => 'SUBMITTED',
        ]);
    }
}
