<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_team_member_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'member_img' => '',
        'name' => '',
        'designation' => '',
        'member_icons' => '',
        'social_icon' => '',
        'social_link' => '',
        'css' => ''
    ), $atts) );

    $img_array = wp_get_attachment_image_src($member_img, 'xzopro-team');

    if(function_exists( 'vc_param_group_parse_atts' ) && !empty($atts['member_icons'])){
        $member_icons = vc_param_group_parse_atts( $atts['member_icons']);
    }else{
        $member_icons = array();
    }

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $team_member_markup = '
        <div class="single-team-member text-center '.esc_attr($custom_css).'">
            <div class="member-image">
                <img src="'.esc_url($img_array[0]).'" alt="">
            </div>
            
            <div class="member-content">
                <h4>'.esc_html($name).'</h4>
                <p>'.esc_html($designation).'</p>
            </div>';

            $team_member_markup .= '        
                <div class="member-icons">
                    <ul class="no-list-style">';
                        if (is_array($member_icons)) {
                            foreach ($member_icons as $member_icon) {
                                if(!empty($member_icon['social_icon']) && !empty($member_icon['social_link'])){
                                    $team_member_markup .= '
                                <li><a href="' . esc_url($member_icon['social_link']) . '"><i class="' . esc_attr($member_icon['social_icon']) . '"></i></a></li>
                                ';
                                }

                            }
                        }
            $team_member_markup .= '                
                    </ul>
                </div>
        </div>
    ';



    return $team_member_markup;
}
add_shortcode('xzopro_team_member', 'xzopro_team_member_shortcode');