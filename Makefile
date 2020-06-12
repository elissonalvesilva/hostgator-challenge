.PHONY: build start stop remove

SHELL := /bin/bash
# branch := $(shell git branch | grep \* | cut -d ' ' -f2)
CONTAINER_API_NAME := hostgator-api
CONTAINER_FRONT_NAME := hostgator-front

build:
	docker-compose build
	cd ./hostgator-api && composer install

start:
	docker-compose up
	up-data

stop:
	docker-compose down

up-data:
	cd hostgator-api/ && vendor/bin/phinx migrate
	cd hostgator-api/ && vendor/bin/phinx seed:run