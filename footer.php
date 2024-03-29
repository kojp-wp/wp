<footer class="global-footer" id="footer-modal">
  <div class="producer" id="producer">
    <div class="producer__modal">
      <div class="producer__content">
        <p class="producer__title">
          このサイトの製作者</p>
        <ul>
          <li class="producer__name-wrapper">
            <a href="/#chief" class="producer__link">
              <div class="producer__kenichi">
                <p>内山 賢一</p>
                <p class="producer__kenichi-en">Kenichi UCHIYAMA</p>
              </div>
              <span><img src="/img/internal-link.svg" alt="Kenichi UCHIYAMA_link"></span>
            </a>
          </li>
          <li class="producer__name-wrapper">
            <a href="https://www.facebook.com/takuro.sato1212/" target="_blank" class="producer__link">
              <div class="producer__takuro">
                <p>佐藤 拓朗</p>
                <p class="producer__takuro-en">Takuro SATO</p>
              </div>
              <span><img src="/img/link-icon.svg" alt="Takuro SATO_link"></span>
            </a>
          </li>
          <li class="producer__name-wrapper">
            <a href="https://www.facebook.com/kaho.horimoto.9/" target="_blank" class="producer__link">
              <div class="producer__kaho">
                <p>堀本 佳歩</p>
                <p class="producer__kaho-en">Kaho HORIMOTO</p>
              </div>
              <span><img src="/img/link-icon.svg" alt="Kaho HORIMOTO_link"></span>
            </a>
          </li>
        </ul>
        <button class="producer__close" id="producer__close">
          <p>とじる</p>
          <span class="producer__close-icon"></span>
        </button>
      </div>
    </div>
  </div>
  <p class="global-footer__logo"><img src="/img/logo/knickaoffice_symbol.svg" alt=""></p>
  <div class="global-footer__background">
    <div class="global-footer__wrap">
      <ul class="global-footer__link" id="container">
        <li class="global-footer__links" id="itemA"><a href="/">ホーム</a></li>
        <li class="global-footer__links" id="itemB"><a href="<?php if (!is_home()) echo "/" ?>#about">オフィスのこと</a></li>
        <li class="global-footer__links" id="itemC"><a href="<?php if (!is_home()) echo "/" ?>#clients">実績</a></li>
        <li class="global-footer__links" id="itemD"><a href="<?php
                                                              $recent_post = get_posts('numberposts=1');
                                                              if (count($recent_post) > 0) {
                                                                $recent_post_id = $recent_post[0]->ID;
                                                                $recent_post_url = get_permalink($recent_post_id);
                                                                echo $recent_post_url;
                                                              } ?>">エッセイ</a></li>
        <li class="global-footer__links" id="itemE"><a href="/faq/">よくある質問</a></li>
        <li class="global-footer__links" id="itemF"><a href="/contact/">お問い合わせ</a></li>
      </ul>
      <div class="global-footer__credit" id="credit__open">
        <p>このサイトの制作メンバー</p>
      </div>
    </div>
  </div>
  <p class="global-footer__main-logo"><img src="/img/logo/knickaoffice_logo.svg" alt=""></p>
  <address class="global-footer__address">
    <p>ニッカオフィス合同会社</p>
    <p>神奈川県横浜市西区中央2-3-13 ニッカオフィスビル</p>
  </address>
  <p class="global-footer__copy">
    <small>All content Copyright ニッカオフィス / knicka office</small>
  </p>
</footer>