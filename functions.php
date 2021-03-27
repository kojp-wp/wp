<?php
/**記事即時公開用アラート用**/
$confirm_message = '記事を”いますぐ”公開してもいいですか？';
function confirm_publish() {
  global $confirm_message;
  echo '<script type="text/javascript"><!--
  var publish = document.getElementById("publish");
  if (publish !== null) publish.onclick = function() {
      return confirm( "'.$confirm_message.'" );
  };
  // --></script>';
}
add_action( 'admin_footer', 'confirm_publish' );
// Load theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );
// Load Post Images
require_once ( get_stylesheet_directory() .  '/images.php');
// Automatic Feed Links
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support('automatic-feed-links');
}
// Add Editor Styles
add_editor_style('editor-style.css');
// Add Content Width
if ( ! isset( $content_width ) ) $content_width = 950;
// Allow Custom Background Image
add_custom_background();
	
// Add Custom Header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 950); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 425);
define( 'NO_HEADER_TEXT', true );
// Add Custom Header CSS to Theme Head
function f8_header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
    </style><?php
}
// Add Custom Header CSS to Admin
function f8_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
add_custom_image_header('f8_header_style', 'f8_admin_header_style');
// Add Post Thumbnail Theme Support
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 310, 150, true ); // 310x150 size
	add_image_size( '950x425', 950, 425, true ); // 950x425 image size
	add_image_size( '950', 950, 9999 ); // 950 image size
}
// Enqueue Javascripts
if (!is_admin()) add_action( 'init', 'f8_load_base_js' );
function f8_load_base_js( ) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery.cycle', get_bloginfo('template_directory').'/js/jquery.cycle.js', array('jquery'));
	wp_enqueue_script('superfish', get_bloginfo('template_directory').'/js/nav/superfish.js', array( 'jquery' ) );
	wp_enqueue_script('supersubs', get_bloginfo('template_directory').'/js/nav/supersubs.js', array( 'jquery' ) );
	wp_enqueue_script( 'comment-reply' );
}
function f8_load_dom_ready_js() {
	$doc_ready_script .= '
	<script type="text/javascript">
		jQuery(document).ready(function() {
		
			jQuery.fn.cleardefault = function() {
			return this.focus(function() {
				if( this.value == this.defaultValue ) {
					this.value = "";
				}
			}).blur(function() {
				if( !this.value.length ) {
					this.value = this.defaultValue;
				}
			});
		};
		
		jQuery(".clearit input, .clearit textarea").cleardefault();
		
		
    jQuery(".sf-menu ul").supersubs({
        minWidth:    12,
        maxWidth:    27,
        extraWidth:  1
    }).superfish({
    		delay:       500,
		animation:   {opacity:"show",height:"show"},
		speed:       100,
		autoArrows:  true,
		dropShadows: true
    });';
	 if(is_home()) {
	 $doc_ready_script .= 'jQuery("#slideshow-posts").cycle({
	        fx:      "fade",
	        timeout:  4000,
	        prev:    "#prev",
	        next:    "#next",
	        pager:   "#slideshow-nav"
	    });';
	 }
	       
	 $doc_ready_script .= '});
	</script>
			';
					
	echo $doc_ready_script;
	
}
// Add Javascripts
add_action('wp_head', 'f8_load_dom_ready_js');
// Add Theme Support
if ( function_exists( 'add_theme_support' ) ) {
	
	// Register our predefined menu positions
	add_action( 'init', 'f8_register_menus' );
	function f8_register_menus() {
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu' )
			)
		);
	}
}
if ( ! function_exists( 'f8_comment' ) ) :
function f8_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>
		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->
		<div class="comment-body"><?php comment_text(); ?></div>
		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
// Make Menu Support compatible with earlier WP versions
function f8_theme_nav() {
	if ( function_exists( 'wp_nav_menu' ) )
		wp_nav_menu( 'sort_column=menu_order&container_class=sf-menu clearfix&menu_location=main-menu&fallback_cb=gpptheme_nav_fallback' );
	else
		f8_nav_fallback();
}
// Create our GPP Fallback Menu
function f8_nav_fallback() {
    wp_page_menu( 'menu_class=sf-menu clearfix' );
}
// Make Widgets
if ( function_exists('register_sidebar') )
{
    register_sidebar
    (   array
        (
          'name' => 'Left',
          'before_widget' => '<div class="widgetleft">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );
    register_sidebar
    (   array
        (
          'name' => 'Middle',
          'before_widget' => '<div class="widgetmiddle">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );
 register_sidebar
    (   array
        (
          'name' => 'Right',
          'before_widget' => '<div class="widgetright">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );
}
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

?>