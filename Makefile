IMAGE=fiber

.PHONY: build
build:
	docker build --pull -t $(IMAGE) .
