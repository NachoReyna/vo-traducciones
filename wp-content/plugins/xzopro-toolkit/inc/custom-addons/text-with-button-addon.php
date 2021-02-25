<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => __( "Text With Button", "xzopro-toolkit" ),
        "base" => "xzopro_text_with_btn",
        "category" => "Xzopro",
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Small Title", "xzopro-toolkit" ),
                "param_name" => "small_title",
                "holder" => "div",
                "description" => __( "Type small title here. You can leave it empty if you dont want to use it.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Small Title Color", "xzopro-toolkit" ),
                "param_name" => "small_title_color",
                "std" => "#0a6db7",
                "description" => __( "Select small title color.", "xzopro-toolkit" )

            ),

            array(
                "type" => "textfield",
                "heading" => __( "Main Title", "xzopro-toolkit" ),
                "param_name" => "main_title",
                "holder" => "div",
                "description" => __( "Type main title here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Main Title Color", "xzopro-toolkit" ),
                "param_name" => "main_title_color",
                "std" => "#242424",
                "description" => __( "Select main title color.", "xzopro-toolkit" )

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
                "heading" => __( "Content Text Color", "xzopro-toolkit" ),
                "param_name" => "content_color",
                "std" => "#505050",
                "description" => __( "Select content text color.", "xzopro-toolkit" )

            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Text", "xzopro-toolkit" ),
                "param_name" => "btn_txt",
                "holder" => "div",
                "std" => "Our History",
                "description" => __( "Type button text here", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Link", "xzopro-toolkit" ),
                "param_name" => "btn_link",
                "holder" => "div",
                "description" => __( "Type button URL here", "xzopro-toolkit" )
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