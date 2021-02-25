<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*
	Slide metabox options
*/
$options[] = array(
    'id' => 'bold_text_meta',
    'title' => __('Slider Bold Heading', 'xzopro'),
    'post_type' => 'slide',
    'context' => 'normal',
    'priority' => 'default',
    'sections' => array(
        array(
            'name' => 'slider_bold_text',
            'fields' => array(
                array(
                    'id' => 'bold_text',
                    'type' => 'text',
                    'title' => __('Slider Bold Heading ( 2nd Heading ) Text', 'xzopro'),
                    'desc' => __('Type slider bold heading text here.', 'xzopro'),
                ),

            )
        )
    )
);

$options[] = array(
    'id' => 'btn_meta',
    'title' => __('Slider Buttons', 'xzopro'),
    'post_type' => 'slide',
    'context' => 'normal',
    'priority' => 'default',
    'sections' => array(
        array(
            'name' => 'btn_meta_options',
            'fields' => array(

                array(
                    'id' => 'buttons',
                    'type' => 'group',
                    'title' => __('Add Slider Buttons', 'xzopro'),
                    'desc' => __('Add slide buttons here.', 'xzopro'),
                    'button_title' => __('Add New button', 'xzopro'),
                    'accordion_title' => __('Add New button', 'xzopro'),
                    'fields' => array(

                        array(
                            'id' => 'btn_text',
                            'type' => 'text',
                            'title' => __('Button Text', 'xzopro'),
                            'desc' => __('Type button text here', 'xzopro'),
                            'default' => __('Button text', 'xzopro'),
                        ),


                        array(
                            'id' => 'btn_type',
                            'type' => 'select',
                            'title' => __('Button Type', 'xzopro'),
                            'desc' => __('Select button type.', 'xzopro'),
                            'default' => 'fill',
                            'options' => array(
                                'fill' => __('Fill Button', 'xzopro'),
                                'bordered' => __('Bordered Button', 'xzopro'),
                            ),
                        ),

                        array(
                            'id' => 'linkto',
                            'type' => 'select',
                            'title' => __('Button link to', 'xzopro'),
                            'desc' => __('Select button link source.', 'xzopro'),
                            'default' => '1',
                            'options' => array(
                                '1' => __('Page', 'xzopro'),
                                '2' => __('External link', 'xzopro'),
                            ),
                        ),
                        array(
                            'id' => 'to_page',
                            'type' => 'select',
                            'options' => 'page',
                            'title' => __('Select page', 'xzopro'),
                            'desc' => __('Select button link to page.', 'xzopro'),
                            'dependency' => array('linkto', '==', '1'),
                        ),
                        array(
                            'id' => 'to_external',
                            'type' => 'text',
                            'title' => __('Link', 'xzopro'),
                            'desc' => __('Type button external link', 'xzopro'),
                            'dependency' => array('linkto', '==', '2'),
                        ),
                        array(
                            'id' => 'tab',
                            'type' => 'select',
                            'title' => __('Links open in new window?', 'xzopro'),
                            'desc' => __('Select button link target.', 'xzopro'),
                            'default' => '_self',
                            'options' => array(
                                '_self' => __('No', 'xzopro'),
                                '_blank' => __('Yes', 'xzopro'),
                            ),
                        ),
                    )
                ),
            )
        )
    )
);



$options[] = array(
    'id' => 'slider_content_meta',
    'title' => __('Slider Content Settings', 'xzopro'),
    'post_type' => 'slide',
    'context' => 'normal',
    'priority' => 'default',
    'sections' => array(
        array(
            'name' => 'slider_content_meta_options',
            'fields' => array(
                array(
                    'id' => 'slider_content_width',
                    'type' => 'select',
                    'title' => __('Content Wrapper Width', 'xzopro'),
                    'desc' => __('Select slider content column width.', 'xzopro'),
                    'default' => 'col-xl-8 col-lg-9',
                    'options' => array(
                        'col-lg-1' => __('1 column', 'xzopro'),
                        'col-xl-1 col-lg-2' => __('2 column', 'xzopro'),
                        'col-xl-2 col-lg-3' => __('3 column', 'xzopro'),
                        'col-xl-3 col-lg-4' => __('4 column', 'xzopro'),
                        'col-xl-4 col-lg-5' => __('5 column', 'xzopro'),
                        'col-xl-5 col-lg-6' => __('6 column', 'xzopro'),
                        'col-xl-6 col-lg-7' => __('7 column', 'xzopro'),
                        'col-xl-7 col-lg-8' => __('8 column', 'xzopro'),
                        'col-xl-8 col-lg-9' => __('9 column', 'xzopro'),
                        'col-xl-9 col-lg-10' => __('10 column', 'xzopro'),
                        'col-xl-10 col-lg-11' => __('11 column', 'xzopro'),
                        'col-xl-11 col-lg-12' => __('12 column', 'xzopro'),
                    ),
                ),

                array(
                    'id' => 'slider_content_offset',
                    'type' => 'select',
                    'title' => __('Content Wrapper Offset', 'xzopro'),
                    'desc' => __('Select slider content column offset.', 'xzopro'),
                    'default' => 'offset-xl-0 offset-lg-0',
                    'options' => array(
                        'offset-xl-0 offset-lg-0' => __('0 column', 'xzopro'),
                        'offset-xl-1 offset-lg-1' => __('1 column', 'xzopro'),
                        'offset-xl-2 offset-lg-2' => __('2 column', 'xzopro'),
                        'offset-xl-3 offset-lg-3' => __('3 column', 'xzopro'),
                        'offset-xl-4 offset-lg-4' => __('4 column', 'xzopro'),
                        'offset-xl-5 offset-lg-5' => __('5 column', 'xzopro'),
                        'offset-xl-6 offset-lg-6' => __('6 column', 'xzopro'),
                        'offset-xl-7 offset-lg-7' => __('7 column', 'xzopro'),
                        'offset-xl-8 offset-lg-8' => __('8 column', 'xzopro'),
                        'offset-xl-9 offset-lg-9' => __('9 column', 'xzopro'),
                        'offset-xl-10 offset-lg-10' => __('10 column', 'xzopro'),
                        'offset-xl- 11 offset-lg-11' => __('11 column', 'xzopro'),
                    ),
                ),

                array(
                    'id' => 'slider_text_align',
                    'type' => 'select',
                    'title' => __('Text align', 'xzopro'),
                    'desc' => __('Slider text align', 'xzopro'),
                    'default' => '',
                    'options' => array(
                        '' => __('Left', 'xzopro'),
                        'text-center' => __('Center', 'xzopro'),
                        'text-right' => __('Right', 'xzopro'),
                    ),
                )
            )
        )
    )
);

$options[]    = array(
    'id'        => 'slider_overlay_meta',
    'title'     => __('Slider Overlay', 'xzopro'),
    'post_type' => 'slide',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'slider_overlay_meta_options',
            'fields' => array(
                array(
                    'id'    => 'enable_overlay',
                    'type'  => 'switcher',
                    'title' => __('Enable Overlay?', 'xzopro'),
                    'desc' => __('If you want to use overlay, select on.', 'xzopro'),
                    'default' => true,
                ),

                array(
                    'id'    => 'overlay_color',
                    'type'  => 'color_picker',
                    'title' => __('Overlay Color', 'xzopro'),
                    'desc' => __('Select overlay color', 'xzopro'),
                    'default' => '#000000',
                    'dependency' => array('enable_overlay', '==', 'true'),
                ),

                array(
                    'id'    => 'overlay_opacity',
                    'type'  => 'text',
                    'title' => __('Overlay Opacity', 'xzopro'),
                    'desc' => __('Set overlay opacity between .1-1', 'xzopro'),
                    'default' => '.65',
                    'dependency' => array('enable_overlay', '==', 'true'),
                ),

            )
        )
    )
);