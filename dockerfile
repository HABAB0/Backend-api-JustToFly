# Используем официальный PHP образ
FROM php:8.2-fpm

# Устанавливаем необходимые расширения и утилиты для Laravel
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка Laravel
WORKDIR /var/www