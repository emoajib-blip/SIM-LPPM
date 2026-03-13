#!/bin/sh
set -e

# Tunggu database siap (opsional tapi disarankan di entrypoint)
# php artisan db:wait --timeout=30

# Vendor check is now done in Dockerfile, but keeping a failsafe
if [ ! -f "/var/www/html/vendor/autoload.php" ]; then
    echo "Warning: Composer dependencies still missing!"
fi

LOCK_FILE="/var/www/html/storage/app/.installed"

# Robust check for Cloud Run: If not using SQLite, we can try to run migrations/optimization
# even if the local LOCK_FILE is missing (because Cloud Run disk is ephemeral)
if [ -f "$LOCK_FILE" ] || [ "$DB_CONNECTION" != "sqlite" ]; then
    echo "Running migrations and optimization (Local lock found or Persistent DB used)..."
    
    # Try migrations, but don't fail container boot if DB isn't ready yet
    php artisan migrate --force || echo "Migration skipped or failed (DB might not be ready)"

    if [ "$DB_SEED" = "true" ]; then
        echo "DB_SEED is true. Running seeders..."
        php artisan db:seed --force
    fi

    echo "Optimizing Laravel..."
    php artisan optimize:clear
    php artisan optimize
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database || true
else
    echo "Installer lock not found and using SQLite. Skipping auto-migrations."
fi

# Jalankan perintah utama (php-fpm)
exec "$@"
