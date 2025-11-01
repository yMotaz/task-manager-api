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
    && composer install --no-dev --optimize-autoloader

# Expor a porta (Render usa a variável PORT internamente)
EXPOSE 10000

# Comando para iniciar o servidor (usando shell para expandir ${PORT})
CMD sh -c "php -S 0.0.0.0:${PORT} -t . index.php"
