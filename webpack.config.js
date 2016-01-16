const autoprefixer = require('autoprefixer');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: {
        'css/site.css': './resources/assets/sass/site.scss',
        'js/site.js': './resources/assets/js/site.js',
    },
    output: {
        path: 'public',
        filename: '[name]',
    },
    module: {
        loaders: [
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('style', 'css!sass!postcss'),
            }
        ]
    },
    resolve: {
        extensions: ['', '.js', '.css', '.scss'],
    },
    plugins: [
        new ExtractTextPlugin('css/site.css'),
    ],
    sassLoader: {
        includePaths: ['node_modules'],
    },
    postcss() {
        return [autoprefixer];
    },
};
