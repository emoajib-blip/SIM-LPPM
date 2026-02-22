# 🌐 PANDUAN AKSES JARINGAN LOKAL (WI-FI)
SIM LPPM ITSNU - Verifikasi & Uji Coba Tim

Panduan ini digunakan agar aplikasi yang berjalan di laptop Host dapat diakses oleh laptop/perangkat lain yang berada dalam satu jaringan Wi-Fi/LAN yang sama.

---

## 🛠️ Langkah 1: Mencari IP Address Host
Buka **Terminal** di laptop pusat (Host), lalu ketik:
```bash
ipconfig getifaddr en0
```
*(Jika tidak muncul atau menggunakan kabel LAN, coba `en1`).*
**Contoh hasil:** `192.168.1.37`

---

## ⚙️ Langkah 2: Update Konfigurasi Sistem
Buka file `.env` di folder project, cari baris `APP_URL` dan sesuaikan dengan IP yang didapat:
```env
APP_URL=http://192.168.1.XX:8000
```
*(Ganti `192.168.1.XX` dengan kode IP Anda).*

---

## 🚀 Langkah 3: Menjalankan Server (Host)
Bapak perlu membuka **dua (2) jendela Terminal** dan biarkan keduanya tetap berjalan:

**Terminal 1 (Server Laravel):**
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

**Terminal 2 (Aset & Styling):**
```bash
npm run dev -- --host
```

---

## 💻 Langkah 4: Akses oleh User/Laptop Lain
Beri tahu rekan tim/penguji untuk membuka browser dan mengetik alamat:
> **ALAMAT:** `http://192.168.1.XX:8000`

---

## 🔍 Troubleshooting (Jika Gagal Akses)
1. **Pastikan Wi-Fi Sama:** Laptop Host dan Laptop User harus terhubung ke SSID Wi-Fi yang sama.
2. **Cek Firewall Mac:** 
   - Masuk ke *System Settings > Network > Firewall*.
   - Pastikan *Allow incoming connections* diaktifkan atau Firewall dimatikan sementara saat uji coba.
3. **Internal Error Aset:** Jika tampilan berantakan (CSS tidak muncul), pastikan perintah `npm run dev -- --host` sudah berjalan dengan IP yang benar.
4. **IP Berubah:** Jika laptop Host melakukan *restart* Wi-Fi, ulangi **Langkah 1** karena kemungkinan angka IP berubah.

---
*Vetted by AI - Manual Review Required by Senior Engineer/Manager*
*"Efficiency is the goal, but Integrity is the foundation."*
