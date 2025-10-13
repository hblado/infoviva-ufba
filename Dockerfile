# =========================
# Dockerfile Laravel + Vite para Railway (PHP 8.1)
# =========================

# =========================
# Stage 1: Build
# =========================
FROM php:8.1-fpm AS assets_builder

# Instalar dependências do sistema e extensões PHP
# ... (restante do código do Stage 1) ...

# Gerar build dos assets (Vite + Tailwind/DaisyUI)
RUN npm run build

# =========================
# Stage 2: Production
# =========================
FROM php:8.1-fpm

# Instalar extensões PHP necessárias
# ... (restante do código do Stage 2) ...

# Definir diretório da aplicação
WORKDIR /app

# Copiar todo o código + vendor + assets do stage de build
COPY --from=assets_builder /app /app <-- Altere aqui para 'assets_builder'

# Permissões
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Expor porta do Railway
EXPOSE 8080

# Rodar PHP-FPM em foreground (produção)
CMD ["php-fpm"]