<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


vc_map(
    array(
        "name" => __( "Contact Info Box", "xzopro-toolkit" ),
        "base" => "xzopro_contact_info",
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            // params group
            array(
                "type" => "param_group",
                "param_name" => "contact_infos",
                "heading" => __( "Add Contact Info List ", "xzopro-toolkit" ),
                "description" => __("Add contact info list here.", "xzopro-toolkit" ),

                "params" => array(

                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "heading" => __( "Icon Type", 'xzopro-toolkit' ),
                        "param_name" => "icontype",
                        'value' => array(
                            __( 'FlatIcon', 'xzopro-toolkit' )     => 'flaticon',
                            __( 'FontAwesome', 'xzopro-toolkit' )  => 'fontawesome',
                        ),
                        "std" => "flaticon"
                    ),


                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'Flaticon', 'xzopro-toolkit' ),
                        'param_name' => 'icon_flat',
                        "value" => 'flaticon-xzopro-placeholder',
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'flaticon',
                            'iconsPerPage' => 160,
                        ),
                        'dependency' => array(
                            'element' => 'icontype',
                            'value'   => array( 'flaticon' ),
                        ),
                    ),

                    array(
                        'type' => 'iconpicker',
                        'heading' => __( 'FontAwesome Icon', 'xzopro-toolkit' ),
                        'param_name' => 'icon_fa',
                        "value" => 'fa fa-map-marker',
                        'settings' => array(
                            'emptyIcon' => false,
                            'iconsPerPage' => 160,
                        ),
                        'dependency' => array(
                            'element' => 'icontype',
                            'value'   => array( 'fontawesome' ),
                        ),
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __( "Info Title", "xzopro-toolkit" ),
                        "param_name" => "info_title",
                        "admin_label" => true,
                        "description" => __( "Type title here link here.", "xzopro-toolkit" ),
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __( "Info Description", "xzopro-toolkit" ),
                        "param_name" => "info_dsc",
                        "description" => __( "Type info description here.", "xzopro-toolkit" ),
                    ),


                ),

            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Info Box Background Color", "xzopro-toolkit" ),
                "param_name" => "ib_bg_color",
                "std" => "#000000",
                "admin_label" => true,
                "description" => __( "Select icon and info heading color.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Icon and Heading Color", "xzopro-toolkit" ),
                "param_name" => "i_h_color",
                "std" => "#0a6db7",
                "admin_label" => true,
                "description" => __( "Select icon and info heading color.", "xzopro-toolkit" )
            ),

            array(
                "type" => "colorpicker",
                "heading" => __( "Info Text Color", "xzopro-toolkit" ),
                "param_name" => "i_t_color",
                "std" => "#ebebeb",
                "admin_label" => true,
                "description" => __( "Select icon and info heading color.", "xzopro-toolkit" )
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