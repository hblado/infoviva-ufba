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
    && docker-php-ext-install pdo_mysql mbstring exif **bcmath** gd zip \
    && rm -rf /var/lib/apt/lists/*

# Definir diretório da aplicação
WORKDIR /app

# ----------------------------
# 1. Composer
# ----------------------------

# Copiar arquivos do Composer (para otimizar o cache da camada)
COPY composer.json composer.lock ./

# Copiar todo o código-fonte (NECESSÁRIO para o composer install e build)
COPY . .

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# ----------------------------
# 2. NPM / Assets (AJUSTADO PARA BUILD ROBUSTO)
# ----------------------------

# Limpar instalações antigas e garantir um build limpo
RUN rm -rf node_modules

# Instalar dependências Node 
RUN npm install

# Gerar build dos assets (Vite + Tailwind/DaisyUI). 
# Usamos 'env -i' para garantir que o build ignore variáveis de ambiente problemáticas.
RUN env -i npm run build


# =========================
# Stage 2: Production (com Nginx e Supervisor)
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
    && docker-php-ext-install pdo_mysql mbstring exif pcntl **bcmath** gd zip \
    && rm -rf /var/lib/apt/lists/*

# Definir diretório da aplicação
WORKDIR /app

# Copiar todo o código + vendor + assets do stage de build
COPY --from=assets_builder /app /app

# ---------------------------------------------
# Configuração de Logs e Permissões de Run-time (CORRIGIDO)
# ---------------------------------------------

# Permissões do Laravel (Storage e Cache)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache 

# Cria o DIRETÓRIO /var/log/fpm e garante permissão ao www-data
RUN mkdir -p /var/log/fpm && chown -R www-data:www-data /var/log/fpm 

# Permissão do Socket Unix /var/run (para outras finalidades)
RUN chown -R www-data:www-data /var/run 

# ---------------------------------------------
# Configurações Nginx, PHP-FPM e Supervisor
# ---------------------------------------------

# Copiar a configuração do PHP-FPM (para usar Socket Unix)
COPY .docker/php-fpm/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

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
