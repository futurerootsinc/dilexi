var gulp = require('gulp');
var sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
//var minifyCSS = require('gulp-csso');
// var sourcemaps = require('gulp-sourcemaps');
// var uglify = require('gulp-uglify');

gulp.task('sass', function(){
  return gulp.src('sass/main.scss')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    // .pipe(autoprefixer({
    //         browsers: ['last 2 versions'],
    //         cascade: false
    //     }))
    .pipe(gulp.dest('css'))
});

gulp.task('watch', function(){
  return gulp.watch('sass/**/*', ['sass']);
})