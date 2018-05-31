# My Personal Website

🔗 https://sebastiandedeyne.com

I'm open sourcing this because I don't see any reason not to.

## Specs & Features

- Built with [Laravel](https://laravel.com) 5.6
- Content is stored in markdown files with front matter, which are parsed with my own [`spatie/sheets`](https://github.com/spatie/sheets) package
- The site gets cached with the [`silber/page-cache`](https://github.com/JosephSilber/page-cache) package, you'll need to do some minimal server config to get this up and running
- Assets are built with [Webpack](https://webpack.js.org). JavaScript is transpiled with [Babel](https://babeljs.io/), CSS with [cssnext](http://cssnext.io/) & [Tailwind](https://tailwindcss.com/)
- I'm using [Envoy](https://laravel.com/docs/5.6/envoy) for zero downtime deployments
- The live site is hosted on a [Digital Ocean](https://digitalocean.com) droplet, provisioned with [Laravel Forge](https://forge.laravel.com)

## License

- The web application falls under the [MIT License](https://choosealicense.com/licenses/mit/)
- The content and design are under [exclusive copyright](https://choosealicense.com/no-license/)

If you'd like to reuse or repost something, feel free to hit me up at sebastiandedeyne@gmail.com. Please remember that the design is not meant to be forked!
