<?php

if ( ! defined( 'ABSPATH' ) ) {	exit; }

vc_map(
    array(
        "name" => __( "Brands Logos", "xzopro-toolkit" ),
        "base" => "xzopro_client",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "attach_images",
                "heading" => __( "Upload Logos", "xzopro-toolkit" ),
                "param_name" => "logos",
                "description" => __( "Upload logo images", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Height", "xzopro-toolkit" ),
                "param_name" => "height",
                "std" => "100",
                "description" => __( "Logo box height in pixel", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Enable Autoplay?", "xzopro-toolkit" ),
                "param_name" => "autoplay",
                "admin_label" => true,
                "std" => "true",
                "value" => array(
                    "Yes" => "true",
                    "No" => "false"
                ),
                "group" => __( "Slider Options", 'xzopro-toolkit' ),
                "description" => __( "Enable or disable autoplay.", "xzopro-toolkit" ),
            ),


            array(
                "type" => "dropdown",
                "heading" => __( "Enable Loop?", "xzopro-toolkit" ),
                "param_name" => "loop",
                "admin_label" => true,
                "std" => "true",
                "value" => array(
                    'Yes' => 'true',
                    'No' => 'false'
                ),
                "group" => __( "Slider Options", 'xzopro-toolkit' ),
                "description" => __( "Enable or disable loop.", "xzopro-toolkit" ),
            ),



            array(
                "type" => "dropdown",
                "heading" => __( "Slide Time", "xzopro-toolkit" ),
                "param_name" => "autoplay_time",
                "std" => "3000",
                "value" => array(
                    '1 Seconds' => '1000',
                    '2 Seconds' => '2000',
                    '3 Seconds' => '3000',
                    '4 Seconds' => '4000',
                    '5 Seconds' => '5000',
                    '6 Seconds' => '6000',
                    '7 Seconds' => '7000',
                    '8 Seconds' => '8000',
                    '9 Seconds' => '9000',
                    '10 Seconds' => '10000',
                ),

                "group" => __( "Slider Options", 'xzopro-toolkit' ),

                "description" => __( "Select slide time.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "autoplay",
                    "value" => array('true'),
                ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Desktop Count", "xzopro-toolkit" ),
                "param_name" => "desktop",
                "admin_label" => true,
                "std" => "5",
                "description" => __( "How many logos show on desktop in one time", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Tablet Count", "xzopro-toolkit" ),
                "param_name" => "tablet",
                "admin_label" => true,
                "std" => "4",
                "description" => __( "How many logos show on tablet in one time", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Mobile Count", "xzopro-toolkit" ),
                "param_name" => "x_small",
                "admin_label" => true,
                "std" => "2",
                "description" => __( "How many logos show on mobile in one time", "xzopro-toolkit" ),
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