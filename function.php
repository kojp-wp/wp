<?php
function imdir( $file_name = NULL )
{
    if( $file_name ){
        $url = esc_url( get_template_directory_uri().'/assets/img/'.slug().'/'.$file_name );
        $path = get_template_directory().'/assets/img/'.slug().'/'.$file_name;

        return $url.'?v='.date( "YmdHis", filemtime( $path ));
    }
    else{
        return esc_url( get_template_directory_uri().'/assets/img' );
    }
}

if ( !function_exists( 'my_theme_var_setup' ) ){
	function my_theme_var_setup(){
    echo "Hello!";

    global $knicka_site_name = "ニッカオフィス / knicka office";
    global $knicka_site_description = "横浜の商店街で活動しているクリエイティブスタジオ";
    global $my_bg_color = "#999";
	}
	add_action( 'after_setup_theme', 'my_theme_var_setup' );
}
?>