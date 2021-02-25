<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_button_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'btn_type' => 'fill',
        'link_type' => '1',
        'link_to_page' => '',
        'external_link' => '',
        'btn_text' => '',
        'btn_txt_color' => '#000000',
        'text_hov_color' => '#242424',
        'fill_color' => '#0a6db7',
        'border_color' => '#242424',
        'fill_hov_color' => '#253cac',
        'css' => '',
    ), $atts) );

    $btn_id = rand(10, 1000);

    if($link_type == "1"){
        $btn_link = get_page_link($link_to_page);
    }else{
        $btn_link = $external_link;
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $button_markup = '
                    
        <a href="'.esc_url($btn_link).'" id="td-btn-'.esc_attr($btn_id).'" class="td-btn button-type-'.esc_attr($btn_type).' '.esc_attr($custom_css).'">'.esc_html($btn_text).'</a>
        
        <style>
            #td-btn-'.esc_attr($btn_id).' {
                color: '.esc_attr($btn_txt_color).';
            }
            
            #td-btn-'.esc_attr($btn_id).':hover {
                color: '.esc_attr($text_hov_color).';
            }';

            if($btn_type == 'fill'){
                $button_markup .= '
                    #td-btn-'.esc_attr($btn_id).'.button-type-fill{
 
                        background: '.esc_attr($fill_color).';
                        border-color: '.esc_attr($fill_color).';
                    }
                    
                    #td-btn-'.esc_attr($btn_id).'.button-type-fill:hover{
 
                        background: '.esc_attr($fill_hov_color).';
                        border-color: '.esc_attr($fill_hov_color).';  
                    }
                ';

            }

            if($btn_type == 'bordered'){
                $button_markup .= '
                    #td-btn-'.esc_attr($btn_id).'.button-type-bordered{
 
                        border-color: '.esc_attr($border_color).';
                    }
                    
                    #td-btn-'.esc_attr($btn_id).'.button-type-bordered:hover{
 
                        border-color: '.esc_attr($fill_hov_color).';
                        background: '.esc_attr($fill_hov_color).';
                    }
                ';

            }

            if($btn_type == 'text'){
                $button_markup .= '
                    .td-btn.button-type-text:before {
                        color: '.esc_attr($text_hov_color).';
                    }
                ';

            }
    $button_markup .= '
        </style>
    ';

    return $button_markup;
}
add_shortcode('xzopro_button', 'xzopro_button_shortcode');