FROM php:8.3-apache

# 1. Instalar dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libssl-dev \
    pkg-config \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Instalar extensiones de PHP (incluyendo PostgreSQL)
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql zip \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# 3. Apuntar la raíz del servidor Apache a la carpeta /public de Laravel
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Eliminar enlaces de otros MPM y habilitar mpm_prefork + mod_rewrite
RUN rm -f /etc/apache2/mods-enabled/mpm_event.* /etc/apache2/mods-enabled/mpm_worker.* \
    && a2enmod mpm_prefork rewrite

# 5. Instalar Composer copiando la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Definir el directorio de trabajo
WORKDIR /var/www/html

# 7. Copiar el código del proyecto al contenedor
COPY . .

# 8. Instalar las dependencias de Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 9. Otorgar permisos correctos a las carpetas storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/entrypoint.sh"]