<!DOCTYPE html>
<html lang="ja">

<head>
  <?php echo $my_bg_color; ?>
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
  <script src="<?php echo get_template_directory_uri(); ?>/js/top/script.js"></script>
</body>

</html>