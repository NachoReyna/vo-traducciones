<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_about_box_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'title' => '',
        'dsc' => '',
        'link_type' => '1',
        'link_to_page' => '',
        'ext_link' => '',
        'icontype' => 'flaticon',
        'icon_flat' => 'flaticon-xzopro-language',
        'icon_fa' => 'fa fa-user-o',
        'css' => '',
    ), $atts) );

    if($link_type == '1'){
        $link_src = get_page_link($link_to_page);
    }else{
        $link_src = $ext_link;
    }

    if($icontype == 'flaticon'){
        $icon = $icon_flat;
    }else{
        $icon = $icon_fa;
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $about_box_markup = '
        <div class="single-about-box-wrap '.esc_attr($custom_css).'">
            <div class="about-box-content">
                <div class="about-box-top-icon">
                    <i class="'.esc_attr($icon).'"></i>
                </div>
                <h5>'.esc_html($title).'</h5>
                <p>'.esc_html($dsc).'</p>
                <a href="'.esc_url($link_src).'" class="about-box-link">
                    <i class="fa fa-angle-right"></i>
                </a>   
            </div>
        </div>
    ';

    return $about_box_markup;
}
add_shortcode('xzopro_about_box', 'xzopro_about_box_shortcode');