FROM bitnami/php-fpm:latest

# Create app directory and make it an active directory
WORKDIR /app

# Copy local files and directory to docker
COPY . .

# Download and install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run composer to download phpunit 9
RUN composer require --dev phpunit/phpunit ^9