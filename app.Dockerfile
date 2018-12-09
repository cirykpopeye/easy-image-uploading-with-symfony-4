FROM php:7.2-apache
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update -y && apt-get upgrade -y && apt-get install -y git libpng-dev libpng-dev libjpeg62-turbo-dev libjpeg-dev zip libmagickwand-dev
RUN docker-php-ext-install zip pdo pdo_mysql gd
RUN pecl install imagick && docker-php-ext-enable imagick

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite