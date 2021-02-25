<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_client_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'logos' => '',
        'loop' => 'true',
        'autoplay' => 'true',
        'autoplay_time' => '3000',
        'desktop' => '5',
        'tablet' => '4',
        'x_small' => '2',
        'height' => '100',
        'css' => ''
    ), $atts) );

    $logos_id = explode(',', $logos);

    $client_random = rand(111111, 99999999);

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }


    $xzopro_client_markup = '
		<script>
			jQuery(window).load(function(){
				jQuery("#xzopro-client-'.esc_attr($client_random).'").owlCarousel({
					loop:'.esc_attr($loop).',
				    nav:false,
				    smartSpeed:1000,
				    margin: 30,		    
				    dots: false,
				    autoplay:'.esc_attr($autoplay).',
				    autoplayTimeout: '.esc_attr($autoplay_time).',
				    responsive:{
				    	0:{
				    		items: '.esc_attr($x_small).'
				    	},
				    	480:{
				    		items: 3
				    	},
				    	768:{
				    		items: '.esc_attr($tablet).'
				    	},
				    	992:{
				    		items: '.esc_attr($desktop).'
				    	}
				    }
				});
			});
		</script>';

    $xzopro_client_markup .= '

		<div id="xzopro-client-'.esc_attr($client_random).'" class="xzopro-client owl-carousel '.esc_attr($custom_css).'">
	';

    foreach($logos_id as $single_logo){

        $logo_array = wp_get_attachment_image_src($single_logo, 'large');


        $xzopro_client_markup .= '
			<div class="single-logo-box" style="height:'.esc_attr($height).'px">
				<div class="single-brand-logo">
					<img src="'.esc_url($logo_array[0]).'" alt="">
				</div>
			</div>
		';
    }
    $xzopro_client_markup .= '
		</div>
    ';

    return $xzopro_client_markup;
}

add_shortcode( 'xzopro_client', 'xzopro_client_shortcode' );