<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_project_gallery_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'title' => '',
        'gallery_img' => '',
        'pd_lists' => '',
        'bold_text' => '',
        'normal_text' => '',
        'autoplay' => 'true',
        'css' => ''
    ), $atts) );

    $gallery_img_id = explode(',', $gallery_img);

    $gallery_random = rand(111111, 99999999);

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    if(function_exists( 'vc_param_group_parse_atts' ) && !empty($atts['pd_lists'])){
        $pd_lists = vc_param_group_parse_atts( $atts['pd_lists']);
    }


    $xzopro_project_gallery_markup = '
		<script>
			jQuery(window).load(function(){
				jQuery("#project-gallery-'.esc_attr($gallery_random).'").owlCarousel({
				    items: 1,
					loop:true,
				    nav:true,
				    smartSpeed:1000,	    
				    dots: false,
				    autoplay: '.esc_js($autoplay).',
				    autoplayTimeout: 4000,
				    navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
				});
			});
		</script>';

    $xzopro_project_gallery_markup .= '
        <div class="gallery-and-details-wrap  '.esc_attr($custom_css).'">
            
            <div class="row">
                <div class="col-lg-8">
                    <div id="project-gallery-'.esc_attr($gallery_random).'" class="project-gallery owl-carousel">';
                        foreach($gallery_img_id as $single_img){

                            $gallery_img_array = wp_get_attachment_image_src($single_img, 'xzopro-image-gallery');


                            $xzopro_project_gallery_markup .= '
                                <div class="single-gallery-image">
                                    <img src="'.esc_url($gallery_img_array[0]).'" alt="">
                                </div>
                            ';
                        }
                        $xzopro_project_gallery_markup .= '
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="project-gallery-details-box">
                        <div class="project-gallery-details-content">
                            <h4>'.esc_html($title).'</h4>
                            <ul class="no-list-style">';

                                if(is_array($pd_lists)){
                                    foreach($pd_lists as $pd_list){
                                        $xzopro_project_gallery_markup .= '<li><h6>'.esc_attr($pd_list['bold_text']).' :</h6>  '.esc_html($pd_list['normal_text']).'</li>';

                                    }
                                }
    $xzopro_project_gallery_markup .= '
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    ';

    return $xzopro_project_gallery_markup;
}

add_shortcode( 'xzopro_project_gallery', 'xzopro_project_gallery_shortcode' );