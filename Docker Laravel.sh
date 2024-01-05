Docker Laravel

#buildar a imagem do container
docker build -t onde_estou_app .

#criar o container
#windows
docker run --name "onde_estou_app" -v C:\workspace\onde_estou_app:/var/www/onde_estou_app -d -p 8000:8000 -it onde_estou_app

#linux
docker run --name "onde_estou_app" -v /home/pedro/workspace:/var/www/onde_estou_app -d -p 8000:8000 -it onde_estou_app

#acessar o container
docker exec -it onde_estou_app /bin/bash

composer install // composer create-project laravel/laravel .

php artisan serve --host=0.0.0.0 --port=8000

composer create-project --prefer-dist laravel/laravel .




Dockerfile_db

docker build -t onde_estou_db .
docker run -d -p 5432:5432 --name onde_estou_db onde_estou_db


Network
docker network create onde_estou_net_work

docker network connect onde_estou_network onde_estou_app
docker network connect onde_estou_network onde_estou_db


DB_CONNECTION=pgsql
DB_HOST=onde_estou_db
DB_PORT=5432
DB_DATABASE=onde_estou
DB_USERNAME=admin
DB_PASSWORD="aB7tR#kL*2qP!9oZ5xY%3wFv&1sC@d8E6uG4iH0nM+pX"