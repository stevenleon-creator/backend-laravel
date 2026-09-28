#!/bin/sh

# Limpiar caché de configuración y optimizar Laravel
php artisan config:clear
php artisan route:clear

# Ejecutar las migraciones en producción
php artisan migrate --force

# Arrancar Apache en primer plano (¡es fundamental el uso de 'exec'!)
exec apache2-foreground