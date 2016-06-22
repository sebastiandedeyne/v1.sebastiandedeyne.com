const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
    entry: {
        'style': './resources/assets/sass/site.css',
        'app': './resources/assets/js/site.js',
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
    resolve: {
        extensions: ['', '.js', '.css'],
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
                require('postcss-mixins')(),
                require('postcss-advanced-variables')(),
                require('postcss-nested')(),
                require('postcss-color-function')(),
                require('postcss-calc')(),
            ],
            parser: require('postcss-scss'),
        };
    },
};
