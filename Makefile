.PHONY: install mock-up test-env test-run static-run

install:
	composer install

mock-up:
	./vendor/bin/phiremock

test-env:
	cp .env.test.dist .env.test

test-run: test-env
	./tests/_bin/run

static-run:
	./vendor/bin/phpcs
