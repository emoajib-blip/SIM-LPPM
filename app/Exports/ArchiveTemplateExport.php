<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class ArchiveTemplateExport implements FromArray, WithColumnWidths, WithHeadings, WithStyles, WithTitle
{
    public function title(): string
    {
        return 'Template Import Arsip';
    }

    public function headings(): array
    {
        return [
            // ── Ketua Tim ─────────────────────────────────────────────────────
            'nidn',              // A: NIDN Ketua (prioritas utama)
            'nama_dosen',        // B: Nama Ketua (fallback jika NIDN tidak dikenal)
            // ── Detail Kegiatan ───────────────────────────────────────────────
            'judul',             // C: Judul kegiatan (WAJIB)
            'skema',             // D: "Penelitian" atau "Pengabdian" (WAJIB)
            'nama_skema',        // E: Nama skema spesifik (opsional)
            'tahun',             // F: Tahun pelaksanaan (WAJIB)
            'lama_kegiatan',     // G: Durasi tahun (default: 1)
            'dana',              // H: Nilai dana/SBK Rupiah
            // ── Anggota Tim ───────────────────────────────────────────────────
            'nidn_anggota',      // I: NIDN anggota dosen, pisah koma
            'anggota_mahasiswa', // J: Nama|NIM, pisah koma untuk multi mahasiswa
            // ── Konten ────────────────────────────────────────────────────────
            'ringkasan',         // K: Abstrak/ringkasan kegiatan
        ];
    }

    public function array(): array
    {
        return [
            // Contoh 1: Penelitian dengan 2 dosen anggota + 2 mahasiswa
            [
                '0123456789',
                'Dr. Budi Santoso, M.Si',
                'Pengembangan Model Pembelajaran Berbasis AI untuk Meningkatkan Kompetensi Mahasiswa',
                'Penelitian',
                'Hibah Dosen Muda',
                '2023',
                '1',
                '7500000',
                '9876543210,1122334455',             // 2 dosen anggota (NIDN pisah koma)
                'Ahmad Rizki|220102001,Siti Nur|220102002', // 2 mahasiswa (Nama|NIM pisah koma)
                'Penelitian ini bertujuan mengembangkan model pembelajaran berbasis kecerdasan buatan...',
            ],
            // Contoh 2: Pengabdian tanpa anggota mahasiswa, 1 dosen anggota
            [
                '9876543210',
                'Siti Aminah, S.Pd, M.Pd',
                'Pelatihan Digital Marketing untuk UMKM Desa Binaan ITSNU',
                'Pengabdian',
                'PKM Berbasis Masyarakat',
                '2023',
                '1',
                '5000000',
                '0123456789',   // 1 dosen anggota
                '',              // kosong = tidak ada mahasiswa
                'Kegiatan pengabdian masyarakat berupa pelatihan pemasaran digital...',
            ],
            // Contoh 3: Penelitian multi-tahun, ketua saja tanpa anggota
            [
                '1122334455',
                'Prof. Ahmad Fauzi, Ph.D',
                'Riset Ketahanan Pangan Berbasis Kearifan Lokal',
                'Penelitian',
                'Hibah Unggulan Institusi',
                '2022',
                '2',
                '15000000',
                '',              // kosong = tidak ada dosen anggota
                'Lukman Hakim|220103001', // 1 mahasiswa
                'Penelitian multitahun yang berfokus pada pola ketahanan pangan lokal...',
            ],
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        // Style header row (biru tua)
        $sheet->getStyle('A1:K1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FF1E6FA8'],
            ],
        ]);

        // Beri warna berbeda untuk kelompok kolom
        // Ketua tim: kolom A-B (biru tua sudah)
        // Anggota: kolom I-J (warna biru muda)
        $sheet->getStyle('I1:J1')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FF2E86C1'],
            ],
        ]);

        // Freeze baris header
        $sheet->freezePane('A2');

        // Catatan petunjuk
        $lastRow = count($this->array()) + 2;
        $notes = [
            '⚠ PETUNJUK PENGISIAN TEMPLATE:',
            '- Kolom WAJIB: nidn (atau nama_dosen), judul, skema, tahun',
            "- Kolom 'skema' HARUS berisi: Penelitian, Pengabdian, PKM, atau Abmas",
            "- Kolom 'nidn_anggota': NIDN dosen anggota pisahkan dengan koma. Contoh: 0101010101,0202020202",
            "- Kolom 'anggota_mahasiswa': format NAMA|NIM, pisahkan dengan koma. Contoh: Budi Santoso|220102001,Siti|220102002",
            "- Kolom 'lama_kegiatan' diisi angka tahun (1, 2, atau 3). Kosongkan jika 1 tahun.",
            '- Hapus baris contoh (baris 2-4) sebelum mengisi data asli.',
            '- NIDN yang dimasukkan HARUS sudah terdaftar di sistem.',
        ];

        foreach ($notes as $i => $note) {
            $r = $lastRow + $i;
            $sheet->setCellValue("A{$r}", $note);
            $sheet->mergeCells("A{$r}:K{$r}");
            $isTitle = $i === 0;
            $sheet->getStyle("A{$r}")->applyFromArray([
                'font' => [
                    'color' => ['argb' => $isTitle ? 'FF800000' : 'FFCC0000'],
                    'italic' => ! $isTitle,
                    'bold' => $isTitle,
                    'size' => $isTitle ? 10 : 9,
                ],
            ]);
        }

        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 16,  // nidn
            'B' => 30,  // nama_dosen
            'C' => 60,  // judul
            'D' => 14,  // skema
            'E' => 25,  // nama_skema
            'F' => 10,  // tahun
            'G' => 14,  // lama_kegiatan
            'H' => 15,  // dana
            'I' => 35,  // nidn_anggota (bisa banyak NIDN)
            'J' => 45,  // anggota_mahasiswa
            'K' => 55,  // ringkasan
        ];
    }
}
