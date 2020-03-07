<?php get_template_part('head'); ?>

<body>
  <!-- post  -->
  <section class="post bg--tertiary">
    <div class="container post-container bg--white">

      <!-- bc(breadcrumb)  -->
      <div class="bc txt--sm">
        <ul class="bc-list">
          <li class="bc-item"><a href="<?php echo home_url() ?>" class="bc-link bc-link--home txt--primary link--primary">TOP</a></li>
          <li class="bc-item"><a href="<?php echo home_url() ?>#works" class="bc-link txt--primary link--primary">制作事例一覧</a></li>
          <li class="bc-item"><?php the_title(); ?></li>
        </ul>
      </div>
      <div class="post-time txt--sm">最終更新日：<time><?php the_modified_date('Y/m/d') ?></time></div>
      <div class="center">
        <h1 class="post-ttl txt--xl txt--dark"><?php the_title(); ?></h1>
        <?php if(!empty(get_field('link'))){ ?><p class="post-txt txt--primary"><a href="<?php the_field('link'); ?>" class="post-link center link--primary" target="_blank" rel="noopener noreferrer"><?php the_field('link'); ?></a></p><?php } ?>
        <figure class="post-thumbnail"><?php the_post_thumbnail('medium'); ?></figure>
      </div>
      <div class="topic">
        <h2 class="topic-ttl txt--lg">概要</h2>
        <div class="topic-txt"><?php the_field('summary'); ?></div>
      </div>
      <div class="topic">
        <h2 class="topic-ttl txt--lg">力を入れたところ</h2>
        <div class="topic-txt"><?php the_field('points'); ?></div>
      </div>
      <div class="topic">
        <h2 class="topic-ttl txt--lg">使用技術</h2>
        <div class="topic-txt"><?php the_field('skills'); ?></div>
      </div>
      <div class="post-pic-wrapper flex">
        <figure class="post-pic post-pic--pc"><img src="<?php the_field('screenshot_pc'); ?>" alt=""></figure>
        <figure class="post-pic post-pic--sp"><img src="<?php the_field('screenshot_sp'); ?>" alt=""></figure>
      </div>


      <?php
      $prevpost = get_adjacent_post(true, '', true);
      $nextpost = get_adjacent_post(true, '', false);
      if ($prevpost || $nextpost) {
      ?>
        <ul class="pagenav flex">
          <?php
          if ($nextpost) { //次の記事が存在
            echo '<li class="pagenav-item flex"><figure class="pagenav-item-pic">' . get_the_post_thumbnail($nextpost->ID, array(100, 100)) . '</figure><a class="pagenav-link pagenav-link--next txt--sm txt--primary flex link--primary" href="' . get_permalink($nextpost->ID) . '">' . get_post_meta($nextpost->ID, 'title', true) . '</a></li>';
          }
          if ($prevpost) { //前の記事が存在
            echo '<li class="pagenav-item flex"><figure class="pagenav-item-pic">' . get_the_post_thumbnail($prevpost->ID, array(100, 100)) . '</figure><a class="pagenav-link pagenav-link--prev txt--sm txt--primary flex link--primary" href="' . get_permalink($prevpost->ID) . '">' . get_post_meta($prevpost->ID, 'title', true) . '</a></li>';
          }
          ?>
        </ul>
      <?php } ?>

            <!-- bc(breadcrumb)  -->
            <div class="bc txt--sm">
        <ul class="bc-list">
          <li class="bc-item"><a href="<?php echo home_url() ?>" class="bc-link bc-link--home txt--primary link--primary">TOP</a></li>
          <li class="bc-item"><a href="<?php echo home_url() ?>#works" class="bc-link txt--primary link--primary">制作事例一覧</a></li>
          <li class="bc-item"><?php the_title(); ?></li>
        </ul>
      </div>

    </div>
  </section><!-- /.post  -->

  <?php get_footer(); ?>