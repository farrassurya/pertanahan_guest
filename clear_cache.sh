#!/bin/bash
# Script untuk clear cache Laravel di server production

echo "Clearing Laravel caches..."

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

echo "All caches cleared successfully!"
echo "Now run: php artisan optimize"
