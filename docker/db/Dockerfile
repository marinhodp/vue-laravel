FROM mysql:5.6

MAINTAINER Diego Marinho <diegomarinho.dev@outlook.com>

ENV MYSQL_ROOT_PASSWORD laravel123
ENV MYSQL_DATABASE laravel

COPY ./scripts/ /docker-entrypoint-initdb.d/
