const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');

const paths = {
    styles: {
        src: 'src/scss/**/*.scss',
        dest: 'assets/css'
    }
};

// Compile SCSS to CSS
function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.styles.dest));
}

// Watch files for changes
function watchFiles() {
    gulp.watch(paths.styles.src, styles);
}

const build = gulp.series(styles, watchFiles);

exports.styles = styles;
exports.watch = watchFiles;
exports.default = build;
