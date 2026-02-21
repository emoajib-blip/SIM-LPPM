# Panduan Akses Aplikasi dari Perangkat Lain di Jaringan WiFi yang Sama

Dokumen ini berisi langkah-langkah untuk menjalankan aplikasi SIM LPPM di komputer lokal (Mac/PC) agar dapat diakses oleh perangkat lain (seperti Handphone, Tablet, atau Laptop lain) yang terhubung dalam satu jaringan WiFi yang sama.

## 1. Mengetahui Alamat IP Lokal Komputer Anda
Pertama, Anda perlu mengetahui alamat IP lokal komputer Anda di jaringan WiFi.
- **Di Mac/Linux:** Buka terminal dan jalankan perintah `ifconfig` atau `ipconfig getifaddr en0`. (Sebagai contoh: `192.168.1.37`).
- **Di Windows:** Buka Command Prompt dan jalankan perintah `ipconfig`. Cari baris `IPv4 Address`.

## 2. Menjalankan Server Backend (Laravel)
Secara default, `php artisan serve` hanya melayani permintaan dari komputer itu sendiri (127.0.0.1). Agar bisa diakses dari luar, jalankan server dengan mengeksposnya ke semua antarmuka jaringan (`0.0.0.0`) atau secara spesifik ke IP lokal Anda.

Buka terminal di root project dan jalankan:
```bash
php artisan serve --host=0.0.0.0 --port=8000
```
*(Catatan: Anda juga bisa menggunakan spesifik IP lokal Anda, misal: `--host=192.168.1.37`)*

## 3. Menjalankan Server Frontend (Vite)
Aplikasi ini menggunakan Vite untuk memuat aset (CSS/JS). Secara default, server Vite juga diisolasi hanya untuk localhost. Anda harus mengeksposnya agar tampilan tidak "rusak" saat diakses perangkat lain.

Buka terminal **baru/kedua** di root project dan jalankan perintah:
```bash
npm run dev -- --host
```

## 4. Mengakses Aplikasi dari Perangkat Lain
1. Pastikan perangkat lain (misal: Handphone Anda) terhubung ke jaringan **WiFi yang sama** dengan komputer Anda.
2. Buka web browser (Chrome/Safari) di Handphone tersebut.
3. Kunjungi URL dengan format `http://[IP_LOKAL_ANDA]:8000`. 
   
   **Contoh:**
   `http://192.168.1.37:8000`

### Troubleshooting
- **Website tidak bisa dimuat sama sekali:** Pastikan Firewall di komputer Anda (Windows Defender Firewall / macOS Firewall) tidak memblokir koneksi masuk (incoming connections) untuk port 8000 atau PHP.
- **Halaman dimuat tapi CSS/JS (tampilan) hancur:** Pastikan layanan Vite (`npm run dev`) sudah dijalankan dengan "flag" `--host`.
