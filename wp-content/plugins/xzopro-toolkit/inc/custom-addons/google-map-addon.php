<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

vc_map(
    array(
        "name" => __( "Google Map", "xzopro-toolkit" ),
        'base' => 'xzopro_gmap',
        "category" => __( "Xzopro", "xzopro-toolkit"),
        "heading" => __( "Select map location", "xzopro-toolkit" ),
        "icon"  => XZOPRO_ACC_URL.'/assets/images/td-logo.png',
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __("Map API Key", "xzopro-toolkit" ),
                "param_name" => "map_api",
                "std" => "AIzaSyDDD7T_bzxgh9KMbwTdoYdB9pk-EEANp9E",
                "description" => __("Paste your google API key here.", "xzopro-toolkit" )
            ),
            // params group
            array(
                "type" => "param_group",
                "param_name" => "locations",
                "heading" => __( "Map Location Details", "xzopro-toolkit" ),
                "description" => __("If you set more than one location first location considered as map center", "xzopro-toolkit" ),


                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => __( "Latitude", "xzopro-toolkit" ),
                        "param_name" => "latitude",
                        "std" => "41.1454454",
                        "admin_label" => true,
                        "description" => __("Enter location latitude", "xzopro-toolkit" ),
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __( "Longitude", "xzopro-toolkit" ),
                        "param_name" => "longitude",
                        "std" => "-74.07848",
                        "admin_label" => true,
                        "description" => __("Enter location longitude", "xzopro-toolkit" ),
                    ),

                    array(
                        "type" => "textarea",
                        "heading" => __( "Info Text", "xzopro-toolkit" ),
                        "param_name" => "desc",
                        "description" => esc_html__("Text show on info window if info window is enable. Please use <br> tag for line breake.", "xzopro-toolkit" ),
                        "std" => "Khulna Branch<br>Shonadanga main road<br>Khulna 9100",
                    )
                )
            ),

            array(
                "type" => "textfield",
                "heading" => __("Map Height", "xzopro-toolkit" ),
                "param_name" => "height",
                "admin_label" => true,
                "std" => "450",
                "description" => __("Set map height in pixel.", "xzopro-toolkit" )
            ),

            array(
                "type" => "textfield",
                "heading" => __("Map Zoom", "xzopro-toolkit" ),
                "param_name" => "map_zoom",
                "admin_label" => true,
                "std" => "10",
                "description" => __("Set map zoom level.", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Enable Info Window?", "xzopro-toolkit" ),
                "param_name" => "infowindow",
                "std" => "0",
                "value" => array(
                    "No" => "0",
                    "Yes" => "1"
                ),
                "description" => __("Enable or disable info window.", "xzopro-toolkit" )
            ),

            array(
                "type" => "dropdown",
                "heading" => __( "Visible Info Window", "xzopro-toolkit" ),
                "param_name" => "infowindowshow",
                "std" => "0",
                "value" => array(
                    "On Click" => "0",
                    "Always" => "1"
                ),
                "dependency" => array(
                    "element" => "infowindow",
                    "value" => array("1")
                ),
                "description" => __("Visable info window.", "xzopro-toolkit" )
            ),

            array(
                "type" => "attach_image",
                "heading" => __( "Map Marker Image", "xzopro-toolkit" ),
                "param_name" => "marker_image",
                "description" => __( "Upload map marker image", "xzopro-toolkit" ),
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Enable Map Marker Animation?", "xzopro-toolkit" ),
                "param_name" => "marker_animate",
                "admin_label" => true,
                "std" => "1",
                "value" => array(
                    "No" => "0",
                    "Yes" => "1"
                ),
                "description" => __("Enable or disable map marker animation.", "xzopro-toolkit" )
            ),
        )
    )
);
