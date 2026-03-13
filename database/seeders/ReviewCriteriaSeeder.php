<?php

namespace Database\Seeders;

use App\Models\ReviewCriteria;
use Illuminate\Database\Seeder;

class ReviewCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researchCriteria = [
            [
                'criteria' => 'Ringkasan',
                'description' => 'Judul, Tujuan, Metode Penelitian, dan Target Luaran. Kata kunci : 5 kata',
                'weight' => 10,
                'order' => 1,
            ],
            [
                'criteria' => 'Latar Belakang',
                'description' => 'Permasalahan; Keaslian Penelitian; Manfaat yang Diharapkan; Tujuan Penelitian, Roadmap penelitian dan kontribusi terhadap ilmu pengetahuan',
                'weight' => 30,
                'order' => 2,
            ],
            [
                'criteria' => 'Tinjauan Pustaka',
                'description' => 'Tinjauan Pustaka yang mutakhir (Jurnal 5-10 tahun terakhir)',
                'weight' => 25,
                'order' => 3,
            ],
            [
                'criteria' => 'Metode Penelitian',
                'description' => 'Metode Pengumpulan, Analisis Data penelitian, lokasi penelitian, peubah yang diamati/diukur, dan model, rancangan penelitian',
                'weight' => 25,
                'order' => 4,
            ],
            [
                'criteria' => 'Daftar Pustaka Dan Lampiran',
                'description' => '(Jurnal 5-10 tahun terakhir), Jadwal Penelitian, Perkiraan Biaya dan biodata',
                'weight' => 10,
                'order' => 5,
            ],
        ];

        foreach ($researchCriteria as $criteria) {
            ReviewCriteria::updateOrCreate(
                ['type' => 'research', 'criteria' => $criteria['criteria']],
                $criteria
            );
        }

        $pkmCriteria = [
            [
                'criteria' => 'Ringkasan',
                'description' => 'Judul, Tujuan, Metode, dan Target Luaran. Kata kunci : 5 kata',
                'weight' => 15,
                'order' => 1,
            ],
            [
                'criteria' => 'Perumusan Masalah',
                'description' => 'Ketajaman Perumusan Masalah dan tujuan PkM',
                'weight' => 15,
                'order' => 2,
            ],
            [
                'criteria' => 'Manfaat hasil PkM',
                'description' => 'Pengembangan IPTEKS, pembangunan, and/atau pengembangan kelembagaan',
                'weight' => 20,
                'order' => 3,
            ],
            [
                'criteria' => 'Metode Pelaksanaan',
                'description' => 'Metode Pengabdian Masyarakat',
                'weight' => 20,
                'order' => 4,
            ],
            [
                'criteria' => 'Output dan Outcome PkM',
                'description' => 'Rumusan Output pengabdian dan outcome pengabdian masyarakat',
                'weight' => 30,
                'order' => 5,
            ],
        ];

        foreach ($pkmCriteria as $criteria) {
            ReviewCriteria::updateOrCreate(
                ['type' => 'community_service', 'criteria' => $criteria['criteria']],
                $criteria
            );
        }

        $monevResearchCriteria = [
            [
                'criteria' => 'Capaian Luaran Wajib',
                'description' => 'Kesesuaian dan kemajuan luaran wajib yang dijanjikan',
                'weight' => 25,
                'order' => 1,
            ],
            [
                'criteria' => 'Capaian Luaran Tambahan',
                'description' => 'Kesesuaian dan kemajuan luaran tambahan (jika ada)',
                'weight' => 15,
                'order' => 2,
            ],
            [
                'criteria' => 'Kesesuaian Usulan',
                'description' => 'Kesesuaian pelaksanaan dengan rencana usulan awal',
                'weight' => 20,
                'order' => 3,
            ],
            [
                'criteria' => 'Kualitas Substansi & Keberlanjutan',
                'description' => 'Kualitas hasil dan potensi keberlanjutan program',
                'weight' => 20,
                'order' => 4,
            ],
            [
                'criteria' => 'Integrasi Pendidikan',
                'description' => 'Integrasi hasil ke dalam pembelajaran/mata kuliah',
                'weight' => 20,
                'order' => 5,
            ],
        ];

        foreach ($monevResearchCriteria as $criteria) {
            ReviewCriteria::updateOrCreate(
                ['type' => 'monev_research', 'criteria' => $criteria['criteria']],
                $criteria
            );
        }

        $monevPkmCriteria = [
            [
                'criteria' => 'Publikasi Jurnal/Prosiding',
                'description' => 'Status publikasi (Draft/Submitted/Accepted/Published)',
                'weight' => 20,
                'order' => 1,
            ],
            [
                'criteria' => 'Keberdayaan Mitra',
                'description' => 'Tingkat kepuasan dan manfaat bagi mitra',
                'weight' => 20,
                'order' => 2,
            ],
            [
                'criteria' => 'Produk/HKI/Sistem',
                'description' => 'Hasil nyata berupa produk, jasa, model, atau HKI',
                'weight' => 20,
                'order' => 3,
            ],
            [
                'criteria' => 'Video Kegiatan (Youtube)',
                'description' => 'Dokumentasi visual dan identitas sumber dana',
                'weight' => 15,
                'order' => 4,
            ],
            [
                'criteria' => 'Rekognisi MBKM',
                'description' => 'Pelibatan mahasiswa dalam kegiatan MBKM',
                'weight' => 15,
                'order' => 5,
            ],
            [
                'criteria' => 'Laporan Akhir & Administrasi',
                'description' => 'Kelengkapan dokumen laporan akhir',
                'weight' => 10,
                'order' => 6,
            ],
        ];

        foreach ($monevPkmCriteria as $criteria) {
            ReviewCriteria::updateOrCreate(
                ['type' => 'monev_community_service', 'criteria' => $criteria['criteria']],
                $criteria
            );
        }
    }
}
