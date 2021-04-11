

#docker
docker build -t munck/oficinavirtual .
docker run -it -p 8080:80 munck/oficinavirtual

docker build -t oficinavirtualhabitat .

docker-compose build
docker network create oficinavirtualhabitat
docker-compose up -d


docker-compose build --no-cache
docker-compose rm -f
docker-compose up --build -d

docker exec -it DOCKER_CONTAINER_ID bin/bash