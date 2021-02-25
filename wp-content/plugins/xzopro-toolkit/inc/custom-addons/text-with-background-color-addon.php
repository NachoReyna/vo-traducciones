<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Text With Background", "xzopro-toolkit" ),
        "base" => "xzopro_text_with_bg_color",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "xzopro-toolkit" ),
                "param_name" => "twbg_title",
                "holder" => "div",
                "description" => __( "Type title here.", "xzopro-toolkit" )
            ),

            array(
                "type" 		 => "textarea_html",
                "holder" 	 => "div",
                "heading" 	 => __( "Content Text", 'xzopro-toolkit' ),
                "param_name" => "content",
                "description" => __( "Type content text here", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Text Color", "xzopro-toolkit" ),
                "param_name" => "text_color",
                "std" => "#242424",
                "admin_label" => true,
                "description" => __( "Select text color.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Background Color", "xzopro-toolkit" ),
                "param_name" => "bg_color",
                "std" => "#0a6db7",
                "admin_label" => true,
                "description" => __( "Select background color.", "xzopro-toolkit" )
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