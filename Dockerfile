FROM php:7.3

RUN apt-get update && apt-get install -y git dnsutils && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN git clone https://github.com/fiberphp/fiber-ext.git /tmp/fiber

RUN (cd /tmp/fiber && phpize && ./configure && make && make install) && rm -r /tmp/fiber && docker-php-ext-enable fiber

RUN docker-php-ext-install sockets

WORKDIR /var/www/html