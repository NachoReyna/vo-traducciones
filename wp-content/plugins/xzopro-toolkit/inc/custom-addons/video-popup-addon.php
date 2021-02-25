<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => __( "Popup Video", "xzopro-toolkit" ),
        "base" => "xzopro_video_popup",
        "category" => "Xzopro",
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "Title", "xzopro-toolkit" ),
                "param_name" => "title",
                "holder" => "div",
                "description" => __( "Type video title", "xzopro-toolkit" )
            ),

            array(
                "type" => "textarea",
                "heading" => __( "Description", "xzopro-toolkit" ),
                "param_name" => "desc",
                "holder" => "div",
                "description" => __( "Type video description", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Video Url", "xzopro-toolkit" ),
                "param_name" => "url",
                "holder" => "div",
                "description" => __( "Type video url here", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Content Container Width", "xzopro-toolkit" ),
                "param_name" => "width",
                "std" => "col-lg-8",
                "value" => array(
                    __( "1 Column", "xzopro-toolkit" ) => 'col-lg-1',
                    __( "2 Column", "xzopro-toolkit" ) => 'col-lg-2',
                    __( "3 Column", "xzopro-toolkit" ) => 'col-lg-3',
                    __( "4 Column", "xzopro-toolkit" ) => 'col-lg-4',
                    __( "5 Column", "xzopro-toolkit" ) => 'col-lg-5',
                    __( "6 Column", "xzopro-toolkit" ) => 'col-lg-6',
                    __( "7 Column", "xzopro-toolkit" ) => 'col-lg-7',
                    __( "8 Column", "xzopro-toolkit" ) => 'col-lg-8',
                    __( "9 Column", "xzopro-toolkit" ) => 'col-lg-9',
                    __( "10 Column", "xzopro-toolkit" ) => 'col-lg-10',
                    __( "11 Column", "xzopro-toolkit" ) => 'col-lg-11',
                    __( "12 Column", "xzopro-toolkit" ) => 'col-lg-12',
                ),
                "description" => __( "Select content container width", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Content Container Offset", "xzopro-toolkit" ),
                "param_name" => "offset",
                "std" => "offset-lg-2",
                "value" => array(

                    __( "0 Column", "xzopro-toolkit" ) => 'offset-lg-0',
                    __( "1 Column", "xzopro-toolkit" ) => 'offset-lg-1',
                    __( "2 Column", "xzopro-toolkit" ) => 'offset-lg-2',
                    __( "3 Column", "xzopro-toolkit" ) => 'offset-lg-3',
                    __( "4 Column", "xzopro-toolkit" ) => 'offset-lg-4',
                    __( "5 Column", "xzopro-toolkit" ) => 'offset-lg-5',
                    __( "6 Column", "xzopro-toolkit" ) => 'offset-lg-6',
                    __( "7 Column", "xzopro-toolkit" ) => 'offset-lg-7',
                    __( "8 Column", "xzopro-toolkit" ) => 'offset-lg-8',
                    __( "9 Column", "xzopro-toolkit" ) => 'offset-lg-9',
                    __( "10 Column", "xzopro-toolkit" ) => 'offset-lg-10',
                    __( "11 Column", "xzopro-toolkit" ) => 'offset-lg-11',
                ),
                "description" => __( "Select content container offset", "xzopro-toolkit" )
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