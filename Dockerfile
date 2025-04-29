FROM php:7.3.3-apache
RUN docker-php-ext-install mysqli pdo_mysql session gd mbstring json curl openssl zip xml imap exif
