# ... (Stage 1: Build - Sem alterações)

# =========================
# Stage 2: Production
# =========================
FROM php:8.1-fpm

# Instalar extensões PHP necessárias E Nginx
RUN apt-get update && apt-get install -y --no-install-recommends \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    nginx \
    # Adicionar supervisor para gerenciar PHP-FPM e Nginx
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Definir diretório da aplicação
WORKDIR /app

# Copiar todo o código + vendor + assets do stage de build
COPY --from=build /app /app

# Permissões
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# ---------------------------------------------
# Configurações Nginx, PHP-FPM e Supervisor
# ---------------------------------------------

# Criar um arquivo de configuração Nginx default
COPY .docker/nginx/default.conf /etc/nginx/sites-available/default
# Remover o link simbólico padrão e criar o nosso
RUN rm /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Ajustar a configuração do PHP-FPM para rodar em 8080 (opcional, mas bom se não usarmos o supervisor)
# Aqui usaremos a configuração padrão e o Nginx se comunicará com o PHP-FPM via unix socket ou porta 9000

# Adicionar a configuração do Supervisor
COPY .docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expor a porta do Nginx
EXPOSE 8080

# Rodar Supervisor para gerenciar Nginx e PHP-FPM
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]