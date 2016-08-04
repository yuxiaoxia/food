'use strict';
var gulp = require('gulp');

//handlebars编译外挂
var concat = require('gulp-concat'),
		autoprefixer = require('gulp-autoprefixer'),
	  minifycss = require('gulp-minify-css'),
	  uglify = require('gulp-uglify'),
		cache = require('gulp-cache'),
	  imagemin = require('gulp-imagemin'),
	  rename = require('gulp-rename'),
	  clean = require('gulp-clean'),
	  notify = require('gulp-notify'),
	  livereload = require('gulp-livereload'),
	  group = require('gulp-group-files'),
		wrap = require('gulp-wrap'),
		declare = require('gulp-declare'),
		sass = require('gulp-sass');


/** REMOVE ME **/ //var handlebars = require('../../');
/** USE ME **/ var handlebars = require('gulp-handlebars');

// 图片
gulp.task('images', function() {
  return gulp.src('source/img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('build/img'))
    .pipe(notify({ message: 'Images task complete' }));
});
// 样式
// gulp.task('styles', function() {
//   return gulp.src('source/css/*.scss')
//     .pipe(sass({ style: 'expanded', }))
//     .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
//     .pipe(rename({ suffix: '.min' }))
//     .pipe(minifycss())
//     .pipe(gulp.dest('build/css'))
//     .pipe(notify({ message: 'Styles task complete' }));
// });

// 脚本
gulp.task('scripts', function() {
  return gulp.src('source/js/*.js')
    .pipe(rename({ suffix: '.min' }))
	//.pipe(uglify())
    .pipe(gulp.dest('build/js'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// 清理
gulp.task('clean', function() {
  return gulp.src(['build/js','build/img','build/tpl'], {read: false})
    .pipe(clean());
});

// 看手
gulp.task('watch', function() {

  // 看守所有.scss档
  // gulp.watch('source/**/*.scss', ['styles']);

  // 看守所有.js档
  gulp.watch('source/js/*.js', ['scripts']);

  // 看守所有图片档
  gulp.watch('source/img/**/*', ['images']);

  // 建立即时重整伺服器
  var server = livereload();

  // 看守所有位在 dist/  目录下的档案，一旦有更动，便进行重整
  gulp.watch(['build/**']).on('change', function(file) {
    server.changed(file.path);
  });

});
gulp.task('templates', function(){
  gulp.src('source/templates/*.hbs')
    .pipe(handlebars({
      handlebars: require('handlebars')
    }))
    .pipe(wrap('Handlebars.template(<%= contents %>)'))
    .pipe(declare({
      namespace: 'MyApp.templates',
      noRedeclare: true // Avoid duplicate declarations
    }))
    .pipe(concat('templates.js'))
    .pipe(gulp.dest('build/tpl/'));
});

gulp.task('copy', function(){
  gulp.src('node_modules/handlebars/dist/handlebars.runtime.js')
    .pipe(gulp.dest('build/tpl/'));
});
// 预设任务
gulp.task('default', ['clean'], function() {
    gulp.start('scripts','images','copy', 'templates');
});
