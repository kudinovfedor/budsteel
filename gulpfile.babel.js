'use strict';

import gulp from 'gulp';
import sass from 'gulp-sass';
import plumber from 'gulp-plumber';

gulp.task('sass', () => {
    return gulp.src('sass/**/*.scss')
        .pipe(plumber())
        .pipe(sass({
            outputStyle: 'nested', // nested, expanded, compact, compressed
            precision: 5,
            includePaths: ['sass'],
            indentType: 'space',
            indentWidth: 2,
            linefeed: 'crlf',
            sourceComments: false,
        }).on('error', sass.logError))
        .pipe(gulp.dest('./'));
});

gulp.task('default', () => {
    gulp.watch('sass/**/*.scss', gulp.series('sass'));
});
