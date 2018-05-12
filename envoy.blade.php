@setup
    $dev = $dev ?? false;
    $quick = $quick ?? false;
    $root = $dev ? '/home/forge/dev.sebastiandedeyne.com' : '/home/forge/sebastiandedeyne.com';
    $branch = $dev ? 'dev' : 'master';
    $releaseDir = "{$root}/releases/".date('Y-m-d-His');
@endsetup

@servers(['web' => ['forge@sebastiandedeyne.com']])

@task('deploy', ['on' => 'web'])
    @if($quick)
        cd $(ls -dt {{ $root }}/releases/* | head -n 1)
        git pull

        php artisan cache:clear
        php artisan responsecache:flush
        php artisan config:cache
        php artisan route:cache
    @else
        echo "Deploying new release: {{ $releaseDir }}"

        mkdir -p releases
        git clone -b {{ $branch }} git@github.com:sebastiandedeyne/sebastiandedeyne.com.git {{ $releaseDir }}

        cd {{ $releaseDir }}

        echo "Running composer..."
        composer install --no-dev --no-interaction --prefer-dist --quiet

        echo "Running yarn..."
        yarn --frozen-lockfile --silent
        yarn production

        echo "Blessing new release..."
        rm -f {{ $root }}/current
        ln -s {{ $releaseDir }} {{ $root }}/current
        ln -s {{ $releaseDir }}/../../.env {{ $releaseDir }}/.env
        sudo service php7.1-fpm restart

        echo "Optimizing..."
        php artisan cache:clear
        php artisan responsecache:flush
        php artisan config:cache
        php artisan route:cache
        php artisan warm

        echo "Cleaning up old releases..."
        ls -dt {{ $root }}/releases/* | tail -n +3 | xargs -d "\n" rm -rf;
    @endif
@endtask
