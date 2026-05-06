<?php

namespace Tests\Feature\Security;

use App\Enums\ProposalStatus;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MediaIdorTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $this->seed(\Database\Seeders\RoleSeeder::class);
    }

    public function test_user_cannot_view_other_users_progress_report_and_media_links()
    {
        Storage::fake('public');

        $owner = User::factory()->create();
        $owner->assignRole('dosen');

        $intruder = User::factory()->create();
        $intruder->assignRole('dosen');

        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $owner->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        // Create a draft progress report with a media file
        $report = \App\Models\ProgressReport::create([
            'proposal_id' => $proposal->id,
            'reporting_year' => now()->year,
            'reporting_period' => 'semester_1',
            'status' => \App\Enums\ReportStatus::DRAFT,
            'summary_update' => 'Test summary',
        ]);

        // Create a tiny, but valid PDF so MediaLibrary accepts it
        $pdfContent = "%PDF-1.4\n1 0 obj\n<<>>\nendobj\ntrailer\n<<>>\n%%EOF\n";
        $file = UploadedFile::fake()->createWithContent('laporan.pdf', $pdfContent);
        $report->addMedia($file)->toMediaCollection('substance_file');

        // Intruder should receive 403 when attempting to access the report page
        $response = $this->actingAs($intruder)
            ->get(route('research.final-report.show', $proposal));
        $response->assertForbidden();
        if ($response->getStatusCode() === 200) {
            $response->assertDontSee('laporan.pdf');
            $response->assertDontSee('Lihat');
        }
    }

    public function test_user_cannot_view_other_users_daily_notes()
    {
        $owner = User::factory()->create();
        $owner->assignRole('dosen');

        $intruder = User::factory()->create();
        $intruder->assignRole('dosen');

        $research = Research::factory()->create();
        $proposal = Proposal::factory()->create([
            'submitter_id' => $owner->id,
            'detailable_id' => $research->id,
            'detailable_type' => Research::class,
            'status' => ProposalStatus::COMPLETED,
        ]);

        \App\Models\DailyNote::create([
            'proposal_id' => $proposal->id,
            'activity_date' => now()->toDateString(),
            'activity_description' => 'Testing note',
            'progress_percentage' => 10,
            'user_id' => $owner->id,
        ]);

        $response = $this->actingAs($intruder)
            ->get(route('research.daily-note.show', $proposal));
        $response->assertForbidden();
        if ($response->getStatusCode() === 200) {
            $response->assertDontSee('Testing note');
        }
    }
}
