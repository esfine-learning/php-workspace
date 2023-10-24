FROM php:8.2-apache

# apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod deflate expires rewrite

# php
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./php.ini /usr/local/etc/php/php.ini
RUN chmod 644 /usr/local/etc/php/php.ini

# php composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /workspace
