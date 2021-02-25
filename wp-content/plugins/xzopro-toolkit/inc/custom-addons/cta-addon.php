<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => __( "Call To Action", "xzopro-toolkit" ),
        "base" => "xzopro_cta",
        "category" => "Xzopro",
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __( "CTA Title", "xzopro-toolkit" ),
                "param_name" => "title",
                "holder" => "div",
                "description" => __( "Type your CTA title", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "CTA Subtitle", "xzopro-toolkit" ),
                "param_name" => "subtitle",
                "holder" => "div",
                "description" => __( "Type your CTA subtitle", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Text", "xzopro-toolkit" ),
                "param_name" => "btn_text",
                "holder" => "div",
                "std" => __( "Get Started", "xzopro-toolkit" ),
                "description" => __( "Type CTA button text here..", "xzopro-toolkit" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Link To", "xzopro-toolkit" ),
                "param_name" => "link_to",
                "std" =>  "1",
                "value" => array(
                    __('Page', 'xzopro-toolkit') => '1',
                    __('External link', 'xzopro-toolkit') => '2',
                ),
                "description" => __( "Select page or external link for cta button.", "xzopro-toolkit" )
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Select Page", "xzopro-toolkit" ),
                "param_name" => "link_to_page",
                "value" => xzopro_get_page_as_list(),
                "holder" => "div",
                "description" => __( "Select a page.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "link_to",
                    "value" => array("1"),
                )
            ),
            array(
                "type" => "textfield",
                "heading" => __( "Link", "xzopro-toolkit" ),
                "param_name" => "link_external",
                "description" => __( "Enter CTA button external link here.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "link_to",
                    "value" => array("2"),
                )
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