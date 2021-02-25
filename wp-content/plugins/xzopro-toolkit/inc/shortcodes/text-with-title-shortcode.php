<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_text_with_title_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'twt_title' => '',
        'font_size' => '36',
        'css' => ''
    ), $atts) );

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $text_with_title ='
        <div class="twt-wrap '.esc_attr($custom_css).'">
            <h1 style="font-size: '.esc_attr($font_size).'px">'.esc_html($twt_title).'</h1>
            '.wp_kses_post($content).'
        </div>
    ';

    return $text_with_title;
}
add_shortcode('xzopro_text_with_title', 'xzopro_text_with_title_shortcode');