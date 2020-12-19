  <meta charset="UTF-8">
  <meta http-equiv="X-Uh-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script>
    (function(d) {
      var config = {
          kitId: 'xcm6mon',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top/style.css">
  <?php if (is_single()) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog/style.css">
  <?php endif; ?>
  <?php if (is_page()) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo $post->post_name; ?>/style.css">
  <?php endif; ?>
  <title>title</title>