const { mix } = require('laravel-mix');
const path = require('path');

mix.autoload({
    'axios': ['axios'],
    'jquery': ['jQuery', '$'],
    'lodash': ['_'],
    'vue': ['Vue']
})


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
mix.js('resources/assets/js/belt-all.js', 'public/js').version();
mix.extract(['axios', 'jquery', 'lodash', 'vue']);


/**
 * Frontend JS
 */
mix.js('resources/assets/js/web.js', 'public/js').version();

/**
 * Sass
 */
mix.sass('resources/assets/sass/app.scss', 'public/css').version();
mix.sass('resources/assets/sass/belt.scss', 'public/css').version();