<?php
// Flaticon fields
add_filter( 'vc_iconpicker-type-flaticon', 'xzopro_flaticons_array' );
function xzopro_flaticons_array( $icons ) {
	require 'flaticon-custom.php';
	$flaticons = array(
		__( 'Xzopro Icons', 'xzopro-toolkit' )         => $flaticons_xzopro,
		__( 'Finance', 'xzopro-toolkit' )         => $flaticons_finance,
		__( 'Seo and Marketing', 'xzopro-toolkit' )  => $flaticons_custom,
	);
	$flaticons = apply_filters( 'xzopro_vc_flaticon_fields', $flaticons );
	return array_merge( $icons, $flaticons );
}