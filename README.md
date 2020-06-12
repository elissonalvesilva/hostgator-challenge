# Hostgator Challenge Interview

## Tecnologies
 - Backend
   - PHP as Slim Framework 4
   - Eloquent ORM
   - Phinx
 - Frontend
   - React.js
   - Material UI

## Setup
Must be installed docker and docker-compose

  - On Windows
> https://docs.docker.com/docker-for-windows/install/
  - On Ubuntu
> https://docs.docker.com/engine/install/ubuntu/
  - On Macosx
> https://docs.docker.com/docker-for-mac/install/

 **If you use windows maybe you must to install _Make_**
> http://gnuwin32.sourceforge.net/packages/make.htm

## First Steps
#### Follow steps above:
  1. Run to build a container (<span style="color:red"> it may take a while to install if you don't have the image built </span>)
> make build
  - make build it's command to run a docker-compose.yml and it makes a images build as **_mysql_**, **_php-fpm_** (image docker to rum a slim framework) and **_nginx_**

  2. After build images you need to start all applications:
> make start
  - _make start_ starts the project using docker-compose

  3. After all applications up run:
> make up-data

  - _make up-data_ it's a command to run a seed to populate a database

  **Remember: All docker container must be up to run this command**

## How to use a API
**The API run at port 3000**

- GET
  - Health check
> http://localhost:3000/health

  - Products
> http://localhost:3000/products

  - Product by id
> http://localhost:3000/products/{id}

