const mix = require('laravel-mix');
require('laravel-mix-purgecss');

const browsers = ['>0.25%', 'not ie 11', 'not op_mini all'];

mix
  .js('resources/assets/js/app.js', 'public/js')
  .postCss('resources/assets/css/app.css', 'public/css', [
    require('postcss-easy-import')(),
    require('tailwindcss')('./tailwind.js'),
    require('postcss-cssnext')({
      browsers,
      features: {
        rem: false
      }
    })
  ])
  .options({
    autoprefixer: false,
    processCssUrls: false,
  })
  .babelConfig({
    presets: [
      [
        'env',
        {
          targets: {
            browsers
          }
        }
      ]
    ],
    plugins: ['babel-plugin-syntax-dynamic-import']
  })
  .webpackConfig({
    output: {
      publicPath: '/',
      chunkFilename: 'js/[name].js'
    }
  })
  .purgeCss({
    whitelistPatterns: [/hljs/]
  });
