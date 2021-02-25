<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Register slider Custom post

function xzopro_register_slide_post_type() {
    register_post_type( 'slide',
        array(
            'labels' => array(
                'name' => __( 'Slides', 'xzopro-toolkit' ),
                'singular_name' => __( 'Slide', 'xzopro-toolkit' ),
                'add_new_item' => __( 'Add New Slide', 'xzopro-toolkit' ),
                'all_items' => __( 'All Slides', 'xzopro-toolkit')
            ),
            'public' => false,
            'show_ui' => true,
            'menu_icon' => 'dashicons-format-gallery',
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        )
    );

    register_taxonomy(
        'slide_cat',
        'slide',
        array(
            'hierarchical'          => true,
            'label'                 => 'Categories',
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'slide-category',
                'with_front'        => true
            )
        )
    );
}
add_action( 'init', 'xzopro_register_slide_post_type' );

// Get Slide category list

function xzopro_slide_cat_list() {
    $slide_categories = get_terms('slide_cat');

    $slide_category_options = array(__('All Categories', 'xzopro-toolkit') => '');

    if($slide_categories){
        foreach($slide_categories as $slide_categorie){
            $slide_category_options[$slide_categorie -> name] = $slide_categorie -> slug;
        }
    }

    return $slide_category_options;
}