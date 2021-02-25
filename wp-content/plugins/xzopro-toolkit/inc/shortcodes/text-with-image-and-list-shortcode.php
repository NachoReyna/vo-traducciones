<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_text_with_image_and_list_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'twial_img' => '',
        'twial_title' => '',
        'twial_list' => '',
        'lsit_text' => '',
        'icontype' => 'flaticon',
        'icon_flat' => 'flaticon-xzopro-arrows',
        'icon_fa' => 'fa fa-check-circle-o',
        'twial_img_ico' => '',
        'css' => '',
    ), $atts) );

    $img_array = wp_get_attachment_image_src($twial_img, 'xzopro-border-image');

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    if($icontype == 'flaticon'){
        $icon = $icon_flat;
    }elseif($icontype == 'fontawesome'){
        $icon = $icon_fa;
    }else{
        $icon = '';
    }

    $twial_number = rand(100, 1000);

    if(function_exists( 'vc_param_group_parse_atts' ) && !empty($atts['twial_list'])){
        $twial_list = vc_param_group_parse_atts( $atts['twial_list']);
    }

    $text_with_image_and_list = '
    <div class="twial-wrap '.esc_attr($custom_css).'">
        <div class="row">
            <div class="col-lg-6">
                <div class="twial-image-wrap">
                    <img src="'.esc_url($img_array[0]).'" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="twial-text-wrap">
                    <h4>'.esc_html($twial_title).'</h4>
                    <div class="twial-text">   
                        '.wp_kses_post($content).'
                    </div>
                </div>
                
                <div class="twial-list short-list no-list-style twial-list-'.esc_attr($twial_number).' list-icon-type-'.esc_attr($icontype).'">
                    <ul>';
                        if(is_array($twial_list)){
                            foreach($twial_list as $twial_list_item){
                                if(!empty($twial_list_item['lsit_text'])){
                                    $text_with_image_and_list .= '<li><i class="'.esc_attr($icon).'"></i>'.esc_html($twial_list_item['lsit_text']).'</li>';
                                }
                            }
                        }
    $text_with_image_and_list .= '
                    </ul>
                </div>
            </div>
        </div>';

    if($icontype == 'imageicon') {
        $img_ico_array = wp_get_attachment_image_src($twial_img_ico, 'xzopro-border-image');

        $text_with_image_and_list .= '    
            <style>
                 .twial-list-' . esc_attr($twial_number) . '.list-icon-type-imageicon li:before {
                     background-image: url('.esc_url($img_ico_array[0]).');
                 }   
            </style>
        ';
    }

    $text_with_image_and_list .= '
    </div>
    ';

    return $text_with_image_and_list;
}
add_shortcode('xzopro_text_with_image_and_list', 'xzopro_text_with_image_and_list_shortcode');