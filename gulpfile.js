var concat = require('gulp-concat');
var gulp = require('gulp');
var include = require('gulp-include');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');

function copy_files(input, output) {
    return gulp
        .src(input)
        .pipe(gulp.dest(output));
}

function mix_sass(input, output, filename) {
    return gulp
        .src(input)
        .pipe(concat(filename))
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(output));
}

function mix_js(input, output, filename) {
    return gulp
        .src(input)
        .pipe(concat(filename))
        .pipe(include())
        .on('error', console.log)
        .pipe(gulp.dest(output));
}

gulp.task('copy', function () {
    copy_files('./node_modules/angular-ui-bootstrap/template/**/*', './public/ohio/vendor/angular-ui-bootstrap/template/');
    copy_files('./node_modules/font-awesome/fonts/**/*', './public/fonts/');
});

gulp.task('sass', function () {
    mix_sass([
        './node_modules/admin-lte/bootstrap/css/bootstrap.css',
        './node_modules/font-awesome/css/font-awesome.css',
        './node_modules/admin-lte/dist/css/AdminLTE.css',
        './node_modules/admin-lte/dist/css/skins/skin-blue.css',
        './node_modules/admin-lte/plugins/datepicker/datepicker3.css',
        './node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css',
        './node_modules/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css',
        './node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.css'
    ], './public/css', 'admin-lib.css');
    mix_sass(['./resources/assets/sass/admin.scss'], './public/css', 'admin.css');
});

gulp.task('ng', function () {

    copy_files('./vendor/ohiocms/core/client/base/views/**/*', './public/ohio/base/views');

    copy_files('./vendor/ohiocms/core/client/roles/views/**/*', './public/ohio/roles/views');
    copy_files('./vendor/ohiocms/core/client/users/views/**/*', './public/ohio/users/views');
    copy_files('./vendor/ohiocms/core/client/users-roles/views/**/*', './public/ohio/users-roles/views');

    mix_js(['./vendor/ohiocms/core/client/users/app.js'], './public/ohio/users', 'app.js');
    mix_js(['./vendor/ohiocms/core/client/roles/app.js'], './public/ohio/roles', 'app.js');
    //mix_js(['./vendor/ohiocms/core/client/users-roles/app.js'], './public/ohio/users-roles', 'app.js');

    mix_js(['./vendor/ohiocms/core/client/admin-app.js'], './public/ohio', 'admin-app.js');
});

gulp.task('js', function () {
    mix_js([
        './node_modules/angular/angular.min.js',
        './node_modules/angular-route/angular-route.min.js',
        './node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js'
    ], './public/js/', 'admin-head-lib.js');

    mix_js([
        './node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js',
        './node_modules/admin-lte/plugins/jQueryUI/jquery-ui.min.js',
        './node_modules/admin-lte/bootstrap/js/bootstrap.min.js',
        './node_modules/admin-lte/plugins/daterangepicker/moment.min.js',
        './node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js',
        './node_modules/admin-lte/plugins/sparkline/jquery.sparkline.min.js',
        './node_modules/admin-lte/plugins/datepicker/bootstrap-datepicker.js',
        './node_modules/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        './node_modules/admin-lte/plugins/fastclick/fastclick.js',
        './node_modules/admin-lte/dist/js/app.min.js'
    ], './public/js/', 'admin-footer-lib.js');
});

gulp.task('default', ['copy', 'sass', 'ng', 'js']);

gulp.task('watch', function () {
    gulp.watch('./resources/sass/**/*', ['sass']);
    gulp.watch('./vendor/ohiocms/core/resources/sass/**/*', ['sass']);
    gulp.watch('./vendor/ohiocms/core/client/**/*', ['ng']);
});