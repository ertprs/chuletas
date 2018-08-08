var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var browserSync = require('browser-sync');
var reload = browserSync.reload;

 gulp.task('sass', function() {
  return gulp.src('./scss/*.scss')
    .pipe($.sass({
      outputStyle: 'nested' // if css compressed **file size**
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('./css'));
});

gulp.task('browser-sync',function(){
  var archivos = [
    './css/*.css',
    './inc/*.php',
    './js/*.js',
    './scss/*.scss',
    './template-parts/*.php',
    './*.php',
    './style.css'
  ];
  browserSync.init(archivos,{
    proxy : 'http://localhost/base_proyectos/',
    notify : false
  })
});

gulp.task('default', ['sass','browser-sync'], function() {
  gulp.watch(['scss/*.scss'], ['sass']);
});
