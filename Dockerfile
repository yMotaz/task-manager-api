# Imagem base com PHP
FROM php:8.2-cli

# Instalar extensões necessárias (ex: pdo_mysql)
RUN docker-php-ext-install pdo pdo_mysql

# Copiar arquivos do projeto
WORKDIR /app
COPY . .

# Instalar dependências do Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev

# Expor a porta
EXPOSE 10000

# Comando para iniciar o servidor
CMD ["php", "-S", "0.0.0.0:10000", "-t", "src"]
