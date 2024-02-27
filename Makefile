up:
	docker-compose up
build:
	docker-compose build
build--no-cache:
	docker-compose build --no-cache
up-d:
	docker-compose up -d
down:
	docker-compose down -v
ssh:
	docker-compose exec app bash
watch:
	npm run watch
production:
	npm run production
