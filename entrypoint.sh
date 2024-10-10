#!/bin/sh

# Wait for MySQL to be ready
/usr/local/bin/wait-for-it.sh mysql:3306

# Run migrations
php backend/database/migrate.php

# Run seeders
php backend/database/seed.php

# Start PHP-FPM
exec docker-php-entrypoint php-fpm
