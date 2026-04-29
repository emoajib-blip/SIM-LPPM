# Panduan Lengkap Pengguna: Dekan
## SIM LPPM ITSNU Pekalongan

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Login dan Akses](#2-login-dan-akses)
3. [Pengenalan Dashboard Dekan](#3-pengenalan-dashboard-dekan)
4. [Menyetuju Proposal](#4-menyetuju-proposal)
5. [Menolak Proposal](#5-menolak-proposal)
6. [Meminta Revisi](#6-meminta-revisi)
7. [Riwayat Persetujuan](#7-riwayat-persetujuan)
8. [Monitoring Proposal Fakulty](#8-monitoring-proposal-fakultas)
9. [Laporan Fakulty](#9-laporan-fakultas)
10. [Troubleshooting](#10-troubleshooting)
11. [Glosarium](#11-glosarium)

---

## 1. Pendahuluan

### 1.1 Peran Dekan dalam SIM LPPM

Sebagai Dekan, Anda memiliki peran penting dalam proses approve proposal penelitian dan PKM di tingkat fakultas. Anda adalah garda pertama dalam validasi kelayakan proposal sebelum dikirim ke LPPM untuk proses review lebih lanjut.

### 1.2 Tanggung Jawab Utama

- **Validasi Kelayakan**: Memastikan proposal sesuai dengan visi dan mission fakultas
- **Verifikasi Tim**: Memastikan keanggotaan tim valid
- **Persetujuan Awal**: Menyetuju atau menolak proposal dari dosen fakultas
- **Monitoring**: Memantau produktivitas riset fakultas

### 1.3 Alur Persetujuan Dekan

```
Dosen Submit Proposal
        ↓
Proposal Masuk ke Dekan (Status: SUBMITTED)
        ↓
   ┌────┴────┐
   ↓          ↓
 SETUJU    REVISI/TOLAK
   ↓          ↓
 APPROVED  REVISION/REJECTED
   ↓
LPPM Proses Selanjutnya
```

---

## 2. Login dan Akses

### 2.1 Langkah Login

1. Buka browser dan akses: `https://sosiomen.web.id`
2. Masukkan kredensial Dekan:
   - **Email**: dekan@itsnu-pkl.ac.id (contoh)
   - **Password**: [password yang diberikan]
3. Klik **Masuk**

### 2.2 Ganti Role

Jika Anda memiliki multi-role (misal: Dosen + Dekan):

1. Klik dropdown di pojok kanan atas
2. Pilih **" sebagai Dekan"**

### 2.3 Scope Akses

Sebagai Dekan, Anda hanya dapat melihat proposal dari:
- **Fakultas yang memimpin**
- **Program Studi di bawah fakultas tersebut**

---

## 3. Pengenalan Dashboard Dekan

### 3.1 Struktur Layout

```
┌─────────────────────────────────────────────────────────────┐
│  HEADER: Logo | Menu Utama | Notifikasi | Profil           │
├──────────────┬──────────────────────────────────────────────┤
│              │                                              │
│   SIDEBAR    │              MAIN CONTENT                    │
│              │                                              │
│  Dashboard   │   - Stats Cards                              │
│  Persetujuan │   - Tabel Proposal                           │
│  Riwayat     │   - Quick Actions                           │
│  Laporan     │                                              │
│              │                                              │
└──────────────┴──────────────────────────────────────────────┘
```

### 3.2 Menu-Menu Dekan

| Menu | Fungsi |
|------|--------|
| Dashboard | Statistik proposal fakultas |
| Persetujuan Dekan | Daftar proposal perlu persetujuan |
| Riwayat Persetujuan | Proposal yang sudah diproses |
| Laporan Fakulty | Laporan aktivitas riset |

### 3.3 Statistik Dashboard

Halaman utama menampilkan:

| Widget | Keterangan |
|--------|------------|
| Proposal Masuk | Proposal baru menunggu persetujuan |
| Disetujui | Proposal yang disetujui |
| Ditolak | Proposal yang ditolak |
| Revisi | Proposal perlu revisi |

---

## 4. Menyetuju Proposal

### 4.1 Daftar Proposal Perlu Persetujuan

1. Klik **Persetujuan Dekan** di sidebar
2. Anda akan melihat tabel proposal dengan status **"SUBMITTED"**

### 4.2 Informasi Proposal

Setiap baris menampilkan:
- Judul proposal
- Pengusul (Dosen)
- Skema
- Tahun anggaran
- Status
- Aksi

### 4.3 Langkah Menyetujui

1. Klik tombol **Lihat** atau **Detail** pada proposal
2. Review informasi proposal:

```
┌─────────────────────────────────────────────────────────────┐
│ DETAIL PROPOSAL                                            │
├─────────────────────────────────────────────────────────────┤
│ Judul: Pengembangan Sistem Informasi...                     │
│ Pengusul: Dr. Ahmad Fauzi, M.Kom                           │
│ Skema: Penelitian Dasar Terapan (PDT)                      │
│ Tahun: 2026                                                 │
│ RAB: Rp 45.000.000                                        │
├─────────────────────────────────────────────────────────────┤
│ ABSTRAK:                                                    │
│ [Abstrak proposal ditampilkan di sini...]                  │
├─────────────────────────────────────────────────────────────┤
│ TIM PENELITI:                                               │
│ 1. Dr. Ahmad Fauzi (Ketua)                                │
│ 2. Dr. Siti Rahayu (Anggota)                              │
├─────────────────────────────────────────────────────────────┤
│ UNDUH FILE PROPOSAL: [Download PDF]                        │
└─────────────────────────────────────────────────────────────┘
```

3. Jika semua data valid dan sesuai, klik **SETUJU**
4. Konfirmasi persetujuan:

```
┌─────────────────────────────────────────────────────────────┐
│ KONFIRMASI PERSETUJUAN                                     │
├─────────────────────────────────────────────────────────────┤
│ Anda akan menyetujui proposal:                              │
│ "Pengembangan Sistem Informasi..."                          │
│                                                             │
│ Yakin ingin menyetujui?                                    │
│ [Batal] [Ya, Setuju]                                        │
└─────────────────────────────────────────────────────────────┘
```

5. Proposal akan berubah status menjadi **"APPROVED"**
6. Sistem akan mengirim notifikasi ke:
   - Dosen pengusul
   - Admin LPPM (untuk penugasan reviewer)

### 4.4 Checklist Sebelum Menyetuju

| No | Item | Checklist |
|----|------|----------|
| 1 | Judul sesuai bidang ilmu | ☐ |
| 2 | Tim memiliki kompetensi | ☐ |
| 3 | RAB reasonable | ☐ |
| 4 | Jadwal realistis | ☐ |
| 5 | File proposal lengkap | ☐ |

---

## 5. Menolak Proposal

### 5.1 Kriteria Penolakan

Proposal dapat ditolak jika:
- Tidak relevan dengan bidang fakultas
- Tim tidak memiliki kompetensi
- Proposal duplikasi
- Melanggar ketentuan

### 5.2 Langkah Menolak

1. Klik **Detail** pada proposal
2. Klik tombol **TOLAK**
3. Pilih alasan penolakan:

```
┌─────────────────────────────────────────────────────────────┐
│ ALASAN PENOLAKAN                                           │
├─────────────────────────────────────────────────────────────┤
│ Pilih alasan:                                               │
│ ○ Tidak sesuai bidang fakultas                             │
│ ○ Tim tidak kompeten                                       │
│ ○ Duplikasi proposal                                        │
│ ○ Melanggar ketentuan                                       │
│ ○ Lainnya: [isi alasan]                                    │
├─────────────────────────────────────────────────────────────┤
│ Catatan Tambahan:                                           │
│ [Textarea untuk penjelasan tambahan]                        │
└─────────────────────────────────────────────────────────────┘
```

4. Klik **Konfirmasi Penolakan**
5. Proposal status menjadi **"REJECTED"**
6. Dosen pengusul akan menerima notifikasi penolakan

---

## 6. Meminta Revisi

### 6.1 Kriteria Revisi

Minta revisi jika proposal:
- Perlu perbaikan minor
- RAB perlu penyesuaian
- Tim perlu penambahan
- Substansi kurang lengkap

### 6.2 Langkah Meminta Revisi

1. Klik **Detail** pada proposal
2. Klik tombol **REVISI**
3. Isi formulir revisi:

```
┌─────────────────────────────────────────────────────────────┐
│ PERMINTAAN REVISI                                          │
├─────────────────────────────────────────────────────────────┤
│ Bagian yang perlu direvisi:                                 │
│ □ Judul                                                     │
│ □ Abstrak                                                   │
│ □ Metodologi                                                │
│ □ RAB                                                       │
│ □ Tim Peneliti                                              │
│ □ Lainnya                                                    │
├─────────────────────────────────────────────────────────────┤
│ Catatan Revisi:                                             │
│ [Jelaskan secara detail apa yang perlu direvisi]            │
│                                                             │
│ Contoh:                                                     │
│ - RAB melebihi batas, kurangi menjadi maksimal Rp 30jt      │
│ - Metodologi perlu diperjelas pada bagian sampling         │
└─────────────────────────────────────────────────────────────┘
```

4. Klik **Kirim Permintaan Revisi**
5. Proposal status menjadi **"REVISION_NEEDED"**
6. Dosen akan menerima notifikasi untuk merevisi

### 6.3 Melihat Proposal Revisi

Setelah dosen merevisi:

1. Anda akan menerima notifikasi
2. Buka **Persetujuan Dekan**
3. Proposal berstatus **"SUBMITTED"** (setelah revisi)
4. Review ulang proposal
5. Setuju atau tolak

---

## 7. Riwayat Persetujuan

### 7.1 Melihat Riwayat

1. Klik **Riwayat Persetujuan** di sidebar
2. Tabel menampilkan semua proposal yang sudah diproses

### 7.2 Filter Riwayat

| Filter | Fungsi |
|--------|--------|
| Tahun | Filter berdasarkan tahun |
| Skema | Filter jenis skema |
| Status | Setuju/Tolak/Revisi |
| Tanggal | Range tanggal |

### 7.3 Detail Riwayat

Klik pada baris untuk melihat:
- Detail proposal lengkap
- Keputusan yang diambil
- Catatan (jika ada)
- Waktu keputusan

---

## 8. Monitoring Proposal Fakulty

### 8.1 Dashboard Monitoring

1. Klik **Dashboard** untuk melihat ringkasan
2. Stats cards menampilkan:
   - Total proposal fakultas
   - Dalam proses
   - Selesai
   - Ditolak

### 8.2 Grafik dan Diagram

Dashboard menampilkan:
- **Pie Chart**: Distribusi status proposal
- **Bar Chart**: Proposal per skema
- **Timeline**: Proposal masuk per bulan

### 8.3 Export Data

1. Di halaman laporan, klik **Export**
2. Pilih format (Excel/PDF)
3. File akan ter-download

---

## 9. Laporan Fakulty

### 9.1 Menu Laporan

Klik **Laporan Fakulty** untuk melihat:
- Proposal per prodi
- Produktivitas riset
- Dana yang digunakan

### 9.2 Filter Laporan

| Filter | Keterangan |
|--------|------------|
| Tahun | Tahun anggaran |
| Semester | Semester ganjil/genap |
| Prodi | Program studi |
| Skema | Jenis skema |

### 9.3 Export Laporan

1. Atur filter sesuai kebutuhan
2. Klik **Export Excel** atau **Export PDF**
3. File akan ter-download

---

## 10. Troubleshooting

### 10.1 Masalah Umum

| Masalah | Solusi |
|---------|--------|
| Tidak melihat proposal dosen | Pastikan fakultas sesuai |
| Tombol Setuju tidak muncul | Refresh halaman |
| Proposal stuck di submitted | Hubungi Admin LPPM |
| Laporan tidak muncul | Cek filter tahun |

### 10.2 Pertanyaan Umum

**Q: Berapa lama waktu review proposal sebagai Dekan?**
A:ideal maksimal 7 hari kerja.

**Q: Bisakah saya menyetujui proposal dari fakultas lain?**
A: Tidak, Anda hanya dapat memproses proposal dari fakultas yang Anda pimpin.

**Q: Apa bedanya Tolak dan Revisi?**
A: Tolak = proposal tidak dilanjutkan. Revisi = proposal diperbaiki dulu lalu resubmit.

---

## 11. Glosarium

| Istilah | Arti |
|---------|------|
| **APPROVED** | Proposal disetujui di tingkat fakultas |
| **REJECTED** | Proposal ditolak |
| **REVISION_NEEDED** | Perlu perbaikan |
| **SUBMITTED** | Baru diajukan, menunggu persetujuan |
| **Fakultas** | Unit organisasi di ITSNU |
| **Skema** | Jenis penelitian/PKM |
| **RAB** | Rencana Anggaran Biaya |

---

## Kontak Bantuan

| Masalah | Kontak |
|---------|--------|
| Admin LPPM | admin@itsnu-pkl.ac.id |
| Technical | it@itsnu-pkl.ac.id |

---

*Terakhir diperbarui: Maret 2026*
*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
