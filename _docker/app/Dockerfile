FROM php:8.1-fpm

RUN docker-php-ext-install pdo_mysql
RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    # configure the GD extension to include support for JPEG and PNG image formats
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini




WORKDIR /var/www
