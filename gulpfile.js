const fs = require('fs');
const json = JSON.parse(fs.readFileSync('package.json', 'utf8'));
const version = json.version;

function log(arg) {
    console.log(arg);
}

var msg = "// AFTC.JS Version " + version + "\n"
msg += "// Author: Darcey@aftc.io" + "\n";
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

const glob = require("glob");
const gulp = require("gulp");
const concat = require('gulp-concat');
const beautify = require('gulp-jsbeautifier');
const rename = require("gulp-rename");
const composer = require('gulp-uglify/composer');
const uglify = require('uglify-es');
const minify = composer(uglify, console);
// const autoprefixer = require('gulp-autoprefixer')
// const sourcemaps = require('gulp-sourcemaps')
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




console.clear();
let files = "./src/**/*.js";



function buildDev() {
    return (
        gulp.src(files)
            .pipe(concat('jsprite.js'))
            .pipe(beautify())
            // .pipe(uglify())
            // .pipe(inject.prepend(msg))
            .on("error", function (e) {
                console.log(e.toString());
                this.emit("end");
            })
            .pipe(gulp.dest('./dist/'))
    )
}
gulp.task("buildDev", gulp.series(buildDev));
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


function buildMin() {
    return (
        gulp.src(files)
            .pipe(concat('jsprite.min.js'))
            .pipe(minify())
            // .pipe(inject.prepend(msg))
            .on("error", function (e) {
                console.log(e.toString());
                this.emit("end");
            })
            .pipe(gulp.dest('./dist/'))
    )
}
gulp.task("buildMin", gulp.series(buildMin));
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




function copyFiles(done){

    fs.copyFile('./dist/jsprite.min.js', './demo/jsprite.min.js', (err) => {
        if (err){
            throw err;
        } else {
            console.log('COPY: jsprite.min.js > demo/jsprite.min.js');
        }
    });


    fs.copyFile('./dist/jsprite.js', './demo/jsprite.js', (err) => {
        if (err){
            throw err;
        } else {
            console.log('COPY: jsprite.js TO demo/jsprite.js');
        }
    });


  // Gulp injecst the done and wants the done back... meh
  return done();
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
gulp.task("build", gulp.series(buildDev,buildMin,copyFiles));
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




// Watch
function watch() {
    gulp.watch(files, gulp.series(buildDev,buildMin,copyFiles))
}
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
gulp.task("watch",watch);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
