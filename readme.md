# My personal website

## Specs & Features

- Built with [Laravel](https://laravel.com) 5.7
- Content is stored in markdown files with front matter, which are parsed with my own [`spatie/sheets`](https://github.com/spatie/sheets) package
- The site gets cached with the [`spatie/laravel-responsecache`](https://github.com/spatie/laravel-responsecache) package
- There's no JavaScript, and CSS isn't preprocessed (it gets minified by PHP). This means I don't need any asset build pipeline
- I'm using an [Envoy](https://laravel.com/docs/5.7/envoy) script for zero downtime deployments
- The live site is hosted on a [Digital Ocean](https://digitalocean.com) droplet, provisioned with [Laravel Forge](https://forge.laravel.com)

## License

- The web application falls under the [MIT License](https://choosealicense.com/licenses/mit/)
- The content and design are under [exclusive copyright](https://choosealicense.com/no-license/)

If you'd like to reuse or repost something, feel free to hit me up at sebastiandedeyne@gmail.com. Please remember that the design is not meant to be forked!
