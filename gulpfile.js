/*
REQUIRED STUFF
==============
*/

// Main Dependencies
var gulp        = require('gulp');
var maps        = require('gulp-sourcemaps');           // Generate Source Maps
var rebase      = require('gulp-rename');               // Rename files and/or extensions

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


/*
PATHS
=====
*/

var mainSassSrc = './assets/scss/**/*.scss';

var mainSass = './assets/scss/style.scss';
var formSass = './assets/scss/form_scss/forms.scss';

var cssDest = './assets/css/';

// var customjs = 'js/scripts.js';
// var jsSrc = 'js/src/**/*.js';
// var jsAlt = 'js/alt/**/*.js';g
// var phpSrc = '**/*.php';
// var jsDest = 'js';

/*
ERROR HANDLING
==============
*/

var handleError = function(task) {
  return function(err) {

      notify.onError({
        message: task + ' failed, check the logs..'
      })(err);

    util.log(util.colors.bgRed(task + ' error:'), util.colors.red(err));
  };
};


/*
PHP
===
*/

gulp.task('php', function() {

  // Need some FTP or GIT Equivalent
  // reload.reload();

});


/*
CSS
===
*/

gulp.task('style', function() {

  var plugins = [
    pixrem(),
    prefix({browsers: ['last 2 version']}),
    packer,
    minify()
  ];

  
  gulp.src(mainSassSrc)
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


/*
JAVACSRIPT
==========
*/

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


/*
WATCH
=====
*/

// Need some FTP or GIT Equivalent
// reload.listen();

gulp.task('default', function() {

  gulp.watch(mainSassSrc, ['style']);
  // gulp.watch(formSassSrc, ['form']);
  // gulp.watch(jsSrc, ['js']);
  // gulp.watch(jsAlt, ['js-alt']);
  // gulp.watch(phpSrc, ['php']);

});