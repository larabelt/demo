// var concat = require('gulp-concat');
// var gulp = require('gulp');
// var include = require('gulp-include');
// var rename = require('gulp-rename');
// var sass = require('gulp-sass');
// var sourcemaps = require('gulp-sourcemaps');
// var uglify = require('gulp-uglify');
//
// function copy_files(input, output) {
//     return gulp
//         .src(input)
//         .pipe(gulp.dest(output));
// }
//
// function mix_sass(input, output, filename) {
//     return gulp
//         .src(input)
//         .pipe(concat(filename))
//         .pipe(sourcemaps.init())
//         .pipe(sass().on('error', sass.logError))
//         .pipe(sourcemaps.write('./'))
//         .pipe(gulp.dest(output));
// }
//
// function mix_js(input, output, filename) {
//     return gulp
//         .src(input)
//         .pipe(concat(filename))
//         .pipe(include())
//         .on('error', console.log)
//         .pipe(gulp.dest(output));
// }
//
// gulp.task('copy', function () {
//
// });
//
// gulp.task('sass', function () {
//
// });
//
// gulp.task('client', function () {
//     copy_files('./ohio/core/client/**/*', './public/client/core/');
//     mix_js(['./ohio/core/client/base/admin/uncompiled.js'], './public/client/core/base/admin', 'compiled.js');
// });
//
// gulp.task('widget', function () {
//     copy_files('./client/widget/**/*', './public/client/widget/');
//     mix_js(['./client/widget/admin/app.js'], './public/client/widget/admin', 'compiled.js');
// });
//
// gulp.task('js', function () {
//
// });
//
// gulp.task('default', ['copy', 'sass', 'client', 'js']);

// gulp.task('watch', function () {
//     gulp.watch('./resources/sass/**/*', ['sass']);
// });

let elixir = require('laravel-elixir');
require('laravel-elixir-vue');

elixir(function(mix) {
    mix.webpack('ohio.js');
    mix.sass('ohio.scss');
});