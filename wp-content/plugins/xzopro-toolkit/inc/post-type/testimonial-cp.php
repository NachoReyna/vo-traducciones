<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Register slides Custom posts

function xzopro_register_testimonial_post_type() {
    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonial' ),
                'singular_name' => __( 'Testimonial' ),
                'add_new_item' => __( 'Add New Testimonial' ),
                'all_items' => __( 'All Testimonials')
            ),
            'public' => false,
            'show_ui' => true,
            'menu_icon' => 'dashicons-testimonial',
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        )
    );

    register_taxonomy(
        'testimonial_cat',
        'testimonial',
        array(
            'hierarchical'          => true,
            'label'                 => 'Categories',
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'testimonial-category',
                'with_front'        => true
            )
        )
    );
}
add_action( 'init', 'xzopro_register_testimonial_post_type' );


// Get Testimonial category list

function xzopro_testimonial_cat_list() {
    $testimonial_categories = get_terms('testimonial_cat');

    $testimonial_category_options = array(__('All Categories', 'xzopro-toolkit') => '');

    if($testimonial_categories){
        foreach($testimonial_categories as $testimonial_categorie){
            $testimonial_category_options[$testimonial_categorie -> name] = $testimonial_categorie -> slug;
        }
    }

    return $testimonial_category_options;
}