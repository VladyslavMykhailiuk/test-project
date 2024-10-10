FROM php:8.2-fpm-alpine

# Install dependencies
RUN apk add --no-cache --virtual build-dependencies icu-dev libpq-dev libzip-dev zip libxml2-dev $PHPIZE_DEPS \
    && apk add --update linux-headers \
    && docker-php-ext-install -j$(grep -c ^processor /proc/cpuinfo 2>/dev/null || echo 1) mysqli opcache pdo pdo_pgsql pgsql pdo_mysql zip xml fileinfo exif

# Modify access log
RUN sed -i 's/access.log = \/proc\/self\/fd\/2/access.log = \/proc\/self\/fd\/1/g' /usr/local/etc/php-fpm.d/docker.conf


# Copy wait-for-it script
COPY wait-for-it.sh /usr/local/bin/wait-for-it.sh

# Copy the entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

# Give execution rights
RUN chmod +x /usr/local/bin/wait-for-it.sh

# Give execution rights
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set the entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
