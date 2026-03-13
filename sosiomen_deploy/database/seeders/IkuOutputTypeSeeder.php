<?php

namespace Database\Seeders;

use App\Models\IkuOutputType;
use Illuminate\Database\Seeder;

class IkuOutputTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Jurnal Internasional Bereputasi', 'group' => 'publication'],
            ['name' => 'Jurnal Internasional', 'group' => 'publication'],
            ['name' => 'Jurnal Nasional Terakreditasi (S1-S6)', 'group' => 'publication'],
            ['name' => 'Jurnal Nasional', 'group' => 'publication'],
            ['name' => 'Prosiding Internasional Terindeks', 'group' => 'publication'],
            ['name' => 'Prosiding Nasional', 'group' => 'publication'],
            ['name' => 'Buku Referensi/Monograf', 'group' => 'publication'],
            ['name' => 'Hak Cipta', 'group' => 'hki'],
            ['name' => 'Paten', 'group' => 'hki'],
            ['name' => 'Paten Sederhana', 'group' => 'hki'],
            ['name' => 'Merek', 'group' => 'hki'],
            ['name' => 'Desain Industri', 'group' => 'hki'],
            ['name' => 'Prototipe', 'group' => 'product'],
            ['name' => 'Produk Teknologi Tepat Guna', 'group' => 'product'],
            ['name' => 'Karya Seni/Desain Monumental', 'group' => 'product'],
            ['name' => 'Kebijakan Publik/Naskah Akademik', 'group' => 'pakar'],
            ['name' => 'Rekognisi Pakar Internasional', 'group' => 'pakar'],
            ['name' => 'Rekognisi Pakar Nasional', 'group' => 'pakar'],
        ];

        foreach ($types as $type) {
            IkuOutputType::updateOrCreate(
                ['name' => $type['name']],
                ['group' => $type['group'], 'is_active' => true]
            );
        }
    }
}
