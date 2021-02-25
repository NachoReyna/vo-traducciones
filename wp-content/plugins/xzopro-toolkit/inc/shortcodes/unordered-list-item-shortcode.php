<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_unordered_list_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'list_title' => '',
        'un_lists' => '',
        'lsit_text' => '',
        'icontype' => 'flaticon',
        'icon_flat' => 'flaticon-xzopro-arrows',
        'icon_fa' => 'fa fa-check-circle-o',
        'list_img_ico' => '',
        'css' => '',
    ), $atts) );

    $custom_css = vc_shortcode_custom_css_class( $css );

    if($icontype == 'flaticon'){
        $icon = $icon_flat;
    }elseif($icontype == 'fontawesome'){
        $icon = $icon_fa;
    }else{
        $icon = '';
    }

    $list_number = rand(100, 1000);

    if(!empty($atts['un_lists'])){
        $un_lists = vc_param_group_parse_atts( $atts['un_lists']);
    }

    $text_unordered_list = '
    <div class="unordered-list-wrap '.esc_attr($custom_css).'">
         
        <h4>'.esc_html($list_title).'</h4>
                
            <div class="twial-list short-list no-list-style unordered-list-'.esc_attr($list_number).' list-icon-type-'.esc_attr($icontype).'">
                <ul>';
                    if(is_array($un_lists)){
                        foreach($un_lists as $un_list){
                            if(!empty($un_list['lsit_text'])){
                                $text_unordered_list .= '<li><i class="'.esc_attr($icon).'"></i>'.esc_html($un_list['lsit_text']).'</li>';
                            }
                        }
                    }
    $text_unordered_list .= '
                </ul>
            </div>  
        ';

        if($icontype == 'imageicon') {
            $img_ico_array = wp_get_attachment_image_src($list_img_ico, 'xzopro-border-image');

            $text_unordered_list .= '    
                <style>
                     .unordered-list-' . esc_attr($list_number) . '.list-icon-type-imageicon li:before {
                         background-image: url('.esc_url($img_ico_array[0]).');
                     }   
                </style>
            ';
        }
    $text_unordered_list .= '
    </div>
    ';

    return $text_unordered_list;
}
add_shortcode('xzopro_unordered_list', 'xzopro_unordered_list_shortcode');