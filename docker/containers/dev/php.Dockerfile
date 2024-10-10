FROM php:8.2-fpm-alpine

RUN apk add --no-cache --virtual build-dependencies icu-dev libpq-dev libzip-dev zip libxml2-dev $PHPIZE_DEPS \
    && apk add --update linux-headers \
    && docker-php-ext-install -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) mysqli opcache pdo pdo_pgsql pgsql pdo_mysql zip xml fileinfo exif

RUN sed -i 's/access.log = \/proc\/self\/fd\/2/access.log = \/proc\/self\/fd\/1/g' /usr/local/etc/php-fpm.d/docker.conf
