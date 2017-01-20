const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: {
        'css/site': './resources/assets/css/site.css',
        'js/app': './resources/assets/js/app.js',
    },
    output: {
        path: 'public',
        filename: '[name].js',
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract(['css-loader', 'postcss-loader']),
            },
            {
                test: /\.svg$/,
                loader: 'url-loader',
            },
        ],
    },
    resolve: {
        extensions: ['', '.js', '.css', '.svg'],
    },
    plugins: [
        new ExtractTextPlugin('[name].css'),
    ],
};
