FROM php:8.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-interaction --prefer-dist

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

RUN mkdir -p /tmp && chmod 1777 /tmp

EXPOSE 9000

CMD ["php-fpm"]
