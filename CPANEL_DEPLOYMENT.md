# Panduan Deployment cPanel: SIM LPPM ITSNU

Dokumen ini berisi panduan langkah-demi-langkah untuk melakukan deployment aplikasi SIM LPPM ITSNU ke lingkungan shared hosting (cPanel).

---

## 📋 Prasyarat Sistem
Sebelum memulai, pastikan server cPanel Anda memenuhi kriteria berikut:
- **PHP Version**: 8.4 atau lebih tinggi.
- **PHP Extensions**: `bcmath`, `ctype`, `fileinfo`, `json`, `mbstring`, `openssl`, `pdo_mysql`, `tokenizer`, `xml`, `gd`.
- **Database**: MySQL 8.0+ atau MariaDB 10.4+.
- **Terminal Access**: Opsional (sangat disarankan untuk symlink storage).

---

## 🛠️ Tahap 1: Persiapan & Pengemasan (Local)
Jangan mengunggah file satu per satu. Gunakan script otomatis untuk mengemas aplikasi Anda:

1. Jalankan terminal di folder root project lokal Anda.
2. Jalankan perintah:
   ```bash
   bash pack-cpanel.sh
   ```
3. Script ini akan menghasilkan dua file ZIP:
   - `app_deploy.zip`: Berisi seluruh kode aplikasi (tanpa vendor & node_modules).
   - `vendor_deploy.zip`: Berisi folder vendor (dependensi PHP).

---

## 📂 Tahap 2: Pengunggahan & Ekstraksi
1. Buka **File Manager** di cPanel.
2. Unggah kedua file ZIP tersebut ke folder **Home** Anda ( `/home/[USERNAME]/`), **BUKAN** di dalam `public_html`. Ini penting untuk keamanan agar file sensitif seperti `.env` tidak dapat diakses publik.
3. Ekstrak kedua file tersebut:
   - Klik kanan `app_deploy.zip` -> **Extract**.
   - Klik kanan `vendor_deploy.zip` -> **Extract**.
4. Sekarang Anda harus memiliki struktur folder seperti `app`, `bootstrap`, `config`, `vendor`, dll. tepat di folder Home.

---

## 🌐 Tahap 3: Konfigurasi Public Akses
Folder `public` Laravel harus dipindahkan isinya ke folder publik cPanel (biasanya `public_html`).

1. Buka folder `public` yang baru diekstrak di Home.
2. Pilih semua file dan folder di dalamnya (termasuk folder `build`, file `index.php`, dan `.htaccess`).
3. Gunakan fitur **Move** dan pindahkan ke `/public_html`.
4. Hapus file bawaan hosting seperti `default.html` atau `index.php` lama di `public_html` agar tidak bentrok.

---

## 🔗 Tahap 4: Penghubungan Sistem (Edit index.php)
Karena folder `vendor` dan `bootstrap` berada di luar `public_html`, kita perlu menyesuaikan jalurnya.

1. Di folder `public_html`, edit file **`index.php`**.
2. Cari dan ubah dua baris berikut (biasanya baris 34 dan 47):
   ```php
   // Baris 34: Sesuaikan path autoload.php
   require __DIR__.'/../vendor/autoload.php';

   // Baris 47: Sesuaikan path app.php
   $app = require_once __DIR__.'/../bootstrap/app.php';
   ```
3. Klik **Save Changes**.

---

## ⚙️ Tahap 5: Konfigurasi Environment (.env)
1. Aktifkan **Show Hidden Files** di Settings File Manager.
2. Cari file **`.env`** di folder Home (BUKAN di `public_html`).
3. Gunakan template dari `.env.cpanel.example` dan sesuaikan nilainya:
   ```env
   APP_ENV=production
   APP_URL=https://[DOMAIN_ANDA]
   
   DB_DATABASE=[DB_NAME]
   DB_USERNAME=[DB_USER]
   DB_PASSWORD=[PASSWORD]
   ```
4. Pastikan `APP_KEY` sudah terisi. Jika belum, jalankan `php artisan key:generate` di lokal sebelum pengemasan.

---

## 🚀 Tahap 6: Finalisasi & Symlink Storage
Agar file yang diunggah (tanda tangan, lampiran) dapat diakses publik:

1. Buka **Terminal** di cPanel (jika tersedia).
2. Jalankan perintah:
   ```bash
   php artisan storage:link
   ```
3. Jika Terminal tidak tersedia, Anda bisa membuat file PHP sementara (misal `link.php`) di `public_html` dengan isi:
   ```php
   <?php
   symlink('/home/[USERNAME]/storage/app/public', '/home/[USERNAME]/public_html/storage');
   echo "Symlink Success!";
   ```
   Lalu akses `domain.com/link.php` melalui browser, kemudian hapus file tersebut.

---
**Vetted by AI - Manual Review Required by Senior Engineer/Manager**
