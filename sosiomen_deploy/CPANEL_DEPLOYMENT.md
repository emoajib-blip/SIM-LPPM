# Panduan Utama Go-Live: sosiomen.web.id

Ikuti langkah-langkah di bawah ini secara berurutan untuk m m mmlai m m n m mmlai m n n n n me-revisi tampilan cPanel Anda mnjadi aplikasi SIM LPPM yang aktif.

---

### Tahap 1: Persiapan File & Ekstrak
1.  **Akses File Manager**: Login ke cPanel dan buka **File Manager**.
2.  **Upload ZIP**: Pastikan file `sosiomen_deploy.zip` dan `vendor_deploy.zip` sudah berada di folder **home** ( `/home/sosiomen/`), bukan di dalam `public_html`.
3.  **Extract All**: 
    - Klik kanan `sosiomen_deploy.zip` -> **Extract** -> Klik **Extract File(s)**.
    - Klik kanan `vendor_deploy.zip` -> **Extract** -> Klik **Extract File(s)**.
4.  **Verifikasi**: Sekarang Anda harus memiliki folder `app`, `bootstrap`, `config`, `vendor`, dll. tepat di bawah `/home/sosiomen/`.

---

### Tahap 2: Menghidupkan Domain (Setting public_html)
Domain `sosiomen.web.id` secara standar m m mmlai m m m m n n n n n n n n m nuju ke folder `public_html`. Kita harus mengisi folder tersebut dngan "pintu masuk" Laravel.
1.  **Masuk ke folder `public`**: Cari dan buka folder bernama `public` di File Manager.
2.  **Pindahkan Isinya**:
    - Pilih semua file/folder di dalamnya (termasuk folder `build`, file `index.php`, dan `.htaccess`).
    - Klik tombol **Move** di menu atas.
    - Ketik tujuannya: `/public_html` (lalu klik Move File).
3.  **Bersihkan File Lama**: Masuk ke folder `public_html`, hapus file `default.html` atau file `.shtml` bawaan hosting agar tidak mengganggu.

---

### Tahap 3: Menghubungkan "Wajah" dan "Otak" (Edit index.php)
Kita perlu memberi tahu file `index.php` (di `public_html`) di mana letak folder `vendor` dan `bootstrap` yang berada di luar.
1.  Di folder `public_html`, klik kanan file **`index.php`** -> **Edit**.
2.  Cari dan ubah dua baris berikut (sekitar baris 34 dan 47):

   ```php
   // Baris 34: Ubah mnjadi seperti ini
   require __DIR__.'/../vendor/autoload.php';

   // Baris 47: Ubah mnjadi seperti ini
   $app = require_once __DIR__.'/../bootstrap/app.php';
   ```
3.  Klik **Save Changes**.

---

### Tahap 4: Konfigurasi Database (.env)
1.  Pastikan fitur **Show Hidden Files** aktif (Settings di pojok kanan atas File Manager).
2.  Klik kanan file **`.env`** di folder `/home/sosiomen/` -> **Edit**.
3.  Sesuaikan data berikut dngan database yang Anda buat di cPanel:
   ```env
   APP_URL=https://sosiomen.web.id
   DB_DATABASE=sosiomen_lppm  # Nama DB cPanel Anda
   DB_USERNAME=sosiomen_user  # Username DB cPanel Anda
   DB_PASSWORD=password_anda  # Password DB cPanel Anda
   ```
4.  Klik **Save Changes**.

---

### Tahap 5: Perbaikan Gambar Kosong (Storage Symlink)
Jika gambar atau file upload tidak muncul, jalankan perintah ini via **Terminal** di cPanel:
```bash
php artisan storage:link
```
*Jika tidak ada Terminal, hubungi support hosting agar mereka m m mmlai m m n bantu m m n n n n m n n buatkan symlink dari `storage/app/public` ke `public_html/storage`.*

---
**Vetted by AI - Manual Review Required by Senior Engineer/Manager**

