# -----------------------------
# Etapa 1: Build do front (Vite)
# -----------------------------
FROM node:18-alpine AS build-frontend

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build


# -----------------------------
# Etapa 2: Build do backend PHP/Laravel
# -----------------------------
FROM php:8.1-fpm

# Instalar dependências básicas e extensões PHP
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar arquivos do Laravel
COPY . .

# Copiar assets compilados do front
COPY --from=build-frontend /app/public/build /var/www/html/public/build

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Definir permissões corretas (storage e cache)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Variável de ambiente do Laravel
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV APP_KEY=base64:placeholderkey==
ENV PORT=8000

# Expor a porta padrão
EXPOSE 8000

# Comando de inicialização
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
