RELEASE_DIR := $(shell echo `pwd`/releases/`date +%Y-%m-%d-%H%M%S`)
BRANCH ?= "master"

deploy:
	@echo "Deploying new release: $(RELEASE_DIR)"

 	# Clone & checkout
	mkdir -p releases
	git clone -b $(BRANCH) git@github.com:sebastiandedeyne/sebastiandedeyne.com.git $(RELEASE_DIR)

	# Composer
	cd $(RELEASE_DIR) && \
		composer install --no-dev --no-interaction --prefer-dist

	# Yarn
	cd $(RELEASE_DIR) && \
		yarn && \
		yarn build

	# Bless
	rm -f current
	ln -s $(RELEASE_DIR) current
	ln -s $(RELEASE_DIR)/../../.env $(RELEASE_DIR)/.env
	sudo service php7.1-fpm restart

    # Optimize
	cd $(RELEASE_DIR) && \
		php artisan cache:clear && \
		php artisan responsecache:flush && \
		php artisan optimize && \
		php artisan config:cache && \
		php artisan route:cache

	# Cleanup
	ls -dt releases/* | tail -n +3 | xargs -d "\n" rm -rf;
