# Workflow: Sinkronisasi Localhost & Cloud Run

Gunakan workflow ini untuk memastikan kode, tampilan, dan data tetap identik antara komputer lokal dan server produksi.

## 1. Sinkronisasi Kode & Tampilan (Assets)
Agar tampilan sama, pastikan asset (CSS/JS) di-compile dengan cara yang sama.
- **Lokal**: Jalankan `npm run dev` untuk pengembangan real-time.
- **Deploy**: Dockerfile sudah otomatis menjalankan `npm run build`. 
- **Aturan**: Selalu jalankan `php artisan optimize:clear` di lokal sebelum deploy untuk memastikan tidak ada cache yang tertinggal.

### Standar Perubahan & Versioning
Semua perubahan pada `database/seeders/` harus dibuat melalui pull request dan diberi
label tanggal/versi pada nama file (contoh: `2026_02_25_add_template_seeder.php`). Ini
mencegah edit data master langsung di UI produksi. Seeder sekarang menggunakan trait
`SeedHelper` yang melakukan pengecekan duplikat (misalnya email, nama role) sebelum dan
setelah eksekusi.

## 2. Sinkronisasi Data (Database)
Karena Lokal (SQLite) dan Produksi (MySQL) berbeda jenis, kita menggunakan **Seeder** sebagai "Single Source of Truth".

### Alur Update Data:
1.  **Edit Seeder**: Jangan tambah data lewat UI Dashboard jika ingin sinkron. Tambahkan data (misal: User baru, Skema baru) ke file di `database/seeders/`.
2.  **Test Lokal**: Jalankan `php artisan migrate:fresh --seed` untuk melihat apakah data di seeder muncul dengan benar di UI Lokal.
3.  **Deploy & Sync**: Deploy ke Cloud Run dengan flag `DB_SEED=true`.
    ```bash
    gcloud run deploy sim-lppm --set-env-vars "DB_SEED=true" ...
    ```
4.  **Auto-sync**: Cloud Run akan menjalankan migration & seeder terbaru saat startup.

## 3. Sinkronisasi File (GCS)
Agar foto profil dan lampiran proposal tidak hilang:
- Gunakan **Google Cloud Storage** sebagai bucket.
- Set `FILESYSTEM_DISK=gcs` di `.env` (Lokal) dan Environment Variables (Cloud Run).

---

### Command Deploy Cepat (Copy-Paste)
Simpan ini sebagai skrip `deploy.sh` atau jalankan langsung:
```bash
# 1. Pastikan kode lokal sudah commit
git add . && git commit -m "Update: [deskripsi]"

# 2. Deploy (Otomatis build asset, jalankan migrasi, dan seeder)
gcloud run deploy sim-lppm \
  --source . \
  --region asia-southeast2 \
  --set-env-vars "APP_KEY=base64:wR54BxUsOi/ILFPFYSFic+0/ttVExD8jY/wQiQg4R4w=,APP_DEBUG=false,APP_ENV=production,DB_SEED=true" \
  --quiet
```

> [!IMPORTANT]
> Setelah data di Cloud Run sudah sesuai, ubah `DB_SEED=false` pada deployment berikutnya agar tidak menimpa data transaksi yang dibuat oleh user asli di server.

### CI/CD
Workflow GitHub Actions (`.github/workflows/ci.yml`) telah ditambahkan untuk:
1. Menjalankan Pint linter dan seluruh test suite setiap push/PR.
2. Membuat asset frontend.
3. (Opsional) Melakukan deploy otomatis ke Cloud Run ketika commit masuk ke cabang `main`
  menggunakan service account yang disimpan dalam secret `GCP_SA_KEY`.
Dengan ini, developer tidak perlu lagi menjalankan deploy manual; cukup push ke remote
setelah PR diterima.
