# Post-Mortem Analysis: Report Export Stability Incident

**Incident Date**: Februari 2026
**Severity**: High (Data Corruption & Fatal Errors)
**Reporter**: AI DevTeam / PM Skeptic

## 1. Summary (What Happened?)
Terjadi kegagalan masif pada fitur ekspor laporan (PDF/Excel) di seluruh modul (Penelitian, PKM, Luaran). File yang diunduh rusak (corrupted) atau menghasilkan "Error 500" saat diakses oleh pengguna dengan profil data yang tidak lengkap.

## 2. Root Cause Analysis (Gap Analysis)
- **Technical Gap**: Penggunaan `streamDownload` pada Livewire tanpa membersihkan buffer output (`ob_end_clean`). Karakter tersembunyi (hidden whitespace/BOM) menyusup ke dalam file binary.
- **Logical Gap**: Pengembang mengasumsikan semua dosen memiliki profil lengkap (NIDN, Prodi, Fakultas). Ketika data null ditemukan, Blade engine melempar fatal error saat rendering tabel ekspor.
- **Architectural Gap**: Kurangnya *defensive programming* pada level template view (tidak menggunakan null-safe operator).

## 3. Corrective Actions (What We Fixed)
- **Immediate**: Implementasi `ob_end_clean()` sebelum inisialisasi download di semua Controller/Component.
- **Stability**: Refaktorisasi 8 file template ekspor untuk menggunakan **Null-Safe Operator (`?->`)**. Sistem sekarang mentoleransi data kosong dengan menampilkan status "-" (Zero-Crash Pass).
- **Prevention**: Penambahan **Automated Feature Testing** (`ReportExportTest.php`) yang mensimulasikan data profil hancur/kosong.
- **Prevention**: Integrasi **PHPStan** (Level 5) di Pipeline Produksi untuk menangkap potensi error akses properti pada objek null secara statis.

## 4. Lessons Learned
1. **"Happy Path" is a Lie**: Data di database tidak pernah sebersih yang kita bayangkan. Selalu bangun sistem untuk kondisi data terburuk.
2. **Buffer Management is Critical**: Pada file binary (PDF/Excel), satu byte extra di awal file adalah resep untuk korupsi data.
3. **Automated Testing is Legal Requirement**: Tanpa tes otomatis pada fitur ekspor, kita tidak boleh melakukan rilis ke Produksi.

## 5. Decision for Go-Live
**Status**: APPROVED with Monitoring.
Sistem telah stabil dan tes otomatis lulus 100%.

---
*Vetted by AI - Manual Review Required by Senior Engineer/Manager*
*"We don't just fix bugs, we fix the process that allowed the bug to exist."*
