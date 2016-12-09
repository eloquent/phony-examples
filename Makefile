examples: install
	example/run-all

lint: php-cs-fixer
	./php-cs-fixer fix --using-cache no

install: vendor/autoload.php

.PHONY: examples lint install

vendor/autoload.php: composer.lock
	composer install

composer.lock: composer.json
	composer update

php-cs-fixer:
	curl -sSL https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v2.0.0/php-cs-fixer.phar -o php-cs-fixer
	chmod +x php-cs-fixer
