# =========================
# Dockerfile Laravel + Vite para Railway (PHP 8.1)
# =========================

# =========================
# Stage 1: Build (Criação dos Assets)
# =========================
FROM php:8.1-fpm AS assets_builder

# Instalar dependências do sistema e extensões PHP + Node/NPM
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

# ----------------------------
# 1. Composer
# ----------------------------

# Copiar arquivos do Composer (para aproveitar o cache do Docker)
COPY composer.json composer.lock ./

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# ----------------------------
# 2. NPM / Assets
# ----------------------------

# Copiar package.json e package-lock.json
COPY package*.json ./

# Instalar dependências Node
RUN npm install

# Copiar o restante do código (incluindo views, controllers, etc.)
COPY . .

# Gerar build dos assets (Vite + Tailwind/DaisyUI)
RUN npm run build


# =========================
# Stage 2: Production (com Nginx e Supervisor - Resolvendo o CSS)
# =========================
FROM php:8.1-fpm

# Instalar extensões PHP necessárias E Nginx e Supervisor
RUN apt-get update && apt-get install -y --no-install-recommends \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    nginx \        
    supervisor \   
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Definir diretório da aplicação
WORKDIR /app

# Copiar todo o código + vendor + assets do stage de build
COPY --from=assets_builder /app /app

# Permissões
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# ---------------------------------------------
# Configurações Nginx, PHP-FPM e Supervisor
# ---------------------------------------------

# Criar a pasta de sites do Nginx (se não existir)
RUN mkdir -p /etc/nginx/sites-available /etc/nginx/sites-enabled

# Copiar o arquivo de configuração Nginx default
COPY .docker/nginx/default.conf /etc/nginx/sites-available/default

# Remover o link simbólico padrão e criar o nosso
RUN rm -f /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Adicionar a configuração do Supervisor
COPY .docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expor a porta que o Nginx usará
EXPOSE 8080

# Rodar Supervisor para gerenciar Nginx e PHP-FPM (Processo principal)
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]