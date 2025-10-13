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

# Definir diretório da aplicação
WORKDIR /app

# Copiar composer para cache
COPY composer.json composer.lock ./

# Copiar todo o código, incluindo artisan
COPY . .

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Copiar package.json e package-lock.json (se ainda não copiados)
COPY package*.json ./

# Instalar dependências Node
RUN npm install

# Gerar build dos assets (Vite + Tailwind/DaisyUI)
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

# Copiar todo o código + vendor + assets do stage de build
COPY --from=build /app /app

# Permissões
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expor porta do Railway
EXPOSE 8080

# Rodar PHP-FPM em foreground (produção)
CMD ["php-fpm"]
