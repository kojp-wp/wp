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
?>