#!/bin/sh
set -e

# Ajustar Apache para escuchar en el puerto que Render asigna
sed -i "s/80/${PORT:-80}/g" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

php artisan migrate --force

apache2-foreground