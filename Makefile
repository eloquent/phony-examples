.PHONY: examples
examples:
	example/install-all
	example/run-all

.PHONY: lint
lint: install
	vendor/bin/php-cs-fixer fix

.PHONY: install
install:
	composer install
