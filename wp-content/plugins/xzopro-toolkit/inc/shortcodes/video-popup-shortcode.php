<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_video_popup_shortcode($atts, $content = null){
	extract( shortcode_atts( array(        
        'title' => '',
        'desc' => '',
        'url' => '',
        'width' => 'col-lg-8',
        'offset' => 'offset-lg-2',
        'css' => '',
    ), $atts) );

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $xzopro_video_popup_markup = '
        <div class="video-popup-content '.esc_attr($custom_css).'">
            <div class="row">
                <div class="'.esc_attr($width).' '.esc_attr($offset).' col-md-10 offset-md-1 text-center">
                    
                    <a class="mfp-iframe video-play-button" href="'.esc_url($url).'">
                        <i class="fa fa-play"></i>
                    </a>';

    if(!empty($title)){
        $xzopro_video_popup_markup .= '<h1>'.esc_html($title).'</h1>';
    }

    if(!empty($desc)){
        $xzopro_video_popup_markup .= ''.wpautop($desc).'';
    }

    $xzopro_video_popup_markup .= '
                    
                </div>
            </div>
        </div>
    ';

    return $xzopro_video_popup_markup;
}

add_shortcode( 'xzopro_video_popup', 'xzopro_video_popup_shortcode' );