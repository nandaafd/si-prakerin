FROM thecodingmachine/php:7.4-v4-cli
ARG PHP_VER=7.4

#ENV APACHE_RUN_USER=www-data \
#    APACHE_RUN_GROUP=www-data \
ENV PHP_INI_MEMORY_LIMIT=1g \
    PHP_INI_UPLOAD_MAX_FILESIZE=1g \
    PHP_INI_POST_MAX_SIZE=1g \
    PHP_INI_MAX_EXECUTION_TIME=600 \
    PHP_INI_MAX_INTPUT_TIME=600 

ENV PHP_EXTENSIONS="gd intl mongodb imagick pgsql gettext imap uuid intl bcmath ldap"

RUN sudo apt-get update -y \
    && sudo apt-get install -y \
    php${PHP_VER}-dev \
    pkg-config \
    && sudo pecl config-set php_ini /etc/php/${PHP_VER}/apache2/php.ini \
    && sudo pecl install dbase-7.0.0beta1 \
    && echo "extension=dbase.so" |sudo tee  /etc/php/${PHP_VER}/cli/conf.d/ext-dbase.ini 
#    && echo "extension=dbase.so" |sudo tee  /etc/php/${PHP_VER}/apache2/conf.d/ext-dbase.ini

WORKDIR /var/www/html
#COPY --chown=www-data:www-data . /var/www/html
COPY . /var/www/html
RUN composer install
CMD [ "php", "artisan", "./serve", "--port=8080" ]
