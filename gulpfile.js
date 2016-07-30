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

function mix_sass(input, output) {
    return gulp
        .src(input)
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
});

gulp.task('sass', function () {
    mix_sass('./resources/assets/sass/admin.scss', './public/css');
});

gulp.task('ng', function () {

    copy_files('./vendor/ohiocms/core/resources/client/base/views/**/*', './public/ohio/base/views');

    copy_files('./vendor/ohiocms/core/resources/client/roles/views/**/*', './public/ohio/roles/views');
    copy_files('./vendor/ohiocms/core/resources/client/users/views/**/*', './public/ohio/users/views');
    copy_files('./vendor/ohiocms/core/resources/client/users-roles/views/**/*', './public/ohio/users-roles/views');

    mix_js(['./vendor/ohiocms/core/resources/client/users/app.js'], './public/ohio/users', 'app.js');
    mix_js(['./vendor/ohiocms/core/resources/client/roles/app.js'], './public/ohio/roles', 'app.js');
    //mix_js(['./vendor/ohiocms/core/resources/client/users-roles/app.js'], './public/ohio/users-roles', 'app.js');

    mix_js(['./vendor/ohiocms/core/resources/client/admin-app.js'], './public/ohio', 'admin-app.js');
});

gulp.task('js', function () {
    mix_js([
        './bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js',
        './bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        './bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        './bower_components/AdminLTE/plugins/knob/jquery.knob.js',
        './bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js',
        './bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
        './bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        './bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
        './bower_components/AdminLTE/plugins/fastclick/fastclick.js',
        './bower_components/AdminLTE/dist/js/app.min.js',
        './bower_components/AdminLTE/dist/js/pages/dashboard.js',
        './bower_components/AdminLTE/dist/js/demo.js'
    ], './public/js/', 'admin-footer-lib.js');
});

gulp.task('default', ['copy', 'sass', 'ng', 'js']);

gulp.task('watch', function () {
    gulp.watch('./resources/sass/**/*', ['sass']);
    gulp.watch('./vendor/ohiocms/core/resources/sass/**/*', ['sass']);
    gulp.watch('./vendor/ohiocms/core/resources/client/**/*', ['ng']);
});