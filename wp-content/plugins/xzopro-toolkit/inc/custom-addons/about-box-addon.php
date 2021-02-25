<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "About Box", "xzopro-toolkit" ),
        "base" => "xzopro_about_box",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "dropdown",
                "holder" => "div",
                "heading" => __( "Icon Type", 'xzopro-toolkit' ),
                "param_name" => "icontype",
                'value' => array(
                    __( 'FlatIcon', 'xzopro-toolkit' )     => 'flaticon',
                    __( 'FontAwesome', 'xzopro-toolkit' )  => 'fontawesome',
                ),
                "std" => "flaticon",
                "description" => __( "Select Icon type", "xzopro-toolkit" )
            ),

            array(
                'type' => 'iconpicker',
                'heading' => __( 'Flaticon', 'xzopro-toolkit' ),
                'param_name' => 'icon_flat',
                "value" => 'flaticon-xzopro-language',
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
                "value" => 'fa fa-user-o',
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
                "type" => "textfield",
                "heading" => __( "Box Title", "xzopro-toolkit" ),
                "param_name" => "title",
                "std" => "",
                "holder" => "div",
                "description" => __( "Type about box title here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textarea",
                "heading" => __( "Box Description", "xzopro-toolkit" ),
                "param_name" => "dsc",
                "std" => "",
                "holder" => "div",
                "description" => __( "Type about box description here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Box Link Type", "xzopro-toolkit" ),
                "param_name" => "link_type",
                "std" => "1",
                "admin_label" => true,
                "value" => array(
                    __('Page', 'xzopro-toolkit') => '1',
                    __('External link', 'xzopro-toolkit') => '2',

                ),
                "description" => __( "Select link type.", "xzopro-toolkit" ),

            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Select Page", "xzopro-toolkit" ),
                "param_name" => "link_to_page",
                "value" => xzopro_get_page_as_list(),
                "admin_label" => true,
                "description" => __( "Select a page.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "link_type",
                    "value" => array("1"),
                ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Type URL", "xzopro-toolkit" ),
                "param_name" => "ext_link",
                "admin_label" => true,
                "description" => __( "Type external link here.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "link_type",
                    "value" => array("2"),
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