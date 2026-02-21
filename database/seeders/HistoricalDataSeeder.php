<?php

namespace Database\Seeders;

use App\Enums\ProposalStatus;
use App\Models\CommunityService;
use App\Models\Proposal;
use App\Models\Research;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HistoricalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure we have an owner for the legacy records
        // Ideally, this should be the specific lecturer from the historical record
        $dosen = User::first();

        // 2024 Historical Research
        // Using uuid manually to ensure control if importing from external sourceID
        $researchId = (string) Str::uuid();
        $proposalId = (string) Str::uuid();

        // Create the detail record (Research)
        Research::create([
            'id' => $researchId,
            'background' => '[HISTORICAL 2024] Pengembangan AI untuk Deteksi Dini Banjir di Pasuruan',
            'methodology' => 'Studi literatur dan eksperimen lapangan...',
        ]);

        // Create the main proposal record linked to the details
        Proposal::create([
            'id' => $proposalId,
            'title' => '[ARSIP 2024] Implementasi AI untuk Deteksi Dini Banjir',
            'submitter_id' => $dosen?->id, // If no user, this might fail or be null depending on constraints. Assuming users seeded.
            'detailable_type' => 'App\Models\Research', // Use string for polymorph to be safe/explicit
            'detailable_id' => $researchId,
            'start_year' => 2024,
            'duration_in_years' => 1,
            'status' => ProposalStatus::COMPLETED, // Mark as completed
            'summary' => 'Penelitian ini telah selesai dan dipublikasikan. Data diimport dari arsip lama.',
            'created_at' => '2024-01-15 00:00:00',
            'updated_at' => '2024-12-01 00:00:00',
        ]);

        // 2023 Historical Community Service
        $abmasId = (string) Str::uuid();
        $proposalAbmasId = (string) Str::uuid();

        CommunityService::create([
            'id' => $abmasId,
            'partner_issue_summary' => '[HISTORICAL 2023] Kurangnya literasi digital pada UMKM Desa X.',
            'solution_offered' => 'Pelatihan Digital Marketing Intensif.',
        ]);

        Proposal::create([
            'id' => $proposalAbmasId,
            'title' => '[ARSIP 2023] Pelatihan Digital Marketing UMKM',
            'submitter_id' => $dosen?->id,
            'detailable_type' => 'App\Models\CommunityService',
            'detailable_id' => $abmasId,
            'start_year' => 2023,
            'duration_in_years' => 1,
            'status' => ProposalStatus::COMPLETED,
            'summary' => 'Kegiatan pengabdian masyarakat tahun 2023.',
            'created_at' => '2023-01-10 00:00:00',
            'updated_at' => '2023-11-20 00:00:00',
        ]);

        $this->command->info('✅ Historical data seeded successfully.');
    }
}
