<?php get_template_part('head'); ?>

<body>
  <!-- notfound  -->
  <section class="notfound section bg--tertiary" id="notfound">
    <div class="container">
      <h2 class="about-ttl ttl--narrow center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/notfound-ttl.svg" alt="404 Page Not Found"></h2>
      <div class="notfound-box wow fadeInUp center"><?php echo get_field('notfound_txt', 219); //404固定ページのID ?></div><!-- /.notfound-box  -->
      <?php
      global $post;
      $myposts = get_posts(array(
        'posts_per_page' => 10
      )); ?>
      <ul class="works-list row wow fadeInUp">
        <?php
        foreach ($myposts as $post) : setup_postdata($post); ?>
          <li class="col-md-4">
            <a class="work" href="<?php the_permalink(); ?>">
              <figure class="work-img">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('full');
                }
                ?>
              </figure>
              <div class="work-mask flex">
                <p class="work-caption center"><?php echo get_post_meta($post->ID, 'title', true); ?></p>
              </div>
            </a><!-- /.work -->
          </li><!-- /.col-md-4 -->
        <?php endforeach;
        wp_reset_postdata(); ?>
      </ul><!-- /.works-list -->
      <a href="<?php echo home_url() ?>" class="btn btn--primary">トップページへ</a>
    </div><!-- /.container  -->
  </section> <!-- /.notfound  -->

  <?php get_footer(); ?>