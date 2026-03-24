FROM php:8.2-apache

# Zkopíruj obsah složky nabijeni do výchozího webrootu
COPY nabijeni/ /var/www/html/

# Povolit mod_rewrite (volitelné, pokud používáš přepisování URL)
RUN a2enmod rewrite

# Potlačit hlášku ohledně ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Nastavit oprávnění
RUN chown -R www-data:www-data /var/www/html
