FROM php:8.2-cli-alpine


RUN apk add --update linux-headers

RUN apk add --update linux-headers --no-cache autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql

RUN apk add --no-cache unzip

# Use the default production configuration / rename
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ./php/configuration /usr/local/etc/php
##COPY ./php/security/conf.d /usr/local/etc/php/conf.d
###COPY ./php/conf.d /usr/local/etc/php/conf.d
### php.ini file copy
#COPY ./php/configuration /usr/local/etc/php
#COPY ./php/configuration /usr/local/etc/php/conf.d

###ENV COMPOSER_ALLOW_SUPERUSER 1


COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app
WORKDIR /app
USER app


