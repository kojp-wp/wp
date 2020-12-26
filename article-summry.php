<?php
$recent_post = get_posts('numberposts=1');
if (count($recent_post) > 0) {
  $recent_post_id = $recent_post[0]->ID;
  $recent_post_url = get_permalink($recent_post_id);
  $recent_post_title = $recent_post[0]->post_title;
  $recent_post_content = $recent_post[0]->post_content;
  $recent_post_content = strip_shortcodes($recent_post_content);
  $recent_post_content = html_entity_decode($recent_post_content);
  $recent_post_content = wp_trim_words($recent_post_content, 72, "...");
  $recent_post_content = htmlentities($recent_post_content);
}
?>
<article class="quote-blog-wrapper">
  <h1 class="quote-blog-wrapper__title">代表のエッセイ</h1>
  <article class="quate-blog-content">
    <h2 class="quate-blog-content__title">
      <?php echo $recent_post_title ?>
    </h2>
    <p class="quate-blog-content__sub-title">
      //ここはリードが入ります。//
    </p>
    <p class="quate-blog-content__text">
      <?php echo $recent_post_content ?>
    </p>
    <a href="<?php echo $recent_post_url ?>" class="quate-blog-content__more"><span>つづきを読む</span></a>
  </article>
</article>