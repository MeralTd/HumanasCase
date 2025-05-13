FROM php:8.2-apache

WORKDIR /var/www/html

COPY backend/ /var/www/html/

RUN docker-php-ext-install pdo pdo_mysql



# Apache yapılandırması (gerekirse)
# Eğer özel bir Apache yapılandırmanız varsa, bu satırları kullanabilirsiniz
COPY apache2.conf /etc/apache2/apache2.conf
RUN a2enmod rewrite

# İzinleri ayarlayın (gerekirse)
# Projenizin gerektirdiği dizinlere yazma izni vermek için
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Apache'yi ön planda çalıştırın
CMD ["apache2-foreground"]