ARG PHP_VERSION=7.1.11-fpm-alpine
ARG XDEBUG_VERSION=2.5.5
FROM php:${PHP_VERSION}

# Instalando extensões necessárias do PHP
RUN apk add --update --no-cache \
        alpine-sdk autoconf curl curl-dev freetds-dev \
        libxml2-dev jpeg-dev openldap-dev libmcrypt-dev \
        libpng-dev libxslt-dev postgresql-dev \
    && rm /var/cache/apk/*
RUN docker-php-ext-configure ldap --with-ldap=/usr
RUN docker-php-ext-configure xml --with-libxml-dir=/usr
RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include --with-png-dir=/usr/include
RUN docker-php-ext-install \
    bcmath calendar curl dom fileinfo gd hash json ldap mbstring mcrypt \
    mysqli pgsql pdo pdo_dblib pdo_mysql pdo_pgsql sockets xml xsl zip

# Instalando o Git (Composer usa para baixar alguns pacotes)
RUN apk add --update --no-cache git && rm /var/cache/apk/*
