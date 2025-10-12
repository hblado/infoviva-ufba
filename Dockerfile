# --- Stage 1: Build ---
FROM php:8.1-fpm AS build

# Instalar extensões e dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev npm nodejs && \
    docker-php-ext-install pdo pdo_mysql zip

# Configurar diretório da aplicação
WORKDIR /var/www/html

# Copiar arquivos composer
COPY composer.json composer.lock ./

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Copiar todo o código
COPY . .

# Instalar dependências Node e gerar assets
RUN npm install
RUN npm run build

# Rodar migrations (opcional, mas cuidado com produção!)
RUN php artisan migrate --force

# --- Stage 2: Serve ---
FROM php:8.1-fpm

WORKDIR /var/www/html

# Copiar tudo do stage build
COPY --from=build /var/www/html /var/www/html

# Expor porta e iniciar php-fpm
EXPOSE 9000
CMD ["php-fpm"]
