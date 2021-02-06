<?php
$knicka_site_name = "ニッカオフィス / knicka office";
$knicka_site_description = "横浜の商店街で活動しているクリエイティブスタジオ";

if (is_home()) {
  $site_title = $knicka_site_name;
  $site_description = $knicka_site_description;
  $canonical_url = get_bloginfo('url') . "/";
} elseif (is_page() || is_single()) {
  $site_title = get_the_title() . " - " . $knicka_site_name;
  $site_description = get_the_content();
  $site_description = strip_shortcodes($site_description);
  $site_description = html_entity_decode($site_description);
  $site_description = wp_trim_words($site_description, 72, "...");
  $site_description = htmlentities($site_description);
  $canonical_url = get_permalink();
}
?>

<title><?php echo $site_title; ?></title>
<meta name="description" content="<?php echo $site_description; ?>">
<link rel="canonical" href="<?php echo $canonical_url; ?>">
<link rel="icon" href="/img/favicon.ico">
<meta property="og:image" content="/img/logo/knickaoffice_symbol_ogp.png">
