# Dockerfile
FROM php:7.4-fpm

EXPOSE 80
WORKDIR /var/www

ARG user
ARG uid

RUN apt-get update && apt-get install

RUN apt-get install --reinstall bash

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP Extensions
RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql mysqli
#COPY docker/php.ini /usr/local/etc/php/conf.d/app.ini

#apache2 conf
#COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
#COPY docker/apache.conf /etc/apache2/conf-available/z-app.conf

#project
COPY src /var/www
