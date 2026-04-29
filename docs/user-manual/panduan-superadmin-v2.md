# Panduan Lengkap Pengguna: Superadmin
## SIM LPPM ITSNU Pekalongan

---

## Daftar Isi

1. [Pendahuluan](#1-pendahuluan)
2. [Login dan Akses](#2-login-dan-akses)
3. [Pengenalan Dashboard Superadmin](#3-pengenalan-dashboard-superadmin)
4. [Pengelolaan Users](#4-pengelolaan-users)
5. [Pengelolaan Roles dan Permissions](#5-pengelolaan-roles-dan-permissions)
6. [Pengelolaan Master Data](#6-pengelolaan-master-data)
7. [Konfigurasi Sistem](#7-konfigurasi-sistem)
8. [Monitoring Sistem](#8-monitoring-sistem)
9. [Backup dan Restore](#9-backup-dan-restore)
10. [Maintenance](#10-maintenance)
11. [Troubleshooting](#11-troubleshooting)

---

## 1. Pendahuluan

### 1.1 Peran Superadmin

Superadmin adalah pengguna dengan hak akses tertinggi dalam sistem SIM LPPM. Peran ini biasanya diberikan kepada tim IT atau developer yang bertanggung jawab atas pengelolaan teknis sistem.

### 1.2 Hak Akses Superadmin

Sebagai Superadmin, Anda memiliki akses ke:

- **Semua menu** yang ada di sistem
- **Pengelolaan user** (create, read, update, delete)
- **Pengelolaan roles dan permissions**
- **Konfigurasi sistem**
- **Database management**
- **Backup dan restore**
- **System maintenance**
- **Audit log**
- **Settings teknis**

### 1.3 Perbedaan dengan Admin LPPM

| Aspek | Superadmin | Admin LPPM |
|-------|------------|------------|
| Scope | Seluruh sistem | Operasional LPPM |
| Roles | Dapat membuat/hapus roles | Tidak dapat |
| Permissions | Full access | Sesuai role |
| Settings | Sistem teknis | Konfigurasi bisnis |
| Database | Penuh | Terbatas |

---

## 2. Login dan Akses

### 2.1 Langkah Login

1. Buka browser: `https://sosiomen.web.id`
2. Masukkan kredensial Superadmin:
   - **Email**: superadmin@itsnu-pkl.ac.id (atau sesuai setup)
   - **Password**: [password yang diberikan]
3. Klik **Masuk**

### 2.2 Menu Superadmin

Setelah login, sidebar akan menampilkan menu tambahan:

| Menu | Fungsi |
|------|--------|
| Dashboard | Statistik sistem |
| Users | Kelola semua user |
| Roles & Permissions | Pengaturan akses |
| Master Data | Data referensi |
| Settings | Konfigurasi sistem |
| Logs | Log sistem |
| Backup | Backup database |
| Cache | Pengaturan cache |

---

## 3. Pengenalan Dashboard Superadmin

### 3.1 Statistik Sistem

Halaman dashboard menampilkan:

| Widget | Keterangan |
|--------|------------|
| Total Users | Jumlah user dalam sistem |
| Active Sessions | User yang sedang login |
| Database Size | Ukuran database |
| Last Backup | Waktu backup terakhir |
| System Uptime | Waktu berjalan sistem |

### 3.2 Quick Actions

- Tambah User Baru
- Clear Cache
- Run Migrations
- View Logs

---

## 4. Pengelolaan Users

### 4.1 Menu Users

Superadmin dapat:
- Melihat semua user
- Menambah user baru
- Mengedit user
- Menghapus user
- Reset password user
- Mengaktifkan/menonaktifkan user

### 4.2 Membuat User Baru

1. Klik **Users** > **+ Tambah User**
2. Isi formulir:
   - Nama lengkap
   - Email
   - NIP
   - Password
   - Role
   - Status (aktif/nonaktif)
3. Klik **Simpan**

### 4.3 Reset Password User

1. Klik user yang ingin di-reset
2. Klik **Reset Password**
3. Masukkan password baru
4. User akan menerima notifikasi

---

## 5. Pengelolaan Roles dan Permissions

### 5.1 Menu Roles

1. Klik **Roles & Permissions**
2. Daftar roles akan ditampilkan:
   - superadmin
   - admin lppm
   - kepala lppm
   - dekan
   - dosen
   - reviewer
   - rektor

### 5.2 Membuat Role Baru

1. Klik **+ Tambah Role**
2. Isi nama role
3. Pilih permissions
4. Klik **Simpan**

### 5.3 Mengelola Permissions

Superadmin dapat:
- Menambahkan permission baru
- Mengedit permission
- Menghapus permission
- Meng-assign permissions ke roles

---

## 6. Pengelolaan Master Data

### 6.1 Akses Master Data

Superadmin dapat mengakses semua master data:
- Fakultas
- Program Studi
- Bidan Ilmu
- Skema Penelitian
- Skema PKM
- Periode
- Jenis Luaran

### 6.2 Operasi CRUD

Semua operasi Create, Read, Update, Delete tersedia untuk Superadmin.

---

## 7. Konfigurasi Sistem

### 7.1 Menu Settings

1. Klik **Settings**
2. Pengaturan yang tersedia:
   - Pengaturan Aplikasi
   - Pengaturan Email
   - Pengaturan Database
   - Pengaturan Cache
   - Pengaturan Queue
   - Pengaturan Logging

### 7.2 Pengaturan Aplikasi

| Setting | Keterangan |
|---------|------------|
| App Name | Nama aplikasi |
| App URL | URL aplikasi |
| App Environment | local/staging/production |
| App Debug | true/false |
| App Timezone | Zona waktu |

### 7.3 Pengaturan Email

- Mail Driver
- Mail Host
- Mail Port
- Mail Username
- Mail Password
- Mail Encryption
- From Address

---

## 8. Monitoring Sistem

### 8.1 Menu Logs

1. Klik **Logs**
2. Jenis log yang tersedia:
   - Application Logs
   - Error Logs
   - Access Logs
   - Database Queries

### 8.2 Monitoring Resources

- CPU Usage
- Memory Usage
- Disk Usage
- Network Traffic

---

## 9. Backup dan Restore

### 9.1 Menu Backup

1. Klik **Backup**
2. Opsi yang tersedia:
   - **Backup Database**: Download full database backup
   - **Backup Files**: Download semua file
   - **Backup All**: Full system backup

### 9.2 Restore Database

> ⚠️ Perhatian: Restore akan menimpa data yang ada!

1. Klik **Restore**
2. Upload file backup (.sql)
3. Klik **Restore**
4. Tunggu hingga selesai

---

## 10. Maintenance

### 10.1 Cache Management

| Command | Fungsi |
|---------|--------|
| Clear Cache | Hapus cache aplikasi |
| Clear Route | Hapus route cache |
| Clear Config | Hapus config cache |
| Clear View | Hapus compiled views |
| Clear All | Hapus semua cache |

### 10.2 Database Migration

1. Klik **Migrations**
2. Opsi:
   - **Migrate**: Jalankan migrations
   - **Seed**: Jalankan seeders
   - **Rollback**: Kembalikan migration terakhir

### 10.3 Queue Management

- View Failed Jobs
- Retry Failed Jobs
- Clear Failed Jobs

---

## 11. Troubleshooting

### 11.1 Masalah Umum

| Masalah | Solusi |
|---------|--------|
| User tidak bisa login | Cek status user, reset password |
| Error 500 | Cek log error |
| Lambat | Clear cache, cek server resources |
| Email tidak terkirim | Cek konfigurasi email |

### 11.2 Perintah Artisan Useful

```bash
# Clear all caches
php artisan optimize:clear

# Fix permissions
php artisan permission:cache:reset

# Recompile classes
php artisan clear-compiled
```

---

## Glosarium

| Istilah | Arti |
|---------|------|
| CRUD | Create, Read, Update, Delete |
| Permissions | Hak akses ke fitur |
| Roles | Peran pengguna |
| Migration | Perubahan struktur database |
| Seeder | Data awal database |
| Cache | Data sementara |

---

## Kontak

Untuk bantuan teknis:
- Email: it@itsnu-pkl.ac.id

---

*Terakhir diperbarui: Maret 2026*
*Dokumen ini merupakan bagian dari SIM LPPM ITSNU Pekalongan*
