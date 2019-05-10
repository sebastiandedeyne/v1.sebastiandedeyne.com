@setup
    $root = '/home/forge/sebastiandedeyne.com';
    $branch = 'master';
    $releaseDir = "{$root}/releases/".date('Y-m-d-His');
@endsetup

@servers(['web' => ['forge@sebastiandedeyne.com']])

@task('deploy', ['on' => 'web'])
    @if($quick ?? false)
        cd $(ls -dt {{ $root }}/releases/* | head -n 1)
        git pull

        php artisan cache:clear
        php artisan responsecache:clear
        php artisan config:cache
        php artisan route:cache
    @else
        echo "Deploying new release: {{ $releaseDir }}"

        mkdir -p {{ $root }}/releases
        git clone -b {{ $branch }} git@github.com:sebastiandedeyne/sebastiandedeyne.com.git {{ $releaseDir }}

        cd {{ $releaseDir }}

        echo "Running composer..."
        composer install --no-dev --no-interaction --prefer-dist --quiet

        echo "Blessing new release..."
        rm -f {{ $root }}/current
        ln -s {{ $releaseDir }} {{ $root }}/current
        ln -s {{ $releaseDir }}/../../.env {{ $releaseDir }}/.env
        sudo service php7.2-fpm restart

        echo "Optimizing..."
        php artisan cache:clear
        php artisan responsecache:clear
        php artisan config:cache
        php artisan route:cache

        echo "Cleaning up old releases..."
        ls -dt {{ $root }}/releases/* | tail -n +3 | xargs -d "\n" rm -rf;
    @endif
@endtask
