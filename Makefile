APP=hero-battle
ENVIRONMENT=test
IMAGE_NAME=$(APP):$(ENVIRONMENT)

build-docker:
	docker build -t $(IMAGE_NAME) .

run-docker:
	docker run --rm -it $(IMAGE_NAME)

build-docker-compose:
	docker-compose build

run-docker-compose:
	docker-compose up

.PHONY: build-docker run-docker build-docker-compose run-docker-compose
