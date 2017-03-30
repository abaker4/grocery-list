FROM ubuntu:trusty
RUN apt-get update && apt-get install php5 php5-json php5-mysql php5-mongo php5-memcached php5-xdebug -y
RUN apt-get install php5-dev make php-pear -y

ADD . /code

