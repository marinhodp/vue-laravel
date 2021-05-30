Install
----------------
docker-compose -f docker/docker-compose.yml up -d
docker exec api composer install
docker exec site npm install
docker exec site npm run build

Running at
----------------
http://localhost:8003
