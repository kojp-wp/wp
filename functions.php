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
    $display_title = '';
    //昭和
    if ($date < 19890108) {
        if ($y == 1926) {
            $display_title .= '昭和元年';
        } else {
            $display_title .= '昭和' . ($y - 1925) . '年';
        }
    }
    //平成
    elseif ($date < 20190501) {
        if ($y == 1989) {
            $display_title .= '平成元年';
        } else {
            $display_title .= '平成' . ($y - 1988) . '年';
        }
    }
    //令和
    else {
        if ($y == 2019) {
            $display_title .= '令和元年';
        } else {
            $display_title .= '令和' . ($y - 2018) . '年';
        }
    }
    $display_title .= $m . '月' . $d . '日' . 'に考えたこと';
    return $display_title;
}

function format_title($_title, $_flag)
{
    $titles = explode('｜', $_title);
    $main    = $titles[0];
    $sub    = $titles[1];
    if ($_flag == 'main') {
        return $main;
    } elseif ($_flag == 'sub') {
        return $sub;
    }
}

function which_thoughts_title($_has_data, $_thoughts_title, $_title)
{
    if ($_has_data) {
        return $_thoughts_title;
    } else {
        return $_title;
    }
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
            window.addEventListener('load', function() {
                var $slugInput = $('#inspector-text-control-0');
                if ($slugInput) {
                    $slugInput.val("<?php echo date_i18n('Ymd'); ?>");
                }
            });
        });
    </script>
<?php }
add_action('admin_head-post.php', 'set_slug_date');

/* 投稿一覧にスラッグを追加 */
function add_post_column_title($columns)
{
    $columns['slug'] = "スラッグ";
    echo '<style>.fixed .column-slug {width:8%;}</style>';
    return $columns;
}
function add_post_column($column_name, $post_id)
{
    if ($column_name == 'slug') {
        $post = get_post($post_id);
        $slug = $post->post_name;
        echo esc_attr($slug);
    }
}
add_filter('manage_posts_columns', 'add_post_column_title');
add_action('manage_posts_custom_column', 'add_post_column', 10, 2);

/* 投稿一覧にサブタイトルを追加 */
function add_posts_columns($columns)
{
    $columns['subtitle'] = 'サブタイトル';
    return $columns;
}
function custom_posts_column($column_name, $post_id)
{
    if ($column_name == 'subtitle') {
        $sub_title = get_post_meta($post_id, 'sub_title', true);
        echo ($sub_title) ? $sub_title : '－';
    }
}
add_filter('manage_posts_columns', 'add_posts_columns');
add_action('manage_posts_custom_column', 'custom_posts_column', 10, 2);

/* スラッグの入力に大文字を使用可能にする */
remove_filter('sanitize_title', 'sanitize_title_with_dashes');
add_filter('sanitize_title', 'ap_sanitize_title_with_dashes');
function ap_sanitize_title_with_dashes($title)
{
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    $title = remove_accents($title);
    if (seems_utf8($title)) {
        $title = utf8_uri_encode($title, 200);
    }
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);
    // Keep upper-case chars too!
    $title = preg_replace('/[^%a-zA-Z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    return $title;
}

function convert_content($content)
{
    $convert_content = mb_convert_kana($content, 'AS', 'UTF-8');
    return $convert_content;
}
function convert_title($title)
{
    $convert_title = mb_convert_kana($title, 'AS', 'UTF-8');
    return $convert_title;
}
add_filter('the_content', 'convert_content');
add_filter('the_title', 'convert_title');

?>