<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => __( "Button", "xzopro-toolkit" ),
        "base" => "xzopro_button",
        "category" => "Xzopro",
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "dropdown",
                "heading" => __( "Button Type", "xzopro-toolkit" ),
                "param_name" => "btn_type",
                "std" => "fill",
                "admin_label" => true,
                "value" => array(
                    __('Fill Button', 'xzopro-toolkit') => 'fill',
                    __('Bordered Button', 'xzopro-toolkit') => 'bordered',
                    __('Text Button', 'xzopro-toolkit') => 'text',
                ),
                "description" => __( "Select button type.", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Link Type", "xzopro-toolkit" ),
                "param_name" => "link_type",
                "admin_label" => true,
                "std" =>  "1",
                "value" => array(
                    __('Page', 'xzopro-toolkit') => '1',
                    __('External link', 'xzopro-toolkit') => '2',
                ),
                "description" => __( "Select button link type.", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Select Page", "xzopro-toolkit" ),
                "param_name" => "link_to_page",
                "value" => xzopro_get_page_as_list(),
                "admin_label" => true,
                "description" => __( "Select a page.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "link_type",
                    "value" => array("1"),
                )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Enter URL", "xzopro-toolkit" ),
                "param_name" => "external_link",
                "description" => __( "Enter button URL here.", "xzopro-toolkit" ),
                "admin_label" => true,
                "dependency" => array(
                    "element" => "link_type",
                    "value" => array("2"),
                )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Button Text", "xzopro-toolkit" ),
                "param_name" => "btn_text",
                "admin_label" => true,
                "description" => __( "Type button text here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Button Background Color", "xzopro-toolkit" ),
                "param_name" => "fill_color",
                "std" => "#0a6db7",
                "description" => __( "Select button fill color.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "btn_type",
                    "value" => array("fill"),
                )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Button Border Color", "xzopro-toolkit" ),
                "param_name" => "border_color",
                "std" => "#242424",
                "description" => __( "Select button border color.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "btn_type",
                    "value" => array("bordered"),
                )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Button Background Color On Hover", "xzopro-toolkit" ),
                "param_name" => "fill_hov_color",
                "std" => "#253cac",
                "description" => __( "Select button fill color on hover.", "xzopro-toolkit" ),
                "dependency" => array(
                    "element" => "btn_type",
                    "value" => array("fill", "bordered"),
                )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Button Text Color", "xzopro-toolkit" ),
                "param_name" => "btn_txt_color",
                "std" => "#000000",
                "description" => __( "Select button text color.", "xzopro-toolkit" )

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Button Text Color On Hover", "xzopro-toolkit" ),
                "param_name" => "text_hov_color",
                "std" => "#242424",
                "description" => __( "Select button text color on hover.", "xzopro-toolkit" )

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