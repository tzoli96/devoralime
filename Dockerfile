FROM php:8.1-apache
COPY . /var/www/html/
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y libzip-dev zip && docker-php-ext-install zip
RUN apt-get update && apt-get install -y unzip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install
