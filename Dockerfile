# PHP 8.2 ve Apache imajını kullan
FROM php:8.2-apache

# PHP uzantılarını ekle
RUN docker-php-ext-install pdo pdo_mysql

# Public dizinini kopyala
COPY ./public/ /var/www/html/
COPY ./backend/ /var/www/html/backend/
