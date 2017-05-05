FROM phalconphp/php-fpm:7-min
RUN pecl install xdebug-2.4.0 \
    && echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && docker-php-ext-install pdo pdo_mysql
