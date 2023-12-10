FROM php:8.2.0-fpm-alpine

RUN apk add --update linux-headers

RUN apk add --update linux-headers --no-cache autoconf g++ make

RUN pecl install xdebug\
RUN rm -rf /tmp/pear \
RUN docker-php-ext-enable xdebug

RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql

# Use the default production configuration / rename
###RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY ./php/configuration /usr/local/etc/php


### default files in container
### /usr/local/etc/php/conf.d/docker-php-ext-pdo_pgsql.ini
### /usr/local/etc/php/ php.ini-development  php.ini-production

###ENV COMPOSER_ALLOW_SUPERUSER 1
###COPY --from=composer/composer:latest-bin /composer /usr/bin/composer


RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app
WORKDIR /app
USER app




### docker.internal.host for xdebug
COPY ./api-php-fpm/entrypoint.sh /usr/local/bin/docker-php-entrypoint.sh
RUN /usr/local/bin/docker-php-entrypoint

###RUN chmod +x /usr/local/bin/docker-php-entrypoint