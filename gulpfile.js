// config file
var config = require("./config.json");

// gulp plugins
var gulp = require("gulp");
var sass = require("gulp-sass");
var uglifycss = require("gulp-clean-css");
var uglifyjs = require("gulp-uglify");
var browsersync = require("browser-sync").create();
var concat = require("gulp-concat");
var sourcemaps = require("gulp-sourcemaps");
var imagemin = require("gulp-imagemin");
var autoprefixer = require("gulp-autoprefixer");
var gulpif = require("gulp-if");
var plumber = require("gulp-plumber");

// task for browsersync integration
gulp.task("browsersync", function () {
  browsersync.init({
    injectChanges: true,
    open: config.browsersync.open,
    host: config.browsersync.host,
    proxy: config.browsersync.proxy,
    port: config.browsersync.port,
  });
});

// task to compile sass files, concatenation and move into assets
// add to below object all scss you want include into website
gulp.task("css_theme", function () {
  gulp
    .src(config.paths.css.theme.src)
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(uglifycss())
    .pipe(concat("theme.css"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.paths.css.dist))
    .pipe(browsersync.stream());
});

gulp.task("css_vendor", function () {
  gulp
    .src(config.paths.css.vendor.src)
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulpif(config.production, uglifycss()))
    .pipe(concat("vendor.css"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.paths.css.dist))
    .pipe(browsersync.stream());
});

// task to concatenation JS files and move them into assets
// add to below object all js you want include into website
gulp.task("js_theme", function () {
  gulp
    .src(config.paths.js.theme.src)

    .pipe(gulpif(config.development, sourcemaps.init()))
    .pipe(gulpif(config.production, uglifyjs()))
    .pipe(concat("theme.js"))
    .pipe(gulpif(config.development, sourcemaps.write()))
    .pipe(gulp.dest(config.paths.js.dist))
    .pipe(browsersync.stream());
});

gulp.task("js_vendor", function () {
  gulp
    .src(config.paths.js.vendor.src)

    .pipe(gulpif(config.development, sourcemaps.init()))
    .pipe(gulpif(config.production, uglifyjs()))
    .pipe(concat("vendor.js"))
    .pipe(gulpif(config.development, sourcemaps.write()))
    .pipe(gulp.dest(config.paths.js.dist))
    .pipe(browsersync.stream());
});

// task to copy images into assets and minify them
// add to below object all images you want include into website
gulp.task("images", function () {
  gulp
    .src(config.paths.images.src)
    .pipe(
      imagemin({
        interlaced: true,
        progressive: true,
        optimizationLevel: 5,
      })
    )
    .pipe(gulp.dest(config.paths.images.dist))
    .pipe(browsersync.stream());
});

// task to copy fonts into assets
// add to below object all fonts you want include into website
gulp.task("fonts", function () {
  gulp.src(config.paths.fonts.src).pipe(gulp.dest(config.paths.fonts.dist));
});

// watch scss files
gulp.task(
  "watch",
  ["css_theme", "css_vendor", "js_theme", "js_vendor", "fonts", "images","browsersync"],
  function () {
    gulp.watch(config.paths.watch.css.theme, ["css_theme"]);
    gulp.watch(config.paths.watch.css.vendor, ["js_vendor"]);
    gulp.watch(config.paths.watch.js.theme, ["js_theme"]);
    gulp.watch(config.paths.watch.js.vendor, ["js_vendor"]);
    gulp.watch(config.paths.watch.images, ["images"]);
    gulp.watch(config.paths.watch.fonts, ["fonts"]);
    gulp.watch(config.paths.watch.php, browsersync.reload);
  }
);

gulp.task("default", [
  "css_theme",
  "css_vendor",
  "js_theme",
  "js_vendor",
  "fonts",
  "images",
  "watch",
]);
