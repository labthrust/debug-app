FROM php:8-apache

RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y zlib1g-dev libzip-dev

RUN a2enmod rewrite \
    && docker-php-ext-install zip

WORKDIR /var/www/html

RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

ARG BUILD_TIME_VAR_1
ARG BUILD_TIME_VAR_2
ARG BUILD_TIME_VAR_3
ADD env.php .
RUN php env.php > env.json

RUN apt-get install -y git && \
    git config --global --add safe.directory /var/www/html && \
    git branch --show-current > branch.txt && \
    git log -n 1 "--pretty=format:commitHash:::%H|||subject:::%s|||refs:::%D|||date:::%cI|||committerName:::%cN|||authorName:::%aN" > commit.txt

EXPOSE 8080

CMD [ "apachectl", "-D", "FOREGROUND" ]
