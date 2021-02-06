<?php
$previous_post = get_previous_post();
$next_post = get_next_post();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <?php
  get_template_part("head");
  ?>
</head>

<body>
  <?php
  get_header();
  ?>
  <main class="main-content-wrapper">
    <article class="blog-main">
      <div class="blog-header-nav">
        <?php if (!empty($previous_post)) : ?>
          <a href="<?php echo get_permalink($previous_post->ID); ?>" class="blog-header-nav__day-before">
            <span>前日</span>
          </a>
        <?php endif; ?>
        <?php if (!empty($next_post)) : ?>
          <a href="<?php echo get_permalink($next_post->ID); ?>" class="blog-header-nav__day-after">
            <span>翌日</span>
          </a>
        <?php endif; ?>
      </div>
      <h2><?php the_title(); ?></h2>
      <div class="blog-main__content-height">
        <div class="blog-main__content">
          <h3 class="blog-main__content-right">//ここはリードが入ります。//</h3>
          <div class="blog-main__content-left">
            <?php echo get_the_content(); ?>
          </div>
        </div>
      </div>
      <div class="blog-main__card">
        <img class="blog-main__card" src="/img/blog/blog-one-point.png" alt="blog-one-point">
      </div>
    </article>

    <div class="blog-footer-nav">
      <?php if (!empty($previous_post)) : ?>
        <a href="<?php echo get_permalink($previous_post->ID); ?>" class="blog-footer-nav__day-before">
          <span class="blog-footer-nav__day-before-zenjitsu">前日</span>
          <span class="blog-footer-nav__day-before-title"><?php echo $previous_post->post_title; ?></span>
        </a>
      <?php endif; ?>
      <?php if (!empty($next_post)) : ?>
        <a href="<?php echo get_permalink($next_post->ID); ?>" class="blog-footer-nav__day-after">
          <span class="blog-footer-nav__day-after-title"><?php echo $next_post->post_title; ?></span>
          <span class="blog-footer-nav__day-after-yokujitsu">翌日</span>
        </a>
      <?php endif; ?>
    </div>
  </main>
  <?php
  get_footer();
  ?>
  <script src="/js/blog/script.js"></script>
</body>

</html>