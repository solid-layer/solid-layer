FROM phalconphp/php-fpm:7-min
COPY ./install_composer.sh /install_composer.sh
RUN pecl install xdebug-2.4.0 \
    && echo "zend_extension=xdebug.so" > /usr/local/etc/php/conf.d/xdebug.ini \
    && docker-php-ext-install pdo pdo_mysql \
    && sh /install_composer.sh
