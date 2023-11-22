FROM php:8.3.0RC2-apache

COPY ./src/ /var/www/html

RUN chmod -R 777 /var/www/html
