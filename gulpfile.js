const babel = require('babelify');
const browserify = require('browserify');
const concat = require('gulp-concat');
const gulp = require('gulp');
const include = require('gulp-include');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify');

function copy_files(input, output) {
    gulp.src(input).pipe(gulp.dest(output));
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
    gulp.src(input)
        .pipe(include())
        .on('error', console.log)
        .pipe(concat(filename))
        .pipe(gulp.dest(output));
}

gulp.task('copy', function () {
    copy_files('./node_modules/angular-ui-bootstrap/template/**/*', './public/ng/vendor/angular-ui-bootstrap/template/');
});

gulp.task('sass', function () {
    mix_sass('./resources/sass/admin.scss', './public/css');
});

gulp.task('ng', function () {
    copy_files('./vendor/ohiocms/admin/resources/ng/base/views/**/*', './public/ng/base/views');
    copy_files('./vendor/ohiocms/admin/resources/ng/users/views/**/*', './public/ng/users/views');
    mix_js(['./vendor/ohiocms/admin/resources/ng/users/app.js'], './public/ng/users', 'app.js');
});

gulp.task('vue', function () {
    mix_js(['./vendor/ohiocms/admin/resources/vue/app.js'], './public/vue', 'app.js');
});

gulp.task('js', function () {

    //mix_js(['./node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js'], './public/js/', 'admin-head-lib');

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

    mix_js([
        './node_modules/vue/dist/vue.js',
        './node_modules/vue-resource/dist/vue-resource.js',
    ], './public/js/', 'vue-lib.js');

});

gulp.task('default', ['copy', 'sass', 'ng', 'js']);

gulp.task('watch', function () {
    gulp.watch('./vendor/ohiocms/admin/resources/ng/**/*', ['ng']);
    gulp.watch('./vendor/ohiocms/admin/resources/vue/**/*', ['vue']);
    gulp.watch('./resources/sass/**/*', ['sass']);
    gulp.watch('./vendor/ohiocms/admin/resources/sass/**/*', ['sass']);
});