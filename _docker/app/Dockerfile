FROM php:8.1-fpm

RUN docker-php-ext-install pdo_mysql

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini




WORKDIR /var/www