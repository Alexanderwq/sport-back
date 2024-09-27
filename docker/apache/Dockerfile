FROM php:8.2-apache

# настройка модулей
RUN a2enmod rewrite

# установка composer
WORKDIR /root
COPY --from=composer:2.5.2 /usr/bin/composer /usr/bin/composer

# расширения PHP
RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle \
    libonig-dev \
    libxml2-dev \
    zip \
    sudo \
    unzip

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
#TODO: Установить xdebug
#RUN pecl install xdebug-3.1.6 && docker-php-ext-enable xdebug
#COPY xdebug.ini "${PHP_INI_DIR}/conf.d"


# установка document root
WORKDIR /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
