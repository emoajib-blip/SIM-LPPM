# Test Plan: SIM-LPPM ITSNU Report & Export System

**Versi**: 1.0 (Pessimistic Mode)
**Penyusun**: AI Agent (Pessimistic Auditor)
**Status**: DRAFT - PENDING VERIFICATION

## 1. Pendahuluan
Dokumen ini merinci strategi pengujian untuk sistem pelaporan dan ekspor SIM-LPPM ITSNU. Fokus utama adalah mencari celah kegagalan sistem, kerentanan data, dan ketidakkonsistenan format yang dapat menghambat akreditasi atau audit institusi.

## 2. Ruang Lingkup Pengujian
- Modul Laporan Penelitian
- Modul Laporan Pengabdian Masyarakat (PKM)
- Modul Laporan Luaran (Output)
- Modul Kerjasama Mitra
- Fitur Ekspor PDF (DomPDF)
- Fitur Ekspor Excel (Maatwebsite Excel)

## 3. Strategi Pengujian (Pessimistic Approach)

### A. Functional Testing (Skenario Normal)
1. **Export PDF/Excel**: Verifikasi tombol ekspor menghasilkan file yang dapat diunduh.
2. **Filtering**: Verifikasi data yang diekspor sesuai dengan filter Tahun Akademik, Fakultas, dan Jenis Laporan.
3. **Pagination**: Verifikasi semua data (bukan hanya halaman pertama) masuk ke dalam laporan ekspor.

### B. Edge Case Testing (Mencari Celah)
1. **Data Kosong**: Apa yang terjadi jika admin mengekspor laporan tahun 2030 (yang belum ada datanya)?
    *   *Ekspektasi*: File terunduh dengan header tetap ada, isi kosong, tidak ada Error 500.
2. **Profil Inkomplit**: Mengekspor data di mana dosen belum mengisi NIDN atau Prodi (Potensi null pointer).
    *   *Ekspektasi*: Sistem menampilkan "-" dan tidak crash.
3. **Karakter Spesial**: Judul penelitian dengan emoji, tanda kutip, atau karakter non-latin.
    *   *Ekspektasi*: PDF tetap render tanpa karakter kotak-kotak (encoding issue).
4. **Volume Data Besar**: Mengekspor >1000 record sekaligus.
    *   *Ekspektasi*: Tidak terjadi Time Out atau Memory Exhausted.

### C. Regression Testing (Verifikasi Perbaikan Lalu)
1. **Buffer Corruption**: Memastikan tidak ada "Trailing Whitespace" atau output kotor sebelum transmisi file binary.
2. **Enum Mapping**: Memastikan status 'approved' di database ter-mapping benar di label laporan.

## 4. Major Bugs & Blockers (Audit List)
| ID | Deskripsi Bug | Dampak | Status |
|----|---------------|--------|--------|
| BUG-01 | File PDF/Excel Rusak | High (User tidak bisa lapor) | FIXED |
| BUG-02 | Error Null pada Profil Kosong | High (Fatal Error) | FIXED |
| BUG-03 | Format Dana Berantakan di Excel | Medium (Data sulit diolah) | FIXED |

## 5. Exit Criteria (Sign-Off Requirement)
- [ ] 100% Automated Export Tests PASS.
- [ ] Zero Fatal Errors (500) pada data profil inkomplit.
- [ ] PDF Header (Kop Surat) sesuai standar hukum institusi.
- [ ] Tidak ada outlier pada format mata uang Excel.

---
*Vetted by AI - Manual Review Required by Senior Engineer/Manager*
*"Trust, but Verify. Inspect what you Expect."*
