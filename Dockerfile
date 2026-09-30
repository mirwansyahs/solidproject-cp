FROM php:7.1-apache

# Mengalihkan repositori ke archive.debian.org karena PHP 7.1 menggunakan Debian lama (Stretch/Jessie)
RUN sed -i -E 's/(deb|security).debian.org/archive.debian.org/g' /etc/apt/sources.list && \
    sed -i -E '/jessie-updates/d' /etc/apt/sources.list && \
    sed -i -E '/stretch-updates/d' /etc/apt/sources.list && \
    sed -i '/buster/! s/http:\/\/?archive\.debian\.org/http:\/\/archive.debian.org/g' /etc/apt/sources.list && \
    echo "Acquire::Check-Valid-Until \"false\";" > /etc/apt/apt.conf.d/99no-check-valid-until

# Install dependencies yang dibutuhkan oleh ekstensi PHP dan CodeIgniter
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libicu-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Install ekstensi PHP
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) \
        mysqli \
        pdo_mysql \
        gd \
        intl \
        mbstring \
        xml

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Salin konfigurasi custom Apache agar AllowOverride aktif
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Sesuaikan DocumentRoot Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

WORKDIR /var/www/html