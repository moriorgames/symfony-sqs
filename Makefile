VERSION = $(shell git describe --tags --always --dirty)
BRANCH = $(shell git rev-parse --abbrev-ref HEAD)
CONTAINER = symfony-sqs

.PHONY: help shell stop

all: help

help:
	@echo
	@echo "VERSION: $(VERSION)"
	@echo "BRANCH: $(BRANCH)"
	@echo
	@echo "usage: make <command>"
	@echo
	@echo "commands:"
	@echo "    shell            - Create docker container and enter the container"
	@echo "    stop             - Stop and remove the container
	@echo

shell:
	@docker exec -ti $(CONTAINER) sh

stop:
	@docker stop $(CONTAINER) && @docker rm $(CONTAINER)
