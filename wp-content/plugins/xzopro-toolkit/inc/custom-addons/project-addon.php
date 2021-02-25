<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

vc_map(
    array(
        "name" => __( "Projects", "xzopro-toolkit" ),
        "base" => "xzopro_projects",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __( "Project Count", "xzopro-toolkit" ),
                "param_name" => "count",
                "std" => "5",
                "admin_label" => true,
                "value" => array(
                    __('All Projects', "xzopro-toolkit" ) => '-1',
                    __('1', "xzopro-toolkit" ) => '1',
                    __('2', "xzopro-toolkit" ) => '2',
                    __('3', "xzopro-toolkit" ) => '3',
                    __('4', "xzopro-toolkit" ) => '4',
                    __('5', "xzopro-toolkit" ) => '5',
                    __('6', "xzopro-toolkit" ) => '6',
                    __('7', "xzopro-toolkit" ) => '7',
                    __('8', "xzopro-toolkit" ) => '8',
                    __('9', "xzopro-toolkit" ) => '9',
                    __('10', "xzopro-toolkit" ) => '10',
                ),
                "description" => __( "Select how many project you want to show?", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Enable Masonry?", "xzopro-toolkit" ),
                "param_name" => "enable_masonary",
                "std" => 1,
                "admin_label" => true,
                "value" => array(
                    __( 'Yes', "xzopro-toolkit" ) => 1,
                    __( 'No', "xzopro-toolkit" ) => 2,
                ),
                "description" => __( "Enable or disable masonry.", "xzopro-toolkit" ),
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Project Column Width", "xzopro-toolkit" ),
                "param_name" => "col_width",
                "std" => "",
                "admin_label" => true,
                "value" => array(
                    __( '3 Column', "xzopro-toolkit" ) => 'col-lg-3 col-md-6',
                    __( '4 Column', "xzopro-toolkit" ) => 'col-lg-4 col-md-6',
                    __( '6 Column', "xzopro-toolkit" ) => 'col-lg-6 col-md-6',
                ),
                "description" => __( "Set project item column width.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "enable_masonary",
                    "value" => array("2"),
                )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Enable Filter Option?", "xzopro-toolkit" ),
                "param_name" => "filter_opt",
                "std" => 1,
                "admin_label" => true,
                "value" => array(
                    __( 'Yes', "xzopro-toolkit" ) => 1,
                    __( 'No', "xzopro-toolkit" ) => 2,
                ),
                "description" => __( "Enable or disable project filter option.", "xzopro-toolkit" ),
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Enable Pagination?", "xzopro-toolkit" ),
                "param_name" => "show_pagination",
                "std" => "2",
                "admin_label" => true,
                "value" => array(
                    __( 'Yes', "xzopro-toolkit" ) => 1,
                    __( 'No', "xzopro-toolkit" ) => 2,
                ),
                "description" => __( "If total projects number is greater than project count and you want to show other projects in next page select yes.", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Text", "xzopro-toolkit" ),
                "param_name" => "btn_txt",
                "admin_label" => true,
                "std" => __( "Read More", "xzopro-toolkit" ),
                "description" => __( "Type button text here.", "xzopro-toolkit" )
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