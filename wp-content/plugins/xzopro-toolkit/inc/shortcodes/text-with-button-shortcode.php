<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_text_with_btn_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'small_title' => '',
        'small_title_color' => '#0a6db7',
        'main_title' => '',
        'main_title_color' => '#242424',
        'content_color' => '#505050',
        'btn_txt' => __('Our History', 'xzopro-toolkit'),
        'btn_link' => '',
        'css' => ''
    ), $atts) );

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $text_with_btn ='
        <div class="twb-wrapper '.esc_attr($custom_css).'">';

        if(!empty($small_title)) {
            $text_with_btn .= '<h4 style="color: '.esc_attr($small_title_color).'">' . esc_html($small_title) . '</h4>';
        }
    
    $text_with_btn .='
            <h1 style="color: '.esc_attr($main_title_color).'">'.esc_html($main_title).'</h1>
            <div class="twb-content-text" style="color: '.esc_attr($content_color).'">
                '.wp_kses_post( $content ).'
            </div>
            
            <div class="twb-btn">
                 <a href="'.esc_url($btn_link).'" class="xzopro-btn fill-btn">'.esc_html($btn_txt).'</a>
            </div>
           
        </div>
    ';

    return $text_with_btn;
}
add_shortcode('xzopro_text_with_btn', 'xzopro_text_with_btn_shortcode');