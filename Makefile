init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up
clear: docker-down-clear
exec-fpm: docker-exec-fpm ###exit or crtl+c,ctrl+d - to exit container
composer: docker-exec-composer

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build --pull

docker-exec-fpm:
	docker exec -it laravel-learn-api-php-fpm-1 /bin/sh

docker-exec-composer:
	docker exec -it laravel-learn-composer-1 /bin/sh


