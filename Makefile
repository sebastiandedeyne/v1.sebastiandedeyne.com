RELEASE_DIR := $(shell echo `pwd`/releases/`date +%Y-%m-%d-%H%M%S`)

deploy:
	@echo "Deploying new release: RELEASE_DIR"
	@$(MAKE) checkout
	@$(MAKE) composer
	@$(MAKE) yarn
	@$(MAKE) optimize
	@$(MAKE) bless

checkout:
	mkdir -p releases
	git clone git@github.com:sebastiandedeyne/sebastiandedeyne.com.git RELEASE_DIR

composer:
	cd RELEASE_DIR && \
		composer install --no-interaction --prefer-dist

yarn:
	cd RELEASE_DIR && \
		yarn && \
		yarn run build

test:
	cd RELEASE_DIR && \
		./vendor/bin/phpunit

optimize:
	cd RELEASE_DIR && \
		php artisan optimize && \
		php artisan config:cache && \
		php artisan route:cache

bless:
	rm -f RELEASE_DIR/../current
	ln -s RELEASE_DIR current
