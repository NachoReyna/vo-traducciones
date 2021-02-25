<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Section Title", "xzopro-toolkit" ),
        "base" => "xzopro_section_title",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __( "Section Title", "xzopro-toolkit" ),
                "param_name" => "title",
                "std" => "",
                "holder" => "div",
                "description" => __( "Type section title here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textarea",
                "heading" => __( "Section Title Description", "xzopro-toolkit" ),
                "param_name" => "dsc",
                "std" => "",
                "holder" => "div",
                "description" => __( "Type section title description here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Title Heading Color", "xzopro-toolkit" ),
                "param_name" => "heading_color",
                "std" => "#242424",
                "admin_label" => true,
                "description" => __( "Select section title heading color.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Title Text Color", "xzopro-toolkit" ),
                "param_name" => "text_color",
                "std" => "#505050",
                "admin_label" => true,
                "description" => __( "Select section title text color.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Title Shape Color", "xzopro-toolkit" ),
                "param_name" => "shape_color",
                "admin_label" => true,
                "std" => "#0a6db7",
                "description" => __( "Select section title shape color.", "xzopro-toolkit" )
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