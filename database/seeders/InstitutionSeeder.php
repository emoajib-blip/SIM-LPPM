<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Efficiency: Disable FK checks for bulk operation
        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        Institution::truncate();

        if (DB::getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // 2. Data Foundation: Top Indonesia Universities & Local Context
        // Format: [Code, Name, Type]
        $institutions = [
            // Internal / Local
            ['062004', 'Institut Teknologi dan Sains Nahdlatul Ulama Pekalongan', 'university'],
        ];

        $payload = [];
        $now = now();

        foreach ($institutions as $inst) {
            $payload[] = [
                'code' => $inst[0],
                'name' => $inst[1],
                'type' => $inst[2],
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // 3. Batch Insert for Performance
        foreach (array_chunk($payload, 1000) as $chunk) {
            Institution::insert($chunk);
        }

        // 4. Output Logic
        $count = count($institutions);
        $this->command->info("✅ Seeding completed: {$count} foundational institutions inserted.");
    }
}
