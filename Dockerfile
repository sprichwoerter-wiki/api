# Start with the official PHP image with FPM
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    intl \
    zip \
    opcache

# Set the working directory
WORKDIR /var/www/symfony

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy the application code to the image
COPY . /var/www/symfony

# Ensure the var directory exists
RUN mkdir -p /var/www/symfony/var && \
    chown -R www-data:www-data /var/www/symfony/var

# Set permissions for the Symfony var directory
RUN chown -R www-data:www-data /var/www/symfony/var

# Expose port 8000 for PHP-FPM
EXPOSE 8000

# Start PHP-FPM in the foreground
CMD ["php-fpm"]
