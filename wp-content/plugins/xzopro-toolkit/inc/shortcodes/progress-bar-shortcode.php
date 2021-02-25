<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_progress_bar_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'progress_bar_group' => '',
        'bar_title' => '',
        'bar_percent' => '',
        'text_color' => '',
        'border_color' => '',
        'bg_color' => '',
        'fill_color' => '#444444',
        'css' => ''
    ), $atts) );

    if(!empty($text_color)){
        $t_color = $text_color;
    }else{
        $t_color = '#444444';
    }

    if(!empty($border_color)){
        $b_color = $border_color;
    }else{
        $b_color = '#bbbbbb';
    }

    if(!empty($bg_color)){
        $back_color = $bg_color;
    }else{
        $back_color = '#bbbbbb';
    }


    if(function_exists( 'vc_param_group_parse_atts' ) && !empty($atts['progress_bar_group'])){
        $progress_bar_group = vc_param_group_parse_atts( $atts['progress_bar_group']);
    }else{
        $progress_bar_group = array();
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $progress_bar_markup ='<div class="progress-wrapper  '.esc_attr($custom_css).'">';

        foreach ($progress_bar_group as $progress_bar) {

            $progress_bar_markup .= '<div class="skill-wrapper" style="color: '.esc_attr($t_color).'">';
                if(!empty($progress_bar['bar_title'])){
                    $progress_bar_markup .='<div class="skill-title">'.$progress_bar['bar_title'].'</div>';
                }
            $progress_bar_markup .='<div class="skillbar"';

                        if(!empty($progress_bar['bar_percent'])){
                            $progress_bar_markup .=' data-percent="'.esc_attr($progress_bar['bar_percent']).'%"';
                        }
            $progress_bar_markup .=' style="background: '.esc_attr($back_color).'; border-color: '.esc_attr($b_color).';">
                        <div class="progress-fill-bar" style="background: '.esc_attr($fill_color).';">';

                    if(!empty($progress_bar['bar_percent'])){
                        $progress_bar_markup .='
                            <div class="skill-percent-count-wrap"><span class="skill-percent-count">'.esc_attr($progress_bar['bar_percent']).'</span>%</div>
                        ';
                    }
            $progress_bar_markup .='
                        </div>
                    </div>             
                </div>
            ';
        }
    $progress_bar_markup .='</div>';

    return $progress_bar_markup;
}
add_shortcode('xzopro_progress_bar', 'xzopro_progress_bar_shortcode');