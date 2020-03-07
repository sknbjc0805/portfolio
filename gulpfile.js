// 各種プラグインの読み込み

var gulp         = require('gulp');
var sass         = require('gulp-sass');
var plumber      = require('gulp-plumber');
var notify       = require('gulp-notify');
var sassGlob     = require('gulp-sass-glob');
var browserSync  = require('browser-sync');
var postcss      = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssdeclsort  = require('css-declaration-sorter');
var mmq          = require('gulp-merge-media-queries');
var imagemin     = require('gulp-imagemin');
var pngquant     = require('imagemin-pngquant');
var mozjpeg      = require('imagemin-mozjpeg');
var rename       = require("gulp-rename");
var cleanCSS     = require("gulp-clean-css");
var uglify       = require("gulp-uglify");

// 各種タスク

// scssのコンパイル
gulp.task('sass', function () {
  return gulp
    .src('src/scss/**/*.scss')
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))//エラーチェック
    .pipe(sassGlob())// importの読み込みを簡潔化
    .pipe(sass({
      outputStyle: 'expanded' // expanded, nested, campact, compressedから選択
    }))
    // ベンダープレフィックス付加
    .pipe(postcss([
      //バージョン設定はpackage.jsonを確認
      autoprefixer({
        cascade: false
      })
    ]))
    .pipe(postcss([cssdeclsort({ order: 'alphabetically' })]))// プロパティをソート(アルファベット順)
    // ]))
    .pipe(mmq())// メディアクエリを整理
    // 圧縮前の状態で一度出力
    .pipe(gulp.dest('src/css'))// コンパイル後の出力先
    .pipe(cleanCSS())// cssの圧縮
    .pipe(rename({
      suffix: '.min',
    }))
    .pipe(gulp.dest('dist/css'));// コンパイル後の出力先
});


// サーバーを立ち上げる
gulp.task('browser-sync', function (done) {
  browserSync.init({

    //ローカル開発
    server: {
      // baseDir: "./",
      index: "index.html"
    }
  });
  done();
});


// 保存時のリロード
gulp.task('bs-reload', function (done) {
  browserSync.reload();
  done();
});


// jsの圧縮&rename
gulp.task('js-minify', function (done) {
  gulp.src('src/js/**/*.js')
    .pipe(uglify())
    .pipe(rename({
      extname: '.min.js'
    }))
    .pipe(gulp.dest('dist/js'));
  done();
});

// cssの圧縮&rename
gulp.task('css-minify', function (done) {
  gulp.src('src/css/**/*.css')
    .pipe(cleanCSS())
    .pipe(rename({
      extname: '.min.css'
    }))
    .pipe(gulp.dest('dist/css'));
  done();
});


// 監視
gulp.task('watch', function (done) {
  gulp.watch('index.html', gulp.task('bs-reload'));
  gulp.watch('src/scss/**/*.scss', gulp.task('sass'));
  gulp.watch('src/scss/**/*.scss', gulp.task('bs-reload'));
  gulp.watch('src/js/*.js', gulp.task('bs-reload'));
  done();
});

// default
gulp.task('default', gulp.series(gulp.parallel('browser-sync', 'watch')));

//圧縮率の定義
var imageminOption = [
  // imagemin-pngquantv7.0.0以降、optionの書き方変更
  // pngquant({ quality: [70 - 85], }),
  pngquant({ quality: [.7, .85], }),
  mozjpeg({ quality: 85 }),
  imagemin.gifsicle({
    interlaced: false,
    optimizationLevel: 1,
    colors: 256
  }),
  imagemin.jpegtran(),
  imagemin.optipng(),
  imagemin.svgo()
];

// 画像の圧縮
// $ gulp imageminでsrc/img/フォルダ内の画像を圧縮し/img/フォルダへ格納
gulp.task('imagemin', function () {
  return gulp
    .src('src/img/**/*.{png,jpg,gif,svg}')
    .pipe(imagemin(imageminOption))
    .pipe(gulp.dest('dist/img'));
});