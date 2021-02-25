<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Unordered List", "xzopro-toolkit" ),
        "base" => "xzopro_unordered_list",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "xzopro-toolkit" ),
                "param_name" => "list_title",
                "holder" => "div",
                "description" => __( "Type section title here.", "xzopro-toolkit" )
            ),

            // params group
            array(
                "type" => "param_group",
                "param_name" => "un_lists",
                "heading" => __( "Add List", "xzopro-toolkit" ),
                "description" => __("Click + icon for add more list.", "xzopro-toolkit" ),

                "params" => array(

                    array(
                        "type" => "textfield",
                        "heading" => __( "List Text", "xzopro-toolkit" ),
                        "param_name" => "lsit_text",
                        "admin_label" => true,
                        "description" => __( "Type list text here.", "xzopro-toolkit" ),
                    ),
                )
            ),

            array(
                "type" => "dropdown",
                "holder" => "div",
                "heading" => __( "Icon Type", 'xzopro-toolkit' ),
                "param_name" => "icontype",
                'value' => array(
                    __( 'FlatIcon', 'xzopro-toolkit' )     => 'flaticon',
                    __( 'FontAwesome', 'xzopro-toolkit' )  => 'fontawesome',
                    __( 'Custom Image', 'xzopro-toolkit' )  => 'imageicon',
                ),
                "std" => "flaticon",
                "description" => __( "Select Icon type", "xzopro-toolkit" )
            ),

            array(
                'type' => 'iconpicker',
                'heading' => __( 'Flaticon', 'xzopro-toolkit' ),
                'param_name' => 'icon_flat',
                "value" => 'flaticon-xzopro-arrows',
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'flaticon',
                    'iconsPerPage' => 160,
                ),
                'dependency' => array(
                    'element' => 'icontype',
                    'value'   => array( 'flaticon' ),
                ),
            ),

            array(
                'type' => 'iconpicker',
                'heading' => __( 'FontAwesome Icon', 'xzopro-toolkit' ),
                'param_name' => 'icon_fa',
                "value" => 'fa fa-check-circle-o',
                'settings' => array(
                    'emptyIcon' => false,
                    'iconsPerPage' => 160,
                ),
                'dependency' => array(
                    'element' => 'icontype',
                    'value'   => array( 'fontawesome' ),
                ),
            ),

            array(
                "type" => "attach_image",
                "heading" => __( "Upload Image Icon", "xzopro-toolkit" ),
                "param_name" => "list_img_ico",
                "description" => __( "Upload image icon", "xzopro-toolkit" ),
                'dependency' => array(
                    'element' => 'icontype',
                    'value'   => array( 'imageicon' ),
                ),
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