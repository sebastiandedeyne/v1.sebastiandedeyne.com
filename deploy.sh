php artisan down

composer install --no-interaction --no-dev --prefer-dist

yarn
yarn run production

php artisan optimize
php artisan config:cache
php artisan responsecache:clear

php artisan up
