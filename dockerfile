# Этап сборки
FROM composer:2.5 as composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-autoloader

# Финальный образ
FROM php:8.4-fpm-bullseye

# Копируем зависимости Composer
COPY --from=composer /app/vendor /var/www/vendor

# Устанавливаем системные пакеты
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list && \
    apt-get update && apt-get install -y --no-install-recommends \
        libpng-dev \
        iproute2 \
    && docker-php-ext-install pdo pdo_mysql gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
COPY . .
RUN composer dump-autoload --optimize

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

CMD ["php-fpm", "--nodaemonize"]
