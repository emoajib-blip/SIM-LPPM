# Flowchart dan Diagram Proses SIM LPPM ITSNU Pekalongan

Dokumen ini berisi flowchart detail untuk setiap modul, fitur, dan peran pengguna dalam sistem SIM LPPM.

---

## Daftar Isi

1. [Flowchart Alur Proposal Penelitian](#1-flowchart-alur-proposal-penelitian)
2. [Flowchart Alur Proposal PKM](#2-flowchart-alur-proposal-pkm)
3. [Flowchart Proses Review](#3-flowchart-proses-review)
4. [Flowchart User Management](#4-flowchart-user-management)
5. [Flowchart Master Data](#5-flowchart-master-data)
6. [Flowchart Pelaporan dan IKU](#6-flowchart-pelaporan-dan-iku)
7. [Flowchart Peran Pengguna](#7-flowchart-peran-pengguna)
8. [Flowchart Monev (Monitoring Evaluasi)](#8-flowchart-monev-monitoring-evaluasi)
9. [Tabel Ringkasan Status Proposal](#9-tabel-ringkasan-status-proposal)

---

## 1. Flowchart Alur Proposal Penelitian

### 1.1 Diagram Alur Utama

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                           ALUR PROPOSAL PENELITIAN LENGKAP                        │
└──────────────────────────────────────────────────────────────────────────────────────┘

                               ┌──────────────────┐
                               │   1. DRAFT      │
                               │ (Dosen Membuat)  │
                               └────────┬─────────┘
                                        │
                                        ▼
                          ┌────────────────────────┐
                          │ Unggah File Proposal  │
                          │ Isi Data Lengkap     │
                          │ Tambah Anggota Tim   │
                          └──────────┬───────────┘
                                     │
                                     ▼
                          ┌────────────────────────┐
                          │ SUBMIT PROPOSAL       │
                          │ (Klik Submit)         │
                          └──────────┬───────────┘
                                     │
                                     ▼
                          ╔════════════════════════╗
                          ║ 2. SUBMITTED          ║
                          ║ (Menunggu Dekan)      ║
                          ╚══════════╤════════════╝
                                     │
                                     ▼
                          ┌────────────────────────┐
                          │ 3. REVIEW DEKAN       │
                          │                       │
                          │ ┌───────────────────┐ │
                          │ │ ✓ Setuju          │ │
                          │ │ ✗ Revisi          │ │
                          │ │ ✗ Tolak           │ │
                          │ └───────────────────┘ │
                          └──────────┬───────────┘
                                     │
              ┌──────────────────────┴──────────────────────┐
              │                                               │
              ▼                                               ▼
   ┌─────────────────────┐                        ┌─────────────────────┐
   │ 3a. REVISION_NEEDED│                        │ 3b. APPROVED       │
   │ (Dikembalikan ke   │                        │ (Lolos Tingkat     │
   │  Dosen untuk       │                        │  Dekan)            │
   │  Revisi)           │                        └────────┬──────────┘
   └────────┬───────────┘                                 │
            │                                              ▼
            │                                 ┌─────────────────────────┐
            │                                 │ 4. WAITING_REVIEWER    │
            │                                 │ (Menunggu Penugasan   │
            │                                 │  Reviewer)            │
            │                                 └───────────┬─────────────┘
            │                                             │
            ▼                                             ▼
   ┌─────────────────────┐                     ┌─────────────────────┐
   │ Revisi oleh Dosen  │                     │ 5. TUGASKAN REVIEWER│
   │ dan Submit Ulang   │                     │    oleh Admin LPPM  │
   └────────┬───────────┘                     └──────────┬──────────┘
            │                                              │
            │                                              ▼
            │                                 ┌─────────────────────────┐
            │                                 │ 6. UNDER_REVIEW        │
            │                                 │ (Reviewer sedang       │
            │                                 │  melakukan review)     │
            │                                 └───────────┬─────────────┘
            │                                             │
            │                                             ▼
            │                                 ┌─────────────────────────┐
            │                                 │ 7. REVIEWED            │
            │                                 │ (Semua reviewer        │
            │                                 │  selesai)              │
            │                                 └───────────┬─────────────┘
            │                                             │
            └─────────────────────┬───────────────────────┘
                                  │
                                  ▼
                       ╔══════════════════════════╗
                       ║ 8. KEPUTUSAN AKHIR      ║
                       ║ (oleh Kepala LPPM)      ║
                       ╚═════╤═══════════════════╝
                                  │
              ┌────────────────────┴────────────────────┐
              │                                         │
              ▼                                         ▼
   ┌─────────────────────┐                 ┌─────────────────────┐
   │ 8a. COMPLETED       │                 │ 8b. REVISION_NEEDED│
   │ (Disetujui -        │                 │ (Perlu Revisi)     │
   │  Dana Cair)         │                 └────────┬───────────┘
   └────────┬───────────┘                          │
            │                                       ▼
            │                              ┌─────────────────────┐
            │                              │ Revisi & Submit     │
            │                              │ (Kembali ke step 2) │
            │                              └─────────────────────┘
            │
            │      ┌──────────────────────────────────────┐
            │      │      9. PELAKSANAAN & LAPORAN        │
            │      │                                      │
            │      ▼                                      ▼
            │ ┌──────────────────┐          ┌──────────────────┐
            │ │ Laporan Kemajuan │          │  Laporan Akhir   │
            │ │ (Periode tertentu)          │  (Setelah selesai│
            │ └────────┬─────────┘          │   penelitian)   │
            │          │                     └────────┬─────────┘
            │          ▼                              ▼
            │ ┌──────────────────┐          ┌──────────────────┐
            │ │ Review Laporan   │          │ Verifikasi       │
            │ │ oleh Admin       │          │ oleh Kepala LPPM │
            │ └────────┬─────────┘          └────────┬─────────┘
            │          │                              │
            └──────────┴──────────────────────────────┘
```

### 1.2 Detail Tahapan per Peran

```
┌─────────────────────────────────────────────────────────────────────────────────────┐
│                         DETAIL AKSI SETIAP PERAN                                    │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  PERAN: DOSEN                                                                      │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│  TAHAP 1: DRAFT                                                                   │
│  ├── Mengisi formulir proposal                                                     │
│  ├── Upload file PDF proposal                                                      │
│  ├── Menambahkan anggota tim (opsional)                                           │
│  ├── Mengisi RAB (Rencana Anggaran Biaya)                                         │
│  └── Klik "Simpan Draft" atau "Submit"                                           │
│                                                                                     │
│  TAHAP 2: REVISION_NEEDED (jika ada)                                             │
│  ├── Menerima notifikasi revisi                                                   │
│  ├── Melihat catatan revisi dari Dekan/Reviewer                                   │
│  ├── Mengedit proposal                                                            │
│  └── Submit ulang                                                                 │
│                                                                                     │
│  TAHAP 3: PELAKSANAAN                                                            │
│  ├── Menulis daily note (catatan harian)                                         │
│  ├── Submit laporan kemajuan                                                      │
│  ├── Submit laporan akhir                                                         │
│  └── Upload luaran (publikasi, HKI, dll)                                         │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  PERAN: DEKAN                                                                     │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│  TAHAP 1: TERIMA NOTIFIKASI                                                       │
│  └── Menerima email/notifikasi proposal masuk dari fakultasnya                   │
│                                                                                     │
│  TAHAP 2: REVIEW PROPOSAL                                                         │
│  ├── Melihat detail proposal                                                      │
│  ├── Download dan baca proposal                                                   │
│  ├── Mengecek kelengkapan                                                         │
│  └── Mengecek kesesuaian dengan fakultas                                         │
│                                                                                     │
│  TAHAP 3: KEPUTUSAN                                                              │
│  ├── OPSI A: SETUJU → Status menjadi APPROVED                                    │
│  ├── OPSI B: REVISI → Status menjadi REVISION_NEEDED                             │
│  └── OPSI C: TOLAK → Status menjadi REJECTED                                    │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  PERAN: ADMIN LPPM                                                                │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│  TAHAP 1: CEK PROPOSAL Lolos                                                     │
│  └── Memastikan proposal berstatus APPROVED (sudah disetujui Dekan)               │
│                                                                                     │
│  TAHAP 2: TUGASKAN REVIEWER                                                      │
│  ├── Memilih reviewer sesuai bidang ilmu                                         │
│  ├── Menentukan jumlah reviewer (2-3 orang)                                      │
│  ├── Menentukan deadline review (default: 14 hari)                              │
│  └── Klik "Simpan Penugasan"                                                    │
│                                                                                     │
│  TAHAP 3: MONITORING REVIEW                                                       │
│  ├── Melihat progress review                                                      │
│  ├── Mengirim reminder ke reviewer                                               │
│  └── Jika semua reviewer selesai → Status menjadi REVIEWED                        │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  PERAN: REVIEWER                                                                  │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│  TAHAP 1: TERIMA TUGASAN                                                         │
│  └── Menerima notifikasi penugasan review                                        │
│                                                                                     │
│  TAHAP 2: DOWNLOAD & REVIEW                                                      │
│  ├── Download proposal PDF                                                        │
│  ├── Membaca dan menilai proposal                                                │
│  └── Isi form review                                                             │
│                                                                                     │
│  TAHAP 3: PEMBERIAN SKOR                                                         │
│  ├── Memberi skor untuk setiap kriteria (1-10)                                   │
│  ├── Menulis catatan reviewer                                                    │
│  └── Memilih rekomendasi (Setuju/Revisi/Tolak)                                  │
│                                                                                     │
│  TAHAP 4: SUBMIT REVIEW                                                          │
│  └── Klik "Submit Review" → Status menjadi COMPLETED                            │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  PERAN: KEPALA LPPM                                                              │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│  TAHAP 1: TERIMA NOTIFIKASI                                                      │
│  └── Menerima notifikasi proposal berstatus REVIEWED                             │
│                                                                                     │
│  TAHAP 2: REVIEW HASIL REVIEW                                                     │
│  ├── Melihat ringkasan skor reviewer                                             │
│  ├── Melihat catatan reviewer                                                    │
│  └── Mengecek konsistensi rekomendasi                                            │
│                                                                                     │
│  TAHAP 3: KEPUTUSAN AKHIR                                                       │
│  ├── OPSI A: SETUJU (COMPLETED) → Dana bisa dicairkan                          │
│  ├── OPSI B: REVISI → Dikembalikan ke dosen                                     │
│  └── OPSI C: TOLAK (REJECTED) → Proposal ditolak                               │
│                                                                                     │
│  TAHAP 4: VERIFIKASI LAPORAN                                                     │
│  ├── Menerima laporan akhir dari dosen                                           │
│  ├── Mengecek luaran                                                             │
│  └── Menyetujui atau meminta revisi                                            │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 2. Flowchart Alur Proposal PKM

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                              ALUR PROPOSAL PKM LENGKAP                              │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  PERBEDAAN PENELITIAN vs PKM                                                      │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│  │ Aspek        │ Penelitian              │ PKM                              │ │
│  ├──────────────┼─────────────────────────┼─────────────────────────────────┤ │
│  │ Tujuan       │ Menghasilkan ilmu baru  │ Memberikan solusi ke masyarakat │ │
│  │ Target       │ Akademisi               │ Masyarakat umum                │ │
│  │ Luaran       │ Publikasi, prototype    │ Aplikasi, pelatihan            │ │
│  │ Skema        │ PDP, PDT, PTT, PL      │ PKM-P, PKM-T, PKM-K           │ │
│  └──────────────┴─────────────────────────┴─────────────────────────────────┘ │
│                                                                                     │
│  CATATAN: Alur PKM SAMA PERSIS dengan Penelitian!                                │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

         ┌──────────────────┐
         │   1. DRAFT      │
         │ (Dosen Membuat)  │
         └────────┬─────────┘
                  │
                  ▼
    ┌────────────────────────┐
    │ Submit Proposal PKM   │
    └────────┬───────────────┘
             │
             ▼
    ╔════════════════════════╗
    ║ 2. SUBMITTED          ║
    ║ (Menunggu Dekan)      ║
    ╚══════════╤════════════╝
               │
               ▼
    ┌────────────────────────┐
    │ Review oleh Dekan     │
    │ ✓ Setuju              │
    │ ✗ Revisi              │
    │ ✗ Tolak               │
    └────────┬───────────────┘
             │
             ▼
    ┌────────────────────────┐
    │ APPROVED by Dekan    │
    └────────┬───────────────┘
             │
             ▼
    ┌────────────────────────┐
    │ WAITING_REVIEWER      │
    │ (Penugasan Reviewer) │
    └────────┬───────────────┘
             │
             ▼
    ┌────────────────────────┐
    │ UNDER_REVIEW          │
    │ (Reviewer Mereview)   │
    └────────┬───────────────┘
             │
             ▼
    ┌────────────────────────┐
    │ REVIEWED              │
    └────────┬───────────────┘
             │
             ▼
    ╔════════════════════════╗
    ║ KEPUTUSAN AKHIR      ║
    ║ (oleh Kepala LPPM)   ║
    ╚══════╤═══════════════╝
            │
            ▼
   ┌─────────────────┐   ┌─────────────────┐
   │ COMPLETED       │   │ REVISION/REJECT│
   │ (Disetujui)     │   │ (Revisi/Tolak) │
   └────────┬────────┘   └────────┬────────┘
            │                     │
            ▼                     ▼
    ┌─────────────────┐   ┌─────────────────┐
    │ Pelaksanaan    │   │ Revisi & Submit │
    │ PKM            │   │ Ulang           │
    └─────────────────┘   └─────────────────┘
```

---

## 3. Flowchart Proses Review

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                            ALUR PROSES REVIEW LENGKAP                                │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  TAHAP 1: ADMIN LPPM MENUGASKAN REVIEWER                                           │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────┐      ┌─────────────────┐      ┌─────────────────┐           │
│    │ Proposal:       │      │ Pilih Reviewer: │      │ Set Deadline:  │           │
│    │ "Judul..."      │ ───▶ │ 1. Prof. A     │ ───▶ │ 14 hari         │           │
│    │ Status:         │      │ 2. Dr. B       │      │ dari tanggal   │           │
│    │ APPROVED        │      │ 3. Dr. C       │      │ penugasan      │           │
│    └─────────────────┘      └─────────────────┘      └────────┬────────┘           │
│                                                                  │                   │
│                                                                  ▼                   │
│                                              ┌─────────────────────────┐              │
│                                              │ Simpan Penugasan       │              │
│                                              │ → Notifikasi ke        │              │
│                                              │   Reviewer             │              │
│                                              └───────────┬─────────────┘              │
│                                                          │                           │
└──────────────────────────────────────────────────────────┼───────────────────────────┘
                                                           │
                                                           ▼
┌──────────────────────────────────────────────────────────┐
│  TAHAP 2: REVIEWER MELAKUKAN REVIEW                     │
├──────────────────────────────────────────────────────────┤
│                                                                   │
│    ┌─────────────────────────────────────────────────────────┐   │
│    │ FORM REVIEW                                            │   │
│    ├─────────────────────────────────────────────────────────┤   │
│    │                                                         │   │
│    │ 1. ORIGINALITAS & KEBARUAN        [Skor: 1-10]       │   │
│    │    - Apakah penelitian ini baru?                       │   │
│    │    - Apakah ada kebaruan metode/pendekatan?           │   │
│    │                                                         │   │
│    │ 2. KELELAKAN METODOLOGI           [Skor: 1-10]       │   │
│    │    - Apakah metode tepat untuk mencapai tujuan?       │   │
│    │    - Apakah metode dapat direplikasi?                 │   │
│    │                                                         │   │
│    │ 3. KUALITAS TIM PENELITI         [Skor: 1-10]       │   │
│    │    - Apakah tim memiliki kompetensi yang cukup?      │   │
│    │    - Apakah pengalaman tim relevan?                  │   │
│    │                                                         │   │
│    │ 4. RELEVANSI & KONTRIBUSI         [Skor: 1-10]       │   │
│    │    - Apakah relevan dengan bidang ilmu?              │   │
│    │    - Apa kontribusi terhadap pengembangan ilmu?       │   │
│    │                                                         │   │
│    │ 5. KELELAKAN ANGGARAN             [Skor: 1-10]       │   │
│    │    - Apakah RAB sesuai dengan kegiatan?               │   │
│    │    - Apakah biaya wajar dan efisien?                  │   │
│    │                                                         │   │
│    │ 6. RENCANA LUARAN                 [Skor: 1-10]       │   │
│    │    - Apakah luaran realistis?                         │   │
│    │    - Apakah luaran terukur?                          │   │
│    │                                                         │   │
│    │ CATATAN REVIEWER:                                     │   │
│    │ [Isi dengan masukan untuk perbaikan...]              │   │
│    │                                                         │   │
│    │ REKOMENDASI:                                          │   │
│    │ ○ SETUJU (Layak didanai)                            │   │
│    │ ○ REVISI (Perlu perbaikan)                          │   │
│    │ ○ TOLAK (Tidak layak)                               │   │
│    │                                                         │   │
│    │ [Simpan Draft]  [Submit Review]                     │   │
│    │                                                         │   │
│    └─────────────────────────────────────────────────────────┘   │
│                         │                                        │
│                         ▼                                        │
│    ┌─────────────────────────────────────────────────────────┐   │
│    │ STATUS REVIEW: IN_PROGRESS → COMPLETED                 │   │
│    │ Reviewer Submit Review                                  │   │
│    └─────────────────────────────────────────────────────────┘   │
│                                                                   │
└───────────────────────────────────────────────────────────────────┘
                                    │
                                    ▼
┌───────────────────────────────────────────────────────────────────┐
│  TAHAP 3: SEMUA REVIEWER SELESAI                                 │
├───────────────────────────────────────────────────────────────────┤
│                                                                   │
│    ┌─────────────────────────────────────────────────────────┐   │
│    │ KETIKA SEMUA REVIEWER SUBMIT REVIEW:                   │   │
│    │                                                         │   │
│    │ - Reviewer 1: Skor 7.8, Rekomendasi: SETUJU          │   │
│    │ - Reviewer 2: Skor 7.3, Rekomendasi: SETUJU          │   │
│    │ - Reviewer 3: Skor 6.9, Rekomendasi: REVISI          │   │
│    │                                                         │   │
│    │ RATA-RATA SKOR: 7.33                                   │   │
│    │                                                         │   │
│    │ Status Proposal: SUBMITTED → REVIEWED                  │   │
│    │                                                         │   │
│    └─────────────────────────────────────────────────────────┘   │
│                         │                                        │
│                         ▼                                        │
│    ┌─────────────────────────────────────────────────────────┐   │
│    │ KEPALA LPPM MEMBUAT KEPUTUSAN:                       │   │
│    │                                                         │   │
│    │ ○ SETUJU → COMPLETED (Dana dicairkan)                │   │
│    │ ○ REVISI → REVISION_NEEDED (Revisi & Submit Ulang)   │   │
│    │ ○ TOLAK → REJECTED                                    │   │
│    │                                                         │   │
│    └─────────────────────────────────────────────────────────┘   │
│                                                                   │
└───────────────────────────────────────────────────────────────────┘
```

---

## 4. Flowchart User Management

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                            ALUR USER MANAGEMENT                                    │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  1. MENAMBAH USER BARU                                                            │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────┐                                                           │
│    │ Admin Klik      │                                                           │
│    │ "Tambah User"  │                                                           │
│    └────────┬────────┘                                                           │
│             │                                                                     │
│             ▼                                                                     │
│    ┌─────────────────────────────┐                                                │
│    │ ISI FORM USER BARU:        │                                                │
│    │ - Nama Lengkap             │                                                │
│    │ - Email                    │                                                │
│    │ - NIP                      │                                                │
│    │ - Password                 │                                                │
│    │ - Role (Dosen/Dekan/dll)  │                                                │
│    │ - Fakultas (jika ada)      │                                                │
│    │ - Prodi (jika ada)        │                                                │
│    └────────────┬────────────────┘                                                │
│                 │                                                                 │
│                 ▼                                                                 │
│        ┌─────────────────┐                                                      │
│        │ Simpan User     │                                                      │
│        │ → Kirim email   │                                                      │
│        │   aktivasi      │                                                      │
│        └─────────────────┘                                                      │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  2. IMPORT USER DARI EXCEL                                                         │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────┐         ┌─────────────────┐         ┌─────────────────┐      │
│    │ Download        │ ──────▶ │ Isi Data       │ ──────▶ │ Upload File    │      │
│    │ Template Excel  │         │ sesuai kolom    │         │ Excel          │      │
│    └─────────────────┘         └─────────────────┘         └────────┬────────┘      │
│                                                                    │              │
│                                                                    ▼              │
│                                                         ┌─────────────────────────┐│
│                                                         │ Preview & Validasi Data ││
│                                                         │ - Cek format email     ││
│                                                         │ - Cek NIP duplikat     ││
│                                                         │ - Validasi role        ││
│                                                         └────────────┬────────────┘│
│                                                                      │             │
│                                                                      ▼             │
│                                                          ┌─────────────────────────┐│
│                                                          │ Konfirmasi Import       ││
│                                                          │ → Tambah user ke sistem││
│                                                          └─────────────────────────┘│
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  3. SINKRONISASI DATA SINTA                                                       │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────┐                                                           │
│    │ Admin Klik      │                                                           │
│    │ "Sync SINTA"   │                                                           │
│    └────────┬────────┘                                                           │
│             │                                                                     │
│             ▼                                                                     │
│    ┌─────────────────────────────┐                                                │
│    │ Sistem Mengakses API SINTA  │                                                │
│    │ & Mengambil Data:           │                                                │
│    │ - Profil Penulis            │                                                │
│    │ - Jumlah Publikasi          │                                                │
│    │ - Indeks SINTA              │                                                │
│    └────────────┬────────────────┘                                                │
│                 │                                                                 │
│                 ▼                                                                 │
│    ┌─────────────────────────────┐                                                │
│    │ Update Data User di Sistem │                                                │
│    │ dengan Data SINTA          │                                                │
│    └─────────────────────────────┘                                                │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 5. Flowchart Master Data

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                            ALUR MASTER DATA                                          │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  STRUKTUR MASTER DATA                                                              │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────┐     ┌─────────────┐     ┌─────────────┐                        │
│    │  FAKULTAS   │────▶│   PRODI     │────▶│  DOSEN     │                        │
│    │             │     │             │     │             │                        │
│    │ - Kode      │     │ - Kode      │     │ - NIP       │                        │
│    │ - Nama      │     │ - Nama      │     │ - Nama      │                        │
│    │ - Dekan     │     │ - Fakultas  │     │ - Prodi     │                        │
│    └─────────────┘     │ - Kaprodi   │     │ - Email     │                        │
│                        └─────────────┘     └─────────────┘                        │
│                               │                                                     │
│                               ▼                                                     │
│                        ┌─────────────┐                                             │
│                        │  BIDANG    │                                             │
│                        │   ILMU     │                                             │
│                        │             │                                             │
│                        │ - Kode      │                                             │
│                        │ - Nama      │                                             │
│                        └─────────────┘                                             │
│                                                                                     │
│    ┌─────────────┐     ┌─────────────┐     ┌─────────────┐                        │
│    │   SKEMA    │     │  JENIS     │     │  PERIODE    │                        │
│    │ PENELITIAN │     │  LUARAN    │     │             │                        │
│    │             │     │             │     │             │                        │
│    │ - Kode      │     │ - Kode      │     │ - Tahun     │                        │
│    │ - Nama      │     │ - Nama      │     │ - Semester  │                        │
│    │ - Batas     │     │ - Poin      │     │ - Status    │                        │
│    │   Anggaran  │     │             │     │             │                        │
│    └─────────────┘     └─────────────┘     └─────────────┘                        │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 6. Flowchart Pelaporan dan IKU

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                      ALUR PELAPORAN DAN IKU                                         │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  1. LAPORAN TINGKAT INSTITUSI (KEPALA LPPM → REKTOR)                              │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────┐      ┌─────────────────┐      ┌─────────────────┐            │
│    │ Kepala LPPM    │      │ Export Laporan │      │ Rector         │            │
│    │ Membuat        │ ────▶│ ke PDF/Excel   │ ────▶│ Menerima       │            │
│    │ Laporan        │      │                 │      │ Laporan        │            │
│    └─────────────────┘      └─────────────────┘      └─────────────────┘            │
│                                                                                     │
│    JENIS LAPORAN:                                                                  │
│    ┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐                   │
│    │ Laporan         │  │ Laporan PKM     │  │ Laporan Luaran │                   │
│    │ Penelitian      │  │                 │  │                 │                   │
│    └─────────────────┘  └─────────────────┘  └─────────────────┘                   │
│    ┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐                   │
│    │ Laporan Mitra   │  │ Laporan Monev  │  │ Laporan IKU    │                   │
│    │                 │  │                 │  │                 │                   │
│    └─────────────────┘  └─────────────────┘  └─────────────────┘                   │
│                                                                                     │
│    JADWAL PELAPORAN:                                                               │
│    ┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐                   │
│    │ Bulanan        │  │ Semester       │  │ Tahunan        │                   │
│    │ (Setiap akhir  │  │ (Akhir         │  │ (Akhir         │                   │
│    │  bulan)        │  │  semester)      │  │  tahun)        │                   │
│    └─────────────────┘  └─────────────────┘  └─────────────────┘                   │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  2. DASHBOARD IKU                                                                  │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────────────────────────────────────────────────────────────┐     │
│    │                        DASHBOARD IKU                                     │     │
│    │  ┌─────────────────────────────────────────────────────────────────┐   │     │
│    │  │  PUBLIKASI         │  HKI              │  PENGMAS            │   │     │
│    │  │  ████████░░ 80%   │  ██████░░░░ 60%  │  ██████████ 100%   │   │     │
│    │  │  Target: 100      │  Target: 50       │  Target: 1000      │   │     │
│    │  │  Realisasi: 80    │  Realisasi: 30    │  Realisasi: 1000   │   │     │
│    │  └─────────────────────────────────────────────────────────────────┘   │     │
│    │                                                                         │     │
│    │  ┌─────────────────────────────────────────────────────────────────┐   │     │
│    │  │  KERJASAMA         │  PENDIDIKAN        │  LAIN-LAIN         │   │     │
│    │  │  ██████░░░░ 50%   │  █████████░░ 90%   │  ████████░░ 70%   │   │     │
│    │  │  Target: 20        │  Target: 100       │  Target: ...       │   │     │
│    │  │  Realisasi: 10     │  Realisasi: 90    │  Realisasi: ...   │   │     │
│    │  └─────────────────────────────────────────────────────────────────┘   │     │
│    └─────────────────────────────────────────────────────────────────────────┘     │
│                                                                                     │
│    INDIKATOR UTAMA IKU:                                                            │
│    ┌─────┬────────────────────────────────────┬──────────┬────────────┐          │
│    │ No  │ Indikator                          │ Target   │ Realisasi │          │
│    ├─────┼────────────────────────────────────┼──────────┼────────────┤          │
│    │ 1   │ Jumlah publikasi di jurnal         │ 100      │ 80         │          │
│    │     │   nasional/internasional            │          │            │          │
│    ├─────┼────────────────────────────────────┼──────────┼────────────┤          │
│    │ 2   │ Jumlah HKI (Paten, Hak Cipta)      │ 50       │ 30         │          │
│    ├─────┼────────────────────────────────────┼──────────┼────────────┤          │
│    │ 3   │ Jumlah masyarakat terdampak        │ 1000     │ 1000       │          │
│    │     │   (PKM)                            │          │            │          │
│    ├─────┼────────────────────────────────────┼──────────┼────────────┤          │
│    │ 4   │ Jumlah kerjasama (MoU)             │ 20       │ 10         │          │
│    ├─────┼────────────────────────────────────┼──────────┼────────────┤          │
│    │ 5   │ Tingkat penyelesaian penelitian    │ 95%      │ 85%        │          │
│    └─────┴────────────────────────────────────┴──────────┴────────────┘          │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 7. Flowchart Peran Pengguna

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                          AKSES MENU BERDASARKAN PERAN                              │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        SUPERADMIN                                             │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐        │   │
│  │  │Dashboard  │ │Master    │ │User      │ │Settings  │ │All       │        │   │
│  │  │Admin     │ │Data      │ │Management│ │System    │ │Reports   │        │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘ └──────────┘        │   │
│  │                   AKSES: PENUH (CREATE, READ, UPDATE, DELETE)                 │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        ADMIN LPPM                                             │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐        │   │
│  │  │Dashboard │ │Master    │ │User      │ │Proposal  │ │Reports   │        │   │
│  │  │Admin     │ │Data      │ │(Import)  │ │Management│ │& IKU     │        │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘ └──────────┘        │   │
│  │                   AKSES: OPERASIONAL LPPM                                      │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        KEPALA LPPM                                            │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐        │   │
│  │  │Dashboard │ │Persetujuan│ │Verifikasi│ │Reports   │ │IKU       │        │   │
│  │  │Eksekutif │ │(Approval)│ │Laporan   │ │(Export)  │ │Dashboard │        │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘ └──────────┘        │   │
│  │                   AKSES: KEPUTUSAN FINAL & MONITORING                        │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        DEKAN                                                   │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐                                    │   │
│  │  │Dashboard │ │Persetujuan│ │Reports   │                                    │   │
│  │  │Fakultas  │ │(Approval)│ │Fakultas  │                                    │   │
│  │  └──────────┘ └──────────┘ └──────────┘                                    │   │
│  │                   AKSES: VALIDASI PROPOSAL LEVEL FAKULTAS                    │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        DOSEN                                                  │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐        │   │
│  │  │Dashboard │ │Proposal  │ │Daily     │ │Laporan   │ │Luaran   │        │   │
│  │  │Dosen     │ │(Create)  │ │Note      │ │Kemajuan/ │ │(Upload) │        │   │
│  │  │          │ │          │ │          │ │Akhir    │ │          │        │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘ └──────────┘        │   │
│  │                   AKSES: BUAT & KELOLA PROPOSAL DIRINYA                      │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        REVIEWER                                                │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐                                    │   │
│  │  │Dashboard │ │Review    │ │Riwayat  │                                    │   │
│  │  │Reviewer  │ │Proposal  │ │Review   │                                    │   │
│  │  └──────────┘ └──────────┘ └──────────┘                                    │   │
│  │                   AKSES: MENILAI PROPOSAL YANG DITUGASKAN                    │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
│  ┌─────────────────────────────────────────────────────────────────────────────┐   │
│  │                        REKTOR                                                 │   │
│  │  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐        │   │
│  │  │Dashboard │ │IKU      │ │Reports   │ │Monitoring│ │Audit    │        │   │
│  │  │Eksekutif │ │Dashboard │ │(View)    │ │Institusi │ │Log      │        │   │
│  │  └──────────┘ └──────────┘ └──────────┘ └──────────┘ └──────────┘        │   │
│  │                   AKSES: PENGAWASAN STRATEGIS                                  │   │
│  └─────────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 8. Flowchart Monev (Monitoring Evaluasi)

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                        ALUR MONITORING DAN EVALUASI (MONEV)                        │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────────────────────────────┐
│  TAHAPAN MONEV                                                                     │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────┐      ┌─────────────────┐      ┌─────────────────┐          │
│    │ 1. PENUGASAN   │      │ 2. PELAKSANAAN │      │ 3. PENILAIAN  │          │
│    │ MONEV           │      │ MONEV           │      │ MONEV          │          │
│    │                 │      │                 │      │                 │          │
│    │ Admin menugaskan│      │ Reviewer/Tim    │      │ Reviewer       │          │
│    │ reviewer untuk │      │ monev melakukan│      │ memberikan     │          │
│    │ melakukan monev│      │ visit/kertas   │      │ nilai &        │          │
│    │                 │      │                 │      │ rekomendasi    │          │
│    └────────┬────────┘      └────────┬────────┘      └────────┬────────┘          │
│             │                        │                        │                   │
│             ▼                        ▼                        ▼                   │
│    ┌─────────────────┐      ┌─────────────────┐      ┌─────────────────┐          │
│    │ - Pilih reviewer│      │ - Kunjungan    │      │ - Form monev   │          │
│    │ - Tentukan      │      │   lapangan     │      │ - Skor (1-10)  │          │
│    │   deadline     │      │ - Cek progress │      │ - Catatan       │          │
│    │ - Beri instruksi│     │ - Interview   │      │ - Rekomendasi   │          │
│    │                 │      │   responden   │      │                 │          │
│    └─────────────────┘      └─────────────────┘      └────────┬────────┘          │
│                                                                  │                   │
└──────────────────────────────────────────────────────────────────┼───────────────────┘
                                                                   │
                                                                   ▼
┌─────────────────────────────────────────────────────────────────────────────────────┐
│  4. REKAP & KEPUTUSAN                                                              │
├─────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                     │
│    ┌─────────────────────────────────────────────────────────────────────────┐   │
│    │ REKAP HASIL MONEV                                                       │   │
│    │                                                                         │   │
│    │ ┌─────────────────┐ ┌─────────────────┐ ┌─────────────────┐            │   │
│    │ │ PROPOSAL A     │ │ PROPOSAL B     │ │ PROPOSAL C     │            │   │
│    │ │ Skor: 85       │ │ Skor: 70       │ │ Skor: 55       │            │   │
│    │ │ Status: BAGUS  │ │ Status: CUKUP  │ │ Status: KURANG │            │   │
│    │ │ Rekomendasi:   │ │ Rekomendasi:   │ │ Rekomendasi:   │            │   │
│    │ │ Lanjutkan      │ │ Perbaiki       │ │ Hentikan       │            │   │
│    │ └─────────────────┘ └─────────────────┘ └─────────────────┘            │   │
│    │                                                                         │   │
│    └─────────────────────────────────────────────────────────────────────────┘   │
│                         │                                                          │
│                         ▼                                                          │
│    ┌─────────────────────────────────────────────────────────────────────────┐   │
│    │ KEPUTUSAN MONEV (oleh Kepala LPPM)                                      │   │
│    │                                                                         │   │
│    │ ○ LANJUTKAN: Dana termin berikutnya dicairkan                          │   │
│    │ ○ PERBAIKI: Dana ditunda sampai perbaikan dilakukan                    │   │
│    │ ○ HENTIKAN: Dana dihentikan                                           │   │
│    │                                                                         │   │
│    └─────────────────────────────────────────────────────────────────────────┘   │
│                                                                                     │
└─────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 9. Tabel Ringkasan Status Proposal

```
┌──────────────────────────────────────────────────────────────────────────────────────┐
│                         STATUS PROPOSAL DAN ARTI                                    │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌──────────────────┬────────────────────────────────┬─────────────────────────────┐
│ Status           │ Arti                           │ Aksi Selanjutnya            │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ DRAFT            │ Proposal sedang disusun        │ Lanjut isi / Submit        │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ SUBMITTED        │ Menunggu persetujuan Dekan     │ Dekan review & putuskan    │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ NEED_ASSIGNMENT │ Perlu persetujuan anggota tim │ Dosen pastikan anggota      │
│                  │                                │ menerima undangan           │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ APPROVED         │ Disetujui Dekan, ke LPPM      │ Admin tugaskan reviewer     │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ WAITING_REVIEWER │ Menunggu penugasan reviewer   │ Admin tugaskan reviewer     │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ UNDER_REVIEW     │ Sedang direview oleh         │ Reviewer submit review      │
│                  │ reviewer                      │                             │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ REVIEWED         │ Semua reviewer selesai        │ Kepala LPPM putuskan       │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ REVISION_NEEDED  │ Perlu revisi                 │ Dosen revisi & resubmit    │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ COMPLETED        │ Disetujui (terminal)          │ Laporan pelaksanaan        │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ REJECTED         │ Ditolak (terminal)            │ Tidak ada                  │
└──────────────────┴────────────────────────────────┴─────────────────────────────┘

┌──────────────────────────────────────────────────────────────────────────────────────┐
│                         STATUS REVIEWER & ARTI                                       │
└──────────────────────────────────────────────────────────────────────────────────────┘

┌──────────────────┬────────────────────────────────┬─────────────────────────────┐
│ Status           │ Arti                           │ AksiSelanjutnya            │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ PENDING          │ Belum dimulai                  │ Reviewer mulai review       │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ IN_PROGRESS      │ Sedang diisi                   │ Reviewer lanjut isi form   │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ COMPLETED        │ Review sudah disubmit         │ Selesai - tunggu keputusan │
├──────────────────┼────────────────────────────────┼─────────────────────────────┤
│ RE_REVIEW_       │ Perlu review ulang            │ Reviewer review ulang      │
│ REQUESTED        │ (setelah revisi proposal)     │                             │
└──────────────────┴────────────────────────────────┴─────────────────────────────┘
```

---

*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
*Terakhir diperbarui: Maret 2026*
