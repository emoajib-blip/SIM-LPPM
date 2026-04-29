# Panduan Lengkap Pengguna: Dosen
## SIM LPPM ITSNU Pekalongan

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Login dan Akses Sistem](#2-login-dan-akses-sistem)
3. [Pengenalan Antarmuka (Dashboard)](#3-pengenalan-antarmuka-dashboard)
4. [Mengajukan Proposal Penelitian](#4-mengajukan-proposal-penelitian)
5. [Mengajukan Proposal PKM (Pengabdian Masyarakat)](#5-mengajukan-proposal-pkm-pengabdian-masyarakat)
6. [Mengelola Tim Proposal](#6-mengelola-tim-proposal)
7. [Melacak Status Proposal](#7-melacak-status-proposal)
8. [Menulis Catatan Harian (Daily Note)](#8-menulis-catatan-harian-daily-note)
9. [Mengumpulkan Laporan Kemajuan](#9-mengumpulkan-laporan-kemajuan)
10. [Mengumpulkan Laporan Akhir](#10-mengumpulkan-laporan-akhir)
11. [Mengunggah Luaran (Output)](#11-mengunggah-luaran-output)
12. [Pengaturan Profil](#12-pengaturan-profil)
13. [Notifikasi](#13-notifikasi)
14. [Panduan Troubleshooting](#14-panduan-troubleshooting)
15. [Glosarium](#15-glosarium)

---

## 1. Pendahuluan

### 1.1 Apa Itu SIM LPPM?

SIM LPPM (Sistem Informasi Manajemen Lembaga Penelitian dan Pengabdian Masyarakat) adalah platform digital terpadu yang digunakan untuk mengelola seluruh aktivitas penelitian dan pengabdian masyarakat di Institut Teknologi dan Sains Nahdlatul Ulama (ITSNU) Pekalongan.

### 1.2 Siapa yang Bisa Menggunakan Menu Dosen?

Menu ini dapat diakses oleh semua dosen yang memiliki akun pengguna dalam sistem. Sebagai dosen, Anda dapat:

- Mengajukan proposal penelitian
- Mengajukan proposal PKM (Pengabdian Masyarakat)
- Memantau status proposal
- Menulis catatan harian kegiatan
- Mengumpulkan laporan kemajuan dan laporan akhir
- Mengunggah luaran penelitian (publikasi, HKI, dll)

### 1.3 Jenis Skema Penelitian

| Kode | Nama Skema | Deskripsi |
|------|------------|-----------|
| PDP | Penelitian Dasar Pemula | Penelitian dasar untuk dosen pemula |
| PDT | Penelitian Dasar Terapan | Penelitian dasar dengan aplikasi nyata |
| PTT | Penelitian Terapan | Penelitian untuk diterapkan langsung |
| PL | Penelitian Lanjutan | Kelanjutan penelitian sebelumnya |

### 1.4 Jenis Skema PKM

| Kode | Nama Skema | Deskripsi |
|------|------------|-----------|
| PKM-P | PKM Pengabdian Kepada Masyarakat | Pengabdian langsung ke masyarakat |
| PKM-T | PKM Teknologi | Penerapan teknologi untuk masyarakat |
| PKM-K | PKM Kewirausahaan | Pengabdian berbasis kewirausahaan |

---

## 2. Login dan Akses Sistem

### 2.1 Langkah Login

1. **Buka Browser**: Gunakan Google Chrome, Mozilla Firefox, atau Microsoft Edge (pastikan versi terbaru).

2. **Akses URL**: Ketik alamat aplikasi di browser:
   ```
   https://sosiomen.web.id
   ```

3. **Masukkan Kredensial**:
   - **Email/NIP**: Masukkan email atau NIP Anda
   - **Password**: Masukkan password akun Anda

4. **Klik Tombol Login**: Tekan tombol "Masuk" atau "Login"

5. **Verifikasi (Jika Ada)**:
   - Jika sistem mengaktifkan **Two-Factor Authentication (2FA)**, masukkan kode 6 digit dari aplikasi autentikator Anda

### 2.2 Jika Lupa Password

1. Klik tautan **"Lupa Password?"** di halaman login
2. Masukkan email Anda yang terdaftar
3. Klik **Kirim Link Reset**
4. Buka email Anda dan klik tautan reset password
5. Buat password baru dan konfirmasi
6. Login dengan password baru

### 2.3 Ganti Role (Jika Memilik Multiple Role)

Jika Anda memiliki lebih dari satu peran (misal: Dosen dan Reviewer), Anda dapat mengganti role:

1. Klik dropdown di pojok kanan atas (foto profil Anda)
2. Pilih role yang ingin digunakan, contoh: **" sebagai Dosen"**
3. Dashboard akan berubah sesuai role yang dipilih

---

## 3. Pengenalan Antarmuka (Dashboard)

### 3.1 Struktur Layout

```
┌─────────────────────────────────────────────────────────────┐
│  HEADER: Logo | Menu Utama | Notifikasi | Profil           │
├──────────────┬──────────────────────────────────────────────┤
│              │                                              │
│   SIDEBAR    │              MAIN CONTENT                    │
│   NAVIGASI   │                                              │
│              │   - Cards Statistik                          │
│   - Dashboard│   - Tabel Data                               │
│   - Proposal │   - Form Input                               │
│   - Laporan  │   - Detail View                              │
│   - Profil   │                                              │
│              │                                              │
└──────────────┴──────────────────────────────────────────────┘
```

### 3.2 Menu-Menu di Sidebar

| Menu | Fungsi |
|------|--------|
| **Dashboard** | Ringkasan aktivitas dan statistik proposal Anda |
| **Penelitian** | Mengelola proposal penelitian |
| **PKM** | Mengelola proposal pengabdian masyarakat |
| **Catatan Harian** | Menulis daily note untuk proposal aktif |
| **Laporan Kemajuan** | Mengumpulkan laporan kemajuan |
| **Laporan Akhir** | Mengumpulkan laporan akhir penelitian |
| **Profil** | Mengatur profil dan password |

### 3.3 Bagian-Bagian Dashboard

1. **Statistik Cards**:
   - Total proposal yang diajukan
   - Proposal yang sedang dalam review
   - Proposal yang sudah disetujui
   - Proposal yang sudah selesai

2. **Aksi Cepat**:
   - Tombol "Ajukan Proposal Baru"
   - Link ke proposal yang perlu perhatian

3. **Riwayat Aktivitas**:
   - Daftar aktivitas terbaru (pengajuan, revisi, dll)

---

## 4. Mengajukan Proposal Penelitian

### 4.1 Persiapan Sebelum Mengajukan

Sebelum mengajukan proposal, pastikan Anda telah menyiapkan:

- [ ] Judul proposal yang jelas dan spesifik
- [ ] Abstrak penelitian (maksimum 300 kata)
- [ ] Latar belakang dan rumusan masalah
- [ ] Tujuan dan manfaat penelitian
- [ ] Tinjauan pustaka/referensi
- [ ] Metodologi penelitian
- [ ] Jadwal kegiatan (Gantt Chart)
- [ ] Anggaran biaya (RAB) sesuai skema
- [ ] Daftar anggota tim (jika ada)
- [ ] File proposal format PDF

### 4.2 Langkah-Langkah Pengajuan

#### Langkah 1: Pilih Jenis Proposal

1. Login sebagai Dosen
2. Di sidebar, klik **Penelitian**
3. Klik tombol **+ Ajukan Proposal Baru** atau **Tambah Proposal**
4. Pilih jenis: **"Penelitian"**

#### Langkah 2: Pilih Skema Penelitian

1. Pilih skema penelitian dari dropdown:
   - PDP (Penelitian Dasar Pemula)
   - PDT (Penelitian Dasar Terapan)
   - PTT (Penelitian Terapan)
   - PL (Penelitian Lanjutan)
2. Baca persyaratan skema dengan klik icon "info"
3. Klik **Lanjut** jika sudah memahami

#### Langkah 3: Isi Data Proposal

Isi formulir berikut:

| Kolom | Wajib | Keterangan |
|-------|-------|-------------|
| Judul Proposal | ✓ | Judul penelitian (maks 250 karakter) |
| Abstrak | ✓ | Ringkasan penelitian (500-1000 kata) |
| Tahun Anggaran | ✓ | Tahun pelaksanaan penelitian |
| Skema | ✓ | Jenis skema yang dipilih |
| Bidang Ilmu | ✓ | Disciplines sesuai keahlian |
| Keyword | ✓ | Kata kunci penelitian (maks 5) |
| RAB Total | ✓ | Total anggaran (tidak melebihi batas skema) |
| Lama Penelitian | ✓ | Durasi penelitian (bulan) |

#### Langkah 4: Unggah File Proposal

1. Klik **Pilih File** atau **Browse**
2. Pilih file proposal dalam format **PDF**
3. Ukuran maksimal: **10 MB**
4. Pastikan nama file tidak mengandung karakter khusus
5. Klik **Upload** dan tunggu hingga 100%

> **⚠️ Perhatian**: File proposal tidak boleh di-encrypt atau menggunakan password

#### Langkah 5: Atur Anggota Tim (Opsional)

1. Jika menambah anggota tim:
   - Masukkan Nama atau NIK anggota
   - Sistem akan mencari otomatis
   - Klik **Undang** untuk mengirim undangan
2. Anggota tim akan menerima notifikasi
3. Anggota harus **Menerima Undangan** sebelum proposal disubmit

#### Langkah 6: Submit Proposal

1. Review semua data yang sudah diisi
2. Jika ada kesalahan, klik **Edit** pada bagian yang salah
3. Jika sudah benar, klik **Submit Proposal**
4. Sistem akan menampilkan konfirmasi
5. Klik **Ya, Submit** untukkonfirmasi

### 4.3 Status Proposal Setelah Submit

Setelah submit, proposal akan melewati beberapa status:

```
DRAFT → SUBMITTED → APPROVED (Dekan) → WAITING_REVIEWER → UNDER_REVIEW → REVIEWED → COMPLETED
                        ↓
                   REVISION_NEEDED (jika perlu revisi)
```

| Status | Arti | Aksi Selanjutnya |
|--------|------|-------------------|
| DRAFT | Proposal belum disubmit | Lanjut edit atau submit |
| SUBMITTED | Menunggu persetujuan Dekan | Tunggu persetujuan Dekan |
| NEED_ASSIGNMENT | Menunggu persetujuan anggota tim | Pastikan anggota menerima |
| APPROVED | Disetujui Dekan, menunggu LPPM | Tugatugas reviewer |
| WAITING_REVIEWER | Menunggu penugasan reviewer | Tunggu Admin LPPM |
| UNDER_REVIEW | Sedang direview reviewer | Tunggu hasil review |
| REVIEWED | Review selesai | Tunggu keputusan Kepala LPPM |
| REVISION_NEEDED | Perlu revisi | Revisi sesuai catatan |
| COMPLETED | Proposal disetujui | Laporan pelaksanaan |
| REJECTED | Proposal ditolak | Tidak ada |

---

## 5. Mengajukan Proposal PKM (Pengabdian Masyarakat)

### 5.1 Perbedaan Penelitian dan PKM

| Aspek | Penelitian | PKM |
|-------|-----------|-----|
| Tujuan | Menghasilkan pengetahuan baru | Memberikan solusi ke masyarakat |
| Luaran | Publikasi, prototype | Aplikasi teknologi, pelatihan |
| Target | Akademisi | Masyarakat umum |

### 5.2 Langkah-Langkah Mengajukan PKM

1. Login sebagai Dosen
2. Klik menu **PKM** di sidebar
3. Klik **+ Ajukan Proposal Baru**
4. Pilih **PKM (Pengabdian Masyarakat)**
5. Pilih skema PKM (P, T, atau K)
6. Isi formulir yang serupa dengan penelitian:
   - Judul PKM
   - Abstrak kegiatan
   - Target masyarakat
   - Metode pendekatan
   - Rencana kegiatan
   - Anggaran biaya
7. Unggah file proposal PDF
8. Submit proposal

### 5.3 Alur PKM

Sama dengan penelitian, proposal PKM juga melalui:
```
DRAFT → SUBMITTED → APPROVED → WAITING_REVIEWER → UNDER_REVIEW → REVIEWED → COMPLETED
```

---

## 6. Mengelola Tim Proposal

### 6.1 Menambahkan Anggota Tim

1. Saat membuat proposal, klik **Tambah Anggota**
2. Cari anggota berdasarkan:
   - Nama lengkap
   - NIK/NIP
   - Email
3. Klik **Undang**
4. Status undangan: **"Menunggu"**

### 6.2 Konfirmasi Anggota Tim

Anggota tim yang diundang akan menerima notifikasi dan harus:

1. Login ke sistem
2. Buka menu **Undangan Saya**
3. Klik **Terima** atau **Tolak**
4. Jika terima, otomatis menjadi bagian tim

### 6.3 Menghapus Anggota

1. Buka detail proposal
2. Klik tombol **X** pada anggota yang ingin dihapus
3. Konfirmasi penghapusan
4. Anggota akan diinformasikan via notifikasi

> **⚠️ Catatan**: Jika proposal sudah disubmit, perubahan anggota harus persetujuan Admin LPPM.

---

## 7. Melacak Status Proposal

### 7.1 Melihat Daftar Proposal

1. Klik menu **Penelitian** atau **PKM**
2. Anda akan melihat tabel dengan kolom:
   - Judul
   - Skema
   - Tahun
   - Status
   - Aksi

### 7.2 Filter dan Pencarian

Gunakan fitur filter untuk mencari proposal:

| Filter | Fungsi |
|--------|--------|
| Status | Filter berdasarkan status proposal |
| Skema | Filter berdasarkan jenis skema |
| Tahun | Filter berdasarkan tahun anggaran |
| Keyword | Cari berdasarkan kata kunci |

### 7.3 Detail Proposal

Klik pada baris proposal atau tombol **Mata** untuk melihat:
- Detail lengkap proposal
- Riwayat status
- Komentar dari reviewer
- Unduhan file proposal
- Catatan revisi (jika ada)

---

## 8. Menulis Catatan Harian (Daily Note)

### 8.1 Apa Itu Daily Note?

Daily Note adalah catatan kegiatan harian yang wajib ditulis selama masa penelitian/PKM berlangsung. Ini用于 memonitor perkembangan kegiatan.

### 8.2 Cara Menulis Daily Note

1. Dari menu, klik **Catatan Harian**
2. Pilih proposal yang aktif
3. Klik **+ Tambah Catatan**
4. Isi formulir:

| Kolom | Keterangan |
|-------|------------|
| Tanggal | Tanggal kegiatan dilakukan |
| Aktivitas | Deskripsi kegiatan yang dilakukan |
| Hasil | Output/keluaran dari kegiatan |
| Hambatan | Kendala yang dihadapi (jika ada) |
| Solusi | Cara mengatasi hambatan |

5. Klik **Simpan**

### 8.3 Export Daily Note

Anda dapat mengekspor daily note ke PDF untuk laporan:

1. Di halaman daily note proposal
2. Klik tombol **Export PDF**
3. File PDF akan otomatis ter-download

---

## 9. Mengumpulkan Laporan Kemajuan

### 9.1 Kapan Laporan Kemajuan Dikumpulkan?

Laporan kemajuan dikumpulkan pada periode tertentu:
- **Laporan Kemajuan 1**: Bulan ke-3
- **Laporan Kemajuan 2**: Bulan ke-6 (untuk penelitian >6 bulan)

### 9.2 Langkah-Langkah Submit Laporan Kemajuan

1. Buka menu **Laporan Kemajuan**
2. Pilih proposal yang akan dilaporkan
3. Klik **+ Submit Laporan Kemajuan**
4. Isi formulir:

| Kolom | Keterangan |
|-------|------------|
| Periode | Pilih periode laporan (bulan ke-) |
| Ringkasan | Deskripsi kemajuan penelitian |
| Pencapaian | Target vs Realisasi |
| Rencana Berikutnya | Kegiatan bulan depan |
| Dokumen Pendukung | Upload file PDF laporan |

5. Unggah file laporan (PDF, maks 10MB)
6. Klik **Submit**

### 9.3 Status Laporan Kemajuan

| Status | Arti |
|--------|------|
| DRAFT | Belum disubmit |
| SUBMITTED | Menunggu review Admin |
| APPROVED | Laporan diterima |
| REVISION |Perlu revisi |

---

## 10. Mengumpulkan Laporan Akhir

### 10.1 Kriteria Laporan Akhir

Laporan akhir wajib mengumpulkan:

- [ ] Laporan penelitian lengkap (PDF)
- [ ] Abstrak dan Summary
- [ ] Luaran yang dicapai (publikasi, HKI, dll)
- [ ] Rincian penggunaan anggaran
- [ ] Dokumentasi kegiatan (foto, video)
- [ ] Daftar hadir peserta (untuk PKM)

### 10.2 Langkah-Langkah Submit Laporan Akhir

1. Buka menu **Laporan Akhir**
2. Pilih proposal yang sudah selesai
3. Klik **+ Submit Laporan Akhir**
4. Isi formulir lengkap:
   - Ringkasan eksekutif
   - Metodologi yang digunakan
   - Hasil dan pembahasan
   - Kesimpulan dan saran
   - Luaran yang dicapai (isi tabel luaran)
5. Unggah file laporan akhir PDF
6. Unggah bukti luaran (sertifikat, publikasi, dll)
7. Klik **Submit Final Report**

### 10.3 Input Luaran (Output)

Di bagian luaran, Anda wajib mengisi:

| Jenis Luaran | Bukti |
|--------------|-------|
| Jurnal | Link DOI / Sertifikat |
| Prosiding | Bukti accepted |
| Buku | ISBN |
| HKI | Sertifikat |
| Prototipe | Foto/dokumentasi |
| Pelatihan | Daftar hadir |

---

## 11. Mengunggah Luaran (Output)

### 11.1 Jenis Luaran yang Diterima

Sistem menerima berbagai jenis luaran:

1. **Publikasi Ilmiah**
   - Jurnal Nasional (Sinta)
   - Jurnal Internasional
   - Prosiding seminar

2. **Hak Kekayaan Intelektual (HKI)**
   - Paten
   - Hak Cipta
   - Merek

3. **Produk/Prototipe**
   - Prototype teknologi
   - Model
   - Software

4. **Pengembangan Masyarakat**
   - Pelatihan yang dilakukan
   - Pendampingan yang dilakukan

### 11.2 Cara Upload Luaran

1. Buka proposal yang sudah **COMPLETED**
2. Klik tab **Luaran**
3. Klik **+ Tambah Luaran**
4. Pilih jenis luaran
5. Isi detail luaran
6. Upload bukti (PDF/gambar)
7. Klik **Simpan**

---

## 12. Pengaturan Profil

### 12.1 Mengubah Informasi Profil

1. Klik **Profil** di sidebar
2. Klik tab **Edit Profil**
3. Ubah informasi yang diinginkan:
   - Nama lengkap
   - Email
   - No. HP
   - Prodi/Fakultas
   - Bidang keahlian
4. Klik **Simpan Perubahan**

### 12.2 Mengubah Password

1. Klik **Profil**
2. Pilih tab **Ubah Password**
3. Masukkan password lama
4. Masukkan password baru (min 8 karakter)
5. Konfirmasi password baru
6. Klik **Ubah Password**

### 12.3 Pengaturan Two-Factor Authentication (2FA)

1. Buka **Pengaturan** > **Keamanan**
2. Klik **Aktifkan 2FA**
3. Scan QR code dengan aplikasi autentikator (Google Authenticator, Authy, dll)
4. Masukkan kode 6 digit
5. Simpan *backup code* di tempat aman

---

## 13. Notifikasi

### 13.1 Jenis Notifikasi

Anda akan menerima notifikasi untuk:

| Jenis | Keterangan |
|-------|------------|
| Status Proposal | Update status proposal Anda |
| Undangan Tim | Undangan join tim penelitian |
| Review | Hasil review dari reviewer |
| Revisi | Permintaan revisi proposal |
| Laporan | Batas waktu laporan |
| Sistem | Pengumuman dari admin |

### 13.2 Cara Melihat Notifikasi

1. Klik ikon **Lonceng** di header
2. Daftar notifikasi akan muncul
3. Klik notifikasi untuk melihat detail
4. Tandai sudah dibaca dengan klik tombol centang

### 13.3 Pengaturan Notifikasi

1. Buka **Profil** > **Pengaturan Notifikasi**
2. Aktifkan/nonaktifkan jenis notifikasi:
   - Email
   - Sistem
   - Push notification

---

## 14. Panduan Troubleshooting

### 14.1 Masalah Umum dan Solusi

| Masalah | Penyebab | Solusi |
|---------|----------|--------|
| **Tidak bisa login** | Password salah / Akun terkunci | Reset password atau hubungi Admin |
| **Tombol Submit tidak muncul** | Anggota tim belum terima undangan | Pastikan semua anggota terima |
| **File upload gagal** | Format/size tidak sesuai | Gunakan PDF, maks 10MB |
| **Status stuck di SUBMITTED** | Menunggu persetujuan Dekan | Hubungi Dekan fakultas |
| **RAB melebihi batas** | Melebihi pagu skema | Sesuaikan anggaran sesuai skema |
| **Tidak bisa akses menu** | Role belum diset | Hubungi Admin untuk set role |

### 14.2 Pertanyaan Umum (FAQ)

**Q: Berapa batas anggaran untuk setiap skema?**
A: Batas anggaran berbeda-beda per skema. Lihat di menu Settings > Pagu Anggaran.

**Q: Apakah saya bisa mengajukan lebih dari satu proposal?**
A: Ya, selama belum ada proposal yang berstatus DRAFT atau SUBMITTED.

**Q: Berapa lama proses review proposal?**
A: Tergantung kebijakan LPPM, umumnya 2-4 minggu.

**Q: Apa itu TKT?**
A: TKT (Tingkat Kesiapan Teknologi) adalah skala 1-9 yang menunjukkan kesiapan teknologi.

**Q: Bagaimana jika reviewer meminta revisi?**
A: Anda akan menerima notifikasi. Klik proposal > Lihat Catatan Revisi > Revisi > Submit ulang.

---

## 15. Glosarium

| Istilah | Arti |
|---------|------|
| **Proposal** | Dokumen Usulan Penelitian/PKM |
| **Skema** | Kategori/jenis penelitian/PKM |
| **RAB** | Rencana Anggaran Biaya |
| **TKT** | Tingkat Kesiapan Teknologi (1-9) |
| **Luaran** | Hasil yang dicapai dari penelitian |
| **Monev** | Monitoring dan Evaluasi |
| **Reviewer** | Pakar yang menilai proposal |
| **Dekan** | Pimpinan fakultas |
| **Admin LPPM** | Staff administratif LPPM |
| **Kepala LPPM** | Pimpinan LPPM |
| **SI-NTA** | Sistem Informasi Nasional Teknologi |
| **Output** | Luaran/Hasil penelitian |
| **PKM** | Pengabdian Kepada Masyarakat |

---

## Kontak Bantuan

Jika mengalami kesulitan, hubungi:

| Peran | Kontak |
|-------|--------|
| **Admin LPPM** | admin@itsnu-pkl.ac.id |
| **Technical Support** | it@itsnu-pkl.ac.id |

---

*Terakhir diperbarui: Maret 2026*
*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
