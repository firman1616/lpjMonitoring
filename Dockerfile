# Gunakan PHP 8.1 FPM
FROM php:8.1-fpm

# Install dependencies sistem untuk PostgreSQL dan library lainnya
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl

# Install dan aktifkan ekstensi PHP
# Tambahkan 'pgsql' di baris docker-php-ext-install
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        bcmath \
        zip \
        mysqli \
        pdo \
        pdo_mysql \
        pgsql \
        pdo_pgsql

# Set working directory
WORKDIR /var/www/html

# Salin kode sumber
COPY . .

EXPOSE 9000
CMD ["php-fpm"]