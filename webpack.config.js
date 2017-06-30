const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
    entry: {
        'css/site': './resources/assets/css/site.css',
        'js/site': './resources/assets/js/site.js',
    },
    output: {
        path: __dirname + '/public',
        filename: '[name].js',
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /node_modules/,
            },
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
        extensions: ['.js', '.css', '.svg'],
    },
    plugins: [
        new ExtractTextPlugin('[name].css'),
    ],
};
