const gulp         = require('gulp');
const sass         = require('gulp-sass');
const jshint       = require('gulp-jshint');
const uglify       = require('gulp-uglify');
const plumber      = require('gulp-plumber');
const concat       = require('gulp-concat');
const imagemin     = require('gulp-imagemin');
const cleanCss     = require('gulp-clean-css');
const sourcemaps   = require('gulp-sourcemaps');
// const autoprefix   = require('gulp-autoprefixer');
const browserSync  = require('browser-sync').create();

var onError = function(err){
  console.log("se ha producido un error: ", err.message);
  this.emit("end");
}

gulp.task('sass', () => {
  return gulp.src([
    'node_modules/bootstrap/scss/bootstrap.scss',
    'src/scss/*.scss'
  ])
  // .pipe(plumber())
  .pipe(sourcemaps.init())
  .pipe(sass({outputStyle: 'compressed'}))
  // .pipe(autoprefix({
  //     browsers : [ "last 2 versions"],
  //     cascade: false
  // }))
  .pipe(gulp.dest('src/css'))
  .pipe(cleanCss()) 
  .pipe(sourcemaps.write("."))
  .pipe(gulp.dest('src/css'))
});

gulp.task('lint', function() {
 return gulp.src('./js/**/*.js')
   .pipe(jshint())    
});

gulp.task('js',['lint'], () => {
  return gulp.src([
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/popper.js/dist/umd/popper.min.js',
    'src/js/*.js'
  ])
  .pipe(concat('all.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('src/js'))
});

gulp.task('imagemin', function() {
 return gulp.src('src/images/raw/**/*.**')
   .pipe(plumber({errorHandler:onError}))
   .pipe(imagemin({
      progressive : true,
      interlaced  : true
   }))
   .pipe(gulp.dest("src/images/final"))
});

gulp.task('browser-sync',function(){
  var archivos = [
    './src/css/**/*.css',
    './src/*.php',
    './src/scss/**/*.scss',
    './src/inc/**/*.php',
    './src/js/**/*.js',
    './src/images/**/*.**'

  ];
  browserSync.init(archivos,{
    proxy : 'http://localhost/test/src/',
    notify : false
  })
});

gulp.task('font-awesome', () => {
  return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
  .pipe(gulp.dest('src/css'));
})

gulp.task('fonts', () => {
  return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest('src/fonts'));
});

gulp.task('default', ['sass','js','imagemin','browser-sync', 'font-awesome', 'fonts'])
