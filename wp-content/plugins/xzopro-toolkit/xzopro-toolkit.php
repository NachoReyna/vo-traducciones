<?php
/*
Plugin Name: Xzopro Toolkit
Plugin URI: http://tf.themedraft.com/wp/xzopro
Author: ThemeDraft
Author URI: http://themedraft.com/
Version: 1.0
Description: This plugin is required for Xzopro wordpress theme
textdomain: xzopro-toolkit
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Translate direction
load_plugin_textdomain( 'xzopro-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// Defines
define( 'XZOPRO_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'XZOPRO_ACC_PATH', plugin_dir_path( __FILE__ ) );



/**
 * Widget Load
 */
require_once('inc/widgets/custom-widgets.php' );


//Custom Post type
require_once('inc/post-type/custom-posts.php' );

//Theme shortcodes
require_once('inc/shortcodes/custom-shortcodes.php' );

//Visual Composer addons
require_once('inc/custom-addons/custom-addons.php' );

require_once('inc/custom-addons/vc-flaticon/vc-flaticon.php' );

// Get Page List
function xzopro_get_page_as_list( ) {

    $args = wp_parse_args( array(
        'post_type'   => 'page',
        'numberposts' => -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array(esc_html__('-- Select page --', 'xzopro-toolkit')=>'');
    if ( $posts ) {
        foreach ( $posts as $post ) {
            $post_options[ $post->post_title ] = $post->ID;
        }
    }

    return $post_options;
}


