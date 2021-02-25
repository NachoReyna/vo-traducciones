<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Register slides Custom posts

function xzopro_register_project_post_type() {
    register_post_type( 'project',
        array(
            'labels' => array(
                'name' => __( 'Projects', 'xzopro-toolkit' ),
                'singular_name' => __( 'Project', 'xzopro-toolkit' ),
                'add_new_item' => __( 'Add New Project', 'xzopro-toolkit' ),
                'all_items' => __( 'All Projects', 'xzopro-toolkit')
            ),
            'public' => true,
            'menu_icon' => 'dashicons-portfolio',
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        )
    );

    register_taxonomy(
        'project_cat',
        'project',
        array(
            'hierarchical'          => true,
            'label'                 => 'Categories',
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'project-category',
                'with_front'        => true
            )
        )
    );
}
add_action( 'init', 'xzopro_register_project_post_type' );