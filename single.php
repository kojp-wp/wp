<?php
$previous_post = get_previous_post();
$next_post = get_next_post();
$page_title = get_the_title();

$is_displayed = (get_the_date('Ymd') >= 20151101) ? true : false;
$is_previous_post_displayed =
  (get_the_date('Ymd', $previous_post->ID) >= 20151101) ? true : false;

$content = apply_filters('the_content', get_the_content());
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
      <h2><?php echo which_thoughts_title(post_custom('sub_title'), format_thoughts_title(post_custom('sub_title')), format_title($page_title, 'sub')); ?></h2>
      <div class="blog-main__content-height">
        <div class="blog-main__content">
          <h3 class="blog-main__content-right"><?php echo format_title($page_title, 'main'); ?></h3>
          <div class="blog-main__content-left">
            <?php echo $content; ?>
          </div>
        </div>
      </div>
      <?php
      /*<div class="blog-main__card">
        <img class="blog-main__card" src="/img/blog/blog-one-point.png" alt="blog-one-point">
      </div>*/
      ?>
    </article>

    <div class="blog-footer-nav">
      <a href="<?php echo get_permalink($previous_post->ID); ?>" class="blog-footer-nav__day-before">
        <span class="blog-footer-nav__day-before-zenjitsu">前日</span>
        <span class="blog-footer-nav__day-before-title"><?php echo format_title($previous_post->post_title, 'main'); ?></span>
      </a>
      <?php if (!empty($next_post)) : ?>
        <a href="<?php echo get_permalink($next_post->ID); ?>" class="blog-footer-nav__day-after">
          <span class="blog-footer-nav__day-after-title"><?php echo format_title($next_post->post_title, 'main'); ?></span>
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