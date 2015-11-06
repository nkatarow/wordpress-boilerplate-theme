var gulp = require ('gulp'),
		sass = require('gulp-ruby-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		minifycss = require('gulp-minify-css'),
		uglify = require('gulp-uglify'),
		imagemin = require('gulp-imagemin'),
		rename = require('gulp-rename'),
		concat = require('gulp-concat'),
		notify = require('gulp-notify'),
		cache = require('gulp-cache'),
		merge = require('merge-stream'),
		//livereload = require('gulp-livereload'),
		del = require('del');

// Concat/autoprefix/minify CSS
gulp.task('styles', function(){
	return sass('_ui/css/main.scss', { style: 'expanded'})
		.pipe(autoprefixer('last 2 versions'))
		.pipe(gulp.dest('dist/css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss())
		.pipe(gulp.dest('dist/css'))
		.pipe(notify({ message: 'Styles task complete' }));
});

// Concat/uglify JS
gulp.task('scripts', function(){
	var header = gulp.src('_ui/js/header-scripts/*.js')
		.pipe(concat('header-scripts.js'))
		.pipe(gulp.dest('dist/js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify(''))
		.pipe(gulp.dest('dist/js'))
		.pipe(notify({ message: 'Header scripts task complete' }));

	var footer = gulp.src(['_ui/js/app.main.js', '_ui/js/footer-scripts/*.js', '_ui/js/components/*.js'])
		.pipe(concat('footer-scripts.js'))
		.pipe(gulp.dest('dist/js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify(''))
		.pipe(gulp.dest('dist/js'))
		.pipe(notify({ message: 'Footer scripts task complete' }));

	return merge(header, footer);
});

// Compress images only if they haven't already been
gulp.task('images', function(){
	return gulp.src('_ui/img/**/*')
	.pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
	.pipe(gulp.dest('dist/img'))
	.pipe(notify({ message: 'Images task complete' }));
});

// Empty dist
gulp.task('clean', function(){
	return del(['dist/css', 'dist/js', 'dist/img']);
});

// Default task
gulp.task('default', ['clean'], function(){
	gulp.start('styles', 'scripts', 'images');
});

// Watch task
gulp.task('watch', function(){
	gulp.watch('_ui/css/**/*.scss', ['styles']);
	gulp.watch('_ui/js/**/*.js', ['scripts']);
	gulp.watch('_ui/img/**/*', ['images']);

	// livereload.listen();
	// gulp.watch(['dist/*']).on('change', livereload.changed);
});