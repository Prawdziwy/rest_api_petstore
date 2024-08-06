#!/bin/sh

# Install Composer dependencies
composer install

# Generate key for the application
php artisan key:generate

# Run migrations
php artisan migrate

# Enable the application
php artisan serve --host=0.0.0.0 --port=80