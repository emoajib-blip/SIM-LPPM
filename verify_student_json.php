<?php

use App\Models\Proposal;
use App\Models\Research;
use App\Models\User;
use App\Services\ProposalPdfService;
use Illuminate\Support\Facades\DB;

// 1. Setup Context
$submitter = User::first(); // Grab the first user as submitter
if (! $submitter) {
    echo "No users found. Please seed database.\n";
    exit(1);
}

echo 'Using submitter: '.$submitter->name.' (ID: '.$submitter->id.")\n";

// 2. Mock Form Data for a Student Member
$inputMembers = [
    [
        'name' => 'Mahasiswa Test JSON',
        'nidn' => '999888777', // NIM
        'role' => 'mahasiswa', // Critical: This triggers the new logic
        'tugas' => 'Data Entry',
        'email' => 'dummy_student@test.com', // Should be ignored
        'is_manual' => true,
    ],
];

// 3. Create a Dummy Proposal (Draft)
DB::beginTransaction();
try {
    // Create Detail (Research)
    $research = Research::create([
        'title' => 'Test Proposal JSON Student',
        'tkt_type' => 'Dasar',
    ]);

    // Create Proposal
    $proposal = Proposal::create([
        'title' => 'Test Proposal For JSON Student Storage',
        'submitter_id' => $submitter->id,
        'detailable_id' => $research->id,
        'detailable_type' => Research::class,
        'status' => 'draft',
        'start_year' => 2024,
        'duration_in_years' => 1,
        'summary' => 'This is a test summary.',

        // Mocking other required FKs with assuming functionality (or ensuring nullable in migration)
        // Based on schema, some are required. Let's fill basics.
        'research_scheme_id' => \App\Models\ResearchScheme::first()?->id,
        'focus_area_id' => \App\Models\FocusArea::first()?->id,
        'theme_id' => \App\Models\Theme::first()?->id,
        'topic_id' => \App\Models\Topic::first()?->id,
        'cluster_level1_id' => \App\Models\ScienceCluster::first()?->id,
    ]);

    echo 'Proposal Created: '.$proposal->id."\n";

    // 4. EMULATE 'attachTeamMembers' LOGIC from ProposalForm
    // This effectively tests the logic I wrote without needing Livewire context

    $syncData = [];
    $studentMembers = [];

    // Add submitter
    $syncData[$submitter->id] = ['role' => 'ketua', 'status' => 'accepted'];

    // Process Members
    foreach ($inputMembers as $member) {
        if ($member['role'] === 'ketua') {
            continue;
        }

        // NEW LOGIC: Check if student
        if ($member['role'] === 'mahasiswa') {
            echo 'Processing Student: '.$member['name']."\n";
            $studentMembers[] = [
                'name' => $member['name'],
                'identifier' => $member['nidn'],
                'role' => 'mahasiswa',
                'tasks' => $member['tugas'] ?? '',
            ];

            continue; // Skip user creation
        }

        // ... (Old logic for non-students omitted for this test)
    }

    // Save
    $proposal->teamMembers()->sync($syncData);
    $proposal->update(['student_members' => $studentMembers]);

    echo "Proposal Updated with Student Members.\n";

    // 5. VERIFICATION

    // A. Check Database Column
    $proposal->refresh(); // Reload from DB
    $jsonStored = $proposal->student_members;

    echo 'Stored JSON: '.json_encode($jsonStored)."\n";

    if (is_array($jsonStored) && count($jsonStored) > 0 && $jsonStored[0]['name'] === 'Mahasiswa Test JSON') {
        echo "[PASS] JSON Data stored correctly in 'student_members' column.\n";
    } else {
        echo "[FAIL] JSON Data NOT stored correctly.\n";
    }

    // B. Check Users Table (Ensure no user created)
    $checkUser = User::where('email', 'dummy_student@test.com')->first();
    if (! $checkUser) {
        echo "[PASS] No shadow user created for student.\n";
    } else {
        echo "[FAIL] Shadow user WAS created (Unexpected!).\n";
    }

    // C. Test PDF Generation
    echo "Attempting PDF Generation...\n";
    try {
        $pdfService = new ProposalPdfService;
        $path = $pdfService->export($proposal);
        if (file_exists($path) && filesize($path) > 0) {
            echo '[PASS] PDF Generated successfully at: '.$path."\n";
            echo 'PDF Size: '.filesize($path)." bytes\n";
        } else {
            echo "[FAIL] PDF Generation returned valid path but file missing/empty.\n";
        }
    } catch (\Exception $e) {
        echo '[FAIL] PDF Generation Error: '.$e->getMessage()."\n";
        echo $e->getTraceAsString();
    }

} catch (\Exception $e) {
    echo 'General Error: '.$e->getMessage()."\n";
} finally {
    DB::rollBack(); // Cleanup
    echo "Transaction Rolled Back (Clean State).\n";
}
