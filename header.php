<header class="global-header">
  <h1 class="global-logo">
    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-knicka-wide.png" alt="knicka office" />
  </h1>
  <nav class="global-nav">
    <button class="global-nav__toggle-button">
      <div class="global-nav__button-line parts-toggle-munu">
        <span></span><span></span><span></span>
      </div>
    </button>
    <ul class="global-nav__menu common-nav-list">
      <li class="global-nav__item global-nav__item-home common-nav-list__item">
        <a href="/"><span>Home</span><span>ホーム</span></a>
      </li>
      <li class="global-nav__item common-nav-list__item">
        <a href="/#TOP_HEADING_ABOUT"><span>About</span><span>オフィスのこと</span></a>
      </li>
      <li class="global-nav__item common-nav-list__item">
        <a href="/#TOP_HEADING_CLIENT"><span>Client</span><span>顧客</span></a>
      </li>
      <li class="global-nav__item common-nav-list__item">
        <a href="<?php
                  $recent_post = get_posts('numberposts=1');
                  if (count($recent_post) > 0) {
                    $recent_post_id = $recent_post[0]->ID;
                    $recent_post_url = get_permalink($recent_post_id);
                    echo $recent_post_url;
                  } ?>"><span>Essay</span><span>エッセイ</span></a>
      </li>
      <li class="global-nav__item common-nav-list__item">
        <a href="/contact/"><span>Contact</span><span>お問い合わせ</span></a>
      </li>
    </ul>
  </nav>
</header>