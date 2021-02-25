<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_contact_info_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'icontype' => 'flaticon',
        'icon_flat' => 'flaticon-xzopro-placeholder',
        'icon_fa' => 'fa fa-map-marker',
        'info_title' => '',
        'info_dsc' => '',
        'ib_bg_color' => '#000000',
        'i_t_color' => '#ebebeb',
        'i_h_color' => '#0a6db7',
        'css' => ''
    ), $atts) );

    if(function_exists( 'vc_param_group_parse_atts' ) && !empty($atts['contact_infos'])){
        $contact_infos = vc_param_group_parse_atts( $atts['contact_infos']);
    }else{
        $contact_infos = array();
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $xzopro_contact_info_markup ='
        <div class="contact-info-box '.esc_attr($custom_css).'" style="background-color: '.esc_attr($ib_bg_color).'">
            <div class="contact-info-content" style="color: '.esc_attr($i_t_color).'">
                <ul class="no-list-style">';

                    if(is_array($contact_infos)){
                        foreach($contact_infos as $contact_info){
                            if($contact_info['icontype'] == 'flaticon'){
                                $icon = $contact_info['icon_flat'];
                            }elseif($contact_info['icontype'] == 'fontawesome'){
                                $icon = $contact_info['icon_fa'];
                            }else{
                                $icon = 'flaticon-xzopro-placeholder';
                            }

                            $xzopro_contact_info_markup .='<li><i style="color: '.esc_attr($i_h_color).'" class="'.esc_attr($icon).'"></i> <span  style="color: '.esc_attr($i_h_color).'">'.esc_html($contact_info['info_title']).' : </span>'.esc_html($contact_info['info_dsc']).'</li>';
                        }
                    }
    $xzopro_contact_info_markup .='
                </ul>
            </div>
        </div>
    ';

    return $xzopro_contact_info_markup;
}

add_shortcode( 'xzopro_contact_info', 'xzopro_contact_info_shortcode' );