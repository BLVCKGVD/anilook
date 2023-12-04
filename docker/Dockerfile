FROM ghcr.io/tohtamysh/php:4

ARG UID=${UID}
ARG GID=${GID}

RUN apk update \
    && apk upgrade \
    && apk add --no-cache openssl \
    && apk add --no-cache bash

RUN apk add shadow &&  \
    usermod -u ${UID} www-data &&  \
    groupmod -g ${UID} www-data


WORKDIR /var/www

RUN cd /usr/local/lib \
	&& wget https://composer.github.io/installer.sig -O - -q | tr -d '\n' > installer.sig \
	&& php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
	&& php -r "if (hash_file('SHA384', 'composer-setup.php') === file_get_contents('installer.sig')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
	&& php composer-setup.php \
	&& php -r "unlink('composer-setup.php'); unlink('installer.sig');" \
	&& mv /usr/local/lib/composer.phar /usr/local/bin/composer

EXPOSE 9000