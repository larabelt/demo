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
            'Vue': 'vue',
            'Vuex': 'vuex',
            'VueRouter': 'vue-router'
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

mix.js('resources/assets/js/ohio-all.js', 'public/js');
mix.extract(['axios', 'jquery', 'lodash', 'vue']);

mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/ohio.scss', 'public/css');