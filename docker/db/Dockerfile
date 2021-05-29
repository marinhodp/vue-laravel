FROM mysql:5.6

ENV MYSQL_ROOT_PASSWORD laravel123
ENV MYSQL_DATABASE laravel

COPY ./scripts/ /docker-entrypoint-initdb.d/
