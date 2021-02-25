<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

vc_map(
    array(
        "name" => __( "Counter Box", "xzopro-toolkit" ),
        "base" => "xzopro_counter_box",
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
                "description" => __( "Select counter box icon type", "xzopro-toolkit" )
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
                "heading" => esc_html__( "Count number", "xzopro-toolkit" ),
                "param_name" => "number",
                "holder" => "div",
                "description" => esc_html__( "Type count number here", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( "Units", "xzopro-toolkit" ),
                "param_name" => "units",
                "holder" => "div",
                "description" => esc_html__( "Enter units (Example: %, +) here", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => esc_html__( "Count Text", "xzopro-toolkit" ),
                "param_name" => "count_text",
                "holder" => "div",
                "description" => esc_html__( "Type count text here", "xzopro-toolkit" ),
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