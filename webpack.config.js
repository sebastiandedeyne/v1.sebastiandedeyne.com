const ExtractTextPlugin = require('extract-text-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
    entry: {
        'css/site': './resources/assets/css/site.css',
        'js/site': './resources/assets/js/site.js',
    },
    output: {
        path: __dirname + '/public',
        filename: '[name]-[hash].js',
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
        ],
    },
    resolve: {
        extensions: ['.js', '.css'],
    },
    plugins: [
        new ExtractTextPlugin('[name]-[hash].css'),
        new ManifestPlugin({
            fileName: 'mix-manifest.json',
            basePath: '/',
        }),
    ],
};
