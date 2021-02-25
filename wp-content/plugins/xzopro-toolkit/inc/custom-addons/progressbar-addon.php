<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => __( "Progress Bar", "xzopro-toolkit" ),
        "base" => "xzopro_progress_bar",
        "category" => "Xzopro",
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            // params group
            array(
                "type" => "param_group",
                "param_name" => "progress_bar_group",
                "heading" => __( "Social Icons", "xzopro-toolkit" ),
                "description" => __("Add Progress Bar.", "xzopro-toolkit" ),

                "params" => array(

                    array(
                        "type" => "textfield",
                        "heading" => __( "Progress Bar Title", "xzopro-toolkit" ),
                        "param_name" => "bar_title",
                        "holder" => "div",
                        "description" => __( "Type progress bar title", "xzopro-toolkit" )
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __( "Progress Percentage", "xzopro-toolkit" ),
                        "param_name" => "bar_percent",
                        "holder" => "div",
                        "description" => __( "Type progress percentage without % symbol. example 80", "xzopro-toolkit" )
                    ),
                )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Text Color", "xzopro-toolkit" ),
                "param_name" => "text_color",
                "description" => __( "Select progress bar text color.", "xzopro-toolkit" )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Border Color", "xzopro-toolkit" ),
                "param_name" => "border_color",
                "description" => __( "Select progress bar border color.", "xzopro-toolkit" )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Background Color", "xzopro-toolkit" ),
                "param_name" => "bg_color",
                "description" => __( "Select progress bar background color.", "xzopro-toolkit" )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Fill Color", "xzopro-toolkit" ),
                "param_name" => "fill_color",
                "std" => "#444444",
                "description" => __( "Select progress fill color.", "xzopro-toolkit" )

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