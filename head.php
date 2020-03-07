<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <!-- ogp設定:basic -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php bloginfo('name'); ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:url" content="<?php echo home_url() ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/dist/ogp/shoko-ogp.png">
  <meta property="og:image:alt" content="<?php bloginfo('name'); ?>">
  <meta property="og:locale" content="ja_JP" />
  <!-- ogp設定:twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@123456">
  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri() ?>/dist/favicon/favicon.ico">
  <?php wp_head(); ?>
</head>