# Laravel Application to Learn About DDD, TDD and Cache with Redis, running app on Docker

## First steps
- Install composer on your machine
- run on terminal: `composer install`
- run on terminal `cp .env.example .env`
- run on terminal `php artisan key:generate`
- docker run -d -e MYSQL_ALLOW_EMPTY_PASSWORD=yes -v `<Caminho do Computador que deseja armazenar o banco>`:/var/lib/mysql mysql:5.7
- docker run --name redis -p 6379:6379 -d -t redis:alpine
- Change MySql Data from .env
- docker start redis
- create a database CacheStart
- run php artisan migrate

## To execute the application 
- run `docker-compose run -d`
- Run your api on 127.0.0.1:8000
