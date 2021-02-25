<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Text With Title", "xzopro-toolkit" ),
        "base" => "xzopro_text_with_title",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __( "Title", "xzopro-toolkit" ),
                "param_name" => "twt_title",
                "holder" => "div",
                "description" => __( "Type title here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Title Font Size", "xzopro-toolkit" ),
                "param_name" => "font_size",
                "std" => "36",
                "holder" => "div",
                "description" => __( "Type title font size in pixel. example : 36", "xzopro-toolkit" )
            ),

            array(
                "type" 		 => "textarea_html",
                "holder" 	 => "div",
                "heading" 	 => __( "Content Text", 'xzopro-toolkit' ),
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