/******************
 * REQUIRED STUFF *
 *****************/

// Main Dependencies
var gulp        = require('gulp');
var git         = require('gulp-git');                  // Perform GIT operations on the parent git repo
var maps        = require('gulp-sourcemaps');           // Generate Source Maps
var rebase      = require('gulp-rename');               // Rename files and/or extensions
var order       = require('run-sequence');              // Run tasks in sequence

// CSS Dependencies
var sass        = require('gulp-sass');                 // Sass processing module 
var postcss     = require('gulp-postcss');              // Post-compile processor
var prefix      = require('autoprefixer');              // Vendor prefix module
var packer      = require('css-mqpacker');              // Combine media queries
var minify      = require('cssnano');                   // CSS Minifier
var pixrem      = require('pixrem');                    // Generate pixel fallbacks for rem units

// JS Dependencies
var include     = require('gulp-include');
var uglify      = require('gulp-uglify');
var concat      = require('gulp-concat');
var jshint      = require('gulp-jshint');
var stylinsh    = require('jshint-stylish');

// Other plugins for runtime
var util        = require('gulp-util');
var notify      = require('gulp-notify');
var exec        = require('child_process').exec;

// Only needed if I start processing other types later.. probably.  https://github.com/sindresorhus/gulp-changed
// var changed     = require('gulp-changed');

// Need some FTP or GIT Equivalent
// var reload      = require('gulp-livereload');



/****************
 * PATHS & VARS *
 ***************/

var mainSassSrc = './assets/scss/**/*.scss';
var cssDest = './assets/css/';

// var customjs = 'js/scripts.js';
// var jsSrc = 'js/src/**/*.js';
// var jsAlt = 'js/alt/**/*.js';g
var phpSrc = '**/*.php';
// var jsDest = 'js';



/******************
 * ERROR HANDLING *
 *****************/

var handleError = function(task) {
  return function(err) {

      notify.onError({
        message: task + ' failed, check the logs..'
      })(err);

    util.log(util.colors.bgRed(task + ' error:'), util.colors.red(err));
  };
};



/************
 * PHP TASK *
 ***********/

gulp.task('php', function() {

  order('deploy');

});



/************
 * CSS TASK *
 ***********/

gulp.task('style', function() {

  order('compile-css','deploy');
});

gulp.task('compile-css', function() {

  var plugins = [
    pixrem(),
    prefix({browsers: ['last 2 version']}),
    packer,
    minify()
  ];

  
  return gulp.src(mainSassSrc)
    .pipe(maps.init())
    .pipe(sass({
      compass: false,
      bundleExec: true,
      sourcemap: false,
      style: 'expanded',
      debugInfo: true,
      lineNumbers: true,
      errLogToConsole: true,
      includePaths: [
        'bower/',
        'node_modules/',
      ],
    }))
    .on('error', handleError('css'))
    .pipe(gulp.dest(cssDest))
    .pipe(postcss(plugins))
    .pipe(rebase(function (path) {
      path.extname = ".min.css";
    }))
    .pipe(maps.write('.'))
    .pipe(gulp.dest(cssDest));
    
    // Need some FTP or GIT Equivalent
    // .pipe(reload());

});



/*******************
 * JAVACSRIPT TASK *
 ******************/

/*
gulp.task('js', function() {

      gulp.src(jsSrc)
        .pipe(include({
          extensions: "js",
          hardFail: true,
          includePaths: [
          // __dirname + "/bower_components/**",
          __dirname + "/node_modules/**"
        ]}))
        .pipe(concat('all.js'))
        // .pipe(uglify({preserveComments: false, compress: true, mangle: true}).on('error',function(e){console.log('\x07',e.message);return this.end();}))
        .pipe(gulp.dest(jsDest));
        
        // Need some FTP or GIT Equivalent
        // .pipe(reload());
});

gulp.task('js-alt', function() {

      gulp.src(jsAlt)
        .pipe(concat('alt.js'))
        .pipe(uglify({preserveComments: false, compress: true, mangle: true}).on('error',function(e){console.log('\x07',e.message);return this.end();}))
        .pipe(gulp.dest(jsDest));
        
        // Need some FTP or GIT Equivalent
        // .pipe(reload());
});
*/



/*************
 * GIT TASKS *
 ************/

// Task to perform 'git add .'
gulp.task('git-add', function() {
  
  return gulp.src('.')
    .pipe(git.add());
});

// Task to perform 'git commit -m "commit message"'
gulp.task('git-commit', function() {
  
  return gulp.src('.')
    .pipe(git.commit('Theme changes committed by Gulp-Git - ' + new Date().toLocaleString()));
});

// Task to perform 'git push'
gulp.task('git-push', function(){
  
  return git.push('origin', 'master', function(err) {
      if (err) {
        throw err;
      }
    });
});

// Task to perform 'git status'
gulp.task('git-status', function(){
  
  return git.status(function (err, stdout) {
      if (err) {
        throw err;
      }
    });
});

gulp.task('deploy', function() {
  order('git-add',
        'git-commit',
        'git-push',
        'git-status'
  );
});



/*****************
 * WATCHER TASKS *
 ****************/

// Need some FTP or GIT Equivalent
// reload.listen();

gulp.task('default', function() {

  gulp.watch(mainSassSrc, ['style']);
  // gulp.watch(jsSrc, ['js']);
  // gulp.watch(jsAlt, ['js-alt']);
  gulp.watch(phpSrc, ['php']);

});