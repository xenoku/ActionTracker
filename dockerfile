# Используем стабильный базовый образ PHP с FPM
FROM php:8.4-fpm-bullseye

RUN sed -i 's|deb.debian.org|mirror.yandex.ru|g' /etc/apt/sources.list && \
    sed -i 's|security.debian.org|mirror.yandex.ru|g' /etc/apt/sources.list

RUN set -eux; \
    for i in {1..3}; do \
        apt-get update && break || sleep 5; \
    done && \
    apt-get install -y --no-install-recommends \
        libpng-dev \
        zip \
        unzip \
        curl \
        git \
        iproute2 \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/local/bin/composer

# Копируем файлы проекта
WORKDIR /var/www
COPY composer.json composer.lock* ./
RUN composer config --global repo.packagist composer https://mirrors.aliyun.com/composer/ && \
    composer install --no-dev --prefer-dist --no-autoloader --timeout=300

COPY . .
RUN composer dump-autoload --optimize

# Устанавливаем права на папки
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Настраиваем PHP-FPM для работы на всех интерфейсах
RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# Запускаем PHP-FPM
CMD ["php-fpm", "--nodaemonize"]
