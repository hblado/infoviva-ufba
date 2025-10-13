# =========================
# Stage 1: Build (Node + Composer)
# =========================
FROM php:8.1-fpm AS build

WORKDIR /app

# Instalar dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    git curl unzip zip build-essential \
    libonig-dev libxml2-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar arquivos principais do Laravel
COPY composer.json composer.lock package*.json vite.config.js ./
COPY resources resources
COPY public public
COPY database database
COPY routes routes
COPY app app
COPY bootstrap bootstrap
COPY artisan .

# Instalar dependências PHP e JS
RUN mkdir -p bootstrap/cache storage/framework storage/logs
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN npm install && npm run build

# =========================
# Stage 2: Produção (PHP + Nginx)
# =========================
FROM php:8.1-fpm

WORKDIR /app

# Instalar dependências e extensões PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx supervisor libonig-dev libxml2-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Copiar app do stage anterior
COPY --from=build /app /app

# Copiar configs do Nginx e Supervisor
COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY .docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Permissões corretas
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

EXPOSE 8080

CMD ["/usr/bin/supervisord"]
