<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_service_box_shortcode($atts, $content = null){
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
        'btn_txt' => 'Read More',
        'box_style' => '2',
        'txt_color' => '#242424',
        'btn_text_color' => '#0a6db7',
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

    $rand = rand(100, 1000);

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $service_box_markup = '
        <div id="service-box-'.esc_attr($rand).'" class="single-service-box service-box-style-'.esc_attr($box_style).' '.esc_attr($custom_css).'">
            <div class="service-content-wrapper">
                <div class="service-box-icon">
                    <i class="'.esc_attr($icon).'"></i>
                </div>
                <div class="service-box-content">
                    <a href="'.esc_url($link_src).'"><h4>'.esc_html($title).'</h4></a>
                    <p>'.esc_html($dsc).'</p>
                    <a class="service-read-more" href="'.esc_url($link_src).'">'.esc_html($btn_txt).'</a>
                </div>
            </div>
        </div>
        
        <style>
            #service-box-'.esc_attr($rand).' .service-box-content,
            #service-box-'.esc_attr($rand).'.service-box-style-1 .service-box-icon,
            #service-box-'.esc_attr($rand).' .service-box-content a h4{
                color: '.esc_attr($txt_color).';
            }
            #service-box-'.esc_attr($rand).' .service-read-more,
            #service-box-'.esc_attr($rand).' .service-read-more:before,
            #service-box-'.esc_attr($rand).' .service-read-more:hover,
            #service-box-'.esc_attr($rand).'.single-service-box:hover a h4{
                color: '.esc_attr($btn_text_color).';
            }
            
            #service-box-'.esc_attr($rand).'.service-box-style-2:hover .service-box-icon{
                background: '.esc_attr($btn_text_color).';
                border-color: '.esc_attr($btn_text_color).';
            }
        </style>
    ';

    return $service_box_markup;
}
add_shortcode('xzopro_service_box', 'xzopro_service_box_shortcode');