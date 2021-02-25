<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_text_with_border_image_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'border_img' => '',
        'border_color' => '#0a6db7',
        'twbi_title' => '',
        'image_position' => '1',
        'css' => '',
    ), $atts) );

    $img_array = wp_get_attachment_image_src($border_img, 'xzopro-border-image');

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $text_with_border_image_markup = '
        <div class="twbi-wrapper '.esc_attr($custom_css).'">        
            <div class="row">';
                if($image_position == '1'){
                    $text_with_border_image_markup .= '        
                    <div class="col-lg-6 col-md-6">
                        <div class="border-image-wrap img-left">
                            <div class="border-image-wrap-border" style="background: '.esc_attr($border_color).'"></div>
                            <img src="'.esc_url($img_array[0]).'" alt="">
                        </div>
                    </div>';
                }
                
                $text_with_border_image_markup .= '
                <div class="col-lg-6 col-md-6">
                    <div class="twbi-text">
                        <h1>'.esc_html($twbi_title).'</h1>
                        '.wp_kses_post($content).'
                    </div>
                </div>';

                if($image_position == '2'){
                    $text_with_border_image_markup .= '        
                    <div class="col-lg-6 col-md-6">
                        <div class="border-image-wrap img-right">
                            <div class="border-image-wrap-border" style="background: '.esc_attr($border_color).'"></div>
                            <img src="'.esc_url($img_array[0]).'" alt="">
                        </div>
                    </div>';
                }
    $text_with_border_image_markup .= '
            </div>
        </div>
    ';

    return $text_with_border_image_markup;
}
add_shortcode('xzopro_text_with_border_image', 'xzopro_text_with_border_image_shortcode');