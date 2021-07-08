FROM ubuntu:latest

RUN  echo "Asia/Kolkata" > /etc/timezone
RUN apt-get update -y
RUN apt-get install -y tzdata
RUN apt-get install -y vim
RUN apt-get install net-tools -y
RUN apt-get install -y  apache2  \
    libapache2-mod-php \
    php-memcached \
    libz-dev libmemcached-dev \
    memcached libmemcached-tools \
    telnet \
    netcat
#RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

COPY memcached.conf  /etc/
COPY info.php /var/www/html/
COPY test_memcached.php /var/www/html/
COPY memcached.ini  /etc/php/7.4/mods-available/

#FROM php:7.1.9-fpm

EXPOSE 80

CMD ["apachectl", "-D",  "FOREGROUND"]
#CMD ["/usr/sbin/apache2", "-D",  "FOREGROUND"]
