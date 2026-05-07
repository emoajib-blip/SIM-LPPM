# Implementasi Sinkronisasi Local → Production (Push)

## Gambaran Umum
Fitur untuk mendorong data dari localhost ke server produksi secara aman dengan selective sync dan konfirmasi ketat.

## File yang Dibuat/Dimodifikasi

### 1. `sync-to-prod.sh` (BARU)
Bash script untuk push data ke production dengan fitur:
- Selective sync via flags: `--sync-db`, `--sync-files`, `--sync-config`
- SSH key-based authentication
- Backup otomatis storage production sebelum ditimpa
- Clear cache otomatis setelah sync
- Non-interactive (dipanggil dari PHP/Livewire)

**Cara pakai:**
```bash
bash sync-to-prod.sh --sync-db --sync-files --force
```

### 2. `app/Livewire/Settings/DataSync.php` (DIMODIFIKASI)
Update komponen Livewire:
- Properti baru: `syncDirection` (pull/push), `syncDb`, `syncFiles`, `syncConfig`, `confirmDbName`, `sshHost`, `sshUser`, `sshKeyPath`, `remotePath`, `remoteDb`
- Method `testSshConnection()` - verifikasi koneksi SSH
- Method `pushToProduction()` - jalankan sync-to-prod.sh dengan parameter
- Validasi konfirmasi database sebelum push
- Gate hanya untuk `superadmin` role

### 3. `resources/views/livewire/settings/data-sync.blade.php` (DIMODIFIKASI)
UI baru dengan:
- Toggle direction: Pull from Prod ↔ Push to Prod
- Checkbox selective sync: ☑ Database ☑ Storage ☑ Config
- Section konfigurasi SSH: host, user, key path, remote path
- Tombol "Test Connection" untuk verifikasi SSH
- Modal konfirmasi push dengan input nama database produksi
- Real-time output log (via polling atau streaming)

### 4. `.env.example` (DIMODIFIKASI)
Tambahkan variabel konfigurasi sync:
```env
SYNC_SSH_HOST=sim-lppm.itsnupekalongan.ac.id
SYNC_SSH_USER=simlppmi
SYNC_SSH_PORT=22
SYNC_SSH_KEY_PATH=/home/user/.ssh/sim_lppm_sync
SYNC_REMOTE_PATH=/home/simlppmi/sim-lppm
SYNC_REMOTE_DB=simlppmi_sim_lppm
SYNC_REMOTE_DB_USER=simlppmi
```

## Alur Push (Local → Prod)

```
User (superadmin)
  ↓
1. Pilih mode: Push to Production
2. Centang apa yang disync: ☑ Database ☑ Files
3. Klik "Sinkronkan"
4. Modal konfirmasi muncul:
   "Ketik nama database produksi untuk konfirmasi: ___"
   (User harus ketik nama DB yang benar)
5. Livewire validasi → jalankan sync-to-prod.sh
6. Script:
   a. Verifikasi koneksi SSH
   b. Dump database lokal
   c. Upload dump ke production
   d. Import di production
   e. Backup storage production
   f. Rsync storage files
   g. Clear cache production
7. Output tampil real-time di UI
8. Status terakhir diupdate
```

## Keamanan
- Hanya `superadmin` yang bisa akses
- Konfirmasi dengan mengetik nama database produksi
- SSH key-based (tanpa password di script)
- Backup otomatis sebelum overwrite
- Script executable permission: `chmod 755 sync-to-prod.sh`

## SSH Key Setup Guide
User perlu setup SSH key sekali:
```bash
# Generate key
ssh-keygen -t ed25519 -f ~/.ssh/sim_lppm_sync -C "sim-lppm-sync"

# Copy ke server
ssh-copy-id -i ~/.ssh/sim_lppm_sync.pub simlppmi@sim-lppm.itsnupekalongan.ac.id

# Test
ssh -i ~/.ssh/sim_lppm_sync simlppmi@sim-lppm.itsnupekalongan.ac.id
```
