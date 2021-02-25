<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

function xzopro_blog_post_cat_list() {
    $post_categories = get_terms('category');

    $post_category_options = array(esc_html__('All Categories', 'xzopro-toolkit') => '');

    if($post_categories){
        foreach($post_categories as $post_categorie){
            $post_category_options[$post_categorie -> name] = $post_categorie -> term_id;
        }
    }

    return $post_category_options;
}

vc_map(
    array(
        "name" => esc_html__( "Recent Posts", "xzopro-toolkit" ),
        "base" => "xzopro_blog",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Post count", "xzopro-toolkit" ),
                "param_name" => "count",
                "admin_label" => true,
                "std" => "3",
                "value" => array(
                    __( "All Post", "xzopro-toolkit" ) => '-1',
                    __( "1", "xzopro-toolkit" ) => '1',
                    __( "2", "xzopro-toolkit" ) => '2',
                    __( "3", "xzopro-toolkit" ) => '3',
                    __( "4", "xzopro-toolkit" ) => '4',
                    __( "5", "xzopro-toolkit" ) => '5',
                    __( "6", "xzopro-toolkit" ) => '6',
                    __( "7", "xzopro-toolkit" ) => '7',
                    __( "8", "xzopro-toolkit" ) => '8',
                    __( "9", "xzopro-toolkit" ) => '9',
                    __( "10", "xzopro-toolkit" ) => '10',
                ),
                "description" => __( "How many post you want to show?", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Category", "xzopro-toolkit" ),
                "param_name" => "category",
                "admin_label" => true,
                "value" => xzopro_blog_post_cat_list(),
                "description" => __( "Show specific category post.", "xzopro-toolkit" )
            ),

            array(
                'type' => 'css_editor',
                'heading' => __( 'Css Box', 'xzopro-toolkit' ),
                'param_name' => 'css',
                'group' => __( 'Design Options', 'xzopro-toolkit' ),
            )
        )
    )
);