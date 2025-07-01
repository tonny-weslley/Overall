FROM php:8.2-cli

RUN apt-get update && apt-get install -y git unzip zip npm procps
RUN docker-php-ext-install pcntl

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /usr/src/app

RUN composer global require laravel/installer
ENV PATH="/root/.composer/vendor/bin:${PATH}"
