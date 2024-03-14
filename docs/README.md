# Docker app

After clone the project need with dockerfile

```bash
docker build -t onde_estou_app .
```

after create a image, need make the container

windows
```bash
docker run --name "onde_estou_app" -v C:\workspace\onde_estou_app:/var/www/onde_estou_app -d -p 8000:8000 -it onde_estou_app
```

linux
```bash
docker run --name "onde_estou_app" -v /home/pedro/workspace:/var/www/onde_estou_app -d -p 8000:8000 -it onde_estou_app
```

## Usage

```bash
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
```



user

    id (pk)
    name (string)
    email->unique();
    email_verified_at->nullable();
    password (string);

empresa
    id (pk)
    nome da empresa (string, 100 caracteres)
    filial (not-null, int, caso seja a empresa matriz ele vai 0, caso seja filial ele vai o id da matriz)
setor
    id (pk)
    nome (string 100 caracteres)
    empresa.id (fk)

onde estou
    user.id (fk)
    empresa.id (fk)
    setor.id (fk)
    data hora (date time)
    previsao de retorno (date time)



php artisan make:migration sectors
php artisan make:migration companies
php artisan make:migration where_am_i


Criar rotas + logicas


