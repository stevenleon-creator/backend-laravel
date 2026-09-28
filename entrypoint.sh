#!/bin/sh

php artisan config:clear
php artisan route:clear
php artisan migrate --force

exec apache2-foreground