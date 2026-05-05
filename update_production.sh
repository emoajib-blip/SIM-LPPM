#!/bin/bash

echo "=== SIM-LPPM Production Update Script ==="
cd /home/simlppmi/sim-lppm

# Backup (optional)
echo "Creating backup..."
cp -r . ../backup-$(date +%Y%m%d-%H%M%S) 2>/dev/null || echo "Backup skipped"

# Pull changes
echo "Pulling latest changes..."
git pull origin main

# Install dependencies
echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

# Clear caches
echo "Clearing caches..."
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Clear OPcache
php -r 'if (function_exists("opcache_reset")) { opcache_reset(); echo "OPcache cleared\n"; } else { echo "OPcache not available\n"; }'

# Set permissions
echo "Setting permissions..."
chown -R simlppmi:simlppmi .
chmod -R 755 storage bootstrap/cache

# Test application
echo "Testing application..."
php artisan tinker --execute="
\$p = App\Models\Proposal::first();
if (\$p) {
    echo '✓ Proposal found: ' . \$p->title . PHP_EOL;
    echo '✓ Status: ' . \$p->status->label() . PHP_EOL;
    \$s = \$p->submitter;
    \$policy = app(App\Policies\ProposalPolicy::class);
    echo '✓ Submitter can view: ' . (\$policy->view(\$s, \$p) ? 'YES' : 'NO') . PHP_EOL;
} else {
    echo '✗ No proposals found' . PHP_EOL;
}
"

echo "=== Update completed successfully! ==="
echo "Test URL: https://sim-lppm.itsnupekalongan.ac.id/research/proposal/[proposal-id]"
