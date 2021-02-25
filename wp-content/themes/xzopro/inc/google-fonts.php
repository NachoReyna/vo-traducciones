<?php
/**
 * Google FONTS.
 */

function xzopro_fonts_url() {
    $fonts_url = '';

    $xzopro_body_font_array = xzopro_option('xzopro_body_font');
    $xzopro_menu_font_array = xzopro_option('xzopro_menu_font');
    $xzopro_h1_font_array = xzopro_option('xzopro_h1_font');
    $xzopro_h2_font_array = xzopro_option('xzopro_h2_font');
    $xzopro_h3_font_array = xzopro_option('xzopro_h3_font');
    $xzopro_h4_font_array = xzopro_option('xzopro_h4_font');
    $xzopro_h5_font_array = xzopro_option('xzopro_h5_font');
    $xzopro_h6_font_array = xzopro_option('xzopro_h6_font');

    if(!empty($xzopro_body_font_array)) {
        $xzopro_body_font = $xzopro_body_font_array['family'];
    } else {
        $xzopro_body_font = 'Lato';
    }

    if(!empty($xzopro_menu_font_array)) {
        $xzopro_menu_font = $xzopro_menu_font_array['family'];
    } else {
        $xzopro_menu_font = 'Poppins';
    }

    if(!empty($xzopro_h1_font_array)) {
        $xzopro_h1_font = $xzopro_h1_font_array['family'];
    } else {
        $xzopro_h1_font = 'Poppins';
    }

    if(!empty($xzopro_h2_font_array)) {
        $xzopro_h2_font = $xzopro_h2_font_array['family'];
    } else {
        $xzopro_h2_font = 'Poppins';
    }

    if(!empty($xzopro_h3_font_array)) {
        $xzopro_h3_font = $xzopro_h3_font_array['family'];
    } else {
        $xzopro_h3_font = 'Poppins';
    }

    if(!empty($xzopro_h4_font_array)) {
        $xzopro_h4_font = $xzopro_h4_font_array['family'];
    } else {
        $xzopro_h4_font = 'Poppins';
    }

    if(!empty($xzopro_h5_font_array)) {
        $xzopro_h5_font = $xzopro_h5_font_array['family'];
    } else {
        $xzopro_h5_font = 'Poppins';
    }

    if(!empty($xzopro_h6_font_array)) {
        $xzopro_h6_font = $xzopro_h6_font_array['family'];
    } else {
        $xzopro_h6_font = 'Poppins';
    }

    $font_families = array();

    $font_varients = ':300,300i,400,400i,500,500i,600,600i,700,700i';

    $font_families[] = esc_html($xzopro_body_font).$font_varients;

    if($xzopro_menu_font != $xzopro_body_font) {

        $font_families[] = esc_html($xzopro_menu_font).$font_varients;
    }

    if($xzopro_h1_font != $xzopro_body_font && $xzopro_h1_font != $xzopro_menu_font) {

        $font_families[] = esc_html($xzopro_h1_font).$font_varients;
    }

    if($xzopro_h2_font != $xzopro_body_font && $xzopro_h2_font != $xzopro_menu_font && $xzopro_h2_font != $xzopro_h1_font) {

        $font_families[] = esc_html($xzopro_h2_font).$font_varients;
    }

    if($xzopro_h3_font != $xzopro_body_font && $xzopro_h3_font != $xzopro_menu_font && $xzopro_h3_font != $xzopro_h1_font && $xzopro_h3_font != $xzopro_h2_font) {

        $font_families[] = esc_html($xzopro_h3_font).$font_varients;
    }

    if($xzopro_h4_font != $xzopro_body_font && $xzopro_h4_font != $xzopro_menu_font && $xzopro_h4_font != $xzopro_h1_font && $xzopro_h4_font != $xzopro_h2_font && $xzopro_h4_font != $xzopro_h3_font) {

        $font_families[] = esc_html($xzopro_h4_font).$font_varients;
    }

    if($xzopro_h5_font != $xzopro_body_font && $xzopro_h5_font != $xzopro_menu_font && $xzopro_h5_font != $xzopro_h1_font && $xzopro_h5_font != $xzopro_h2_font && $xzopro_h5_font != $xzopro_h3_font && $xzopro_h5_font != $xzopro_h4_font) {

        $font_families[] = esc_html($xzopro_h5_font).$font_varients;
    }

    if($xzopro_h6_font != $xzopro_body_font && $xzopro_h6_font != $xzopro_menu_font && $xzopro_h6_font != $xzopro_h1_font && $xzopro_h6_font != $xzopro_h2_font && $xzopro_h6_font != $xzopro_h3_font && $xzopro_h6_font != $xzopro_h4_font && $xzopro_h6_font != $xzopro_h5_font) {

        $font_families[] = esc_html($xzopro_h6_font).$font_varients;
    }

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}