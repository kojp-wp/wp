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
  $recent_post_thoughts = get_post_meta($recent_post_id, 'sub_title', true);
}
?>
<article class="quote-blog-wrapper">
  <h1 class="quote-blog-wrapper__title">代表のエッセイ</h1>
  <article class="quate-blog-content">
    <h2 class="quate-blog-content__title">
      <?php echo format_thoughts_title($recent_post_thoughts) ?>
    </h2>
    <p class="quate-blog-content__sub-title">
      <?php echo $recent_post_title ?>
    </p>
    <p class="quate-blog-content__text">
      <?php echo $recent_post_content ?>
    </p>
    <p class="quate-blog-content__more"><a href="<?php echo $recent_post_url ?>">つづきを読む</a></p>
  </article>
</article>