<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_text_with_bg_color_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'twbg_title' => '',
        'bg_color' => '#0a6db7',
        'text_color' => '#242424',
        'css' => ''
    ), $atts) );

    $custom_css = vc_shortcode_custom_css_class( $css );

    $text_with_bg ='
        <div class="twbg-wrap '.esc_attr($custom_css).'" style="background-color: '.esc_attr($bg_color).'; color: '.esc_attr($text_color).'">
            <h4 style="color: '.esc_attr($text_color).'">'.esc_html($twbg_title).'</h4>
            '.wp_kses_post($content).'
        </div>
    ';

    return $text_with_bg;
}
add_shortcode('xzopro_text_with_bg_color', 'xzopro_text_with_bg_color_shortcode');