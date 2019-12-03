# Powered by https://makefiles.dev/

-include .makefiles/Makefile
-include .makefiles/pkg/php/v1/Makefile

.makefiles/%:
	@curl -sfL https://makefiles.dev/v1 | bash /dev/stdin "$@"

################################################################################

.DEFAULT_GOAL := examples

EXAMPLE_DIRS := $(shell find example -type d -path 'example/*' -prune 2> /dev/null)
EXAMPLES := $(EXAMPLE_DIRS:example/%=example-%)
EXAMPLE_VENDORS := $(addsuffix /vendor,${EXAMPLE_DIRS})

.PHONY: ci-install
ci-install: vendor $(EXAMPLE_VENDORS)

.PHONY: ci
ci:: examples

.PHONY: examples
examples: $(EXAMPLES)

.PHONY: example-%
example-%: example/%/vendor $(PHP_SOURCE_FILES)
	example/$*/run

################################################################################

example/%/vendor: example/%/composer.lock
	composer --working-dir="$(@D)" install $(PHP_COMPOSER_INSTALL_ARGS)

example/%/composer.lock: example/%/composer.json
ifeq ($(wildcard $@),)
	composer --working-dir="$(@D)" install $(PHP_COMPOSER_INSTALL_ARGS)
else
	composer --working-dir="$(@D)" validate $(_PHP_COMPOSER_VALIDATE_ARGS) && touch "$@"
endif
