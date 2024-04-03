FROM php:8.3-fpm

WORKDIR /shinago

RUN apt-get update

RUN apt-get install -y curl git zip unzip

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80
