#Pull base image
FROM ubuntu:latest

ENV DEBIAN_FRONTEND=noninteractive

RUN apt update && apt-get -y install gnupg

RUN apt-key adv --keyserver hkp://keyserver.ubuntu.com --recv-keys 9578539176BAFBC6

#Install common tools
RUN apt-get update && apt-get install -y wget jq curl nano htop git unzip bzip2 software-properties-common locales acl

#Timezone
ENV TZ=Europe/Paris
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localetime && echo $TZ > /etc/timezone

#Set working directory
RUN mkdir -p /www/webdev_laravel/files
WORKDIR /www/webdev_laravel
RUN ln -s /www/webdev_laravel/files /www/files;
RUN git config --global --add safe.directory /www/webdev_laravel

#Install PHP
RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
RUN apt-get update && apt-get install -y php8.2-fpm php8.2-common php8.2-curl php8.2-mysql php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-gd php8.2-zip php8.2-odbc php8.2-sqlite3 tdsodbc php8.2-imap php8.2-intl php8.2-pcov php8.2-imagick

#### NGINX ###
#Config fpm to use TCP instead of unix socket
ADD docker/php/www.conf /etc/php/8.2/fpm/pool.d/www.conf
RUN mkdir -p /var/run/php

#Install Nginx
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys ABF5BD827BD9BF62
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 4F4EA0AAE5267A6C
RUN echo "deb http://nginx.org/packages/ubuntu/ trusty nginx" >> /etc/apt/sources.list
RUN echo "deb-src http://nginx.org/packages/ubuntu/ trusty nginx" >> /etc/apt/sources.list
RUN apt-get update

RUN apt-get install -y nginx

COPY docker/webdev_laravel_nginx /etc/nginx/sites-available/default

RUN mkdir -p /var/log/webdev_laravel
RUN chown www-data:www-data /var/log/webdev_laravel

###Composer && Laravel###
#Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install PHPUnit
RUN wget https://phar.phpunit.de/phpunit-9.phar
RUN chmod +x phpunit-9.phar
RUN mv phpunit-9.phar /usr/local/bin/phpunit

#Chrome
RUN wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
RUN apt-get update && apt-get -y install ./google-chrome-stable_current_amd64.deb

### Container config ###
EXPOSE 80

RUN echo "\
    #!/bin/sh\n\
    echo \"Starting services...\"\n\
    service php8.2-fpm start\n\
    nginx -g \"daemon off;\" &\n\
    echo \"Ready.\"\n\
    tail -s 1 /var/log/nginx/*.log -f\n\
    " > /start.sh

CMD ["sh", "/start.sh"]