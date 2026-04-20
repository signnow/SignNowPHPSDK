.PHONY: install mock-up test-env tests test static

# Install the dependencies
install:
	composer install

# Raise local server to mock signNow API
mock-up:
	./vendor/bin/phiremock

# Create the test configuration file
test-env:
	cp .env.test.dist .env.test

# Run a single test by specified argument
# Example:
#   make test T=Document/DocumentTest.php
test: test-env
	./tests/_bin/run ${T}

# Run all the tests
tests: test-env
	./tests/_bin/run

# Run static code analysis
static:
	./vendor/bin/phpcs

# Run an example from examples/ directory
# Examples:
#   make example E=document/get_document.php
#   make examples
example:
	@if [ -z "$(E)" ]; then echo "Usage: make example E=example_path.php"; exit 1; fi
	./examples/_bin/run $(E)

# Run all examples
examples:
	./examples/_bin/run all
