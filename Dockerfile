FROM debian:buster

COPY . /var/www/onde_estou

WORKDIR /var/www/onde_estou

# Instalação de dependências
RUN apt update \
    && apt install -y \
       wget \
       gnupg2 \
       curl \
       unzip \
       libzip-dev \
       git

# Configuração do repositório PHP
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && sh -c 'echo "deb https://packages.sury.org/php/ buster main" > /etc/apt/sources.list.d/php.list' \
    && apt update

# Instalação do PHP e extensões
RUN apt install -y \ 
    php8.3 \
    php8.3-cli \
    php8.3-fpm \
    php8.3-mbstring \
    php8.3-gd \
    php8.3-zip \
    php8.3-xml \
    php8.3-curl \
    php8.3-xdebug \
    php8.3-pdo \
    php8.3-pgsql

# Configuração do Xdebug
RUN echo "xdebug.mode=debug" >> /etc/php/8.3/cli/conf.d/20-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /etc/php/8.3/cli/conf.d/20-xdebug.ini \
    && echo "xdebug.client_host=172.17.0.1" >> /etc/php/8.3/cli/conf.d/20-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /etc/php/8.3/cli/conf.d/20-xdebug.ini

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Instalação do Node.js
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

EXPOSE 8000
