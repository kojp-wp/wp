<!DOCTYPE html>
<html lang="ja">

<head>
  <?php
  get_template_part("head");
  ?>
</head>

<body>
  <div class="global-wrapper">
    <?php
    get_header();
    ?>
    <?php
    echo get_the_content();
    ?>
    <?php
    get_footer();
    ?>
  </div>
  <script src="/js/top/script.js"></script>
  <script src="/js/<?php echo $post->post_name; ?>/script.js"></script>
</body>

</html>