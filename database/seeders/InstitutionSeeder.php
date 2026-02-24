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
            // Top PTN
            ['001001', 'Universitas Gadjah Mada', 'ptn'],
            ['001002', 'Universitas Indonesia', 'ptn'],
            ['001003', 'Institut Teknologi Bandung', 'ptn'],
            ['001004', 'Universitas Airlangga', 'ptn'],
            ['001005', 'Institut Teknologi Sepuluh Nopember', 'ptn'],
            ['001006', 'Institut Pertanian Bogor', 'ptn'],
            ['001007', 'Universitas Diponegoro', 'ptn'],
            ['001008', 'Universitas Brawijaya', 'ptn'],
            ['001009', 'Universitas Hasanuddin', 'ptn'],
            ['001010', 'Universitas Padjadjaran', 'ptn'],
            ['001011', 'Universitas Sebelas Maret', 'ptn'],
            ['001013', 'Universitas Andalas', 'ptn'],
            ['001014', 'Universitas Sumatera Utara', 'ptn'],
            ['001017', 'Universitas Riau', 'ptn'],
            ['001026', 'Universitas Lampung', 'ptn'],

            // PTN Jawa Timur
            ['001025', 'Universitas Negeri Surabaya', 'ptn'],
            ['001026', 'Universitas Negeri Malang', 'ptn'],
            ['001023', 'Universitas Jember', 'ptn'],
            ['001024', 'Universitas Trunojoyo Madura', 'ptn'],
            ['002008', 'UPN Veteran Jawa Timur', 'ptn'],

            // PTNU & Religious Base
            ['211001', 'Universitas Islam Negeri Sunan Ampel', 'ptkin'],
            ['211002', 'Universitas Islam Negeri Maulana Malik Ibrahim', 'ptkin'],
            ['231002', 'UIN K.H. Achmad Siddiq Jember', 'ptkin'],
            ['071095', 'Universitas Nahdlatul Ulama Surabaya', 'pts'],
            ['071096', 'Universitas Nahdlatul Ulama Sidoarjo', 'pts'],
            ['071050', 'Universitas Islam Malang', 'pts'],

            // Internal / Local
            ['0710XX', 'Institut Teknologi dan Sains Nahdlatul Ulama Pekalongan', 'pts'],
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
