FROM php:8.2.4-apache
RUN docker-php-ext-install mysqli
COPY src/ /var/www/html/
