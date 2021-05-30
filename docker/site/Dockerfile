FROM httpd:2.4-alpine

MAINTAINER Diego Marinho <diegomarinho.dev@outlook.com>

RUN apk add --update nodejs npm
RUN mkdir /usr/local/apache2/htdocs/dist

COPY ./httpd.conf /usr/local/apache2/conf/httpd.conf

WORKDIR /usr/local/apache2/htdocs/dist
