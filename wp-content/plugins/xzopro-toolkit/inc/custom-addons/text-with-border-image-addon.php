<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Text With Border Image", "xzopro-toolkit" ),
        "base" => "xzopro_text_with_border_image",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "attach_image",
                "heading" => __( "Upload Image", "xzopro-toolkit" ),
                "param_name" => "border_img",
                "description" => __( "Upload border image", "xzopro-toolkit" ),
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Image Position", "xzopro-toolkit" ),
                "param_name" => "image_position",
                "admin_label" => true,
                "std" => "left",
                "value" => array(
                    __('Left', 'xzopro-toolkit') => '1',
                    __('Right', 'xzopro-toolkit') => '2',
                ),
                "description" => __( "Select image position.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Image Border Color", "xzopro-toolkit" ),
                "param_name" => "border_color",
                "std" => "#0a6db7",
                "description" => __( "Select image border color.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Title", "xzopro-toolkit" ),
                "param_name" => "twbi_title",
                "holder" => "div",
                "description" => __( "Type section title here.", "xzopro-toolkit" )
            ),

            array(
                "type"       => "textarea_html",
                "holder"     => "div",
                "heading"    => __( "Content Text", 'xzopro-toolkit' ),
                "param_name" => "content",
                "description" => __( "Type content text here", "xzopro-toolkit" )
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