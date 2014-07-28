var gulp = require('gulp');
var phpunit = require('gulp-phpunit');
var notify = require('gulp-notify');
var exec = require('child_process').exec;
var sys = require('sys');

gulp.task('phpunit', function(){

    exec("vendor/bin/phpunit --testsuite podcast", function(error, stdout) {
        sys.puts(stdout);
    });
});

gulp.task('cept_phpunit', function(){

    exec("vendor/bin/codecept run functional", function(error, stdout) {
        sys.puts(stdout);
    });
});

gulp.task('watch', function() {
    gulp.watch('app/tests/*.php', ['phpunit']);
});

gulp.task('watch_cept', function() {
    gulp.watch('tests/functional/*.php', ['cept_phpunit']);
});

gulp.task('default', ['watch']);

gulp.task('cept', ['watch_cept']);
