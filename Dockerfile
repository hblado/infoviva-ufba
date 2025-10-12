# --- Stage 1: Build ---
FROM php:8.1-fpm AS build

# Instalar dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Diretório da aplicação
WORKDIR /var/www/html

# Copiar arquivos de Composer primeiro
COPY composer.json composer.lock ./

# Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Agora copiar todo o código da aplicação
COPY . .

# Definir permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Build assets do Node.js
RUN npm install
RUN npm run build

# Rodar migrations (se quiser forçar)
RUN php artisan migrate --force

# --- Stage 2: Produção ---
FROM php:8.1-fpm

WORKDIR /var/www/html

# Copiar tudo do stage build
COPY --from=build /var/www/html /var/www/html

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expor porta do PHP-FPM
EXPOSE 9000

# Comando padrão para rodar PHP-FPM
CMD ["php-fpm"]
