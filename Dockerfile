# =========================
# Stage 1: Build
# =========================
FROM php:8.1-fpm AS build

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl libonig-dev libxml2-dev libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev build-essential \
    zip nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Copiar todos os arquivos do projeto antes de instalar dependências
WORKDIR /app
COPY . .

# Criar diretórios necessários
RUN mkdir -p bootstrap/cache storage/framework storage/logs

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Instalar dependências PHP (agora o artisan já existe)
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Instalar dependências JS e gerar build do Vite
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
