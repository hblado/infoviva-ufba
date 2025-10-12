# =========================
# Dockerfile Laravel + Vite para Railway (PHP 8.1)
# =========================

# =========================
# Stage 1: Build
# =========================
FROM php:8.1-fpm AS build

# Instalar dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    build-essential \
    zip \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Definir diretório da aplicação
WORKDIR /app

# Copiar composer.json e composer.lock
COPY composer.json composer.lock ./

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Copiar package.json e package-lock.json
COPY package*.json ./

# Instalar dependências Node
RUN npm install

# Copiar toda a aplicação
COPY . .

# Build do front-end (Vite + Tailwind/DaisyUI)
RUN npm run build

# =========================
# Stage 2: Production
# =========================
FROM php:8.1-fpm

# Instalar extensões PHP necessárias
RUN apt-get update && apt-get install -y --no-install-recommends \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Definir diretório da aplicação
WORKDIR /app

# Copiar arquivos PHP + vendor + assets do build
COPY --from=build /app /app

# Permissões
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expor porta
EXPOSE 9000

# Comando final: PHP-FPM
CMD ["php-fpm"]
