<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/*
	Testimonial metabox options
*/

$options[]    = array(
    'id'        => 'xzopro_testimonial_meta',
    'title'     => __('Testimonial Options ', 'xzopro'),
    'post_type' => 'testimonial',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'xzopro_testimonial_meta_options',
            'fields' => array(

                array(
                    'id'    => 'position',
                    'type'  => 'text',
                    'title' => __('Author Designation.', 'xzopro'),
                    'desc' => __('Type author official post designation here', 'xzopro'),
                ),
            )
        )
    )
);