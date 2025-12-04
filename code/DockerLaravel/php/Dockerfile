FROM php:8.2-fpm
RUN apt-get install git curl zip
RUN docker-php-ext-install pdo_mysql
COPY --from=composer /usr/bin/composer
WORKDIR /var/www/html
RUN chown -R www-data:www-data