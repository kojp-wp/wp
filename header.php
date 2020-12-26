<header class="global-header">
  <div class="global-header__inner">
    <h1 class="global-logo">
      <img class="global-logo__image" src="/img/logo/knickaoffice_logo.svg" alt="knicka office">
    </h1>
    <nav class="global-nav">
      <button class="global-nav__toggle-button">
        <div class="global-nav__button-line parts-toggle-munu">
          <span></span><span></span><span></span>
        </div>
      </button>
      <ul class="js-smoothTrigger global-nav__menu common-nav-list">
        <li class="global-nav__item global-nav__item-home common-nav-list__item">
          <a href="/"><span class="global-nav__item-title">Home</span><span
              class="global-nav__item-sub">ホーム</span></a>
        </li>
        <li class="global-nav__item common-nav-list__item">
          <a href="<?php if (!is_home()) echo "/"?>#TOP_HEADING_ABOUT"><span
              class="global-nav__item-title">About</span><span
              class="global-nav__item-sub">オフィスのこと</span></a>
        </li>
        <li class="global-nav__item global-nav__item-client common-nav-list__item">
          <a href="<?php if (!is_home()) echo "/"?>#TOP_HEADING_CLIENT"><span class="global-nav__item-title">Client</span><span
              class="global-nav__item-sub">顧客</span></a>
        </li>
        <li class="global-nav__item common-nav-list__item">
          <a href="<?php
              $recent_post = get_posts('numberposts=1');
              if (count($recent_post) > 0) {
                $recent_post_id = $recent_post[0]->ID;
                $recent_post_url = get_permalink($recent_post_id);
                echo $recent_post_url;
              } ?>"><span class="global-nav__item-title">Essay</span><span
              class="global-nav__item-sub">エッセイ</span></a>
        </li>
        <li class="global-nav__item common-nav-list__item">
          <a href="/contact/"><span class="global-nav__item-title">Contact</span><span
              class="global-nav__item-sub">お問い合わせ</span></a>
        </li>
      </ul>
    </nav>
  </div>
</header>