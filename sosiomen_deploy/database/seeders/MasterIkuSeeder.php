<?php

namespace Database\Seeders;

use App\Models\MasterIku;
use Illuminate\Database\Seeder;

class MasterIkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ikus = [
            [
                'code' => 'IKU-04',
                'name' => 'Jumlah Dosen dengan Rekognisi Internasional',
                'description' => 'Persentase dosen tetap yang berkualifikasi akademik S3; memiliki sertifikat pendidik; dan/atau memiliki sertifikat kompetensi/profesi yang diakui oleh dunia usaha dan dunia industri.',
                'target_percentage' => 15.00,
                'internal_weight' => 25.00,
            ],
            [
                'code' => 'IKU-05',
                'name' => 'Luaran Hasil Kerja Sama dan Hilirisasi',
                'description' => 'Persentase hasil penelitian dan pengabdian kepada masyarakat yang dikerjasamakan dengan mitra dan/atau dimanfaatkan oleh masyarakat.',
                'target_percentage' => 20.00,
                'internal_weight' => 25.00,
            ],
            [
                'code' => 'IKU-06',
                'name' => 'Publikasi Bereputasi (Scopus/WoS dan SINTA 1-6)',
                'description' => 'Persentase hasil karya dosen yang berhasil dipublikasikan pada jurnal bereputasi internasional dan nasional terakreditasi.',
                'target_percentage' => 20.00,
                'internal_weight' => 25.00,
            ],
            [
                'code' => 'IKU-07',
                'name' => 'Keterlibatan PT dalam SDGs',
                'description' => 'Persentase program pendidikan dan pengabdian masyarakat yang terintegrasi dengan target Sustainable Development Goals.',
                'target_percentage' => 100.00,
                'internal_weight' => 15.00,
            ],
            [
                'code' => 'IKU-08',
                'name' => 'SDM Terlibat Penyusunan Kebijakan',
                'description' => 'Persentase dosen yang terlibat dalam penyusunan kebijakan nasional/daerah atau rekognisi pakar.',
                'target_percentage' => 5.00,
                'internal_weight' => 10.00,
            ],
        ];

        foreach ($ikus as $iku) {
            MasterIku::updateOrCreate(
                ['code' => $iku['code']],
                $iku
            );
        }
    }
}
