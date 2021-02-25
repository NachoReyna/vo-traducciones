<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$options[]    = array(
    'id'        => 'header_meta',
    'title'     => __('Page Header', 'xzopro'),
    'post_type' => array('page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'header_meta_options',
            'fields' => array(
                array(
                    'id'       => 'page_header',
                    'type'     => 'select',
                    'title'    => __('Select Page Header', 'xzopro' ),
                    'options'  => array(
                        'default'   => __('Default', 'xzopro'),
                        '1'  => __('Header One', 'xzopro'),
                        '2'   => __('Header Two', 'xzopro'),
                    ),
                    'default'  => 'default',
                    'desc' => __('Select page header', 'xzopro'),
                ),




            )
        )
    )
);

$options[]    = array(
    'id'        => 'layout_meta',
    'title'     => __('Layout Settings', 'xzopro'),
    'post_type' => array('post'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'layout_meta_options',
            'fields' => array(
                array(
                    'id'       => 'post_layout',
                    'type'     => 'select',
                    'title'    => __('Layout', 'xzopro' ),
                    'options'  => array(
                        '1'   => __('Default', 'xzopro'),
                        'left-sidebar'  => __('Left Sidebar', 'xzopro'),
                        'full-width'   => __('Full Width', 'xzopro'),
                        'right-sidebar' => __('Right Sidebar', 'xzopro')
                    ),
                    'default'  => '1',
                    'desc' => __('Select single post layout.', 'xzopro'),
                ),




            )
        )
    )
);


$options[]    = array(
    'id'        => 'banner_metabox',
    'title'     => __('Banner Settings', 'xzopro'),
    'post_type' => array('page', 'post', 'project'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
        array(
            'name'  => 'banner_meta_options',
            'fields' => array(
                array(
                    'id'    => 'enable_page_banner',
                    'type'  => 'switcher',
                    'title' => __('Enable Banner?', 'xzopro'),
                    'desc' => __('If you want to display banner area, select ON.', 'xzopro'),
                    'default' => true,
                ),

                array(
                    'id'        => 'banner_bg',
                    'type'      => 'image',
                    'title'     => 'Background Image',
                    'desc' => __('Upload banner background image here. If empty, default background image show from theme option. ', 'xzopro'),
                    'dependency' => array('enable_page_banner', '==', 'true'),
                    'add_title' => 'Upload Image',
                ),

                array(
                    'id'    => 'custom_title',
                    'type'  => 'text',
                    'title' => __('Use Custom Title?', 'xzopro'),
                    'dependency' => array('enable_page_banner', '==', 'true'),
                    'desc' => __('If you want to use custom title write title here.If you don\'t, leave it blank.', 'xzopro')
                ),

                array(
                    'id'    => 'banner_text_align',
                    'type'  => 'select',
                    'title' => __('Banner Text Align.', 'xzopro'),
                    'desc' => __('Select banner text align', 'xzopro'),
                    'default' => '1',
                    'options'  => array(
                        '1'   => __('Default', 'xzopro'),
                        'left'   => __('Left', 'xzopro'),
                        'center'   => __('Center', 'xzopro'),
                        'right'   => __('Right', 'xzopro'),
                    ),
                    'dependency'   => array( 'enable_page_banner', '==', true ),
                )
            )
        )
    )
);