php artisan down

composer install --no-interaction --no-dev --prefer-dist

yarn
./node_modules/.bin/webpack -p

php artisan optimize
php artisan config:cache
php artisan responsecache:clear

php artisan up
