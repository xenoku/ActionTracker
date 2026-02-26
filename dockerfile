# Используем PHP 8.4 для совместимости с symfony/filesystem v8.0.1
FROM php:8.4-fpm-bullseye

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    zip \
    unzip \
    curl \
    git \
    iproute2 \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Этап Composer
FROM composer:2.5 AS composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-autoloader

# Финальный образ
FROM php:8.4-fpm-bullseye

# Копируем зависимости
COPY --from=composer /app/vendor /var/www/vendor
WORKDIR /var/www
COPY . .

# Права доступа
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Конфигурация FPM
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

CMD ["php-fpm", "--nodaemonize"]
