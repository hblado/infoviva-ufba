# ===============================
# Etapa 1: Build (Composer + Vite)
# ===============================
FROM node:20-slim AS build

WORKDIR /app

# Copiar arquivos
COPY package*.json vite.config.js ./
COPY composer.json composer.lock ./
COPY resources ./resources
COPY public ./public
COPY routes ./routes
COPY database ./database
COPY artisan ./
COPY bootstrap ./bootstrap
COPY config ./config

# Instalar PHP + Composer (temporário para build)
RUN apt-get update && apt-get install -y php-cli php-mbstring php-xml php-bcmath php-curl unzip git curl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependências e gerar build
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN npm install && npm run build

# ===============================
# Etapa 2: Produção (Nginx + PHP-FPM)
# ===============================
FROM php:8.2-fpm-bullseye

WORKDIR /app

# Instalar dependências do sistema e supervisor
RUN apt-get update && apt-get install -y nginx supervisor libpng-dev libjpeg-dev libfreetype6-dev zip git curl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql bcmath gd && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copiar arquivos do build stage
COPY --from=build /app /app

# Criar diretórios necessários
RUN mkdir -p bootstrap/cache storage/framework storage/logs && \
    chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Copiar configs
COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY .docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Limpeza e otimização
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan optimize

EXPOSE 8080

# Comando final
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
