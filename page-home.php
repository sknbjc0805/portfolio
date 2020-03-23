<?php
/*
Template Name:Home Page
*/
?>

<?php get_template_part('head'); ?>

<body data-spy="scroll" data-target="#navbarNav" data-offset="64">

  <!-- mv  -->
  <section class="mv" id="mv">
    <div class="container center txt--white flex">
      <h1 class="mv-ttl"><span class="txt--primary">H</span>ello, I'm <br class="br-show--sm">Shoko Kinugawa.</h1>
      <span class="mv-txt txt--md" id="ityped"></span>
      <div class="scroll txt--lg"><span class="scroll-arrow"></span>Scroll</div>
    </div><!-- /.container -->
  </section><!-- /.mv  -->

  <!-- header  -->
  <header class="header" id="header">
    <nav class="navbar navbar-expand-md navbar-dark">
      <a class="navbar-brand" href="#"><img class="navbar-brand-img" src="<?php echo get_template_directory_uri() ?>/dist/img/header-logo.svg" alt="Shoko Kinugawa"></a>
      <div class="navbar-toggler-wrap">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button><!-- /.navbar-toggler-wrap  -->
      </div><!-- /.navbar-toggler-wrap  -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#about"><span class="nav-link-name">ABOUT</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#service"><span class="nav-link-name">SERVICE</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#works"><span class="nav-link-name">WORKS</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#price"><span class="nav-link-name">PRICE</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#voice"><span class="nav-link-name">VOICE</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact"><span class="nav-link-name">CONTACT</span></a>
          </li><!-- /.nav-item  -->
        </ul><!-- /.navbar-nav  -->
      </div><!-- /.collapse  -->
    </nav><!-- /.navbar  -->
  </header><!-- /.header  -->

  <!-- message  -->
  <section class="msg section bg--tertiary" id="msg">
    <div class="container">
      <h2 class="msg-ttl ttl ttl--wide center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/msg-ttl.svg" alt="MESSAGE"></h2>
      <div class="msg-box wow fadeInUp"><?php the_field('msg_txt'); ?></div><!-- /.msg-box  -->
    </div><!-- /.container  -->
  </section> <!-- /.message  -->

  <!-- about  -->
  <section class="about section txt--white" id="about">
    <div class="container">
      <h2 class="about-ttl ttl--wide center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/about-ttl.svg" alt="ABOUT"></h2>
      <div class="about-wrap">
        <div class="basic wow fadeInUp">
          <?php $about_pic = get_field('about_pic'); ?>
          <figure class="basic-img">
            <?php if (!empty($about_pic)) : ?>
              <img src="<?php echo $about_pic['url']; ?>" alt="<?php echo $about_pic['alt']; ?>">
            <?php endif; ?>
          </figure>
          <h3 class="basic-name txt--lg txt--primary">絹川　翔子</h3>
          <p class="basic-txt">Web系フリーランスエンジニア</p>
        </div><!-- /.basic  -->
        <div class="detail" data-wow-delay="0.1s">
          <dl class="detail-item wow fadeInUp" data-wow-delay="0.1s">
            <dt class="detail-ttl detail-ttl--career txt--lg txt--primary">経歴</dt>
            <dd><?php the_field('about_career'); ?></dd>
          </dl><!-- /.detail-item -->
          <dl class="detail-item wow fadeInUp" data-wow-delay="0.2s">
            <dt class="detail-ttl detail-ttl--skill txt--lg txt--primary">スキル</dt>
            <dd><?php the_field('about_skill'); ?></dd>
          </dl><!-- /.detail-item -->
          <dl class="detail-item wow fadeInUp" data-wow-delay="0.2s">
            <dt class="detail-ttl detail-ttl--qualification txt--lg txt--primary">資格</dt>
            <dd><?php the_field('about_qualification'); ?></dd>
          </dl><!-- /.detail-item -->
          <dl class="detail-item wow fadeInUp" data-wow-delay="0.2s">
            <dt class="detail-ttl detail-ttl--hours txt--lg txt--primary">営業時間</dt>
            <dd><?php the_field('about_hours'); ?></dd>
          </dl><!-- /.detail-item -->
        </div><!-- /.detail  -->
      </div><!-- /.about-wrap  -->
    </div><!-- /.container -->
  </section><!-- /.about  -->

  <!-- service  -->
  <section class="service bg--white" id="service">
    <div class="container">
      <h2 class="service-ttl ttl ttl--narrow center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/service-ttl.svg" alt="SERVICE"></h2>
      <p class="service-txt center txt--desc"><?php the_field('service_desc'); ?></p>
      <?php $loop = new WP_Query(array('post_type' => 'service_items', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
      <?php if ($loop->have_posts()) : ?>
        <ul class="service-list row">
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <li class="offer col-md-4 wow fadeInUp">
              <div class="offer-icon <?php the_field('service_icon'); ?>"></div>
              <h3 class="offer-ttl txt--lg txt--dark center"><?php the_title(); ?></h3>
              <p class="offer-txt"><?php the_content(); ?></p>
            </li><!-- /.offer -->
          <?php endwhile; ?>
        </ul><!-- /.service-list -->
      <?php endif;
      wp_reset_postdata(); ?>
    </div><!-- /.container -->
  </section><!-- /.service  -->

  <!-- works  -->
  <section class="works section bg--tertiary" id="works">
    <div class="container">
      <h2 class="works-ttl ttl ttl--narrow center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/works-ttl.svg" alt="WORKS"></h2>
      <p class="works-txt center txt--desc"><?php the_field('works_desc'); ?></p>

      <?php
      global $post;
      $myposts = get_posts(array(
        'posts_per_page' => 20
      )); ?>
      <ul class="works-list row wow fadeInUp">
        <?php
        foreach ($myposts as $post) : setup_postdata($post); ?>
          <li class="col-md-6">
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
          </li><!-- /.col-md-6 -->
        <?php endforeach;
        wp_reset_postdata(); ?>
      </ul><!-- /.works-list -->
      <a href="https://drive.google.com/drive/u/0/folders/1jQ40LIm8uxODeka-cZmWGhe1S9lD1i6l" target="_blank" rel="noopener" class="btn btn--primary">もっと見る</a>
    </div><!-- /.container -->
  </section><!-- /.works  -->

  <!-- price  -->
  <section class="price section txt--white" id="price" style="background: url('<?php the_field('price_bg'); ?>') no-repeat center center/cover;">
    <div class="container">
      <h2 class="price-ttl ttl ttl--narrow  center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/price-ttl.svg" alt="PRICE"></h2>
      <p class="price-txt center txt--desc"><?php the_field('price_desc'); ?></p>
      <?php $loop = new WP_Query(array('post_type' => 'price_items', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
      <?php if ($loop->have_posts()) : ?>
        <table class="tbl wow fadeInUp">
          <tr class="tbl-row center">
            <th class="tbl-ttl txt--md">作業内容</th>
            <th class="tbl-ttl txt--md">見積価格</th>
          </tr><!-- /.tbl-row  -->
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <tr class="tbl-row">
              <td class="tbl-data tbl-data--ttl"><?php the_field('price_title'); ?></td>
              <td class="tbl-data"><?php echo number_format(get_field('price_value')); ?>円～</td>
            </tr><!-- /.tbl-row  -->
          <?php endwhile; ?>
        </table><!-- /.tbl  -->
      <?php endif;
      wp_reset_postdata(); ?>
      <p class="price-note"><?php the_field('price_note1'); ?></p>
      <p class="price-note"><?php the_field('price_note2'); ?></p>
      <p class="price-note"><?php the_field('price_note3'); ?></p>
      <a href="#" class="btn btn--primary price-btn">お問い合わせ</a>
    </div><!-- /.container  -->
  </section><!-- /.price  -->

  <!-- voice  -->
  <section class="voice section bg--white" id="voice">
    <div class="container">
      <h2 class="voice-ttl ttl ttl--narrow center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/voice-ttl.svg" alt="VOICE"></h2>
      <p class="voice-txt center txt--desc"><?php the_field('voice_desc'); ?></p>
      <div class="review-wrap wow fadeInUp">
        <?php $loop = new WP_Query(array('post_type' => 'voice_items', 'orderby' => 'post_id', 'order' => 'ASC')); ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          <dl class="review">
            <dt class="review-ttl flex">
              <?php $review_pic = get_field('review_pic'); ?>
              <figure class="review-img">
                <?php if (!empty($review_pic)) : ?>
                  <img src="<?php echo $review_pic['url']; ?>" alt="<?php echo $review_pic['alt']; ?>">
                <?php endif; ?>
              </figure>
              <div class="review-desc txt--dark">
                <p class="review-org txt--sm"><a href="<?php the_field('review_company_address'); ?>" target="_blank" rel="noopener"><?php the_field('review_company'); ?></a></p>
                <p class="review-org-ttl txt--sm"><?php the_field('review_company_title'); ?></p>
                <p class="review-name txt--md"><?php the_field('review_name'); ?> <span class="review-name-honorific">様</span></p>
              </div><!-- /.review-desc -->
            </dt><!-- /.review-ttl -->
            <dd class="review-txt"><?php the_field('review_contents'); ?></dd><!-- /.review-txt -->
          </dl><!-- /.review -->
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div><!-- /.review-wrap -->
    </div><!-- /.container -->
  </section>
  <!-- /.voice  -->

  <!-- contact  -->
  <section class="contact section bg--tertiary" id="contact">
    <div class="container">
      <h2 class="contact-ttl ttl ttl--wide center"><img class="ttl-img" src="<?php echo get_template_directory_uri() ?>/dist/img/contact-ttl.svg" alt="CONTACT"></h2>
      <p class="contact-txt center txt--desc">WEB制作のお問い合わせなど、<br>お気軽に下記のフォームよりお願い致します。</p>

      <?php echo do_shortcode('[contact-form-7 id="147" title="お問い合わせフォーム"  html_id="form" html_class="form"]'); ?>
    </div>
  </section>
  <!-- /.contact  -->

  <?php get_footer(); ?>