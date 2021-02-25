<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_gmap_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'map_api' => 'AIzaSyDDD7T_bzxgh9KMbwTdoYdB9pk-EEANp9E',
        'locations' => '',
        'desc'=>'Khulna Branch<br>Shonadanga main road<br>Khulna 9100',
        'latitude' => '41.1454454',
        'longitude' => '-74.07848',
        'map_zoom' => '10',
        'infowindow' => '0',
        'infowindowshow' => '0',
        'height' => '450',
        'marker_image' => '',
        'marker_animate' => '1'
    ), $atts) );

    $marker_img_array = wp_get_attachment_image_src($marker_image, 'thumbnail');

    if(function_exists( 'vc_param_group_parse_atts' )) {
        $locations = vc_param_group_parse_atts( $atts['locations']);
    }else{
        $locations = array(0);
    }



    $dynamic_map_id = rand(42587942, 382947283);




    $gmap_markup = '
        <div class="xzopro-googlemap" id="xzopro-googlemap'.$dynamic_map_id.'" style="height:'.esc_attr($height).'px; width:100%"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key='.esc_attr($map_api).'"></script>

        <script>
        var locations'.$dynamic_map_id.' = [';

    foreach($locations as $location){
        $gmap_markup .= '["'.wp_kses_post($location['desc']).'", '.esc_html($location['latitude']).','.esc_html($location['longitude']).'],';
    }

    $gmap_markup .= '];
        var mapcenter'.$dynamic_map_id.'={lat:'.esc_html($locations[0]['latitude']).',lng:'.esc_html($locations[0]['longitude']).'};

        function initialize() {
            var xzopromap'.$dynamic_map_id.' = {
                center:mapcenter'.$dynamic_map_id.',
                zoom: '.esc_attr($map_zoom).',
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("xzopro-googlemap'.$dynamic_map_id.'"),xzopromap'.$dynamic_map_id.');

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations'.$dynamic_map_id.'.length; i++){  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations'.$dynamic_map_id.'[i][1], locations'.$dynamic_map_id.'[i][2]),
                    icon:"'.esc_url($marker_img_array[0]).'",';

    if($marker_animate == '1'){
        $gmap_markup .= 'animation:google.maps.Animation.BOUNCE,';
    }

    $gmap_markup .= '
                    map: map
                });

                var infowindow = new google.maps.InfoWindow({
                  content: locations'.$dynamic_map_id.'[i][0],
                  maxWidth: 160
                });';

    if($infowindow == '1' && $infowindowshow == '1'){
        $gmap_markup .= '
            infowindow.open(map, marker);
            google.maps.event.addListener(marker, "click", (function(marker, i) {
                return function() {
                    infowindow.setContent(locations'.$dynamic_map_id.'[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        ';
    }elseif($infowindow == '1' && $infowindowshow == '0'){
        $gmap_markup .= '
            google.maps.event.addListener(marker, "click", (function(marker, i) {
                return function() {
                    infowindow.setContent(locations'.$dynamic_map_id.'[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        ';
    }

    $gmap_markup .= '
            }
            marker.setMap(map);
              
        }

        google.maps.event.addDomListener(window, "load", initialize); </script>
    ';

    return $gmap_markup;
}

add_shortcode( 'xzopro_gmap', 'xzopro_gmap_shortcode' );