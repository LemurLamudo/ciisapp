const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const prefix = require("gulp-autoprefixer");
const minify = require("gulp-clean-css");
const mode = require("gulp-mode")();
const terser = require("gulp-terser");
const browserSync = require("browser-sync").create();

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

exports.default = series(parallel(cssTask, jsTask), watchChanges);
