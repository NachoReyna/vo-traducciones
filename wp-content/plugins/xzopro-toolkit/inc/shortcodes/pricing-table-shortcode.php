<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_priching_table_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'icontype' => 'flaticon',
        'icon_flat' => 'flaticon-xzopro-folder',
        'icon_fa' => 'fa fa-user-o',
        'title' => '',
        'tbl_tag' => '',
        'create_list' => '',
        'row_text' => '',
        'currency' => '',
        'price' => '',
        'btn_link' => '',
        'btn_txt' => '',
        'css' => '',
    ), $atts) );

    if($icontype == 'flaticon'){
        $icon = $icon_flat;
    }else{
        $icon = $icon_fa;
    }

    if(function_exists( 'vc_param_group_parse_atts' ) && !empty($atts['create_list'])){
        $create_list = vc_param_group_parse_atts( $atts['create_list']);
    }else{
        $create_list = '';
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $xzopro_priching_table_markup = '
        <div class="pricing-table-wrapper '.esc_attr($custom_css).'">
            <div class="single-pricing-table">';

                if(!empty($tbl_tag)) {

                    $xzopro_priching_table_markup .= '<div class="table-tag">'.esc_html($tbl_tag).'</div>';
                }

            $xzopro_priching_table_markup .= '
            
                <i class="'.esc_attr($icon).'"></i>
                <h2>'.esc_html($title).'</h2>
                
                <ul class="no-list-style">';

                    if(is_array($create_list)){
                        foreach($create_list as $tbl_row){
                            if(!empty($tbl_row['row_text'])){
                                $xzopro_priching_table_markup .= '<li>'.esc_html($tbl_row['row_text']).'</li>';
                            }
                        }
                    }
    $xzopro_priching_table_markup .= '
                </ul>
                
                <div class="price"><span class="price-unit">'.esc_html($currency).'</span>'.esc_html($price).'</div>
                
                <a href="'.esc_url($btn_link).'" class="xzopro-btn fill-btn pricing-btn">'.esc_html($btn_txt).'</a>
            </div>  
        </div>
    ';

    return $xzopro_priching_table_markup;
}
add_shortcode('xzopro_priching_table', 'xzopro_priching_table_shortcode');