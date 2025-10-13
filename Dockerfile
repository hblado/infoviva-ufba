# =========================
# Dockerfile Laravel + Vite para Railway (PHP 8.1)
# Versão Final com Nginx/Supervisor para servir assets
# =========================

# =========================
# Stage 1: Build (Criação de Vendor e Assets)
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
# 1. Composer (ORDEM CORRIGIDA)
# ----------------------------

# Copiar arquivos do Composer (para otimizar o cache da camada)
COPY composer.json composer.lock ./

# Copiar todo o código-fonte (NECESSÁRIO para o composer install)
COPY . .

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# ----------------------------
# 2. NPM / Assets
# ----------------------------

# Instalar dependências Node (package.json e package-lock.json já estão aqui devido ao 'COPY . .')
RUN npm install

# Gerar build dos assets (Vite + Tailwind/DaisyUI). Os arquivos vão para public/build
RUN npm run build


# =========================
# Stage 2: Production (com Nginx e Supervisor - RESOLVE O CSS)
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

# Permissões da aplicação
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# ---------------------------------------------
# Configuração de Log e Permissões Adicionais (Novo!)
# ---------------------------------------------
# Cria o diretório de logs e o arquivo, dando permissão ao www-data
RUN mkdir -p /var/log/fpm && touch /var/log/fpm/php-fpm.log && chown -R www-data:www-data /var/log/fpm

# ---------------------------------------------
# Configurações Nginx, PHP-FPM e Supervisor
# ---------------------------------------------
COPY .docker/php-fpm/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

# ---------------------------------------------
# Configurações Nginx, PHP-FPM e Supervisor
# ---------------------------------------------

# Criar a pasta de sites do Nginx 
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