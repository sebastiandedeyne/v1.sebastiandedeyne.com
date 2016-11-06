const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
    entry: {
        'style': './resources/assets/css/site.css',
        'app': './resources/assets/js/app.js',
    },
    output: {
        path: 'public/build',
        filename: '[name].js',
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract('style', 'css!postcss'),
            },
            {
                test: /\.svg$/,
                loader: 'url',
            },
        ],
    },
    plugins: [
        new ManifestPlugin({ fileName: 'rev-manifest.json' }),
        new ExtractTextPlugin('style.css'),
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
