# Usa a imagem que você já tem: php:8.2-cli
FROM php:8.2-cli

# Instala dependências das extensões
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libicu-dev libonig-dev libxml2-dev curl \
 && docker-php-ext-install pdo_mysql intl zip \
 && rm -rf /var/lib/apt/lists/*

# Instala Composer (global)
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# Diretório de trabalho (código montado por volume)
WORKDIR /var/www/html

# Porta usada pelo "php artisan serve"
EXPOSE 8000

# Comando padrão: instalar dependências e rodar o servidor
CMD ["bash", "-c", "cd /var/www/html/app && composer install --no-interaction && php artisan serve --host=0.0.0.0 --port=8000"]
