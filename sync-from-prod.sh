#!/bin/bash

# ==============================================================================
# SIM-LPPM SYNC SCRIPT (PRODUCTION -> LOCAL)
# ==============================================================================
# Script ini digunakan untuk mensinkronisasi data dari server produksi ke 
# lingkungan lokal (backup) secara aman dan efisien.
# ==============================================================================

# --- 1. KONFIGURASI SERVER PRODUKSI ---
REMOTE_USER="simlppmi"
REMOTE_HOST="sim-lppm.itsnupekalongan.ac.id"
REMOTE_PATH="/home/simlppmi/sim-lppm"
REMOTE_DB="simlppmi_sim_lppm"

# --- 2. KONFIGURASI LOKAL (Ditemukan Otomatis) ---
# Membaca konfigurasi dari file .env jika ada
if [ -f .env ]; then
    DB_DATABASE=$(grep DB_DATABASE .env | cut -d '=' -f2)
    DB_USERNAME=$(grep DB_USERNAME .env | cut -d '=' -f2)
    DB_PASSWORD=$(grep DB_PASSWORD .env | cut -d '=' -f2)
    DB_CONNECTION=$(grep DB_CONNECTION .env | cut -d '=' -f2)
fi

# Fallback ke default jika .env tidak lengkap
DB_DATABASE=${DB_DATABASE:-sim_lppm}
DB_USERNAME=${DB_USERNAME:-root}
DB_PASSWORD=${DB_PASSWORD:-}
DB_CONNECTION=${DB_CONNECTION:-mysql}

# --- 3. VALIDASI & KONFIRMASI ---
echo "--------------------------------------------------------"
echo "🚀 SIM-LPPM Sync: [Production] -> [Localhost]"
echo "--------------------------------------------------------"
echo "Remote: $REMOTE_USER@$REMOTE_HOST ($REMOTE_DB)"
echo "Local : $DB_CONNECTION://$DB_USERNAME@localhost/$DB_DATABASE"
echo "--------------------------------------------------------"

if [ "$DB_CONNECTION" == "sqlite" ]; then
    echo "⚠️  PERINGATAN: Local menggunakan SQLite. Sinkronisasi otomatis dari MySQL server ke SQLite lokal membutuhkan tool tambahan."
    echo "Script ini hanya akan melakukan sinkronisasi file (storage)."
fi

read -p "⚠️  PERHATIAN: Data lokal Anda akan ditimpa! Lanjutkan? (y/n) " -n 1 -r
echo
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Sinkronisasi dibatalkan."
    exit 1
fi

# --- 4. DETEKSI LINGKUNGAN (DOCKER VS NATIVE) ---
DOCKER_CONTAINER=$(docker ps --format '{{.Names}}' | grep "mariadb" | head -n 1)
USE_DOCKER=false

if [ ! -z "$DOCKER_CONTAINER" ]; then
    echo "🐳 Lingkungan Docker terdeteksi ($DOCKER_CONTAINER)."
    USE_DOCKER=true
fi

# --- 5. SINKRONISASI DATABASE ---
if [ "$DB_CONNECTION" != "sqlite" ]; then
    echo "📥 1/4 Membuat cadangan database di server..."
    TEMP_SQL="prod_dump_$(date +%F).sql"
    
    # Dump di server
    ssh $REMOTE_USER@$REMOTE_HOST "mysqldump -u $REMOTE_USER -p $REMOTE_DB > $REMOTE_PATH/prod_dump_temp.sql"
    
    echo "🚚 2/4 Mendownload database ke lokal..."
    scp $REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH/prod_dump_temp.sql ./$TEMP_SQL
    
    echo "💾 3/4 Memasukkan data ke Database Lokal..."
    if [ "$USE_DOCKER" = true ]; then
        docker exec -i $DOCKER_CONTAINER mariadb -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE < ./$TEMP_SQL
    else
        # Coba cari binary mysql di path umum jika tidak di Docker
        MYSQL_BIN=$(which mysql)
        if [ -z "$MYSQL_BIN" ] && [ -f "/Applications/XAMPP/xamppfiles/bin/mysql" ]; then
            MYSQL_BIN="/Applications/XAMPP/xamppfiles/bin/mysql"
        fi
        
        if [ ! -z "$MYSQL_BIN" ]; then
            $MYSQL_BIN -u $DB_USERNAME -p$DB_PASSWORD $DB_DATABASE < ./$TEMP_SQL
        else
            echo "❌ Error: mysql binary tidak ditemukan. Silakan install mysql client atau gunakan Docker."
        fi
    fi
    
    # Cleanup temp files
    rm ./$TEMP_SQL
    ssh $REMOTE_USER@$REMOTE_HOST "rm $REMOTE_PATH/prod_dump_temp.sql"
else
    echo "⏭️  Melewati sinkronisasi database (SQLite detected)."
fi

# --- 6. SINKRONISASI FILE (STORAGE) ---
echo "📂 4/4 Sinkronisasi file dokumen/upload (rsync)..."
mkdir -p storage/app/public
rsync -avz --progress -e ssh $REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH/storage/app/public/ ./storage/app/public/

# --- 7. FINALISASI ---
echo "🧹 Membersihkan cache aplikasi..."
if [ "$USE_DOCKER" = true ]; then
    docker exec -it sim-lppm-app php artisan optimize:clear
else
    php artisan optimize:clear
fi

echo "--------------------------------------------------------"
echo "✅ SELESAI! Localhost Anda sekarang selaras dengan Production."
echo "--------------------------------------------------------"
