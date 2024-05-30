FROM php:7.4.33-apache

RUN mkdir /var/www/html/public

RUN a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY ./conf/000-default.conf /etc/apache2/sites-available/000-default.conf

# Let's get compose in there...
RUN apt update
RUN apt install -y curl git unzip wget
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN cd ~
RUN wget https://getcomposer.org/installer
RUN mv installer composer-setup.php

RUN wget https://get.symfony.com/cli/installer -O - | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer

EXPOSE 80
