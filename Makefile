RELEASE_DIR := shell echo `pwd`/releases/`date +%Y-%m-%d-%H%M%S`
BRANCH ?= "master"

deploy:
	@echo "Deploying new release: $(RELEASE_DIR)"

 	# Clone & checkout
	mkdir -p releases
	git clone -b $(BRANCH) git@github.com:sebastiandedeyne/sebastiandedeyne.com.git $(RELEASE_DIR)

	# Composer
	cd $(RELEASE_DIR) && \
		composer install --no-interaction --prefer-dist

	# Yarn
	cd $(RELEASE_DIR) && \
		yarn && \
		yarn run build

	# Test
	cd $(RELEASE_DIR) && \
		./vendor/bin/phpunit

	# Optimize
	cd $(RELEASE_DIR) && \
		php artisan optimize && \
		php artisan config:cache && \
		php artisan route:cache

	# Bless
	rm -f $(RELEASE_DIR)/../current
	ln -s $(RELEASE_DIR) current
