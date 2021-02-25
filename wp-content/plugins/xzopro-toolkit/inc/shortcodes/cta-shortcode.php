<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_cta_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'title' => '',
        'subtitle' => '',
        'btn_text' => __('Get Started', 'xzopro-toolkit'),
        'link_to' => '1',
        'link_to_page' => '',
        'link_external' => '',
        'css' => '',
    ), $atts) );

    if($link_to == "1"){
        $link = get_page_link($link_to_page);
    }else{
        $link = $link_external;
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $cta_markup = '
        <div class="cta-wrapper '.esc_attr($custom_css).'">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-9">
                        <h4>'.esc_html($title).'</h4>
                        <p>'.esc_html($subtitle).'</p>
                    </div>
                    
                    <div class="col-xl-4 col-lg-4 col-md-3">
                        <div class="cta-btn-wrap">
                            <a href="'.esc_url($link).'" class="xzopro-btn fill-btn cta-btn">'.esc_html($btn_text).'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

    return $cta_markup;
}
add_shortcode('xzopro_cta', 'xzopro_cta_shortcode');