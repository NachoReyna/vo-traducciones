<?php
/**
 * Enqueue scripts and styles.
 */
function xzopro_scripts() {
    wp_enqueue_style( 'xzopro-google-fonts', xzopro_fonts_url(), array(), null );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0', 'all' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );

    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.2.1', 'all' );

    wp_enqueue_style('xzopro-flaticon-custom', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon-custom.min.css', array(), '1.0.0', 'all');

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.1.0', 'all');

    wp_enqueue_style('slicknav-css', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0.10', 'all');

    wp_enqueue_style( 'xzopro-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all' );

    wp_enqueue_style( 'xzopro-style', get_stylesheet_uri() );


    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.12.9', true );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true );

    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '3.5.1', 'all' );

    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.2.1', true );

    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), '4.0.0', true );

    wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/js/waypoint.js', array('jquery'), '2.0.3', true );

    wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/counterup.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), '', true );

    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );

    wp_enqueue_script( 'slicsknav', get_template_directory_uri() . '/assets/js/slicknav.min.js', array('jquery'), '1.0.10', true );
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/sticky.js', array('jquery'), '1.0.4', true );

    wp_enqueue_script( 'xzopro-main', get_template_directory_uri() . '/assets/js/xzopro-main.js', array('jquery'), '1.0.0', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'xzopro_scripts' );

/**
 * Enqueue Backend scripts and styles.
 **/

function xzopro_backend_scripts(){
    wp_enqueue_style('xzopro-flaticon-custom', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon-custom.min.css', array(), '1.0.0', 'all');
}

add_action( 'admin_enqueue_scripts', 'xzopro_backend_scripts' );