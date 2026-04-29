# SIM-LPPM ITSNU Security Configuration Snippets

Dokumen ini berisi potongan kode (snippets) untuk pengerasan keamanan pada sisi Web Server (Nginx/Apache).

## 1. Nginx Configuration (Recommended)

Tambahkan blok berikut di dalam blok `server {}` aplikasi Anda untuk mencegah eksekusi skrip di folder upload dan melindungi file sensitif.

```nginx
# 1. Mencegah eksekusi PHP di folder storage/uploads
location ~* ^/storage/uploads/.*\.php$ {
    deny all;
    access_log off;
    log_not_found off;
}

# 2. Melindungi file konfigurasi sensitif
location ~ /\.(env|git|htaccess|project) {
    deny all;
}

# 3. Security Headers
add_header X-Frame-Options "SAMEORIGIN";
add_header X-XSS-Protection "1; mode=block";
add_header X-Content-Type-Options "nosniff";
add_header Referrer-Policy "no-referrer-when-downgrade";
add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline' 'unsafe-eval'; frame-ancestors 'self';";
```

## 2. Apache Configuration (.htaccess)

Jika Anda menggunakan Apache, pastikan file `.htaccess` di folder `public/` berisi aturan berikut:

```apache
# Mencegah eksekusi script di folder uploads
<Directory "/var/www/html/storage/app/public/uploads">
    <FilesMatch "\.(php|php5|phtml|sh|py|pl)$">
        Order allow,deny
        Deny from all
    </FilesMatch>
</Directory>

# Melindungi file .env
<Files ".env">
    Order allow,deny
    Deny from all
</Files>
```

## 3. Laravel Optimization (Production)

Jalankan perintah ini di server produksi untuk memastikan `env()` tidak dipanggil saat runtime (menggunakan cache):

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---
**Vetted by AI - Manual Review Required by Senior Engineer/Manager**
