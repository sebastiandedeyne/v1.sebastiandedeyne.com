php artisan down

# There's an issue that's causing yarn to modify the lock file on server
git checkout yarn.lock 
git pull origin master

composer install --no-interaction --no-dev --prefer-dist

yarn
./node_modules/.bin/webpack -p

php artisan optimize
php artisan responsecache:clear

php artisan up
