#!/bin/sh

# 1. Limpiar caché de Laravel
php artisan config:clear
php artisan route:clear

# 2. Ejecutar las migraciones
php artisan migrate --force

# 3. Limpieza de MPMs justo antes de iniciar Apache
rm -f /etc/apache2/mods-enabled/mpm_*.load
rm -f /etc/apache2/mods-enabled/mpm_*.conf
a2enmod mpm_prefork

# 4. Arrancar Apache
exec apache2-foreground