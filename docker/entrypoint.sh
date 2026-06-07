#!/bin/bash
set -e

# Wait for MySQL to be fully ready (extra safety beyond healthcheck)
echo "[entrypoint] Waiting for MySQL..."
until php -r "new PDO('mysql:host=${DB_HOST:-mysql};port=${DB_PORT:-3306};dbname=${DB_DATABASE:-garments_db}', '${DB_USERNAME:-garment_user}', '${DB_PASSWORD:-secret}');" 2>/dev/null; do
    sleep 2
done
echo "[entrypoint] MySQL is ready."

# Generate app key if not set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:" ]; then
    echo "[entrypoint] Generating APP_KEY..."
    php artisan key:generate --force
fi

# Run migrations
echo "[entrypoint] Running migrations..."
php artisan migrate --force

# Create storage symlink
echo "[entrypoint] Linking storage..."
php artisan storage:link --force 2>/dev/null || true

# Cache config + routes for production
if [ "$APP_ENV" = "production" ]; then
    echo "[entrypoint] Caching config, routes and views..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Fix permissions
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache 2>/dev/null || true

echo "[entrypoint] Starting PHP-FPM..."
exec "$@"
