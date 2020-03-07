<?php

/**
 * テーマのセットアップ
 **/
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( //HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}

add_action('after_setup_theme', 'my_setup');


/**
 * CSSとJavaScriptの読み込み
 */
function my_script_init()
{
  wp_enqueue_style('google-webfont-style', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP:300,400,500,700&display=swap&subset=japanese');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.12.0/css/all.css', array(), '5.12.0', 'all');
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/src/css/vendor/bootstrap.css', array(), '1.0.0', 'all');
  wp_enqueue_style('animate', get_template_directory_uri() . '/src/css/vendor/animate.css', array(), '1.0.0', 'all');
  wp_enqueue_style('styles', get_template_directory_uri() . '/dist/css/styles.min.css', array(), '1.0.0', 'all');

  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/dist/js/vendor/bootstrap.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('wow', get_template_directory_uri() . '/dist/js/vendor/wow.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/src/js/main.js', array('jquery'), '1.0.1', true);

  //フロントページでしか使用しないjs定義
  if (is_front_page()) {
    wp_enqueue_script('index', get_template_directory_uri() . '/dist/js/vendor/index.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('frontpage', get_template_directory_uri() . '/src/js/frontPageOnly.js', array('jquery'), '1.0.0', true);
  }
}
add_action('wp_enqueue_scripts', 'my_script_init');
