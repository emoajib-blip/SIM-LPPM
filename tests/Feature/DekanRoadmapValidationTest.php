<?php

use App\Actions\Dekan\DekanValidateStudyProgramRoadmapAction;
use App\Enums\ProposalStatus;
use App\Models\Faculty;
use App\Models\Identity;
use App\Models\Institution;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\StudyProgram;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(RoleSeeder::class);
});

it('allows dekan to approve study program roadmap', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $dekan = User::factory()->create();
    $dekan->assignRole('dekan');
    Identity::factory()->create(['user_id' => $dekan->id, 'faculty_id' => $faculty->id]);

    $program = StudyProgram::create([
        'name' => 'Teknik Informatika',
        'code' => 'TI',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => ['period' => '2025-2029', 'priorities' => []],
        'roadmap_status' => 'submitted',
    ]);

    $this->actingAs($dekan);

    $action = app(DekanValidateStudyProgramRoadmapAction::class);
    $result = $action->execute($program, 'approved');

    expect($result['success'])->toBeTrue()
        ->and($program->fresh()->roadmap_status)->toBe('approved');
});

it('allows dekan to reject study program roadmap with notes', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $dekan = User::factory()->create();
    $dekan->assignRole('dekan');
    Identity::factory()->create(['user_id' => $dekan->id, 'faculty_id' => $faculty->id]);

    $program = StudyProgram::create([
        'name' => 'Sistem Informasi',
        'code' => 'SI',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => ['period' => '2025-2029', 'priorities' => []],
        'roadmap_status' => 'submitted',
    ]);

    $this->actingAs($dekan);

    $action = app(DekanValidateStudyProgramRoadmapAction::class);
    $result = $action->execute($program, 'rejected', 'Perlu penyesuaian dengan visi fakultas');

    expect($result['success'])->toBeTrue()
        ->and($program->fresh()->roadmap_status)->toBe('rejected');
});

it('prevents dekan from validating roadmap without submitted status', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $dekan = User::factory()->create();
    $dekan->assignRole('dekan');
    Identity::factory()->create(['user_id' => $dekan->id, 'faculty_id' => $faculty->id]);

    $program = StudyProgram::create([
        'name' => 'Teknik Elektro',
        'code' => 'TE',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => ['period' => '2025-2029'],
        'roadmap_status' => 'draft',
    ]);

    $this->actingAs($dekan);

    $action = app(DekanValidateStudyProgramRoadmapAction::class);
    $result = $action->execute($program, 'approved');

    expect($result['success'])->toBeFalse()
        ->and($result['message'])->toContain('Menunggu Validasi');
});

it('prevents dekan from validating roadmap of different faculty', function () {
    $institution = Institution::factory()->create();
    $facultyA = Faculty::factory()->create(['institution_id' => $institution->id, 'name' => 'Fakultas A']);
    $facultyB = Faculty::factory()->create(['institution_id' => $institution->id, 'name' => 'Fakultas B']);

    $dekan = User::factory()->create();
    $dekan->assignRole('dekan');
    Identity::factory()->create(['user_id' => $dekan->id, 'faculty_id' => $facultyA->id]);

    $program = StudyProgram::create([
        'name' => 'Teknik Mesin',
        'code' => 'TM',
        'institution_id' => $institution->id,
        'faculty_id' => $facultyB->id,
        'research_roadmap' => ['period' => '2025-2029'],
        'roadmap_status' => 'submitted',
    ]);

    $this->actingAs($dekan);

    $action = app(DekanValidateStudyProgramRoadmapAction::class);
    $result = $action->execute($program, 'approved');

    expect($result['success'])->toBeFalse()
        ->and($result['message'])->toContain('fakultas yang sama');
});

it('prevents non-dekan from validating roadmap', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $user = User::factory()->create();
    $user->assignRole('dosen');

    $program = StudyProgram::create([
        'name' => 'Manajemen',
        'code' => 'MNJ',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => ['period' => '2025-2029'],
        'roadmap_status' => 'submitted',
    ]);

    $this->actingAs($user);

    $action = app(DekanValidateStudyProgramRoadmapAction::class);
    $result = $action->execute($program, 'approved');

    expect($result['success'])->toBeFalse()
        ->and($result['message'])->toContain('Hanya Dekan');
});

it('prevents validation when roadmap is not filled', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $dekan = User::factory()->create();
    $dekan->assignRole('dekan');
    Identity::factory()->create(['user_id' => $dekan->id, 'faculty_id' => $faculty->id]);

    $program = StudyProgram::create([
        'name' => 'Akuntansi',
        'code' => 'AKT',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => null,
        'roadmap_status' => 'submitted',
    ]);

    $this->actingAs($dekan);

    $action = app(DekanValidateStudyProgramRoadmapAction::class);
    $result = $action->execute($program, 'approved');

    expect($result['success'])->toBeFalse()
        ->and($result['message'])->toContain('belum diisi');
});

it('calculates roadmap alignment score based on research tree', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $program = StudyProgram::create([
        'name' => 'Teknik Informatika',
        'code' => 'TI',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => [
            'period' => '2025-2029',
            'research_tree' => ['Artificial Intelligence', 'IoT', 'Cyber Security'],
        ],
    ]);

    $submitter = User::factory()->create();
    $submitter->assignRole('dosen');
    Identity::factory()->create(['user_id' => $submitter->id, 'study_program_id' => $program->id]);

    $research = Research::create(['proposal_id' => $proposalId = \Illuminate\Support\Str::uuid()]);

    $proposal = Proposal::create([
        'id' => $proposalId,
        'title' => 'Implementasi Artificial Intelligence untuk Sistem Prediksi',
        'submitter_id' => $submitter->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'status' => ProposalStatus::DRAFT,
    ]);

    $score = $proposal->getRoadmapAlignmentScore();

    expect($score)->toBeGreaterThanOrEqual(50);
});

it('calculates roadmap alignment score based on yearly priorities', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $program = StudyProgram::create([
        'name' => 'Sistem Informasi',
        'code' => 'SI',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => [
            'period' => '2025-2029',
            'priorities' => [
                ['year' => now()->year, 'themes' => 'Machine Learning, Data Science, Big Data'],
            ],
        ],
    ]);

    $submitter = User::factory()->create();
    $submitter->assignRole('dosen');
    Identity::factory()->create(['user_id' => $submitter->id, 'study_program_id' => $program->id]);

    $research = Research::create(['proposal_id' => $proposalId = \Illuminate\Support\Str::uuid()]);

    $proposal = Proposal::create([
        'id' => $proposalId,
        'title' => 'Analisis Data Science untuk Prediksi Cuaca',
        'summary' => 'Penelitian ini menggunakan teknik Machine Learning untuk prediksi.',
        'submitter_id' => $submitter->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'status' => ProposalStatus::DRAFT,
    ]);

    $score = $proposal->getRoadmapAlignmentScore();
    $level = $proposal->getRoadmapAlignmentLevel();
    $color = $proposal->getRoadmapAlignmentColor();

    expect($score)->toBeGreaterThanOrEqual(50)
        ->and($level)->toBeString()
        ->and($color)->toBeIn(['success', 'primary', 'warning', 'danger']);
});

it('returns zero alignment when no roadmap exists', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $program = StudyProgram::create([
        'name' => 'Manajemen',
        'code' => 'MNJ',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => null,
    ]);

    $submitter = User::factory()->create();
    $submitter->assignRole('dosen');
    Identity::factory()->create(['user_id' => $submitter->id, 'study_program_id' => $program->id]);

    $research = Research::create(['proposal_id' => $proposalId = \Illuminate\Support\Str::uuid()]);

    $proposal = Proposal::create([
        'id' => $proposalId,
        'title' => 'Studi Manajemen Keuangan',
        'submitter_id' => $submitter->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'status' => ProposalStatus::DRAFT,
    ]);

    expect($proposal->getRoadmapAlignmentScore())->toBe(0);
});

it('returns default score when roadmap has no priorities or research tree', function () {
    $institution = Institution::factory()->create();
    $faculty = Faculty::factory()->create(['institution_id' => $institution->id]);
    $program = StudyProgram::create([
        'name' => 'Desain Komunikasi Visual',
        'code' => 'DKV',
        'institution_id' => $institution->id,
        'faculty_id' => $faculty->id,
        'research_roadmap' => [
            'period' => '2025-2029',
            'priorities' => [],
            'research_tree' => [],
        ],
    ]);

    $submitter = User::factory()->create();
    $submitter->assignRole('dosen');
    Identity::factory()->create(['user_id' => $submitter->id, 'study_program_id' => $program->id]);

    $research = Research::create(['proposal_id' => $proposalId = \Illuminate\Support\Str::uuid()]);

    $proposal = Proposal::create([
        'id' => $proposalId,
        'title' => 'Desain Grafis Modern',
        'submitter_id' => $submitter->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'status' => ProposalStatus::DRAFT,
    ]);

    expect($proposal->getRoadmapAlignmentScore())->toBe(50);
});
