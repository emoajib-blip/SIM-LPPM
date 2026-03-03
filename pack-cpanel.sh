#!/bin/bash

# ==========================================
# SIM LPPM - CPANEL PACKAGING SCRIPT
# ==========================================
# Script ini membuat paket ZIP untuk deployment
# ke cPanel secara otomatis dan aman.

echo "📦 Memulai proses pengemasan (Packaging)..."

# 1. Pastikan Asset Production Ter-update
echo "🏗️  Membangun asset production (Vite)..."
npm run build

# 2. Hapus ZIP lama jika ada
echo "🧹 Membersihkan file ZIP lama..."
rm -f sosiomen_deploy.zip vendor_deploy.zip

# 3. Pack Aplikasi (Tanpa Vendor, Tanpa Git)
echo "📂 Mengemas Kode Aplikasi (sosiomen_deploy.zip)..."
zip -r sosiomen_deploy.zip . -x \
    ".git/*" \
    "node_modules/*" \
    "vendor/*" \
    "storage/logs/*" \
    "storage/framework/cache/data/*" \
    "storage/framework/sessions/*" \
    "storage/framework/views/*" \
    "storage/app/public/*" \
    ".env" \
    ".DS_Store" \
    "infrastructure/*" \
    "tests/*" \
    "phpunit.xml" \
    ".phpunit.result.cache" \
    "*.log" \
    "*.zip"

# 4. Pack Vendor (Terpisah untuk kemudahan upload)
echo "🚚 Mengemas Folder Vendor (vendor_deploy.zip)..."
zip -r vendor_deploy.zip vendor -x "*.DS_Store"

echo ""
echo "✅ PROSES SELESAI!"
echo "------------------------------------------------"
echo "File Berikut Siap Diupload ke cPanel:"
echo "1. sosiomen_deploy.zip (~$(du -h sosiomen_deploy.zip | cut -f1))"
echo "2. vendor_deploy.zip (~$(du -h vendor_deploy.zip | cut -f1))"
echo "------------------------------------------------"
echo "Panduan Ekstrak ada di CPANEL_DEPLOYMENT.md"

# Vetted by AI - Manual Review Required by Senior Engineer/Manager
