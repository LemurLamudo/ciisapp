const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const prefix = require("gulp-autoprefixer");
const minify = require("gulp-clean-css");
const compress = require("gulp-imagemin");
const mode = require("gulp-mode")();
const terser = require("gulp-terser");
const babel = require("gulp-babel");
const concat = require("gulp-concat");
const del = require("del");
const browserSync = require("browser-sync").create();
const replace = require("gulp-replace");
const imagemin = require("gulp-imagemin");

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
  return src("src/scripts/*.js", { sourcemaps: mode.development() })
    .pipe(
      mode.production(
        babel({
          presets: [["@babel/env", { modules: false }]],
        })
      )
    )
    .pipe(concat("main.js"))
    .pipe(mode.production(terser({ output: { comments: false } })))
    .pipe(dest("assets/js", { sourcemaps: "." }))
    .pipe(mode.development(browserSync.stream()));
}

function imageTask() {
  return src("src/images/*{.png,.jpg,.jpeg}")
    .pipe(
      compress([
        imagemin.mozjpeg({ quality: 30, progressive: true }),
        imagemin.optipng({ optimizationLevel: 1 }),
      ])
    )
    .pipe(dest("assets/images"));
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
exports.build = series(cleanSourceMaps, parallel(cssTask, jsTask, imageTask), cacheBustTask);
