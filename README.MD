# Vue-Laravel

A sample CRUD aplication using Vuejs, Laravel and MySql running on Docker containers.

## Installation

`docker-compose -f docker/docker-compose.yml up -d`

`docker exec api composer install`

`docker exec site npm install`

`docker exec site npm run build`

## Running at

http://localhost:8003
