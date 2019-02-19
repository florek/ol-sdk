FROM php:7.1-cli

# Update system and install required packages
ENV DEBIAN_FRONTEND noninteractive

# Common tools
RUN \
    apt-get -y update && \
    apt-get -y install curl wget autoconf file build-essential pkg-config re2c

RUN apt-get update && apt-get install -y --no-install-recommends libzip-dev
RUN pecl install zip && docker-php-ext-enable zip

# Composer
RUN curl -sS https://getcomposer.org/installer | /usr/local/bin/php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir -p /usr/local/share/open-loyalty-php-sdk

ADD ./ /usr/local/share/open-loyalty-php-sdk

WORKDIR /usr/local/share/open-loyalty-php-sdk

# Composer
RUN composer -n --no-ansi --no-scripts install

# Run tests
CMD ./vendor/bin/phpunit