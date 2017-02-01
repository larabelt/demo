const { mix } = require('laravel-mix');
const path = require('path');
const webpack = require('webpack');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/assets/js/app.js', 'public/js')
//.sass('resources/assets/sass/app.scss', 'public/css');

mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            '_': 'lodash',
        })
    ],
    module: {
        rules: [{
            test: /\.html$/,
            loader: 'html-loader'
        }]
    },
    resolve: {
        modules: [
            path.resolve(__dirname, 'resources'),
            'node_modules'
        ]
    }
});

mix.extract(['axios', 'jquery', 'lodash', 'vue']);

mix.js('resources/assets/js/ohio-core.js', 'public/js');