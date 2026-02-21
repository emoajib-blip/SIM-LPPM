# 01. Product Requirements Document (PRD) v4.0
## SIM LPPM ITSNU – "The Accountant of Research"

**Status:** ACTIVE | **Approver:** Director / PM Skeptic
**Focus:** Productivity, Integrity, and Audit-Readiness.

---

## 1. Executive Summary (The Humanist Edge)
Teknologi harus melayani manusia, bukan sebaliknya. SIM LPPM ITSNU bukan sekadar alat pelaporan, melainkan ekosistem digital yang membebaskan Dosen dari belenggu administrasi manual. Kita membangun sistem yang "paham" bahwa waktu seorang peneliti sangat berharga.

## 2. Fundamental Logic (Sharp Requirements)

### 2.1 Zero-Duplicate Entry (Discovery Logic)
Setiap data yang sudah ada di sistem eksternal (SINTA/SISTER) **HARUS** ditarik secara otomatis. Dosen dilarang mengisi data yang sudah pernah mereka isi di tempat lain (jika API tersedia).

### 2.2 Strict State-Machine (Security Logic)
Workflow persetujuan tidak boleh memiliki jalan pintas.
- **Dekan** = Validasi Strategis.
- **Admin LPPM** = Validasi Administratif.
- **Reviewer** = Validasi Kualitas.
- **Kepala LPPM** = Validasi Finansial.

Setiap transisi status harus meninggalkan jejak audit (`Audit Trail`) yang tidak dapat diubah (Patuhi prinsip TOGAF & Zero Trust).

### 2.3 Bulletproof Exports
Laporan (PDF/Excel) adalah "Produk Akhir" yang digunakan untuk akreditasi.
- **Requirement**: Zero tolerance terhadap korupsi data profil (Null-safe by default).
- **Requirement**: Format ekspor harus mematuhi standar nasional (PDPT/BAN-PT).

## 3. High-Priority Features (Novelty)

### 3.1 Smart Analysis & SINTA Sync
Integrasi dua arah dengan SINTA untuk memonitor skor kualitatif dosen secara real-time. Membantu LPPM memetakan potensi riset per fakultas secara objektif.

### 3.2 Output Lifecycle Management
Sistem tidak berhenti pada "Proposal Disetujui". Sistem baru "selesai" ketika luaran (Jurnal/Paten) telah diverifikasi statusnya (Publish/Granted).

### 3.3 Defensive Budgeting
Validasi anggaran secara *pessimistic*. Sistem akan menolak proposal yang nilai anggarannya tidak masuk akal atau melampaui standar biaya internal (SBK) sebelum mencapai meja reviewer.

## 4. Business Metrics (Monitoring Goals)
- **Time-to-Approval**: Penurunan durasi dari proposal masuk hingga kontrak 30%.
- **Data Compliance**: 100% data profil dosen lengkap dan tersinkronisasi.
- **Audit-Readiness**: Mempersiapkan laporan akreditasi dalam hitungan < 1 jam.

---
*Vetted by AI - Manual Review Required by Senior Engineer/Manager*
*"Efficiency is the goal, but Integrity is the foundation."*
