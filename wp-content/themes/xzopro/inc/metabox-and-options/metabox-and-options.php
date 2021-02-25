<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


//Remove Cs-frameworks all default options
function xzopro_cs_shortcode_options( $options ) {
    $options = array();
    return $options;
}

add_filter( 'cs_shortcode_options', 'xzopro_cs_shortcode_options' );

function xzopro_cs_customize_options( $options ) {
    $options = array();
    return $options;
}
add_filter( 'cs_customize_options', 'xzopro_cs_customize_options' );

function xzopro_cs_framework_settings( $settings ) {

    $settings = array();

    $settings           = array(
        'menu_title'      => esc_html__('Xzopro Options', 'xzopro'),
        'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'xzopro-theme-options',
        'ajax_save'       => true,
        'show_reset_all'  => true,
        'framework_title' => esc_html__('Xzopro Options', 'xzopro'),
    );

    return $settings;
}
add_filter( 'cs_framework_settings', 'xzopro_cs_framework_settings' );


// Add theme metabox
function xzopro_metabox( $options ) {
    $options = array();

    require get_template_directory() . '/inc/metabox-and-options/slide-metabox.php';
    require get_template_directory() . '/inc/metabox-and-options/page-metabox.php';
    require get_template_directory() . '/inc/metabox-and-options/testimonial-metabox.php';

    return $options;
}

add_filter( 'cs_metabox_options', 'xzopro_metabox' );

// Theme Options
require get_template_directory() . '/inc/metabox-and-options/theme-options.php';



function xzopro_add_codestar_iconset() {

    $title  = __( 'FlatIcon', 'xzopro' );
    $icons  = array(
        'flaticon-xzopro-settings',
        'flaticon-xzopro-puzzle',
        'flaticon-xzopro-graph',
        'flaticon-xzopro-target',
        'flaticon-xzopro-email',
        'flaticon-xzopro-clock-2',
        'flaticon-xzopro-phone-call',
        'flaticon-xzopro-placeholder',
        'flaticon-xzopro-stats',
        'flaticon-xzopro-business',
        'flaticon-xzopro-line-chart',
        'flaticon-xzopro-profits',
        'flaticon-xzopro-arrows',
        'flaticon-xzopro-file',
        'flaticon-xzopro-tool',
        'flaticon-xzopro-folder',
        'flaticon-xzopro-interface-1',
        'flaticon-xzopro-process',
        'flaticon-xzopro-analytics',
        'flaticon-xzopro-transport',
        'flaticon-xzopro-quality',
        'flaticon-xzopro-interface',
        'flaticon-xzopro-web-design',
        'flaticon-xzopro-computer',
        'flaticon-xzopro-creative-process',
        'flaticon-xzopro-science',
        'flaticon-xzopro-language',
        'flaticon-xzopro-arrow-point-to-right',
        'flaticon-xzopro-cogwheel',
        'flaticon-xzopro-help',
        'flaticon-xzopro-thinking',
        'flaticon-xzopro-account',
        'flaticon-xzopro-loupe',
        'flaticon-xzopro-clock-1',
        'flaticon-xzopro-clock',
        'flaticon-xzopro-technology',
    );

    echo '<h4 class="cs-icon-title">'. $title .'</h4>';
    foreach( $icons as $icon ) :
        echo '<a class="cs-icon-tooltip" data-cs-icon="'. esc_attr($icon) .'" data-title="'. esc_attr($icon) .'">';
        echo '<span class="cs-icon cs-selector"><i class="'. esc_attr($icon) .'"></i></span>';
        echo '</a>';
    endforeach;

}
add_action( 'cs_add_icons', 'xzopro_add_codestar_iconset' );