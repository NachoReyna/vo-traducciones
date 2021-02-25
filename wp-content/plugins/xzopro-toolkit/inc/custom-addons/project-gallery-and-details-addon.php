<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

vc_map(
    array(
        "name" => __( "Project Gallery And Details", "xzopro-toolkit" ),
        "base" => "xzopro_project_gallery",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "attach_images",
                "heading" => __( "Upload Images", "xzopro-toolkit" ),
                "param_name" => "gallery_img",
                "description" => __( "Upload gallery images", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Enable Gallery Image Autoplay?", "xzopro-toolkit" ),
                "param_name" => "autoplay",
                "admin_label" => true,
                "std" => "true",
                "value" => array(
                    "Yes" => "true",
                    "No" => "false"
                ),
                "description" => __( "Enable or disable gallery image autoplay.", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Box title", "xzopro-toolkit" ),
                "param_name" => "title",
                "admin_label" => true,
                "description" => __( "Type detail box title.", "xzopro-toolkit" ),
            ),

            // params group
            array(
                "type" => "param_group",
                "param_name" => "pd_lists", //Project Detail list
                "heading" => __( "Add Project Details Row", "xzopro-toolkit" ),
                "description" => __("Click + icon for add more list.", "xzopro-toolkit" ),

                "params" => array(

                    array(
                        "type" => "textfield",
                        "heading" => __( "Bold Text", "xzopro-toolkit" ),
                        "param_name" => "bold_text",
                        "admin_label" => true,
                        "description" => __( "Type bold text here.", "xzopro-toolkit" ),
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __( "Normal Text", "xzopro-toolkit" ),
                        "param_name" => "normal_text",
                        "admin_label" => true,
                        "description" => __( "Type normal text here.", "xzopro-toolkit" ),
                    ),
                )
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