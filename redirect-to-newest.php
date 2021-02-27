<?php /*
Template Name: redirectToNewest
*/ ?>
<?php
$loop = new WP_query('category_name=essay&showposts=1'); // 最新情報へのリンク
while ($loop->have_posts()) : $loop->the_post();
  $url = get_permalink($post->ID);
endwhile;
header("Location: " . $url);
?>