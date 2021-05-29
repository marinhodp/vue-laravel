FROM php:7.3-apache

MAINTAINER Diego Marinho <diegomarinho.dev@outlook.com>

RUN apt update -y
RUN apt install -y \
  libpng-dev \
  libzip-dev \
  git

RUN docker-php-ext-install \
  mbstring \
  tokenizer \
  mysqli \
  pdo_mysql \
  gd \
  zip

RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
