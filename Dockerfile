FROM php:8.3-cli

RUN pecl install swoole && \
    docker-php-ext-enable swoole
RUN docker-php-ext-install pdo_mysql pcntl opcache

RUN echo "opcache.enable_cli=1" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
RUN echo "opcache.jit=1205" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
RUN echo "opcache.jit_buffer_size=128M" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

ADD . /app
WORKDIR /app

RUN chown -R www-data:www-data /app
RUN usermod -u 1000 www-data

RUN mkdir -p /app/bootstrap/cache  /app/storage/framework/sessions /app/storage/framework/views /app/storage/framework/cache

RUN apt-get update -yqq > /dev/null && \
    apt-get install -yqq git unzip > /dev/null&& \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

COPY ./composer.json ./

RUN composer install -a --no-dev --quiet
RUN php artisan optimize

EXPOSE 8080

CMD php artisan octane:start --server=swoole --host=0.0.0.0 --port=8080
