<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Team Member", "xzopro-toolkit" ),
        "base" => "xzopro_team_member",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "attach_image",
                "heading" => __( "Member Image", "xzopro-toolkit" ),
                "param_name" => "member_img",
                "description" => __( "Upload member image", "xzopro-toolkit" ),
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Member Name", "xzopro-toolkit" ),
                "param_name" => "name",
                "holder" => "div",
                "description" => __( "Type member name here.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __( "Member Designation", "xzopro-toolkit" ),
                "param_name" => "designation",
                "holder" => "div",
                "description" => __( "Type member designation here.", "xzopro-toolkit" )
            ),

            // params group
            array(
                "type" => "param_group",
                "param_name" => "member_icons",
                "heading" => __( "Social Icons", "xzopro-toolkit" ),
                "description" => __("Add social links.", "xzopro-toolkit" ),

                "params" => array(
                    array(
                        "type" => "iconpicker",
                        "heading" => __( "Icon", "xzopro-toolkit" ),
                        "param_name" => "social_icon",
                        "admin_label" => true,
                        "description" => __("Select Icon", "xzopro-toolkit" ),
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __( "Icon URL", "xzopro-toolkit" ),
                        "param_name" => "social_link",
                        "description" => __( "Type icon url here.", "xzopro-toolkit" )
                    ),
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