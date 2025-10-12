# =========================
# Dockerfile Laravel + Node para Railway
# =========================

# -------------------------
# 1. Base image com PHP e extensões necessárias
# -------------------------
FROM php:8.1-fpm

# -------------------------
# 2. Instalar dependências do sistema
# -------------------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# -------------------------
# 3. Instalar Composer globalmente
# -------------------------
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# -------------------------
# 4. Definir diretório da aplicação
# -------------------------
WORKDIR /var/www/html

# -------------------------
# 5. Copiar arquivos da aplicação
# -------------------------
COPY . .

# -------------------------
# 6. Instalar dependências PHP e Node
# -------------------------
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist \
    && npm install \
    && npm run build

# -------------------------
# 7. Configurar permissões
# -------------------------
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# -------------------------
# 8. Rodar migrations (opcional)
#    Se você quiser rodar migrations durante o deploy, descomente a linha abaixo
# -------------------------
# RUN php artisan migrate --force

# -------------------------
# 9. Configurar Laravel para ser servido
# -------------------------
# O Railway disponibiliza a porta via variável de ambiente PORT
ENV APP_PORT=${PORT:-8080}

# -------------------------
# 10. Comando final de execução
# -------------------------
CMD php artisan serve --host=0.0.0.0 --port=$APP_PORT
