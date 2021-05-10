var gulp = require('gulp');
var sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');


var concat = require('gulp-concat');
var browserSync = require('browser-sync').create()

gulp.task('sass', function() {
    return gulp.src('assets/scss/styles.scss')
      .pipe(sass())
      .pipe(concat('style.css'))
      .pipe(gulp.dest('./assets/css/'))
      .pipe(browserSync.reload({
        stream: true
      }))
});

gulp.task('minify-css', () => {
    return gulp.src('./assets/css/*.css')
      .pipe(cleanCSS({compatibility: 'ie8'}))
      .pipe(gulp.dest('./assets/css/'));
  });

gulp.task('scripts', function() {
    return gulp.src('./app/js*.js')
      .pipe(concat('main.js'))
      .pipe(gulp.dest('./js/'));
});

gulp.task('browserSync', function() {
    browserSync.init({
      server: {
        baseDir: 'app'
      },
    })
})

gulp.task('watch', function(){
    gulp.watch('./**/*.scss', gulp.series(['sass','scripts','minify-css']));
    gulp.watch('*.html', browserSync.reload); 
    gulp.watch('assets/js/**/*.js', browserSync.reload);
});
