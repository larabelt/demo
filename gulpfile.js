var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    // copy
    mix.copy('bower_components/fontawesome/fonts/', 'public/fonts/');
    mix.copy('bower_components/bootstrap-sass-official/assets/fonts/', 'public/fonts/');
    mix.copy('resources/assets/js/ng/**/*', 'public/ng/');

    // css
    mix.sass('admin.scss');

    // Admin JS Head Library
    mix.scripts([
        'angular/angular.js',
        'angular-route/angular-route.js',
        'angular-bootstrap/ui-bootstrap.js'
    ], 'public/js/admin-head-lib.js', 'bower_components/');

    // Admin JS Footer Library
    mix.scripts([
        'jquery/dist/jquery.min.js',
        'jquery-ui/jquery-ui.min.js',
        'bootstrap-sass-official/assets/javascripts/bootstrap.min.js',
        'AdminLTE/plugins/morris/morris.min.js',
        'AdminLTE/plugins/sparkline/jquery.sparkline.min.js',
        'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'AdminLTE/plugins/knob/jquery.knob.js',
        'AdminLTE/plugins/daterangepicker/daterangepicker.js',
        'AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
        'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
        'AdminLTE/plugins/fastclick/fastclick.js',
        'AdminLTE/dist/js/app.min.js',
        'AdminLTE/dist/js/pages/dashboard.js',
        'AdminLTE/dist/js/demo.js'
    ], 'public/js/admin-footer-lib.js', 'bower_components/');

    // // App JS
    // mix.scripts([
    //     'app/app.js',
    //     'app/*.js',
    //     'app/**/*.js'
    // ], 'public/app/app.js');

});