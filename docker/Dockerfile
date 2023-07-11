FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y \
    git \
    libcurl4-openssl-dev \
    && docker-php-ext-install pdo pdo_mysql curl mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY ./ /var/www/html