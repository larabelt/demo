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
    resolve: {
        modules: [
            path.resolve(__dirname, 'resources'),
            path.resolve(__dirname, 'vendor/larabelt/core/resources'),
            path.resolve(__dirname, 'vendor/larabelt/clip/resources'),
            path.resolve(__dirname, 'vendor/larabelt/content/resources'),
            path.resolve(__dirname, 'vendor/larabelt/glue/resources'),
            path.resolve(__dirname, 'vendor/larabelt/menu/resources'),
            path.resolve(__dirname, 'vendor/larabelt/spot/resources'),
            'node_modules'
        ]
    }
});

mix.copy("node_modules/admin-lte", 'public/plugins/admin-lte', false);
mix.copy("node_modules/tinymce", 'public/plugins/tinymce', false);

/**
 * Admin JS
 */
mix.js('resources/assets/js/belt-all.js', 'public/js');
mix.extract(['axios', 'jquery', 'lodash', 'vue']);

/**
 * Frontend JS
 */
mix.js('resources/assets/js/web.js', 'public/js');

/**
 * Sass
 */
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.sass('resources/assets/sass/belt.scss', 'public/css');