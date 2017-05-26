FROM php:7.1.5-fpm

RUN apt-get update && docker-php-ext-install pdo pdo_mysql
