<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_choose_us_box_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'title' => '',
        'dsc' => '',
        'icontype' => 'flaticon',
        'icon_flat' => 'flaticon-xzopro-language',
        'icon_fa' => 'fa fa-user-o',
        'css' => '',
    ), $atts) );

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

    $choose_us_box_markup = '
        <div class="single-choose-us-box '.esc_attr($custom_css).'">
            <div class="choose_us-content-wrapper">
                <div class="choose-us-box-icon">
                    <i class="'.esc_attr($icon).'"></i>
                </div>
                <div class="choose_us-box-content">
                    <h4>'.esc_html($title).'</h4>
                    <p>'.esc_html($dsc).'</p>
                </div>
            </div>
        </div>
    ';

    return $choose_us_box_markup;
}
add_shortcode('xzopro_choose_us_box', 'xzopro_choose_us_box_shortcode');