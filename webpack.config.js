const ExtractTextPlugin = require('extract-text-webpack-plugin');

const extractCss = new ExtractTextPlugin('[name]', '[name].css');

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
                test: /\.ts$/,
                loader: 'ts',
            },
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
    resolve: {
        extensions: ['', '.js', '.ts', '.css', '.svg'],
    },
    plugins: [
        extractCss,
    ],
    postcss() {
        return {
            plugins: [
                require('postcss-easy-import')({ glob: true }),
                require('postcss-cssnext')(),
            ],
        };
    },
};
