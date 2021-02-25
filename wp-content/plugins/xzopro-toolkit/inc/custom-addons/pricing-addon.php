<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Pricing Table", "xzopro-toolkit" ),
        "base" => "xzopro_priching_table",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __( "Table Title", "xzopro-toolkit" ),
                "param_name" => "title",
                "std" => "",
                "holder" => "div",
                "description" => __( "Type table title here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Table Tag", "xzopro-toolkit" ),
                "param_name" => "tbl_tag",
                "holder" => "div",
                "description" => __( "Type table tag text here. example : Popular, Basic, Exclusive etc.", "xzopro-toolkit" )
            ),

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
                "value" => 'flaticon-xzopro-folder',
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

            // params group
            array(
                "type" => "param_group",
                "param_name" => "create_list",
                "heading" => __( "Create Row", "xzopro-toolkit" ),
                "description" => __("Click + icon for add more list / row", "xzopro-toolkit" ),
                
                "params" => array(

                    array(
                        "type" => "textfield",
                        "heading" => __( "Row Text", "xzopro-toolkit" ),
                        "param_name" => "row_text",
                        "admin_label" => true,
                        "description" => __( "Type table row text here.", "xzopro-toolkit" ),
                    ),
                )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Currency Symbol", "xzopro-toolkit" ),
                "param_name" => "currency",
                "std" => "",
                "holder" => "div",
                "description" => __( "Enter currency symbol here. Example $, €, ৳ etc. ", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Price", "xzopro-toolkit" ),
                "param_name" => "price",
                "holder" => "div",
                "description" => __( "Enter price here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Text", "xzopro-toolkit" ),
                "param_name" => "btn_txt",
                "holder" => "div",
                "description" => __( "Enter button text here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Link / Url", "xzopro-toolkit" ),
                "param_name" => "btn_link",
                "holder" => "div",
                "description" => __( "Enter button url here.", "xzopro-toolkit" )
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