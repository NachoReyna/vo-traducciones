<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_testimonial_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'position' => '',
        'count' => '-1',
        'category' => '',
        'loop' => 'true',
        'nav' => 'false',
        'dots' => 'false',
        'autoplay' => 'true',
        'autoplay_time' => 4000,
        'desktop_count' => '3',
        'tab_count' => '2',
        'css' => '',
    ), $atts) );

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }


    if(!empty($category)){
        $xzopro_testimonial = new WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => $count,
            'tax_query' => array(
                array(
                    'taxonomy' => 'testimonial_cat',
                    'field'    => 'slug',
                    'terms' => $category
                )
            )
        ));
    }else {

        $xzopro_testimonial = new WP_Query(array('posts_per_page' => $count, 'post_type' => 'testimonial'));
    }


    $xzopro_testimonial_markup = '
    <script>
        jQuery(window).load(function(){
            jQuery("#xzopro-testimonial").owlCarousel({
                items:'.esc_js($desktop_count).',
                smartSpeed:1000,        
                loop: '.esc_js($loop).',
                autoplay: '.esc_js($autoplay).',
                autoplayTimeout: '.esc_js($autoplay_time).',
                margin: 30,
                nav: '.esc_js($nav).',
                dots: '.esc_js($dots).',
                navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
                responsive : {
                    
                    0 : {
                        items:1
                    },
                    768 : {
                        items:'.esc_js($tab_count).'
                    },
                    992 : {
                        items:'.esc_js($desktop_count).',
                    }
                }
            });    
        });
    </script>
    
    <div class="testimonial-main-wrap '.esc_attr($custom_css).'">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="xzopro-testimonial" class="testimonial-wrapper owl-carousel">';

                    while($xzopro_testimonial->have_posts()) : $xzopro_testimonial->the_post();
                        $testimonial_id = get_the_ID();
                        $testimo_content = get_the_content();

                        if(get_post_meta($testimonial_id, 'xzopro_testimonial_meta', true)){
                            $testimonial_meta = get_post_meta($testimonial_id, 'xzopro_testimonial_meta', true);
                        }else{
                            $testimonial_meta = array();
                        }

                        if(array_key_exists('position', $testimonial_meta)){
                            $position = $testimonial_meta['position'];
                        }else{
                            $position = '';
                        }

                        $xzopro_testimonial_markup.= '
                        <div class="single-testimonial">
                            <div class="testimonial-quote">
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </div>
                           
                            <div class="testimonial-content">        
                                '.wpautop($testimo_content).'
                            </div>   
                            
                            <div class="author-details">
                                <div class="author-image" style="background-image: url('.get_the_post_thumbnail_url($testimonial_id, 'thumbnail').')"></div>
                                <h4>'.get_the_title().'</h4>
                                 <p class="author-position">'.esc_html($position).'</p>
                            </div>          
                        </div>';
                    endwhile;

    $xzopro_testimonial_markup.= '</div></div></div></div></div>';

    wp_reset_query();

    return $xzopro_testimonial_markup;
}
add_shortcode('xzopro_testimonial', 'xzopro_testimonial_shortcode');