const ExtractTextPlugin = require('extract-text-webpack-plugin');

const extractCss = new ExtractTextPlugin('[name]', '[name].css');

module.exports = {
    entry: {
        'css/site': './resources/assets/css/site.css',
        'js/app': './resources/assets/js/app.js',
    },
    output: {
        path: 'public/build',
        filename: '[name].js',
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: extractCss.extract('style', 'css!postcss'),
            },
            {
                test: /\.svg$/,
                loader: 'url',
            },
        ],
    },
    plugins: [
        extractCss,
    ],
    postcss() {
        return {
            plugins: [
                require('autoprefixer')(),
                require('postcss-easy-import')({ glob: true }),
                require('postcss-css-variables')(),
                require('postcss-color-function')(),
                require('postcss-calc')(),
            ],
        };
    },
};
