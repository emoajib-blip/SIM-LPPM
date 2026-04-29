# Panduan Pengguna (User Manual) - SIM LPPM ITSNU Pekalongan

Selamat datang di pusat dokumentasi pengguna SIM LPPM ITSNU. Dokumen ini berisi panduan lengkap langkah demi langkah untuk menggunakan sistem berdasarkan peran Anda.

---

## 📚 Daftar Panduan Lengkap (Versi Terbaru v2)

| Peran | Deskripsi | Panduan |
| :--- | :--- | :--- |
| **Dosen** | Mengajukan proposal penelitian & PKM, mengelola laporan | [Panduan Dosen v2](panduan-dosen-v2.md) |
| **Admin LPPM** | Pengelolaan sistem, penugasan reviewer, master data | [Panduan Admin LPPM v2](panduan-admin-lppm-v2.md) |
| **Dekan** | Persetujuan proposal tingkat fakultas | [Panduan Dekan v2](panduan-dekan-v2.md) |
| **Reviewer** | Penilaian proposal dan laporan | [Panduan Reviewer v2](panduan-reviewer-v2.md) |
| **Kepala LPPM** | Keputusan final, monitoring IKU | [Panduan Kepala LPPM v2](panduan-kepala-lppm-v2.md) |
| **Rektor** | Pengawasan strategis dan analitik | [Panduan Rector v2](panduan-rektor-v2.md) |
| **Superadmin** | Pengelolaan teknis sistem | [Panduan Superadmin v2](panduan-superadmin-v2.md) |

---

## 🚀 Quick Start

### Login ke Sistem

1. Buka browser dan akses: **https://sosiomen.web.id**
2. Masukkan **Email** dan **Password** Anda
3. Klik **Masuk**

### Ganti Role (Jika Multi-Role)

Jika Anda memiliki lebih dari satu peran:
1. Klik dropdown di pojok kanan atas
2. Pilih peran yang ingin digunakan

---

## 📋 Alur Proposal Penelitian

```
┌─────────────────────────────────────────────────────────────────────────────┐
│                        ALUR PROPOSAL PENELITIAN/PKM                        │
└─────────────────────────────────────────────────────────────────────────────┘

  ┌─────────┐     ┌─────────┐     ┌───────────┐     ┌────────────┐
  │  DOSEN  │────▶│  DEKAN  │────▶│ ADMIN     │────▶│ REVIEWER   │
  │ (Draft) │     │(Approve)│     │ LPPM      │     │ (Review)   │
  └─────────┘     └─────────┘     └───────────┘     └────────────┘
       │                                     │              │
       │              ┌──────────────────────┘              │
       │              ▼                                      ▼
       │        ┌───────────┐                          ┌────────────┐
       │        │  REVISI  │                          │  REVIEWED  │
       │        │ (if needed)                          │            │
       │        └───────────┘                          └────────────┘
       │                                                   │
       │                           ┌──────────────────────┘
       │                           ▼
       │                    ┌─────────────┐
       │                    │  KEPALA     │
       │                    │  LPPM      │
       │                    │(Decision)  │
       │                    └─────────────┘
       │                           │
       │          ┌────────────────┼────────────────┐
       │          ▼                ▼                ▼
       │   ┌───────────┐   ┌───────────┐   ┌───────────┐
       │   │COMPLETED │   │ REVISION  │   │ REJECTED  │
       │   │(Disetuji)│   │(Perlu     │   │(Ditolak)  │
       │   └───────────┘   │ Revisi)   │   └───────────┘
       │                   └───────────┘
       │
       │    ┌────────────────────────────────────────┐
       └───▶│  LAPORAN (Kemajuan & Akhir)          │
            └────────────────────────────────────────┘
```

---

## 📖 Panduan per Fitur

### Untuk Dosen

- **Mengajukan Proposal**: [panduan-dosen-v2.md#4-mengajukan-proposal-penelitian](panduan-dosen-v2.md#4-mengajukan-proposal-penelitian)
- **Mengelola Tim**: [panduan-dosen-v2.md#6-mengelola-tim-proposal](panduan-dosen-v2.md#6-mengelola-tim-proposal)
- **Daily Note**: [panduan-dosen-v2.md#8-menulis-catatan-harian-daily-note](panduan-dosen-v2.md#8-menulis-catatan-harian-daily-note)
- **Laporan**: [panduan-dosen-v2.md#9-mengumpulkan-laporan-kemajuan](panduan-dosen-v2.md#9-mengumpulkan-laporan-kemajuan)

### Untuk Admin LPPM

- **Master Data**: [panduan-admin-lppm-v2.md#4-pengelolaan-master-data](panduan-admin-lppm-v2.md#4-pengelolaan-master-data)
- **User Management**: [panduan-admin-lppm-v2.md#5-pengelolaan-users-dan-roles](panduan-admin-lppm-v2.md#5-pengelolaan-users-dan-roles)
- **Penugasan Reviewer**: [panduan-admin-lppm-v2.md#6-penugasan-reviewer](panduan-admin-lppm-v2.md#6-penugasan-reviewer)
- **IKU**: [panduan-admin-lppm-v2.md#11-iku-indikator-kinerja-utama](panduan-admin-lppm-v2.md#11-iku-indikator-kinerja-utama)

### Untuk Dekan

- **Menyetuju Proposal**: [panduan-dekan-v2.md#4-menyetuju-proposal](panduan-dekan-v2.md#4-menyetuju-proposal)
- **Menolak/Meminta Revisi**: [panduan-dekan-v2.md#5-menolak-proposal](panduan-dekan-v2.md#5-menolak-proposal)

### Untuk Reviewer

- **Melakukan Review**: [panduan-reviewer-v2.md#5-melakukan-review-proposal](panduan-reviewer-v2.md#5-melakukan-review-proposal)
- **Kriteria Penilaian**: [panduan-reviewer-v2.md#6-kriteria-penilaian](panduan-reviewer-v2.md#6-kriteria-penilaian)

### Untuk Kepala LPPM

- **Persetujuan Akhir**: [panduan-kepala-lppm-v2.md#5-persetujuan-akhir](panduan-kepala-lppm-v2.md#5-persetujuan-akhir)
- **Dashboard IKU**: [panduan-kepala-lppm-v2.md#7-dashboard-iku](panduan-kepala-lppm-v2.md#7-dashboard-iku)
- **Laporan ke Rector**: [panduan-kepala-lppm-v2.md#7-laporan-tingkat-institusi-untuk-rector](panduan-kepala-lppm-v2.md#7-laporan-tingkat-institusi-untuk-rector)

### Untuk Rector

- **Dashboard**: [panduan-rektor-v2.md#3-pengenalan-dashboard](panduan-rektor-v2.md#3-pengenalan-dashboard)
- **Monitoring IKU**: [panduan-rektor-v2.md#4-monitoring-iku](panduan-rektor-v2.md#4-monitoring-iku)
- **Laporan Strategis**: [panduan-rektor-v2.md#5-laporan-strategis](panduan-rektor-v2.md#5-laporan-strategis)
- **Menerima Laporan**: [panduan-rektor-v2.md#6-menerima-laporan-dari-kepala-lppm](panduan-rektor-v2.md#6-menerima-laporan-dari-kepala-lppm)

---

## 📊 Flowchart dan Diagram

Dokumen ini berisi flowchart detail untuk setiap modul dan peran:

| Dokumen | Deskripsi |
|---------|----------|
| [Flowchart Proses Modul](flowchart-proses-modul.md) | Flowchart lengkap alur proposal, review, user management, IKU, Monev, dan akses per role |

### Isi Flowchart:

- Flowchart Alur Proposal Penelitian (lengkap dengan detail setiap peran)
- Flowchart Alur Proposal PKM
- Flowchart Proses Review (detail kriteria penilaian)
- Flowchart User Management (tambah, import, sync SINTA)
- Flowchart Master Data
- Flowchart Pelaporan dan IKU (Kepala LPPM ke Rector)
- Flowchart Akses Menu per Role
- Flowchart Monev (Monitoring Evaluasi)
- Tabel Ringkasan Status Proposal

---

## ❓ Pertanyaan Umum (FAQ)

**T: Bagaimana cara reset password?**
J: Klik "Lupa Password" di halaman login, masukkan email, dan ikuti instruksi di email.

**T: Berapa batas upload file proposal?**
J: Maksimum 10 MB, format PDF.

**T: Berapa lama proses review proposal?**
J: Umumnya 2-4 minggu, tergantung kebijakan LPPM.

**T: Bagaimana jika proposal ditolak?**
J: Anda akan menerima notifikasi dengan alasan penolakan. Anda dapat memperbaiki dan mengajukan kembali.

**T: Apa itu TKT?**
J: TKT (Tingkat Kesiapan Teknologi) adalah skala 1-9 yang menunjukkan kesiapan hasil penelitian.

---

## 🔧 Troubleshooting

| Masalah | Solusi |
|---------|--------|
| Tidak bisa login | Hubungi Admin untuk reset password |
| File upload gagal | Pastikan format PDF dan ukuran < 10MB |
| Menu tidak muncul | Pastikan role sudah benar |
| Notifikasi tidak masuk | Cek email dan pengaturan notifikasi |

---

## 📞 Kontak Bantuan

| Peran | Email |
|-------|-------|
| Admin LPPM | admin@itsnu-pkl.ac.id |
| Technical Support | it@itsnu-pkl.ac.id |
| Kepala LPPM | lppm@itsnu-pkl.ac.id |

---

## ℹ️ Informasi Sistem

- **Browser yang Didukung**: Google Chrome, Mozilla Firefox, Microsoft Edge (versi terbaru)
- **Resolusi Minimum**: 1280x720 px
- **Versi**: SIM LPPM v2.0

---

*"Efisiensi adalah tujuan, tapi Integritas adalah fondasi kita."*

---

**Dokumen ini terakhir diperbarui: Maret 2026**
