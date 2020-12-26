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
?>