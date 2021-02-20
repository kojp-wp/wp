<?php
function imdir($file_name = NULL)
{
    if ($file_name) {
        $url = esc_url(get_template_directory_uri() . '/assets/img/' . slug() . '/' . $file_name);
        $path = get_template_directory() . '/assets/img/' . slug() . '/' . $file_name;

        return $url . '?v=' . date("YmdHis", filemtime($path));
    } else {
        return esc_url(get_template_directory_uri() . '/assets/img');
    }
}

function format_thoughts_title($_YYmd)
{
    $dates = explode(',', $_YYmd);
    $y    = (int) $dates[0];
    $m    = (int) $dates[1];
    $mm    = sprintf('%02d', $m);
    $d    = (int) $dates[2];
    $dd    = sprintf('%02d', $d);
    $date = $y . $mm . $dd;
    //昭和
    if ($date < 19890108) {
        if ($y == 1926) {
            echo '昭和元年';
        } else {
            echo '昭和' . ($y - 1925) . '年';
        }
    }
    //平成
    elseif ($date < 20190501) {
        if ($y == 1989) {
            echo '平成元年';
        } else {
            echo '平成' . ($y - 1988) . '年';
        }
    }
    //令和
    else {
        if ($y == 2019) {
            echo '令和元年';
        } else {
            echo '令和' . ($y - 2018) . '年';
        }
    }
    echo $m . '月' . $d . '日' . 'に考えたこと';
}

function format_title($_title)
{
    $titles = explode('｜', $_title);
    $main    = $titles[0];
    $sub    = $titles[1];
    echo $main;
}

/**
 * 投稿のスラッグの初期値を日付(YYYYMMDD形式)にします。
 */
function set_slug_date()
{
    // 投稿以外(固定ページなど)の場合は適用しない
    if ('post' != get_post_type()) {
        return;
    }
?>
    <script>
        jQuery(function($) {
            $('#post_name').val("<?php echo date_i18n('Ymd'); ?>");
        });
    </script>
<?php }
add_action('admin_head-post-new.php', 'set_slug_date');
?>