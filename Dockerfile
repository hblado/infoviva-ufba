# =========================
# Stage 1: build
# =========================
FROM node:20 AS build

WORKDIR /app

# Copiar package.json e package-lock.json
COPY package*.json ./

# Instalar dependências do npm
RUN npm install

# Copiar código da aplicação
COPY . .

# Build dos assets para produção
RUN npm run build

# =========================
# Stage 2: PHP / Laravel
# =========================
FROM php:8.2-fpm

WORKDIR /app

# Instalar extensões do PHP necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install pdo_mysql zip

# Instalar composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar código da aplicação
COPY . .

# Copiar assets compilados do build
COPY --from=build /app/public/build ./public/build

# Instalar dependências PHP
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader

# Gerar key do Laravel se não existir
#RUN php artisan key:generate

# Rodar migrations (se o banco estiver disponível)
# RUN php artisan migrate --force

# Permissões
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage /app/bootstrap/cache

# Expor porta do FPM
EXPOSE 9000

CMD ["php-fpm"]
