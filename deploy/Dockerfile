FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

RUN composer install --no-interaction --no-progress --optimize-autoloader

RUN cp .env.example .env;

RUN php artisan key:generate

docker exec -it app php artisan storage:link

EXPOSE 8000