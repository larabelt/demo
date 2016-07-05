var gulp = require('gulp');
var include = require('gulp-include');
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

function mixWithIncludes(source, target) {
    gulp.src(source)
        .pipe(include())
        .on('error', console.log)
        .pipe(gulp.dest(target));
}

function copy(source, target) {
    gulp.src(source).pipe(gulp.dest(target));
}

gulp.task('sass', function () {
    elixir(function(mix) {
        console.info('mixing sass files');
        copy('./bower_components/fontawesome/fonts/**/*', './public/fonts/');
        mix.sass('admin.scss');
    });
});

gulp.task('vendor-copy', function () {
    console.info('copying font files');
    copy('./bower_components/fontawesome/fonts/**/*', './public/fonts/');
    copy('./bower_components/bootstrap-sass-official/assets/fonts/**/*', './public/fonts/');
    copy('./node_modules/angular-ui-bootstrap/template/**/*', './public/ng/vendor/angular-ui-bootstrap/template/');
});

gulp.task('js', function () {
    elixir(function(mix) {
        console.info('mixing js files');
        // Admin JS Head Library
        mix.scripts([
            'bower_components/angular/angular.js',
            'bower_components/angular-route/angular-route.js',
            'node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js',
        ], 'public/js/admin-head-lib.js', './');
        // Admin JS Footer Library
        mix.scripts([
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/jquery-ui/jquery-ui.min.js',
            'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js',
            'bower_components/AdminLTE/plugins/morris/morris.min.js',
            'bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js',
            'bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
            'bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
            'bower_components/AdminLTE/plugins/knob/jquery.knob.js',
            'bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js',
            'bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
            'bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            'bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
            'bower_components/AdminLTE/plugins/fastclick/fastclick.js',
            'bower_components/AdminLTE/dist/js/app.min.js',
            'bower_components/AdminLTE/dist/js/pages/dashboard.js',
            'bower_components/AdminLTE/dist/js/demo.js'
        ], 'public/js/admin-footer-lib.js', './');
    });
});

gulp.task('angular', function () {
    console.info('mixing angular files');
    copy('./vendor/ohiocms/admin/resources/assets/ng/base/views/**/*', './public/ng/base/views');
    copy('./vendor/ohiocms/admin/resources/assets/ng/users/views/**/*', './public/ng/users/views');
    mixWithIncludes('./vendor/ohiocms/admin/resources/assets/ng/users/app.js', './public/ng/users');
});

gulp.task('watch-angular', function () {
    gulp.watch('vendor/ohiocms/admin/resources/assets/ng/**/*', ['angular', 'js']);
});

gulp.task('watch-sass', function () {
    gulp.watch('vendor/ohiocms/admin/resources/assets/sass/**/*', ['sass']);
});

gulp.task('default', ['sass', 'vendor-copy', 'js', 'angular']);
gulp.task('watch', ['watch-angular', 'watch-sass']);