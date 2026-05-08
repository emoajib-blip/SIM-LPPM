<?php

namespace Database\Seeders;

use App\Enums\ProposalStatus;
use App\Models\DailyNote;
use App\Models\Proposal;
use Illuminate\Database\Seeder;

class DailyNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proposals = Proposal::where('status', ProposalStatus::APPROVED)
            ->orWhere('status', ProposalStatus::COMPLETED)
            ->get();

        foreach ($proposals as $proposal) {
            DailyNote::factory(rand(5, 15))->create([
                'proposal_id' => $proposal->id,
            ]);
        }
    }
}
