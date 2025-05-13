# Resmi PHP Apache imajını kullan
FROM php:8.2-apache

# Gerekli PHP uzantılarını kur (örneğin curl)
RUN docker-php-ext-install pdo pdo_mysql

# Dosyaları Apache web dizinine kopyala
COPY public/ /var/www/html/
