# Production Infrastructure Setup Guide

Dokumen ini berisi panduan untuk mengonfigurasi **Queue Worker** dan **Database Backup** di lingkungan VPS Produksi.

## 1. Supervisor (Queue Worker)

Supervisor digunakan untuk memastikan `php artisan queue:work` berjalan terus menerus di latar belakang.

### Langkah Instalasi:
1.  Install Supervisor: `sudo apt-get install supervisor`
2.  Salin file konfigurasi:
    `sudo cp infrastructure/supervisor/laravel-worker.conf /etc/supervisor/conf.d/`
3.  Sesuaikan path `/var/www/html` dan `user` di dalam file `/etc/supervisor/conf.d/laravel-worker.conf` jika perlu.
4.  Update & Start:
    ```bash
    sudo supervisorctl reread
    sudo supervisorctl update
    sudo supervisorctl start laravel-worker:*
    ```

## 2. Backup Database MariaDB

Skrip backup berada di `infrastructure/backup/database-backup.sh`.

### Langkah Konfigurasi:
1.  Beri izin eksekusi: `chmod +x infrastructure/backup/database-backup.sh`
2.  Uji coba backup manual: `./infrastructure/backup/database-backup.sh`
3.  Tambahkan ke Crontab untuk backup harian otomatis:
    - Buka crontab: `crontab -e`
    - Tambahkan baris berikut (setiap jam 02:00 pagi):
      `0 2 * * * /bin/bash /var/www/html/infrastructure/backup/database-backup.sh >> /var/www/html/storage/logs/backup.log 2>&1`

### Risk Assessment:
- **Supervisor**: Pastikan `numprocs` tidak terlalu tinggi untuk menghindari beban CPU berlebih.
- **Backup**: Pastikan partisi penyimpanan memiliki ruang cukup untuk file `.gz`. Simpan salinan di luar server (off-site backup) sangat direkomendasikan.

---
*Vetted by AI - Manual Review Required by Senior Engineer/Manager*
