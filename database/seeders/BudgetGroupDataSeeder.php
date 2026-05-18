<?php

namespace Database\Seeders;

use App\Models\BudgetComponent;
use App\Models\BudgetGroup;
use Illuminate\Database\Seeder;

class BudgetGroupDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BAHAN - Bahan Habis Pakai, ATK, Bahan Penelitian
        $bahanGroup = BudgetGroup::firstOrCreate(
            ['code' => 'BAHAN'],
            [
                'name' => 'Bahan Habis Pakai, ATK, Penelitian',
                'description' => 'Bahan habis pakai, ATK, bahan penelitian',
                'percentage' => null,
                'proposal_type' => null,
                'percentage_type' => null,
                'is_active' => true,
            ]
        );

        $bahanComponents = [
            ['code' => 'BH1', 'name' => 'Bahan Habis Pakai', 'unit' => 'pcs', 'description' => 'Kertas, Pulpen, Map folder'],
            ['code' => 'BH2', 'name' => 'ATK Kantor', 'unit' => 'pcs', 'description' => 'Kertas, Amplop, Materai'],
            ['code' => 'BH3', 'name' => 'Bahan Penelitian', 'unit' => 'pcs', 'description' => 'Bahan kimia, Tabung reagen'],
            ['code' => 'BH4', 'name' => 'Cetak & Fotocopy', 'unit' => 'lembar', 'description' => 'Fotocopy laporan, Print dokumen'],
        ];
        foreach ($bahanComponents as $c) {
            BudgetComponent::firstOrCreate(['budget_group_id' => $bahanGroup->id, 'code' => $c['code']], $c);
        }

        // 2. DATA - Pengumpulan Data
        $dataGroup = BudgetGroup::firstOrCreate(
            ['code' => 'DATA'],
            [
                'name' => 'Pengumpulan Data',
                'description' => 'FGD, HR Pembantu, Transport, Uang Harian',
                'percentage' => null,
                'proposal_type' => null,
                'percentage_type' => null,
                'is_active' => true,
            ]
        );

        $dataComponents = [
            ['code' => 'DT1', 'name' => 'FGD Persiapan', 'unit' => 'orang', 'description' => 'Honor fasilitator FGD'],
            ['code' => 'DT2', 'name' => 'Honor Pembantu Peneliti', 'unit' => 'orang', 'description' => 'HR pembantu pengumpulan data'],
            ['code' => 'DT3', 'name' => 'Honor Petugas Survei', 'unit' => 'orang', 'description' => 'HR petugas survey lapangan'],
            ['code' => 'DT4', 'name' => 'Transport Lokal', 'unit' => 'km', 'description' => 'Taxi, Ojek untuk survei'],
            ['code' => 'DT5', 'name' => 'Transport Dalam Kota', 'unit' => 'kali', 'description' => 'Parkir, Tol'],
            ['code' => 'DT6', 'name' => 'Uang Harian Lapangan', 'unit' => 'hari', 'description' => 'Uang harian pengumpulan data'],
            ['code' => 'DT7', 'name' => 'Biaya Konsumsi Survei', 'unit' => 'kali', 'description' => 'Konsumsi tim lapangan'],
        ];
        foreach ($dataComponents as $c) {
            BudgetComponent::firstOrCreate(['budget_group_id' => $dataGroup->id, 'code' => $c['code']], $c);
        }

        // 3. PERALATAN - Sewa Peralatan
        $peralatanGroup = BudgetGroup::firstOrCreate(
            ['code' => 'PERALATAN'],
            [
                'name' => 'Sewa Peralatan',
                'description' => 'Peralatan penelitian',
                'percentage' => null,
                'proposal_type' => null,
                'percentage_type' => null,
                'is_active' => true,
            ]
        );

        $peralatanComponents = [
            ['code' => 'PR1', 'name' => 'Sewa Printer', 'unit' => 'hari', 'description' => 'Sewa printer untuk publikasi'],
            ['code' => 'PR2', 'name' => 'Sewa Laptop', 'unit' => 'hari', 'description' => 'Sewa laptop pendukung'],
            ['code' => 'PR3', 'name' => 'Pembelian Peralatan', 'unit' => 'unit', 'description' => 'Komputer, Monitor, Scanner'],
        ];
        foreach ($peralatanComponents as $c) {
            BudgetComponent::firstOrCreate(['budget_group_id' => $peralatanGroup->id, 'code' => $c['code']], $c);
        }

        // 4. ANALISIS - Analisis Data
        $analisisGroup = BudgetGroup::firstOrCreate(
            ['code' => 'ANALISIS'],
            [
                'name' => 'Analisis Data',
                'description' => 'HR Pengolah Data, Honorarium, Biaya Analisis',
                'percentage' => null,
                'proposal_type' => null,
                'percentage_type' => null,
                'is_active' => true,
            ]
        );

        $analisisComponents = [
            ['code' => 'AN1', 'name' => 'Honor Pengolah Data', 'unit' => 'orang', 'description' => 'HR pengolah data statistik'],
            ['code' => 'AN2', 'name' => 'Honorarium Narasumber', 'unit' => 'jam', 'description' => 'Honor narasumber wawancara'],
            ['code' => 'AN3', 'name' => 'Biaya Software', 'unit' => 'lisensi', 'description' => 'Lisensi SPSS, NVivo'],
            ['code' => 'AN4', 'name' => 'Uji Data Sampel', 'unit' => 'sampel', 'description' => 'Uji validasi data'],
            ['code' => 'AN5', 'name' => 'Biaya Analisis', 'unit' => 'kali', 'description' => 'Jasa analisis data'],
        ];
        foreach ($analisisComponents as $c) {
            BudgetComponent::firstOrCreate(['budget_group_id' => $analisisGroup->id, 'code' => $c['code']], $c);
        }

        // 5. LUARAN - Pelaporan, Luaran Wajib & Tambahan
        $luaranGroup = BudgetGroup::firstOrCreate(
            ['code' => 'LUARAN'],
            [
                'name' => 'Pelaporan, Luaran Wajib & Tambahan',
                'description' => 'Rapat, Publikasi, Buku',
                'percentage' => null,
                'proposal_type' => null,
                'percentage_type' => null,
                'is_active' => true,
            ]
        );

        $luaranComponents = [
            ['code' => 'LU1', 'name' => 'Rapat Internal', 'unit' => 'kali', 'description' => 'Rapat tim peneliti'],
            ['code' => 'LU2', 'name' => 'Rapat Eksternal', 'unit' => 'kali', 'description' => 'Rapat dengan mitra'],
            ['code' => 'LU3', 'name' => 'Uang Harian Rapat', 'unit' => 'hari', 'description' => 'Uang harian rapat dalam kantor'],
            ['code' => 'LU4', 'name' => 'Biaya Konsumsi Rapat', 'unit' => 'kali', 'description' => 'Konsumsi rapat penelitian'],
            ['code' => 'LU5', 'name' => 'Publikasi Jurnal', 'unit' => 'artikel', 'description' => 'APC jurnal nasional'],
            ['code' => 'LU6', 'name' => 'Pembuatan Buku', 'unit' => 'buku', 'description' => 'Cetak buku monograf'],
            ['code' => 'LU7', 'name' => 'Pendaftaran HKI', 'unit' => 'karya', 'description' => 'Biaya pendaftaran HKI'],
        ];
        foreach ($luaranComponents as $c) {
            BudgetComponent::firstOrCreate(['budget_group_id' => $luaranGroup->id, 'code' => $c['code']], $c);
        }
    }
}
