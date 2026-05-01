# Panduan Lengkap Pengguna: Admin LPPM
## SIM LPPM ITSNU Pekalongan

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Login dan Akses](#2-login-dan-akses)
3. [Pengenalan Dashboard Admin](#3-pengenalan-dashboard-admin)
4. [Pengelolaan Master Data](#4-pengelolaan-master-data)
5. [Pengelolaan Users dan Roles](#5-pengelolaan-users-dan-roles)
6. [Penugasan Reviewer](#6-penugasan-reviewer)
7. [Monitoring Review](#7-monitoring-review)
8. [Pengaturan Anggaran (Budget Caps)](#8-pengaturan-anggaran-budget-caps)
9. [Laporan dan Export Data](#9-laporan-dan-export-data)
10. [Verifikasi Laporan](#10-verifikasi-laporan)
11. [IKU (Indikator Kinerja Utama)](#11-iku-indikator-kinerja-utama)
12. [Monitoring dan Evaluasi (Monev)](#12-monitoring-dan-evaluasi-monev)
13. [Arsip Data](#13-arsip-data)
14. [Audit Log](#14-audit-log)
15. [Troubleshooting](#15-troubleshooting)
16. [Glosarium](#16-glosarium)

---

## 1. Pendahuluan

### 1.1 Peran Admin LPPM

Admin LPPM adalah pengguna dengan tanggung jawab operasional tertinggi dalam sistem SIM LPPM. Peran ini mengelola data, mengatur anggaran, dan mengkoordinasikan alur kerja antara dosen, reviewer, dan pimpinan.

### 1.2 Hak Akses dan Fitur

Sebagai Admin LPPM, Anda memiliki akses ke:

- **Dashboard Admin**: Statistik dan ringkasan sistem
- **Master Data**: Pengaturan data referensi
- **User Management**: Kelola user dan roles
- **Reviewer Assignment**: Menugaskan reviewer
- **Budget Settings**: Pengaturan pagu anggaran
- **Reports**: Semua laporan penelitian dan PKM
- **IKU**: Dashboard dan verifikasi IKU
- **Monev**: Monitoring dan evaluasi
- **Audit Log**: Riwayat aktivitas sistem

### 1.3 Fitur Utama Admin LPPM

| Modul | Fungsi |
|-------|--------|
| Master Data | Mengelola fakultas, prodi, skema, bidang ilmu |
| User Management | Tambah/edit/hapus user, import dari Excel |
| Reviewer Assignment | Menugaskan reviewer ke proposal |
| Budget Caps | Mengatur batas anggaran per skema |
| Reports | Export data penelitian/PKM ke Excel/PDF |
| IKU | Dashboard dan verifikasi indikator kinerja |
| Monev | Monitoring evaluasi kegiatan |
| Archive | Pengarsipan data lama |

---

## 2. Login dan Akses

### 2.1 Langkah Login

1. Buka browser dan akses: `https://sim-lppm.itsnupekalongan.ac.id`
2. Masukkan kredensial Admin LPPM:
   - **Email**: admin@itsnu-pkl.ac.id (contoh)
   - **Password**: [password yang diberikan]
3. Klik **Masuk**

### 2.2 Ganti Role (Jika Memilik Multi Role)

Jika Anda memiliki role lain (misal: Dosen), lakukan:

1. Klik dropdown di pojok kanan atas
2. Pilih **" sebagai Admin LPPM"**

---

## 3. Pengenalan Dashboard Admin

### 3.1 Struktur Layout

```
┌─────────────────────────────────────────────────────────────┐
│  HEADER: Logo | Menu Utama | Notifikasi | Profil           │
├──────────────┬──────────────────────────────────────────────┤
│              │                                              │
│   SIDEBAR    │              MAIN CONTENT                    │
│              │                                              │
│  Dashboard   │   - Stats Cards                              │
│  Master Data │   - Tabel Data                              │
│  Users       │   - Charts/Graphs                            │
│  Proposal    │   - Quick Actions                           │
│  Reports     │   - Recent Activity                         │
│  Settings    │                                              │
│              │                                              │
└──────────────┴──────────────────────────────────────────────┘
```

### 3.2 Menu-Menu Admin

| Menu | Lokasi | Fungsi |
|------|--------|--------|
| Dashboard | Utama | Statistik umum sistem |
| Master Data | Settings | Kelola data referensi |
| Users | Sidebar | Kelola user sistem |
| Import Users | Users | Import user dari Excel |
| Sync SINTA | Users | Sinkronisasi data penulis |
| Reviewer Assignment | Proposal | Tugaskan reviewer |
| Budget Caps | Settings | Atur pagu anggaran |
| Reports | Sidebar | Semua laporan |
| IKU | Sidebar | Dashboard IKU |
| Monev | Sidebar | Monitoring evaluasi |
| Audit Log | Settings | Riwayat aktivitas |

### 3.3 Statistik Dashboard

Halaman utama menampilkan:

| Widget | Isi |
|--------|-----|
| Total Proposal | Jumlah semua proposal |
| Proposal Aktif | Sedang dalam proses |
| Proposal Selesai | Sudah selesai |
| Total Dana | Anggaran yang digunakan |
| User Aktif | User yang login |
| Reviewer Aktif | Jumlah reviewer |

---

## 4. Pengelolaan Master Data

### 4.1 Apa Itu Master Data?

Master Data adalah data referensi yang digunakan sistem, meliputi:
- Fakultas
- Program Studi
- Skema Penelitian/PKM
- Bidang Ilmu
- Jenis Luaran
- Periode年份

### 4.2 Cara Mengakses Master Data

1. Klik **Settings** > **Master Data**
2. Atau langsung klik **Master Data** di sidebar

### 4.3 Mengelola Fakultas

#### Menambah Fakultas

1. Di halaman Master Data, klik tab **Fakultas**
2. Klik tombol **+ Tambah Fakultas**
3. Isi formulir:

| Kolom | Keterangan |
|-------|------------|
| Kode | Kode fakultas (misal: FT) |
| Nama | Nama lengkap fakultas |
| Singkatan | Nama singkat |

4. Klik **Simpan**

#### Mengedit Fakultas

1. Klik icon **Edit** pada baris fakultas
2. Ubah data yang diperlukan
3. Klik **Simpan**

#### Menghapus Fakultas

1. Klik icon **Hapus** pada baris fakultas
2. Konfirmasi penghapusan
3. **Catatan**: Hanya bisa dihapus jika tidak terkait dengan data lain

### 4.4 Mengelola Program Studi

Langkah serupa dengan fakultas:

1. Buka tab **Program Studi**
2. **Tambah/Edit/Hapus** sesuai kebutuhan
3. Setiap prodi harus关联 dengan fakultas

### 4.5 Mengelola Skema Penelitian

1. Buka tab **Skema**
2. Untuk setiap skema, atur:
   - Nama skema
   - Kode
   - Batas anggaran maksimal
   - Durasi maksimal
   - Persyaratan luaran

### 4.6 Mengelola Bidang Ilmu

1. Buka tab **Bidang Ilmu**
2. Tambah/edit/hapus bidang ilmu
3. Bidang ilmu digunakan untuk pencocokan reviewer

---

## 5. Pengelolaan Users dan Roles

### 5.1 Jenis Roles dalam Sistem

| Role | Deskripsi |
|------|-----------|
| Superadmin | Akses penuh sistem |
| Admin LPPM | Operasional LPPM |
| Kepala LPPM | Keputusan akhir |
| Dekan | Persetujuan fakultas |
| Dosen | Pengusul proposal |
| Reviewer | Penilai proposal |
| Rector | Pengawasan strategis |

### 5.2 Melihat Daftar User

1. Klik **Users** di sidebar
2. Tabel akan menampilkan:
   - Nama
   - Email/NIP
   - Role
   - Status
   - Aksi

### 5.3 Menambah User Baru

1. Klik **Users** > **+ Tambah User**
2. Isi formulir:

| Kolom | Keterangan |
|-------|------------|
| Nama Lengkap | Nama user |
| Email | Email aktif |
| NIP | Nomor Induk Pegawai |
| Password | Password default |
| Role | Peran user |
| Fakultas | (jika applicable) |
| Prodi | (jika applicable) |

3. Klik **Simpan**
4. User akan menerima email untuk login

### 5.4 Import Users dari Excel

1. Klik **Users** > **Import**
2. Download template Excel (klik **Download Template**)
3. Isi template dengan data user
4. Upload file Excel
5. Klik **Proses Import**
6. Review hasil import
7. Klik **Konfirmasi Import**

### 5.5 Format Template Import User

| Kolom | Wajib | Contoh |
|-------|-------|--------|
| Nama | ✓ | Ahmad Fauzi, S.Si., M.Si |
| Email | ✓ | ahmad@itsnu-pkl.ac.id |
| NIP | ✓ | 197501152020121001 |
| Role | ✓ | dosen |
| Fakultas | ✓ | FT |
| Prodi | ✓ | TI |

### 5.6 Sinkronisasi Data SINTA

1. Klik **Users** > **Sync SINTA**
2. Sistem akan mengambil data dari database SINTA
3. Data yang disinkronkan:
   - Profil penulis
   - Jumlah publikasi
   - Indeks SINTA
4. Klik **Mulai Sinkronisasi**
5. Tunggu hingga selesai

---

## 6. Penugasan Reviewer

### 6.1 Apa Itu Penugasan Reviewer?

Penugasan reviewer adalah proses menugaskan reviewer untuk menilai proposal yang sudah lolos persetujuan Dekan dan menunggu review.

### 6.2 Langkah Menugaskan Reviewer

1. Klik **Proposal** > **Penugasan Reviewer**
2. Pilih tab **Penelitian** atau **PKM**
3. Daftar proposal berstatus **"Menunggu Penugasan Reviewer"** akan muncul
4. Klik **Tugaskan** pada proposal yang ingin ditugaskan

### 6.3 Form Penugasan Reviewer

Di halaman penugasan, Anda akan melihat:

```
┌─────────────────────────────────────────────┐
│ Proposal: Judul Proposal Penelitian        │
│ Pengusul: Dr. Ahmad Fauzi                  │
│ Skema: Penelitian Dasar Terapan (PDT)      │
├─────────────────────────────────────────────┤
│ Pilih Reviewer (Pilih 2-3 reviewer):       │
│ ☐ Prof. Budi Santoso - Teknik Informatika  │
│ ☐ Dr. Siti Rahayu - Teknik Elektro         │
│ ☐ Dr. Joko Pramono - Sistem Informasi      │
├─────────────────────────────────────────────┤
│ Deadline Review: [Tanggal]                 │
│ Catatan: [Opsional]                         │
└─────────────────────────────────────────────┘
```

### 6.4 Kriteria Pemilihan Reviewer

| Kriteria | Keterangan |
|----------|------------|
| Bidangnya sesuai | Bidangnya ilmu reviewer sesuai proposal |
| Beban kerja | Reviewer belum overload |
| Conflict of Interest | Tidak ada konflik kepentingan |

### 6.5 Mengatur Deadline Review

1. Di form penugasan, pilih **Deadline**
2. Default: 14 hari dari penugasan
3. Bisa disesuaikan sesuai kompleksitas proposal
4. Reviewer akan menerima notifikasi deadline

### 6.6 Beban Kerja Reviewer

1. Klik **Beban Kerja Reviewer** untuk melihat:
   - Jumlah proposal ditugaskan
   - Jumlah review selesai
   - Jumlah review overdue
2. Distribusikan beban secara merata

---

## 7. Monitoring Review

### 7.1 Melihat Status Review

1. Klik **Proposal** > **Monitoring Review**
2. Tabel menampilkan semua proposal dalam proses review

### 7.2 Status Review

| Status | Arti |
|--------|------|
| WAITING_REVIEWER | Menunggu penugasan |
| UNDER_REVIEW | Sedang direview |
| REVIEWED | Semua review selesai |
| RE_REVIEW_REQUESTED | Perlu review ulang |

### 7.3 Informasi per Proposal

Setiap baris menunjukkan:
- Judul proposal
- Jumlah reviewer
- Review selesai
- Review overdue
- Deadline

### 7.4 Mengirim Reminder

1. Klik icon **Kirim Reminder** pada proposal
2. Reviewer akan menerima notifikasi reminder
3. Ini berguna untuk proposal yang deadline-nya mendekat

---

## 8. Pengaturan Anggaran (Budget Caps)

### 8.1 Apa Itu Budget Caps?

Budget Caps adalah batas maksimal anggaran untuk setiap skema penelitian/PKM.

### 8.2 Cara Mengatur Budget Caps

1. Klik **Settings** > **Budget Caps**
2. Pilih **Tahun Anggaran**
3. Untuk setiap skema, isi:

| Kolom | Keterangan |
|-------|------------|
| Skema | Jenis skema |
| Batas Bawah | Minimal anggaran |
| Batas Atas | Maksimal anggaran |
| Status | Aktif/Tidak Aktif |

4. Klik **Simpan**

### 8.3 Contoh Budget Caps

| Skema | Batas Bawah | Batas Atas |
|-------|-------------|------------|
| PDP | Rp 5.000.000 | Rp 15.000.000 |
| PDT | Rp 10.000.000 | Rp 50.000.000 |
| PTT | Rp 25.000.000 | Rp 100.000.000 |
| PKM-P | Rp 5.000.000 | Rp 25.000.000 |

### 8.4 Efek Budget Caps

 Ketika dosen mengajukan proposal:
- Sistem akan memvalidasi RAB secara otomatis
- Jika RAB melebihi batas, muncul warning
- Proposal tetap bisa disubmit tapi akan ditolak di level Dekan/LPPM

---

## 9. Laporan dan Export Data

### 9.1 Jenis Laporan

| Laporan | Menu | Format |
|---------|------|--------|
| Laporan Penelitian | Reports | PDF, Excel |
| Laporan PKM | Reports | PDF, Excel |
| Laporan Luaran | Reports | PDF, Excel |
| Laporan Mitra | Reports | PDF, Excel |
| Laporan Monev | Reports | PDF, Excel |
| Laporan IKU | IKU | PDF, Excel |

### 9.2 Export ke Excel

1. Buka menu laporan yang diinginkan
2. Atur **Filter** (tahun, fakultas, status)
3. Klik **Export Excel**
4. File akan ter-download

### 9.3 Export ke PDF

1. Buka menu laporan
2. Atur filter
3. Klik **Export PDF**
4. File PDF akan ter-download

### 9.4 Filter Laporan

| Filter | Fungsi |
|--------|--------|
| Tahun | Filter berdasarkan tahun |
| Semester | Filter semester ganjil/genap |
| Fakultas | Filter per fakultas |
| Prodi | Filter per prodi |
| Skema | Filter per skema |
| Status | Filter berdasarkan status |

---

## 10. Verifikasi Laporan

### 10.1 Jenis Laporan yang Diverifikasi

Admin LPPM memverifikasi:
- Laporan Kemajuan
- Laporan Akhir
- Luaran (Output)

### 10.2 Proses Verifikasi

1. Buka **Proposal** > **Verifikasi Laporan**
2. Daftar laporan yang submit akan muncul
3. Klik **Review** pada laporan

### 10.3 Checklist Verifikasi

| Item | Checklist |
|------|----------|
| Kelengkapan file | □ File lengkap |
| Format PDF | □ Format sesuai template |
| Isi konten | □ Isi sesuai panduan |
| Anggaran | □ RAB sesuai disbursement |
| Luaran | □ Bukti luaran valid |

### 10.4 Aksi Verifikasi

| Aksi | Hasil |
|------|-------|
| **Setuju** | Laporan diterima, status: APPROVED |
| **Revisi** | Dikembalikan untuk revisi |
| **Tolak** | Laporan ditolak, perlu submit ulang |

---

## 11. IKU (Indikator Kinerja Utama)

### 11.1 Apa Itu IKU?

IKU adalah Indikator Kinerja Utama yang harus dicapai oleh institusi. SIM LPPM memonitor pencapaian IKU dari luaran penelitian dan PKM.

### 11.2 Dashboard IKU

1. Klik **IKU** di sidebar
2. Dashboard menampilkan:
   - Target vs Realisasi per indikator
   - Progress bar setiap indikator
   - Grafik pencapaian

### 11.3 Kategori IKU

| Kategori | Contoh Indikator |
|----------|------------------|
| Publikasi | Jurnal Nasional, Internasional |
| HKI | Paten, Hak Cipta |
| Pengmas | Jumlah masyarakat terdampak |
| Kerjasama | MoU dengan mitra |

### 11.4 Verifikasi IKU

1. Klik **IKU** > **Verifikasi**
2. Daftar luaran yang perlu verifikasi
3. Periksa bukti luaran
4. Klik **Verifikasi** atau **Tolak**

---

## 12. Monitoring dan Evaluasi (Monev)

### 12.1 Apa Itu Monev?

Monev adalah proses monitoring dan evaluasi terhadap pelaksanaan penelitian/PKM yang sedang berjalan.

### 12.2 Jadwal Monev

| Jenis Monev | Waktu | Aktivitas |
|-------------|-------|-----------|
| Monev Lapangan | Tengah periode | Kunjungan langsung |
| Monev Dokumen | Tengah periode | Penilaian laporan |
| Monev Akhir | Akhir periode | Penilaian laporan akhir |

### 12.3 Melakukan Monev

1. Klik **Monev** di sidebar
2. Pilih proposal yang akan dimonev
3. Isi formulir monev:
   - Temuan lapangan
   - Penilaian progress
   - Rekomendasi
4. Unggah dokumen monev (BA)
5. Klik **Simpan**

### 12.4 Export Rekap Monev

1. Di halaman Monev, klik **Export Rekap**
2. Pilih format (Excel/PDF)
3. File akan ter-download

---

## 13. Arsip Data

### 13.1 Menu Arsip

1. Klik **Admin** > **Arsip Data**
2. Arsipkan proposal/laporan yang sudah selesai

### 13.2 Cara Mengarsipkan

1. Pilih proposal yang ingin diarsipkan
2. Klik **Arsipkan**
3. Pilih kategori arsip
4. Klik **Konfirmasi**

### 13.3 Export Arsip

1. Di halaman Arsip, klik **Export**
2. Pilih format dan filter
3. File akan ter-download

---

## 14. Audit Log

### 14.1 Apa Itu Audit Log?

Audit Log adalah catatan aktivitas semua pengguna dalam sistem.

### 14.2 Mengakses Audit Log

1. Klik **Settings** > **Audit Log**
2. Tabel menampilkan:

| Kolom | Keterangan |
|-------|------------|
| Waktu | Kapan aktivitas dilakukan |
| User | Siapa yang melakukan |
| Modul | Di menu apa |
| Aksi | Apa yang dilakukan |
| Detail | Informasi lengkap |

### 14.3 Filter Audit Log

| Filter | Fungsi |
|--------|--------|
| Tanggal | Range tanggal tertentu |
| User | Aktivitas user tertentu |
| Modul | Filter per modul |
| Aksi | Filter jenis aksi |

---

## 15. Troubleshooting

### 15.1 Masalah Umum

| Masalah | Solusi |
|---------|--------|
| User tidak bisa login | Cek status user, reset password |
| Import user gagal | Cek format Excel sesuai template |
| Reviewer tidak muncul | Cek data reviewer sudah ada |
| Laporan tidak muncul | Cek filter sudah benar |
| Export gagal | Cek koneksi internet |

### 15.2 Reset Password User

1. Buka **Users**
2. Klik user yang ingin di-reset
3. Klik **Reset Password**
4. User akan mendapat email reset

### 15.3 Mengaktifkan/Menonaktifkan User

1. Buka detail user
2. Toggle **Status Akun**
3. Konfirmasi

---

## 16. Glosarium

| Istilah | Arti |
|---------|------|
| **Master Data** | Data referensi sistem |
| **Budget Caps** | Batas anggaran per skema |
| **Reviewer** | Pakar penilai proposal |
| **Monev** | Monitoring dan Evaluasi |
| **IKU** | Indikator Kinerja Utama |
| **Luaran** | Output/hasil penelitian |
| **SINTA** | Sistem Informasi Nasional |
| **Export** | Ekspor data |
| **Import** | Impor data |
| **Audit Log** | Catatan aktivitas |

---

## Kontak Bantuan

| Masalah | Kontak |
|---------|--------|
| Technical | it@itsnu-pkl.ac.id |
| Admin LPPM | lppm@itsnu-pkl.ac.id |

---

*Terakhir diperbarui: Maret 2026*
*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
