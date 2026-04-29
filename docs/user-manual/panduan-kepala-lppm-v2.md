# Panduan Lengkap Pengguna: Kepala LPPM
## SIM LPPM ITSNU Pekalongan

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Login dan Akses](#2-login-dan-akses)
3. [Pengenalan Dashboard](#3-pengenalan-dashboard)
4. [Persetujuan Awal](#4-persetujuan-awal)
5. [Persetujuan Akhir](#5-persetujuan-akhir)
6. [Persetujuan Laporan](#6-persetujuan-laporan)
7. [Dashboard IKU](#7-dashboard-iku)
8. [Rekap Monev](#8-rekap-monev)
9. [Monitoring Seluruh Proposal](#9-monitoring-seluruh-proposal)
10. [Reports dan Export](#10-reports-dan-export)
11. [Troubleshooting](#11-troubleshooting)
12. [Glosarium](#12-glosarium)

---

## 1. Pendahuluan

### 1.1 Peran Kepala LPPM

Kepala LPPM adalah pengambilan keputusan tertinggi dalam proses seleksi proposal penelitian dan PKM. Anda memiliki otoritas untuk:

- **Menyetuju proposal** setelah melalui proses review
- **Menolak proposal** yang tidak layak
- **Meminta revisi** proposal yang perlu perbaikan
- **Menyetuju laporan** akhir penelitian
- **Memantau IKU** institusi

### 1.2 Posisi dalam Alur Sistem

```
Dekan approve → Admin LPPM tugaskan reviewer → Reviewer review
        ↓
    REVIEWED (Semua reviewer selesai)
        ↓
   ┌────┴────┐
   ↓          ↓
SETUJU    REVISI/TOLAK
( Kepala   (oleh Kepala
  LPPM)      LPPM)
```

### 1.3 Hak Akses

Sebagai Kepala LPPM, Anda memiliki akses ke:

- Dashboard Eksekutif
- Persetujuan Awal (Proposal lolos review)
- Persetujuan Akhir (Keputusan final)
- Persetujuan Laporan
- Dashboard IKU
- Semua Reports
- Monev Dashboard

---

## 2. Login dan Akses

### 2.1 Langkah Login

1. Buka browser: `https://sosiomen.web.id`
2. Masukkan kredensial:
   - **Email**: kepala.lppm@itsnu-pkl.ac.id
   - **Password**: [password yang diberikan]
3. Klik **Masuk**

### 2.2 Ganti Role

Jika Anda memiliki multi-role (misal: Rektor):

1. Klik dropdown di pojok kanan atas
2. Pilih **" sebagai Kepala LPPM"**

---

## 3. Pengenalan Dashboard

### 3.1 Struktur Layout

```
┌─────────────────────────────────────────────────────────────┐
│  HEADER: Logo | Menu Utama | Notifikasi | Profil            │
├──────────────┬──────────────────────────────────────────────┤
│              │                                              │
│   SIDEBAR    │              MAIN CONTENT                    │
│              │                                              │
│  Dashboard   │   - Stats Cards                              │
│  Persetujuan │   - Charts                                   │
│  IKU         │   - Quick Actions                           │
│  Reports     │   - Recent Activity                         │
│  Monev       │                                              │
│              │                                              │
└──────────────┴──────────────────────────────────────────────┘
```

### 3.2 Menu-Menu

| Menu | Fungsi |
|------|--------|
| Dashboard | Statistik umum LPPM |
| Persetujuan Awal | Proposal lolos review, perlu keputusan |
| Persetujuan Akhir | Keputusan final proposal |
| Persetujuan Laporan | Validasi laporan akhir |
| Dashboard IKU | Monitoring indikator kinerja |
| Monev Rekap | Rekap monitoring evaluasi |
| Reports | Semua laporan penelitian/PKM |

### 3.3 Statistik Dashboard

| Widget | Keterangan |
|--------|------------|
| Total Proposal | Jumlah seluruh proposal |
| Proposal Aktif | Sedang berjalan |
| Proposal Selesai | Sudah selesai |
| Total Dana | Anggaran terpakai |
| IKU Progress | Pencapaian indikator |

---

## 4. Persetujuan Awal

### 4.1 Apa Itu Persetujuan Awal?

Persetujuan Awal adalah proposal yang sudah:
- Disetujui Dekan
- Ditugaskan reviewer oleh Admin
- Selesai direview oleh reviewer

### 4.2 Daftar Proposal

1. Klik **Persetujuan Awal**
2. Tampilkan proposal dengan status **"REVIEWED"**

### 4.3 Informasi yang Ditampilkan

| Kolom | Keterangan |
|-------|------------|
| Judul | Judul proposal |
| Pengusul | Dosen pengusul |
| Skema | Jenis skema |
| Skor Rata-rata | Nilai dari reviewer |
| Rekomendasi Reviewer | Setuju/Revisi/Tolak |
| Aksi | Tombol untuk memutuskan |

### 4.4 Melihat Detail Review

Klik pada baris proposal untuk melihat:

```
┌─────────────────────────────────────────────────────────────┐
│ DETAIL PROPOSAL                                            │
├─────────────────────────────────────────────────────────────┤
│ Judul: Pengembangan Sistem Cerdas untuk...                   │
│ Pengusul: Dr. Ahmad Fauzi, M.Kom                           │
│ Skema: Penelitian Terapan (PTT)                            │
│ Dana: Rp 75.000.000                                        │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ HASIL REVIEW:                                              │
│                                                             │
│ Reviewer 1 (Prof. Budi):                                   │
│ - Originalitas: 8                                          │
│ - Metodologi: 7                                            │
│ - Tim: 8                                                   │
│ - Total: 7.8 → SETUJU                                     │
│                                                             │
│ Reviewer 2 (Dr. Siti):                                     │
│ - Originalitas: 7                                          │
│ - Metodologi: 8                                            │
│ - Tim: 7                                                   │
│ - Total: 7.3 → SETUJU                                     │
│                                                             │
│ RATA-RATA SKOR: 7.55                                       │
│                                                             │
│ CATATAN REVIUWER:                                          │
│ "Proposal sangat baik, disarankan menambah..."              │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ KEPUTUSAN:                                                 │
│                                                             │
│ [TOLAK] [REVISI] [SETUJU]                                  │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

### 4.5 Membuat Keputusan

#### Menyetuju Proposal

1. Klik **SETUJU**
2. Proposal status menjadi **"COMPLETED"**
3. Dosen dapat mulai melaksanakan penelitian
4. Dana dapat dicairkan

#### Meminta Revisi

1. Klik **REVISI**
2. Berikan catatan perbaikan
3. Proposal kembali ke dosen dengan status **"REVISION_NEEDED"**
4. Dosen merevisi dan resubmit

#### Menolak Proposal

1. Klik **TOLAK**
2. Berikan alasan penolakan
3. Proposal status menjadi **"REJECTED"**

---

## 5. Persetujuan Akhir

### 5.1 Apa Itu Persetujuan Akhir?

Persetujuan Akhir adalah keputusan final untuk proposal yang sudah:
- Selesai direview
- Menunggu keputusan Kepala LPPM

### 5.2 Akses Menu

1. Klik **Persetujuan Akhir**
2. Sama dengan Persetujuan Awal
3. Bisa juga dari menu Persetujuan Awal

### 5.3 Perbedaan Persetujuan Awal dan Akhir

| Aspek | Persetujuan Awal | Persetujuan Akhir |
|-------|------------------|-------------------|
| Timing | Setelah review | Setelah penelitian selesai |
| Yang dinilai | Proposal | Laporan akhir |
| Output | Izin melaksanakan | Validasi luaran |

---

## 6. Persetujuan Laporan

### 6.1 Menu Persetujuan Laporan

1. Klik **Persetujuan Laporan**
2. Daftar laporan akhir yang submit akan muncul

### 6.2 Checklist Persetujuan

| Item | Checklist |
|------|----------|
| Laporan lengkap | ☐ |
| Luaran terpenuhi | ☐ |
| Anggaran sesuai | ☐ |
| Bukti luaran valid | ☐ |

### 6.3 Aksi

| Aksi | Hasil |
|------|-------|
| **Setuju** | Laporan diterima, dana penuh dicairkan |
| **Revisi** | Dikembalikan untuk perbaikan |
| **Tolak** | Dana tidak dicairkan |

---

## 7. Laporan Tingkat Institusi (untuk Rector)

### 7.1 Apa Itu Laporan Institusi?

Laporan Tingkat Institusi adalah laporan gabungan dari seluruh aktivitas penelitian dan PKM yang dibuat oleh Kepala LPPM untuk dilaporkan kepada Rector.

### 7.2 Menu Laporan yang Dapat Diakses

| Menu Laporan | Jenis Data | Format Export |
|--------------|------------|---------------|
| **Laporan Penelitian** | Semua proposal penelitian | PDF, Excel |
| **Laporan PKM** | Semua proposal PKM | PDF, Excel |
| **Laporan Luaran** | Publikasi, HKI, produk | PDF, Excel |
| **Laporan Mitra** | Kerjasama dengan pihak lain | PDF, Excel |
| **Laporan Monev** | Hasil monitoring evaluasi | PDF, Excel |
| **IKU Dashboard** | Pencapaian indikator kinerja | PDF, Excel |

### 7.3 Cara Membuat Laporan untuk Rector

1. **Akses Menu Laporan**:
   - Klik **Laporan Penelitian** / **Laporan PKM** / **Laporan Luaran** / dll

2. **Atur Filter**:
   - Pilih **Tahun** (misal: 2026)
   - Pilih **Semester** (Ganjil/Genap)
   - Pilih **Fakultas** (semua fakultas)

3. **Review Data**:
   - Periksa data yang ditampilkan
   - Gunakan drill-down untuk detail

4. **Export Laporan**:
   - Klik **Export PDF** untuk laporan resmi
   - Klik **Export Excel** untuk analisis data

5. **Buat Ringkasan Eksekutif**:
   - Sediakan ringkasan 1-2 halaman
   - Sertakan metrik utama

### 7.4 Dashboard Monitoring Institusi

1. Klik **Reports** > **Monitoring**
2. Halaman menampilkan data tingkat institusi:
   - **Proposal per Fakuldades**: Jumlah proposal per fakultas
   - **Dana Terpakai**: Total anggaran yang digunakan
   - **Luaran yang Dicapai**: Publikasi, HKI, dll

### 7.5 Jadwal Penyampaian Laporan

| Jenis Laporan | Frekuensi | Waktu |
|---------------|-----------|-------|
| Laporan Bulanan | Bulanan | Akhir setiap bulan |
| Laporan Semester | Semester | Akhir semester |
| Laporan Tahunan | Tahunan | Akhir tahun |
| Laporan IKU | Tahunan | Awal tahun |

### 7.6 Akses Rector terhadap Laporan

Rector dapat mengakses:
- Dashboard IKU langsung di sistem
- Semua laporan yang di-export Kepala LPPM
- Monitoring real-time melalui menu Reports

---

## 8. Dashboard IKU

### 7.1 Apa Itu IKU?

IKU (Indikator Kinerja Utama) adalah target yang harus dicapai institusi. LPPM memonitor pencapaian IKU melalui luaran penelitian dan PKM.

### 7.2 Mengakses Dashboard

1. Klik **Dashboard IKU** di sidebar
2. Halaman menampilkan:

### 7.3 Indikator yang Dimonitor

| Kategori | Indikator | Target |
|-----------|-----------|--------|
| Publikasi | Jurnal Nasional | X buah |
| Publikasi | Jurnal Internasional | X buah |
| HKI | Paten granted | X buah |
| HKI | Hak Cipta | X buah |
| Pengmas | Masyarakat terdampak | X orang |
| Kerjasama | MoU baru | X buah |

### 7.4 Visualisasi

Dashboard menampilkan:
- Progress bar per indikator
- Pie chart distribusi luaran
- Trend line per tahun

### 7.5 Export IKU

1. Klik **Export PDF** atau **Export Excel**
2. File akan ter-download
3. Bisa digunakan untuk laporan pimpinan

---

## 8. Rekap Monev

### 8.1 Menu Monev

1. Klik **Monev** > **Rekap**
2. Tampilkan rekap semua monev

### 8.2 Informasi Rekap

- Proposal yang sudah dimonev
- Nilai monev
- Temuan
- Rekomendasi

### 8.3 Export Rekap

1. Klik **Export Excel**
2. File akan ter-download

---

## 9. Monitoring Seluruh Proposal

### 9.1 Akses Monitoring

1. Klik **Reports** > **Monitoring**
2. Lihat semua proposal

### 9.2 Filter Lanjutan

Filter berdasarkan:
- Status
- Skema
- Tahun
- Fakuldades
- Prodi
- Keyword

### 9.3 Visualisasi

- Grafik proposal masuk per bulan
- Pie chart status
- Bar chart per fakultas

---

## 10. Reports dan Export

### 10.1 Jenis Laporan

| Laporan | Format |
|---------|--------|
| Laporan Penelitian | PDF, Excel |
| Laporan PKM | PDF, Excel |
| Laporan Luaran | PDF, Excel |
| Laporan Mitra | PDF, Excel |
| Laporan Monev | PDF, Excel |
| Laporan IKU | PDF, Excel |

### 10.2 Cara Export

1. Buka menu laporan yang diinginkan
2. Atur filter (tahun, fakultas, dll)
3. Klik **Export** (PDF/Excel)
4. File akan ter-download

---

## 11. Troubleshooting

### 11.1 Masalah Umum

| Masalah | Solusi |
|---------|--------|
| Tidak melihat proposal | Cek filter status |
| Review Summary kosong | Reviewer belum submit |
| Laporan tidak muncul | Dosen belum submit |
| IKU tidak akurat | Verifikasi data luaran |

### 11.2 Pertanyaan Umum

**Q: Apakah saya harus menyetujui semua proposal yang direview?**
A: Tidak, Anda keputusan final. Bisa menolak meski reviewer Setuju.

**Q: Berapa skor minimum untuk disetujui?**
A: Rata-rata skor minimal 5.0, tetapi kebijakan dapat berbeda.

**Q: Bisakah melihat identitas reviewer?**
A: Ya, Anda dapat melihat identitas reviewer.

---

## 12. Glosarium

| Istilah | Arti |
|---------|------|
| **Persetujuan Awal** | Keputusan setelah review |
| **Persetujuan Akhir** | Keputusan final |
| **Persetujuan Laporan** | Validasi laporan akhir |
| **IKU** | Indikator Kinerja Utama |
| **Monev** | Monitoring dan Evaluasi |
| **Luaran** | Output penelitian |
| **COMPLETED** | Proposal disetujui |
| **REJECTED** | Proposal ditolak |
| **REVIEWED** | Review selesai |

---

## Kontak Bantuan

| Masalah | Kontak |
|---------|--------|
| Admin LPPM | admin@itsnu-pkl.ac.id |
| Technical | it@itsnu-pkl.ac.id |
| Rector | rektor@itsnu-pkl.ac.id |

---

*Terakhir diperbarui: Maret 2026*
*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
