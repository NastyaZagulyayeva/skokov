'use strict';

const gulp = require('gulp');
const scss = require('gulp-sass');


gulp.task('scss', () => {
    return gulp.src('./scss/main-style.scss')
        .pipe(scss().on('error', scss.logError))
        .pipe(gulp.dest('./css'));
});

gulp.task('scss:watch', () => {
    gulp.watch('./scss/**/*.scss', gulp.series(['scss']));
});