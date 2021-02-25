<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_counter_box_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'number' => '',
        'count_text' => '',
        'units' => '',
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

    $xzopro_counter_box_markup = '
		<div class="counter-box-table '.esc_attr($custom_css).'">
            <div class="counter-box-cell">    
                <div class="single-counter-box">
                    <div class="count-content">
                        <div class="count-icon">
                            <i class="'.esc_attr($icon).'"></i>
                        </div>
                        <div class="count-number">'.esc_html($number).'</div><span>'.esc_html($units).'</span>
                        <div class="count-text">'.esc_html($count_text).'</div>
                    </div>
                </div>            
            </div>
		</div>
    ';

    return $xzopro_counter_box_markup;
}

add_shortcode( 'xzopro_counter_box', 'xzopro_counter_box_shortcode' );