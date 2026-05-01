#!/bin/bash

# --- KONFIGURASI SERVER (PROD) ---
REMOTE_USER="simlppmi"
REMOTE_HOST="sim-lppm.itsnupekalongan.ac.id"
REMOTE_PATH="/home/simlppmi/sim-lppm"
DB_NAME="simlppmi_sim_lppm" # Nama DB di server

# --- KONFIGURASI LOCAL (XAMPP) ---
DB_NAME_LOCAL="sim_lppm" 
DB_USER_LOCAL="root"
DB_PASS_LOCAL="" 

echo "🚀 Memulai Sinkronisasi FULL (Website -> XAMPP Local)..."

# 1. Dump Database di Server
echo "📥 1/4 Membuat cadangan database di server..."
ssh $REMOTE_USER@$REMOTE_HOST "mysqldump -u $REMOTE_USER -p $DB_NAME > $REMOTE_PATH/prod_dump.sql"

# 2. Download Database Dump
echo "🚚 2/4 Mendownload database ke laptop..."
scp $REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH/prod_dump.sql ./prod_dump_temp.sql

# 3. Import ke MySQL XAMPP
echo "💾 3/4 Memasukkan data ke MySQL XAMPP..."
/Applications/XAMPP/xamppfiles/bin/mysql -u $DB_USER_LOCAL -p$DB_PASS_LOCAL $DB_NAME_LOCAL < ./prod_dump_temp.sql

# 4. Sinkronisasi File Upload
echo "📂 4/4 Sinkronisasi file dokumen/upload..."
mkdir -p storage/app/public
rsync -avz -e ssh $REMOTE_USER@$REMOTE_HOST:$REMOTE_PATH/storage/app/public/ ./storage/app/public/

# Bersihkan file sementara
rm ./prod_dump_temp.sql
ssh $REMOTE_USER@$REMOTE_HOST "rm $REMOTE_PATH/prod_dump.sql"

echo "✅ SELESAI! Database & File Website sudah masuk ke XAMPP Local."
