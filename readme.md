# My Personal Website

🔗 https://sebastiandedeyne.com

I'm open sourcing this because I don't see any reason not to.

## Specs & Features

- Built with [Laravel](https://laravel.com) 5.5
- Content is stored in markdown files with front matter, which are parsed with my own [`spatie/yaml-front-matter`](https://github.com/spatie/yaml-front-matter) package
- This site's pretty fast thanks to [`spatie/laravel-responsecache`](https://github.com/spatie/laravel-responsecache), [Turbolinks](https://github.com/turbolinks/turbolinks) and various other optimizations like http2, gzip, and the right headers for caching
- Assets are built with [Webpack](https://webpack.js.org). JavaScript is transpiled with [Babel](https://babeljs.io/), CSS with [cssnext](http://cssnext.io/)
- I'm using a Makefile for zero downtime deployments, which runs in the background whenever I push something to master
- The live site is hosted on a [Digital Ocean](https://digitalocean.com) droplet, provisioned with [Laravel Forge](https://forge.laravel.com)

## License

- The web application falls under the [MIT License](https://choosealicense.com/licenses/mit/)
- The content and design are under [exclusive copyright](https://choosealicense.com/no-license/)

If you'd like to reuse or repost something, feel free to hit me up at sebastiandedeyne@gmail.com.
