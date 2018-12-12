FROM php:7.2-apache

RUN apt-get update && apt-get install git -y

COPY . /var/www/html
WORKDIR /var/www/html

RUN php composer.phar install

CMD ["apache2-foreground"]
