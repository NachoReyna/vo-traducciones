<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_section_title_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'title' => '',
        'dsc' => '',
        'heading_color' => '#242424',
        'text_color' => '#505050',
        'shape_color' => '#0a6db7',
        'css' => '',
    ), $atts) );

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $xzopro_section_title_markup = '
        <div class="section-title-wrapper '.esc_attr($custom_css).'" style="color: '.esc_attr($text_color).'">
            <div class="row text-center">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">  
                    <h2 class="section-title" style="color:'.esc_attr($heading_color).'">'.esc_html($title).'</h2>
                    <ul class="title-shape no-list-style text-center">
                        <li style="background: '.esc_attr($shape_color).'"></li>
                        <li style="background: '.esc_attr($shape_color).'"></li>
                        <li style="background: '.esc_attr($shape_color).'"></li>
                    </ul>
                    <p>'.esc_html($dsc).'</p>
                </div>
            </div>   
        </div>
    ';

    return $xzopro_section_title_markup;
}
add_shortcode('xzopro_section_title', 'xzopro_section_title_shortcode');