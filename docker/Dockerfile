FROM debian

RUN apt-get update
#RUN apt-get install -y git
RUN apt-get install -y php
RUN apt-get install -y php-pear
RUN apt-get install -y php7.3-dev
RUN pecl channel-update pecl.php.net
RUN pecl install psr
RUN echo extension=psr.so | tee -a /etc/php/7.3/cli/php.ini
RUN apt-get install -y php-mysql
RUN apt-get install curl
RUN curl -s https://packagecloud.io/install/repositories/phalcon/stable/script.deb.sh | bash
RUN apt-get install php7.3-phalcon
RUN apt-get install -y composer
RUN composer global require phalcon/devtools

RUN mkdir /app
VOLUME /app
WORKDIR "/app"

CMD composer install
CMD ../root/.composer/vendor/phalcon/devtools/phalcon serve --port=8910

EXPOSE 8910



# docker build
# docker run --it --rm --volume ${PWD}:/php

# docker build --pull --tag mujvp ./test
# docker run --name example --rm --interactive --tty --volume ${PWD}:/application --port 8080:8910 example bash
# docker run --name mujvp --rm -i -t -v %cd%:/app -p 8910:8910 mujvp bash