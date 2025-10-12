# =========================
# Dockerfile completo Laravel + Node/DaisyUI
# =========================

# Stage 1: Build
FROM php:8.1-fpm AS build

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libonig-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring intl zip exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar composer.json, composer.lock e código da aplicação
COPY composer.json composer.lock ./
COPY . .

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-plugins

# Instalar dependências Node.js e build dos assets
RUN npm install
RUN npm run build

# Definir permissões corretas para Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Rodar migrations (opcional, força execução)
RUN php artisan migrate --force

# =========================
# Stage 2: Production
# =========================
FROM php:8.1-fpm

WORKDIR /var/www/html

# Copiar código e dependências do stage de build
COPY --from=build /var/www/html /var/www/html

# Instalar extensões necessárias no runtime
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libonig-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring intl zip exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Expor porta do PHP-FPM
EXPOSE 9000

# Entrypoint
CMD ["php-fpm"]
