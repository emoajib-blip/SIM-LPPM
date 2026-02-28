<?php

namespace Tests\Feature;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use App\Models\ProposalMonev;
use App\Models\Research;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class MonevInternalTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminLppm;

    protected User $dosen;

    protected Proposal $completedProposal;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\InstitutionSeeder::class);

        $this->adminLppm = User::factory()->create(['name' => 'Admin LPPM']);
        $this->adminLppm->assignRole('admin lppm');

        // Dynamically create and assign the required permission for the test
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => 'module_monev']);
        $this->adminLppm->givePermissionTo('module_monev');

        $this->dosen = User::factory()->create(['name' => 'Dosen Pengusul']);
        $this->dosen->assignRole('dosen');

        $research = Research::factory()->create();
        $this->completedProposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        Storage::fake('media');
    }

    public function test_only_admin_lppm_can_access_monev_page()
    {
        // 1. Unauthenticated -> 401/Redirect
        $this->get('/admin-lppm/monev')->assertRedirect(route('login'));

        // 2. Dosen -> 403 Forbidden
        $this->actingAs($this->dosen);
        $this->get('/admin-lppm/monev')->assertStatus(403);

        Livewire::test(\App\Livewire\AdminLppm\Monev\MonevIndex::class)
            ->assertForbidden();

        // 3. Admin LPPM -> 200 OK
        $this->actingAs($this->adminLppm);
        $this->get('/admin-lppm/monev')->assertStatus(200);

        Livewire::test(\App\Livewire\AdminLppm\Monev\MonevIndex::class)
            ->assertOk();
    }

    public function test_monev_list_only_shows_completed_proposals()
    {
        $this->actingAs($this->adminLppm);

        // Create a DRAFT proposal
        $draftResearch = Research::factory()->create();
        $draftProposal = Proposal::factory()->create([
            'submitter_id' => $this->dosen->id,
            'detailable_id' => $draftResearch->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::DRAFT,
        ]);

        $component = Livewire::test(\App\Livewire\AdminLppm\Monev\MonevIndex::class);

        // Assert COMPLETED proposal is visible
        $component->assertSee($this->completedProposal->title);

        // Assert DRAFT proposal is HIDDEN
        $component->assertDontSee($draftProposal->title);
    }

    public function test_admin_must_upload_all_required_files_for_new_monev()
    {
        $this->actingAs($this->adminLppm);

        $component = Livewire::test(\App\Livewire\AdminLppm\Monev\MonevIndex::class)
            ->call('selectProposal', $this->completedProposal->id)
            ->call('addMonev');

        // Missing all files
        $component->set('monev_date', '2024-10-10')
            ->set('progress_percentage', 50)
            ->set('notes', 'Notes test')
            ->call('saveMonev')
            ->assertHasErrors(['berita_acara', 'borang', 'rekap_penilaian']);

        // Upload fake files
        $pdfContent = "%PDF-1.4\n%EOF\n";
        $file1 = UploadedFile::fake()->createWithContent('ba.pdf', $pdfContent);
        $file2 = UploadedFile::fake()->createWithContent('borang.pdf', $pdfContent);
        $file3 = UploadedFile::fake()->createWithContent('rekap.pdf', $pdfContent);

        $component->set('berita_acara', $file1)
            ->set('borang', $file2)
            ->set('rekap_penilaian', $file3)
            ->call('saveMonev')
            ->assertHasNoErrors();

        // Verify database entry
        $this->assertDatabaseHas('proposal_monevs', [
            'proposal_id' => $this->completedProposal->id,
            'progress_percentage' => 50,
            'notes' => 'Notes test',
        ]);

        // Verify media collection
        $monev = ProposalMonev::first();
        $this->assertCount(1, $monev->getMedia('berita_acara'));
        $this->assertCount(1, $monev->getMedia('borang'));
        $this->assertCount(1, $monev->getMedia('rekap_penilaian'));
    }

    public function test_progress_percentage_must_be_between_0_and_100()
    {
        $this->actingAs($this->adminLppm);

        $component = Livewire::test(\App\Livewire\AdminLppm\Monev\MonevIndex::class)
            ->call('selectProposal', $this->completedProposal->id)
            ->call('addMonev');

        // Test lower boundary
        $component->set('progress_percentage', -1)
            ->call('saveMonev')
            ->assertHasErrors('progress_percentage');

        // Test upper boundary
        $component->set('progress_percentage', 101)
            ->call('saveMonev')
            ->assertHasErrors('progress_percentage');
    }
}
