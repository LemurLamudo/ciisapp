const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const prefix = require("gulp-autoprefixer");
const minify = require("gulp-clean-css");
const mode = require("gulp-mode")();
const terser = require("gulp-terser");
const del = require("del");
const browserSync = require("browser-sync").create();
const replace = require("gulp-replace");

function cleanSourceMaps() {
  return del(["assets/css/*.map", "assets/js/*.map"]);
}

function cssTask() {
  return src("src/scss/*.scss", { sourcemaps: mode.development() })
    .pipe(sass())
    .pipe(prefix("last 2 versions"))
    .pipe(minify())
    .pipe(dest("assets/css", { sourcemaps: "." }))
    .pipe(mode.development(browserSync.stream()));
}

function jsTask() {
  return src("src/scripts/main.js", { sourcemaps: mode.development() })
    .pipe(terser())
    .pipe(dest("assets/js", { sourcemaps: "." }))
    .pipe(mode.development(browserSync.stream()));
}

function watchChanges() {
  browserSync.init({
    proxy: "http://127.0.0.1/ciisapp/",
    notify: false,
  });

  watch("src/scss/**/*.scss", cssTask);
  watch("src/scripts/**/*.js", jsTask);
  watch("templates/**/*.php").on("change", function () {
    browserSync.reload();
  });
}

function cacheBustTask() {
  var cbString = new Date().getTime();
  return src(["templates/includes/inc_header.php", "templates/includes/inc_scripts.php"])
    .pipe(replace(/cb=\d+/g, "cb=" + cbString))
    .pipe(dest("templates/includes"));
}

exports.default = series(parallel(cssTask, jsTask), watchChanges);
exports.build = series(cleanSourceMaps, parallel(cssTask, jsTask), cacheBustTask);
