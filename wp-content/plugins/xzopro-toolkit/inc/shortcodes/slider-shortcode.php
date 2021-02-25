<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function xzopro_slider_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        'count' => '3',
        'category' => '',
        'css' => '',
        'slide_effect' => '1',
        'slide_animation' => '1',
        'loop' => 'true',
        'autoplay' => 'true',
        'autoplay_time' => '4000',
        'nav_show' => 'true',
        'dot_show' => 'true',
    ), $atts));


    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }


    if(!empty($category)){
        $slideQuery = new WP_Query(array(
            'post_type' => 'slide',
            'posts_per_page' => $count,
            'tax_query' => array(
                array(
                    'taxonomy' => 'slide_cat',
                    'field'    => 'slug',
                    'terms' => $category
                )
            )
        ));
    }else {

        $slideQuery = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'slide'));
    }


    $slider_markup = '


        <script>
	        jQuery(window).load(function(){
                var homeslider = jQuery("#slider-wrapper");

	            homeslider.owlCarousel({
	                items: 1,
	                loop: '.esc_js($loop).',
	                autoplay: '.esc_js($autoplay).',
	                autoplayTimeout: '.esc_js($autoplay_time).',
	                nav: '.esc_js($nav_show).',
	                smartSpeed:1000,';

                    if($slide_effect == '1'){
                        $slider_markup .= '
                            animateIn: "fadeIn",
                            animateOut: "fadeOut",';
                    }

    $slider_markup .= '
	                dots: '.esc_js($dot_show).',
	                mouseDrag: false,
	                navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
	            });';

        if($slide_animation == '1') {
            $slider_markup .= '
	            homeslider.on("translate.owl.carousel", function(){
                    var layer = jQuery("[data-animation]");
                    layer.each(function() {
                        var anim_name = jQuery(this).data("animation");
                        jQuery(this).removeClass("animated " + anim_name).css("opacity", "0");
                    });
                });

                jQuery("[data-delay]").each(function () {
                    var anim_del = jQuery(this).data("delay");
                    jQuery(this).css("animation-delay", anim_del);
                });

                jQuery("[data-duration]").each(function () {
                    var anim_dur = jQuery(this).data("duration");
                    jQuery(this).css("animation-duration", anim_dur);
                });

                homeslider.on("translated.owl.carousel", function () {
                    var layer = homeslider.find(".owl-item.active").find("[data-animation]");
                    layer.each(function () {
                        var anim_name = jQuery(this).data("animation");
                        jQuery(this).addClass("animated " + anim_name).css("opacity", "1");
                    });
                });';
        }

    $slider_markup .= '            
	        })
	    </script>
	    
        <div class="slider-main-wrapper '.esc_attr( $custom_css ).'">
            <div id="slider-wrapper" class="slider-wrapper owl-carousel">';

            while($slideQuery -> have_posts()): $slideQuery -> the_post();
            $slide_id = get_the_ID();
            $slide_title = get_the_title();
            $slide_content = get_the_content();

            if(get_post_meta($slide_id, 'bold_text_meta', true)){
                $bold_text_meta = get_post_meta($slide_id, 'bold_text_meta', true);
            }else{
                $bold_text_meta = array();
            }

            if(get_post_meta($slide_id, 'btn_meta', true)){
                $btn_meta = get_post_meta($slide_id, 'btn_meta', true);
            }else{
                $btn_meta = array();
            }

            if(get_post_meta($slide_id, 'slider_content_meta', true)){
                $content_meta = get_post_meta($slide_id, 'slider_content_meta', true);
            }else{
                $content_meta = array();
            }

            if(array_key_exists('slider_content_width', $content_meta)){
                $content_wrap_width = $content_meta['slider_content_width'];
            }else{
                $content_wrap_width = 'col-xl-8 col-lg-9';
            }

            if(array_key_exists('slider_content_offset', $content_meta)){
                $slider_content_offset = $content_meta['slider_content_offset'];
            }else{
                $slider_content_offset = 'offset-xl-0 offset-lg-0';
            }

            if(array_key_exists('slider_text_align', $content_meta)){
                $slider_text_align = $content_meta['slider_text_align'];
            }else{
                $slider_text_align = '';
            }

            if(get_post_meta($slide_id, 'slider_overlay_meta', true)){
                $overlay_meta = get_post_meta($slide_id, 'slider_overlay_meta', true);
            }else{
                $overlay_meta = array();
            }

            if(array_key_exists('enable_overlay', $overlay_meta)){
                $overlay = $overlay_meta['enable_overlay'];
            }else{
                $overlay = true;
            }

            if(array_key_exists('overlay_color', $overlay_meta)){
                $overlay_bg = $overlay_meta['overlay_color'];
            }else{
                $overlay_bg = '#000000';
            }

            if(array_key_exists('overlay_opacity', $overlay_meta)){
                $overlay_opacity = $overlay_meta['overlay_opacity'];
            }else{
                $overlay_opacity = '.65';
            }



            $slider_markup .= '    
                <div class="single-slide-item" style="background-image: url('.get_the_post_thumbnail_url($slide_id, 'full').')">';

                if($overlay == true){
                    $slider_markup .= '<div class="slider-overlay" style="background: '.esc_attr($overlay_bg).'; opacity: '.esc_attr($overlay_opacity).'"></div>';
                }

                $slider_markup .= '    
                    <div class="slide-content-wrapper '.esc_attr($slider_text_align).'">
                        <div class="container">
                            <div class="row">
                                <div class="'.esc_attr($content_wrap_width).' '.esc_attr($slider_content_offset).' col-md-10 col-11">';
                                    if(!empty($slide_title)) {
                                        $slider_markup .= '
                                        <h2 class="slide-title" data-animation="fadeInUp" data-duration=".4s">'.esc_html($slide_title).'</h2>';
                                    }

                                    if(array_key_exists('bold_text', $bold_text_meta) && !empty($bold_text_meta['bold_text'])){

                                        $slider_markup .= '
                                        <h2 class="bold-title" data-animation="fadeInUp" data-duration=".4s" data-delay=".3s">'.esc_html($bold_text_meta['bold_text']).'</h2>';
                                    }

                                    if(!empty($slide_content)){
                                        $slider_markup .= '<div data-animation="fadeInUp" data-duration=".4s" data-delay=".6s">'.wpautop($slide_content).'</div>';
                                    }


                                    if(array_key_exists('buttons', $btn_meta) && !empty($btn_meta['buttons'])){

                                        foreach($btn_meta['buttons'] as $slide_btn) {

                                            if($slide_btn['linkto'] == 1){
                                                $btn_link = get_page_link($slide_btn['to_page']);
                                            }else{
                                                $btn_link = $slide_btn['to_external'];
                                            }

                                            $slider_markup .= '
                                            <a data-animation="fadeInUp" data-duration=".4s" data-delay=".9s" href="'.esc_url($btn_link).'" target="'.esc_attr($slide_btn['tab']).'" class="xzopro-btn slider-btn '.esc_attr($slide_btn['btn_type']).'-btn">'.esc_html($slide_btn['btn_text']).'</a>';
                                        }
                                    }
            $slider_markup .= '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            endwhile;

    $slider_markup .= '    
            </div>
        </div> ';

    wp_reset_query();

    return $slider_markup;
}

add_shortcode('xzopro_slider', 'xzopro_slider_shortcode');