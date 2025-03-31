# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install gd pdo pdo_mysql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia el código fuente a la imagen
WORKDIR /var/www/html
COPY . .

# Da permisos a la carpeta de Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expone el puerto 80 para el servidor web
EXPOSE 80

# Comando para iniciar Apache con Laravel
CMD ["apache2-foreground"]
