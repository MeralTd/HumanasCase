# PHP 8.2 ve Apache imajını kullan
FROM php:8.2-apache

# Apache ve PHP için gerekli uzantıları yükle
RUN docker-php-ext-install pdo pdo_mysql

# Public ve backend dizinlerini kopyala
COPY ./public/ /var/www/html/
COPY ./data/ /var/www/html/data/
COPY ./helpers/ /var/www/html/helpers/

# COPY ./backend/ /var/www/html/backend/

# Apache config dosyasına güvenlik ayarları ekle
RUN echo '<Directory /var/www/html/>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Apache mod_rewrite'i etkinleştir
RUN a2enmod rewrite

# Dosya izinlerini ayarla (chmod komutu)
RUN chmod -R 755 /var/www/html && chown -R www-data:www-data /var/www/html

# Apache'yi başlat
CMD ["apache2-foreground"]
