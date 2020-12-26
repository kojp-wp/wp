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
    <main class="main-content-wrapper">
      <div class="top-statement">
        <p class="top-statement__title">ぜんぶ、<br>使いやすくする</p>
        <p class="top-statement__text">ニッカオフィスは、世の中のモノやコトを<br>使いやすくする<br>デザインスタジオです</p>
      </div>

      <nav class="top-page-nav">
        <ul class="js-smoothTrigger top-page-nav__menu common-nav-list">
          <li class="top-page-nav__item common-nav-list__item"><a
              href="#TOP_HEADING_ABOUT"><span>About</span><span>オフィスのこと</span></a>
          </li>
          <li class="top-page-nav__item common-nav-list__item"><a
              href="#TOP_HEADING_CLIENT"><span>Client</span><span>顧客</span></a></li>
          <li class="top-page-nav__item common-nav-list__item"><a href="<?php
          $recent_post = get_posts('numberposts=1');
          if (count($recent_post) > 0) {
            $recent_post_id = $recent_post[0]->ID;
            $recent_post_url = get_permalink($recent_post_id);
            echo $recent_post_url;
          } ?>"><span>Essay</span><span>エッセイ</span></a>
          </li>
          <li class="top-page-nav__item common-nav-list__item"><a
              href="/contact/"><span>Contact</span><span>お問い合わせ</span></a>
          </li>
        </ul>
      </nav>


<?php
get_template_part("article-summry");
?>

      <h2 class="common-heading2 top-heading2" id="TOP_HEADING_ABOUT">About / オフィスのこと</h2>
      <div class="global-narrow-box">
        <p>ニッカオフィスは、これまで50案件以上のサービス立ち上げやリニュアルを担当した知見を元に、あらゆるコトやモノを使いやすくデザインします。</p>
        <p>また制作以外にも、既存チームに入り込んで一緒にプロジェクトを進め、デザイン人材の育成や構築も行います。</p>
      </div>
      <ul class="sns-button">
        <li class="sns-button__item">
          <a><img src="/img/twitter.svg" alt="Twitter"></a>
        </li>
        <li class="sns-button__item">
          <a><img src="/img/facebook-f.svg" alt="Facebookページ"></a>
        </li>
        <li class="sns-button__item">
          <a><img src="/img/line.svg" alt="LINE@"></a>
        </li>
      </ul>
      <div class="about-detail about-detail--fit-right">
        <button class="js-slide-toggle-button" data-slide-target="offer-plan">提供プランを詳しく見る</button>
      </div>
      <div class="common-border-box-light-gray top-offer-plan__wrapper" data-slide-content="offer-plan">
        <ul class="top-offer-plan">
          <li>クリエイティブ（グラフィックデザイン、ウェブデザイン、インテリアデザインほか）のコンサルティング、制作ほか</li>
          <li>人材育成（デザイナー、プロデューサー、営業、経営幹部）のスキルセット定義とそれに伴う育成。貴社のチームと一緒にプロダクト検討やデザイン作成やデザインチームの構築や育成を行います。</li>
          <li>クリエイティブ全般のコンサルティング・制作（グラフィック、ウェブ、インテリア・プロダクトほか）</li>
          <li>人材のスキルセット定義とそれに伴う育成（デザイナー、プロデューサー、営業、経営幹部）</li>
        </ul>
      </div>

      <div class="common-fluid-image">
        <div class="common-fluid-image__parallax-wrapper">
          <div class="common-fluid-image__parallax">
            <div class="common-fluid-image__parallax-image"></div>
          </div>
        </div>
      </div>

      <h2 class="common-heading2 top-heading2" id="TOP_HEADING_CLIENT">Client / 顧客</h2>
      <ul class="client-list">
        <li class="client-list__item"><a href="https://www.hr-s.co.jp/" target="_blank" class="client-list__link"><img
              src="/img/client-logo/HRsolutions.png" alt="HRソリューションズ株式会社" class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://corp.en-japan.com/" target="_blank"
            class="client-list__link"><img src="/img/client-logo/enjapan.png" alt="エン・ジャパン株式会社"
              class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://www.kayac.com/" target="_blank" class="client-list__link"><img
              src="/img/client-logo/kayac.png" alt="面白法人カヤック" class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://www.cbase.co.jp/" target="_blank" class="client-list__link"><img
              src="/img/client-logo/CBASE.png" alt="株式会社シーベース" class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://www.staffservice.co.jp/" target="_blank"
            class="client-list__link"><img src="/img/client-logo/STAFFSERVICE.png" alt="株式会社スタッフサービス・ホールディングス"
              class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://zeku.co.jp/" target="_blank" class="client-list__link"><img
              src="/img/client-logo/ZEKU.png" alt="株式会社ゼクウ" class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://corp.chatwork.com/ja/" target="_blank"
            class="client-list__link"><img src="/img/client-logo/Chatwork.png" alt="Chatwork株式会社"
              class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://visits.world/" target="_blank" class="client-list__link"><img
              src="/img/client-logo/VISITS.png" alt="VISITS Technologies株式会社" class="client-list__image"></a></li>
        <li class="client-list__item"><a href="https://recruit-holdings.co.jp/" target="_blank"
            class="client-list__link"><img src="/img/client-logo/RECRUIT.png" alt="株式会社リクルートホールディングス"
              class="client-list__image"></a></li>
      </ul>
      <p class="common-notice-right">※五十音順、一部のみ掲載</p>

      <h2 class="common-heading2 top-heading2">代表プロフィール</h2>
      <div class="chief-profile">
        <figure class="common-wide-image common-wide-image--high chief-profile__chief-photo">
          <img src="/img/image-chief-profile.png" alt="ウチヤマケンイチ プロフィール写真">
        </figure>
        <div class="chief-profile__name-wrapper">
          <p class="chief-profile__name">ウチヤマ ケンイチ</p>
          <p class="chief-profile__name">Kenichi UCHIYAMA</p>
        </div>
        <dl class="chief-profile__history chief-profile__history-short">
          <dt>1981年</dt>
          <dd>神奈川県横浜市生まれ</dd>
          <dt>2007年</dt>
          <dd>東京理科大学大学院理工学研究科建築学専攻修了</dd>
          <dt>2016年</dt>
          <dd>株式会社リクルート退社</dd>
          <dt>2017年</dt>
          <dd>ニッカオフィスを法人化し独立</dd>
        </dl>
        <div class="chief-profile__row-box">
          <dl class="chief-profile__expert">
            <dt>専門分野</dt>
            <dd>UXデザイン</dd>
            <dd>インフォメーションアーキテクト</dd>
            <dd>人材育成</dd>
            <dd>問題特定・解決</dd>
            <dd>ロジカルシンキング</dd>
            <dd>プロジェクトマネジメント</dd>
          </dl>
          <ul class="sns-button chief-profile__sns-button">
            <li class="sns-button__item">
              <a><img src="/img/twitter.svg" alt="Twitter"></a>
            </li>
            <li class="sns-button__item">
              <a><img src="/img/facebook-f.svg" alt="Facebookページ"></a>
            </li>
            <li class="sns-button__item">
              <a><img src="/img/line.svg" alt="LINE@"></a>
            </li>
          </ul>
        </div>
        <div class="about-detail about-detail--fit-left">
          <button class="js-slide-toggle-button js-toggle-label chief-profile__toggle-button"
            data-slide-target="profile-history" data-toggle-label-text="経歴詳細を閉じる">経歴詳細を開く</button>
        </div>
        <div class="chief-profile__history__wrapper global-narrow-box" data-slide-content="profile-history">
          <dl class="chief-profile__history">
            <dt>1981年</dt>
            <dd>神奈川県横浜市生まれ</dd>
            <dt>2001年</dt>
            <dd>
              <p>大学入学。建築学科にて建築、家具、インテリアを専攻。Charles & Ray Eamesのデザイン理論を研究。</p>
            </dd>
            <dt>2007年</dt>
            <dd>
              <ul>
                <li>東京理科大学大学院建築学専攻修了</li>
                <li>株式会社リクルート入社　不動産情報サイトSUUMOの新規立ち上げを担当</li>
              </ul>
            </dd>
            <dt>2010年</dt>
            <dd>
              <p>UI/UXの専門部署に異動し、リクルートグループの人材、結婚、ECサイトなどのサイト設計、サービス設計を手がける。</p>
            </dd>
            <dt>2011年</dt>
            <dd>個人事業としてニッカオフィスを設立。会社員とダブルワーク開始</dd>
            <dt>2016年</dt>
            <dd>リクルート退社</dd>
            <dt>2017年</dt>
            <dd>ニッカオフィスを法人化し独立</dd>
          </dl>
        </div>
        <h2 class="common-heading2 top-heading2">会社概要</h2>
        <div class="company-overview__wrapper">
          <dl class="company-overview">
            <dt>法人名</dt>
            <dd>ニッカオフィス合同会社　knicka office LLC</dd>
            <dt>代表社員</dt>
            <dd>内山 賢一　Kenichi UCHIYAMA</dd>
            <dt>従業員数</dt>
            <dd>１名（2020年３月末現在）</dd>
            <dt>資本金</dt>
            <dd>100万円（2020年３月末現在）</dd>
            <dt>所在地</dt>
            <dd>220-0051 神奈川県横浜市西区中央2-3-13 ニッカオフィスビル４F</dd>
            <dt>設立</dt>
            <dd>2017年1月4日</dd>
            <dt>事業内容</dt>
            <dd>
              <ul>
                <li>クリエイティブ、デザインに関するコンサルティング、制作</li>
                <li>デザイン人材の育成</li>
              </ul>
            </dd>
          </dl>
          <dl class="company-overview">
            <dt>沿革</dt>
            <dd>
              <dl class="company-overview__history">
                <dt>2001年</dt>
                <dd>Dada*graphとして活動開始</dd>
                <dt>2005年</dt>
                <dd>knickaに活動名を変更</dd>
                <dt>2010年</dt>
                <dd>西前銀座商店会（横浜市西区）内にオフィスを移転</dd>
                <dt>2011年</dt>
                <dd>ニッカオフィス / knicka office に事業名を変更し、個人事業として正式に事業化</dd>
                <dt>2017年</dt>
                <dd>「ニッカオフィス合同会社」として法人化</dd>
              </dl>
            </dd>
          </dl>
        </div>

      <div class="common-fluid-image">
        <div class="common-fluid-image__parallax-wrapper">
          <div class="common-fluid-image__parallax">
            <div class="common-fluid-image__parallax-image"></div>
          </div>
        </div>
      </div>

        <h3 class="common-heading2 top-heading2 top-heading2--logo-explanation">ロゴに込めた想い</h3>
        <div class="logo-explanation__wrapper">
          <p class="logo-explanation"><img class="logo-explanation__image" src="/img/logo/knickaoffice_symbol.svg"
              alt="ニッカオフィスロゴ"></p>
          <div class="logo-explanation__text">
            <p>ニッカオフィスのロゴは、「人」と「鍵穴」の形をモチーフにしています。</p>
            <p>人をよく観察し、ずっと開かなかったドアの鍵をパッと開けるように問題解決の糸口を見つける。ニッカオフィスはそんなクリエイティブスタジオでありたいと思っています。</p>
          </div>
        </div>
      </div>
    </main>
<?php
get_footer();
?>
  </div>
  <script src="/js/top/script.js"></script>
</body>

</html>