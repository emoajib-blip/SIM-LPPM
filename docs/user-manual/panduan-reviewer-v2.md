# Panduan Lengkap Pengguna: Reviewer
## SIM LPPM ITSNU Pekalongan

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Login dan Akses](#2-login-dan-akses)
3. [Pengenalan Dashboard Reviewer](#3-pengenalan-dashboard-reviewer)
4. [Melihat Tugas Review](#4-melihat-tugas-review)
5. [Melakukan Review Proposal](#5-melakukan-review-proposal)
6. [Kriteria Penilaian](#6-kriteria-penilaian)
7. [Menyelesaikan Review](#7-menyelesaikan-review)
8. [Review Laporan Kemajuan](#8-review-laporan-kemajuan)
9. [Review Laporan Akhir](#9-review-laporan-akhir)
10. [Riwayat Review](#10-riwayat-review)
11. [Troubleshooting](#11-troubleshooting)
12. [Glosarium](#12-glosarium)

---

## 1. Pendahuluan

### 1.1 Siapa Itu Reviewer?

Reviewer adalah pakartanaman yang dipilih untuk menilai proposal penelitian dan PKM secara objektif. Penilaian reviewer menjadi dasar utama keputusan pendanaan hibah di ITSNU Pekalongan.

### 1.2 Tanggung Jawab Reviewer

- **Menilai proposal** berdasarkan kriteria akademik
- **Memberikan rekomendasi** ilmiah
- **Menulis catatan** untuk perbaikan proposal
- **Menilai laporan** kemajuan dan akhir

### 1.3 Prinsip Etika Reviewer

| Prinsip | Deskripsi |
|---------|-----------|
| **Objektif** | Menilai berdasarkan fakta, bukan prasangka |
| **Akurat** | Memberikan penilaian yang valid |
| **Confidential** | Tidak membocorkan proposal |
| **Tidak Ada Konflik Kepentingan** | Tidak mereview proposal ada konflik |

---

## 2. Login dan Akses

### 2.1 Langkah Login

1. Buka browser dan akses: `https://sosiomen.web.id`
2. Masukkan kredensial:
   - **Email**: reviewer@itsnu-pkl.ac.id (contoh)
   - **Password**: [password yang diberikan]
3. Klik **Masuk**

### 2.2 Ganti Role

Jika Anda memiliki role lain (misal: Dosen):

1. Klik dropdown di pojok kanan atas
2. Pilih **" sebagai Reviewer"**

### 2.3 Menu Reviewer

Setelah login, sidebar akan menampilkan:

| Menu | Fungsi |
|------|--------|
| Dashboard | Statistik review tugas |
| Review Penelitian | Daftar proposal penelitian |
| Review PKM | Daftar proposal PKM |
| Riwayat Review | Proposal yang sudah direview |
| Monev | Monitoring evaluasi |

---

## 3. Pengenalan Dashboard Reviewer

### 3.1 Struktur Layout

```
┌─────────────────────────────────────────────────────────────┐
│  HEADER: Logo | Menu Utama | Notifikasi | Profil           │
├──────────────┬──────────────────────────────────────────────┤
│              │                                              │
│   SIDEBAR    │              MAIN CONTENT                    │
│              │                                              │
│  Dashboard   │   - Stats Cards                              │
│  Research    │   - Tabel Tugas                            │
│  PKM         │   - Progress Bar                            │
│  Riwayat     │   - Deadlines                              │
│              │                                              │
└──────────────┴──────────────────────────────────────────────┘
```

### 3.2 Statistik Dashboard

| Widget | Keterangan |
|--------|------------|
| Total Ditugaskan | Jumlah proposal ditugaskan |
| Sedang Direview | Proposal dalam proses review |
| Selesai | Review sudah submit |
| Overdue | Melebihi deadline |

### 3.3 Menu-Menu

| Menu | Fungsi |
|------|--------|
| Dashboard | Ringkasan tugas |
| Review Penelitian | Proposal penelitian ditugaskan |
| Review PKM | Proposal PKM ditugaskan |
| Riwayat Review | Semua review yang sudah selesai |
| Monev | Penilaian monev |

---

## 4. Melihat Tugas Review

### 4.1 Daftar Proposal Ditugaskan

1. Klik **Review Penelitian** atau **Review PKM**
2. Tabel menampilkan proposal yang ditugaskan

### 4.2 Kolom Informasi

| Kolom | Keterangan |
|-------|------------|
| Judul | Judul proposal |
| Pengusul | Nama dosen pengusul |
| Skema | Jenis skema |
| Tanggal Ditugaskan | Kapan ditugaskan |
| Deadline | Batas waktu review |
| Status | Sedang direview/selesai |
| Aksi | Tombol review |

### 4.3 Status Review

| Status | Arti |
|--------|------|
| PENDING | Belum dimulai |
| IN_PROGRESS | Sedang diisi |
| COMPLETED | Selesai direview |
| RE_REVIEW_REQUESTED | Perlu review ulang |

### 4.4 Filter Daftar

Gunakan filter untuk mencari:
- Skema
- Tanggal ditugaskan
- Deadline
- Status

---

## 5. Melakukan Review Proposal

### 5.1 Langkah Memulai Review

1. Klik tombol **Review** pada proposal yang ditugaskan
2. Halaman review akan terbuka
3. Review dapat dimulai

### 5.2 Bagian-Bagian Form Review

```
┌─────────────────────────────────────────────────────────────┐
│ FORM REVIEW PROPOSAL                                        │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ A. INFORMASI PROPOSAL                                       │
│    - Judul: [Judul Proposal]                                │
│    - Pengusul: [Nama Dosen]                                │
│    - Skema: [Jenis Skema]                                  │
│    - Download Proposal: [Link PDF]                          │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ B. KRITERIA PENILAIAN                                      │
│    1. Originalitas & Kebaruan    : [Skor 1-10]             │
│    2. Kelayakan Metodologi       : [Skor 1-10]             │
│    3. Kualitas Tim Peneliti     : [Skor 1-10]             │
│    4. Relevansi & Kontribusi    : [Skor 1-10]             │
│    5. Kelayakan Anggaran        : [Skor 1-10]             │
│    6. Rencana Luaran           : [Skor 1-10]             │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ C. CATATAN REVIEWER                                        │
│    [Textarea untuk masukan perbaikan]                       │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ D. REKOMENDASI                                             │
│    ○ SETUJU (Layak didanai)                                │
│    ○ REVISI (Perlu perbaikan sebelum didanai)              │
│    ○ TOLAK (Tidak layak didanai)                          │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│ [Simpan Draft]  [Submit Review]                             │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

### 5.3 Download Proposal

1. Klik link **Download Proposal** atau **Unduh PDF**
2. File PDF akan ter-download
3. Baca proposal dengan teliti

---

## 6. Kriteria Penilaian

### 6.1 Deskripsi Skor

| Skor | Kategori | Deskripsi |
|------|---------|-----------|
| 1-3 | Kurang | Perlu perbaikan substansial |
| 4-5 | Cukup | Dapat diterima dengan perbaikan |
| 6-7 | Baik | Baik,一些小 perbaikan |
| 8-9 | Sangat Baik | Sangat layak didanai |
| 10 | Excellent | Sangat luar biasa |

### 6.2 Kriteria dan Bobot

| No | Kriteria | Bobot | Panduan Penilaian |
|----|----------|-------|-------------------|
| 1 | Originalitas & Kebaruan | 20% | Sejauh mana penelitian baru/berbeda |
| 2 | Kelayakan Metodologi | 25% | Metode tepat dan dapat diukur |
| 3 | Kualitas Tim Peneliti | 15% | Kompetensi dan pengalaman tim |
| 4 | Relevansi & Kontribusi | 15% | Manfaat untuk ilmu & masyarakat |
| 5 | Kelayakan Anggaran | 10% | RAB sesuai dengan kegiatan |
| 6 | Rencana Luaran | 15% | Luaran realistis dan terukur |

### 6.3 Cara Memberikan Skor

1. Geser slider atau masukkan angka 1-10
2. Pertimbangkan semua aspek kriteria
3. Berikan skor sesuai penilaian objektif

### 6.4 Tips Memberikan Skor

- **Baca proposal dengan teliti** sebelum menilai
- **Gunakan skala yang konsisten** untuk semua proposal
- **Berikan skor rendah** jika ada kelemahan signifikan
- **Jangan terpengaruh** oleh reputasi pengusul

---

## 7. Menyelesaikan Review

### 7.1 Menyimpan Draft

Jika belum selesai, simpan sebagai draft:

1. Klik **Simpan Draft**
2. Anda dapat kembali nanti
3. Status: **IN_PROGRESS**

### 7.2 Submit Review Final

Jika sudah selesai, submit review:

1. Isi semua kriteria dengan skor
2. Tulis catatan reviewer (wajib minimal 50 karakter)
3. Pilih rekomendasi
4. Klik **Submit Review**
5. Konfirmasi:

```
┌─────────────────────────────────────────────────────────────┐
│ KONFIRMASI SUBMIT REVIEW                                   │
├─────────────────────────────────────────────────────────────┤
│ Anda akan submit review untuk:                              │
│ "Judul Proposal..."                                         │
│                                                             │
│ Rekomendasi: SETUJU / REVISI / TOLAK                       │
│                                                             │
│ Yakin ingin submit?                                         │
│ [Batal] [Ya, Submit]                                       │
└─────────────────────────────────────────────────────────────┘
```

6. Klik **Ya, Submit**
7. Status proposal: **COMPLETED**

### 7.3 After Submit

Setelah submit:
- Notifikasi dikirim ke Admin LPPM
- Pengusul dapat melihat hasil review (tanpa identitas reviewer)
- Review tidak dapat diubah setelah submit

---

## 8. Review Laporan Kemajuan

### 8.1 Menu Laporan Kemajuan

Anda juga dapat ditugaskan untuk mereview laporan kemajuan penelitian.

### 8.2 Langkah Review

1. Buka **Monev** di sidebar
2. Pilih laporan yang akan direview
3. Isi form penilaian monev
4. Submit review

### 8.3 Kriteria Penilaian Monev

| Aspek | Penilaian |
|-------|----------|
| Progress | Seberapa jauh kegiatan berjalan |
| Penggunaan Anggaran | Kesesuaian RAB |
| Kendala | Masalah yang dihadapi |
| Solusi | Upaya mengatasi masalah |

---

## 9. Review Laporan Akhir

### 9.1 Proses Review

Setelah penelitian selesai, reviewer dapat ditugaskan untuk mereview laporan akhir.

### 9.2 Hal yang Dinilai

- Kelengkapan laporan
- Kesesuaian dengan proposal
- Pencapaian luaran
- Pertanggungjawaban anggaran

---

## 10. Riwayat Review

### 10.1 Melihat Riwayat

1. klik **Riwayat Review** di sidebar
2. Tampilkan semua review yang sudah submit

### 10.2 Filter Riwayat

Filter berdasarkan:
- Tahun
- Skema
- Status review

### 10.3 Detail Review

Klik pada baris untuk melihat:
- Proposal yang direview
- Skor yang diberikan
- Rekomendasi
- Tanggal submit

---

## 11. Troubleshooting

### 11.1 Masalah Umum

| Masalah | Solusi |
|---------|--------|
| Link proposal tidak terbuka | Pastikan browser izinkan pop-up |
| Skor tidak bisa diinput | Refresh halaman |
| Submit gagal | Cek koneksi internet |
| Deadline terlewat | Hubungi Admin LPPM |

### 11.2 Pertanyaan Umum

**Q: Apakah identitas saya rahasia?**
A: Ya, identitas reviewer tidak ditampilkan ke pengusul.

**Q: Berapa lama deadline review?**
A: Default 14 hari, bisa lebih pendek/panjang sesuai kompleksitas.

**Q: Bisakah menolak tugas review?**
A: Hubungi Admin LPPM jika ada konflik kepentingan.

**Q: Apakah saya bisa memberikan意见 berbeda dari reviewer lain?**
A: Ya, setiap reviewerindependen memberikan penilaian.

---

## 12. Glosarium

| Istilah | Arti |
|---------|------|
| **Review** | Penilaian proposal |
| **Reviewer** | Pakar penilai |
| **Skor** | Nilai numerik (1-10) |
| **Rekomendasi** | Saran akhir (Setuju/Revisi/Tolak) |
| **Monev** | Monitoring dan Evaluasi |
| **Deadline** | Batas waktu |
| **Luaran** | Output penelitian |

---

## Kontak Bantuan

| Masalah | Kontak |
|---------|--------|
| Admin LPPM | admin@itsnu-pkl.ac.id |
| Technical | it@itsnu-pkl.ac.id |

---

*Terakhir diperbarui: Maret 2026*
*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
