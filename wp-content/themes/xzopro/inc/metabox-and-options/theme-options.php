<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


/*
	Theme Options
*/

function xzopro_cs_framework_options( $options ) {

    $options      = array(); // remove old options

    //General Options
    $options[]    = array(
        'name'      => 'xzopro_general_opt',
        'title'     => __('General Settings', 'xzopro'),
        'icon'      => 'fa fa-cogs',
        'fields'    => array(

            array(
                'id'    => 'primary_color',
                'type'  => 'color_picker',
                'default'  => '#0a6db7',
                'title' => __('Primary Color', 'xzopro'),
                'desc' => __('Change theme primary color from here.', 'xzopro')
            ),

            array(
                'id'    => 'secondary_color',
                'type'  => 'color_picker',
                'default'  => '#253cac',
                'title' => __('Secondary Color', 'xzopro'),
                'desc' => __('Change theme secondary color from here.', 'xzopro'),
            ),

            array(
                'id'    => 'enable_preloader',
                'type'  => 'switcher',
                'default'  => true,
                'title' => __('Preloader', 'xzopro'),
                'desc' => __('Enable or disable site preloader.', 'xzopro'),
            ),

            array(
                'id'    => 'preloader_bg_color',
                'type'  => 'color_picker',
                'default'  => '#302e4e',
                'title' => __('Preloader Background Color', 'xzopro'),
                'desc' => __('Select preloader wrapper background color.', 'xzopro'),
                'dependency'   => array( 'enable_preloader', '==', 'true' ),
            ),
        )
    );//General Options End


    //Google font
    $options[]   = array(
        'name'     => 'xzopro_typography',
        'title'    => __('Typography', 'xzopro'),
        'icon'     => 'fa fa-text-width',
        'fields' => array(

            array(
                'id'    => 'xzopro_body_font',
                'type'  => 'typography',
                'title' => __('Body Font', 'xzopro'),
                'desc' => __('Select body font property.', 'xzopro'),
                'default'   => array(
                    'family'  => 'Lato',
                    'weight' => '400',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
            ),

            array(
                'id'    => 'xzopro_menu_font',
                'type'  => 'typography',
                'title' => __('Menu / Navigation Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '400',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select menu font.', 'xzopro'),
            ),

            array(
                'id'    => 'xzopro_h1_font',
                'type'  => 'typography',
                'title' => __('Headding One ( h1 ) Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '700',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select headding one ( h1 ) font property.', 'xzopro'),
            ),

            array(
                'id'    => 'xzopro_h2_font',
                'type'  => 'typography',
                'title' => __('Headding Two ( h2 ) Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '700',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select headding two ( h2 ) font property.', 'xzopro'),
            ),

            array(
                'id'    => 'xzopro_h3_font',
                'type'  => 'typography',
                'title' => __('Headding Three ( h3 ) Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '700',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select headding three ( h3 ) font property.', 'xzopro'),
            ),

            array(
                'id'    => 'xzopro_h4_font',
                'type'  => 'typography',
                'title' => __('Headding Four ( h4 ) Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '700',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select headding four ( h4 ) font property.', 'xzopro'),
            ),

            array(
                'id'    => 'xzopro_h5_font',
                'type'  => 'typography',
                'title' => __('Headding Five ( h5 ) Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '700',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select headding five ( h5 ) font property.', 'xzopro'),
            ),

            array(
                'id'    => 'xzopro_h6_font',
                'type'  => 'typography',
                'title' => __('Headding Six ( h6 ) Font', 'xzopro'),
                'default'   => array(
                    'family'  => 'Poppins',
                    'weight' => '700',
                    'style' => 'normal',
                    'font'    => 'google',
                ),
                'desc' => __('Select headding six ( h6 ) font property.', 'xzopro'),
            ),
        )
    );//Google font end

    // Header Options

    $options[]   = array(
        'name'     => 'xzopro_header_opt',
        'title'    => __('Header Options', 'xzopro'),
        'icon'     => 'fa fa-header',
        'sections' => array(

            array(
                'name'      => 'all_header_style',
                'title'     => __('Header General Settings', 'xzopro'),
                'icon'     => 'fa fa-cogs',
                'fields'    => array(

                    array(
                        'id'        => 'header_style',
                        'type'      => 'image_select',
                        'title'     => 'Select Header Style',
                        'options'   => array(
                            '1'    => get_template_directory_uri() .'/assets/images/header-style-1.jpg',
                            '2'    => get_template_directory_uri() .'/assets/images/header-style-2.jpg',
                        ),
                        'default'   => '1',
                        'desc' => __('Select site header style.You can override this settings in individual page', 'xzopro'),
                        'radio' => true,
                    ),

                    array(
                        'id'    => 'enable_header_search',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => __('Enable Header Search?', 'xzopro'),
                        'desc' => __('Enable or disable header search button.', 'xzopro'),
                    ),

                    array(
                        'id'    => 'header1_sf_bg',
                        'type'  => 'color_picker',
                        'default'  => '#0a6cb7',
                        'title' => __('Header 1 Search Form Background Color', 'xzopro'),
                        'desc' => __('Select header 1 search form background color.', 'xzopro'),
                        'dependency'   => array( 'enable_header_search', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header2_sf_bg',
                        'type'  => 'color_picker',
                        'default'  => '#302e4e',
                        'title' => __('Header 2 Search Form Background Color', 'xzopro'),
                        'desc' => __('Select header 2 search form background color.', 'xzopro'),
                        'dependency'   => array( 'enable_header_search', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header_button',
                        'type'  => 'switcher',
                        'default'  => false,
                        'title' => __('Enable Header Button?', 'xzopro'),
                        'desc' => __('Enable or disable header button.', 'xzopro'),
                    ),


                    array(
                        'id'    => 'header_btn_txt',
                        'type'  => 'text',
                        'title' => __('Header Button Text', 'xzopro'),
                        'desc'  => __('Type button text here', 'xzopro'),
                        'default'  => __('Get a Quote','xzopro'),
                        'dependency'   => array( 'header_button', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header_btn_link',
                        'type'  => 'text',
                        'title' => __('Header Button URL', 'xzopro'),
                        'desc'  => __('Type button URL here', 'xzopro'),
                        'default'  => '#',
                        'dependency'   => array( 'header_button', '==', 'true' ),
                    ),


                )
            ),

            array(
                'name'      => 'header_top_options',
                'title'     => __('Header Top', 'xzopro'),
                'icon'     => 'fa fa-text-height',
                'fields'    => array(

                    array(
                        'id'    => 'header1_top_bg',
                        'type'  => 'color_picker',
                        'default'  => '#303038',
                        'title' => __('Background Color', 'xzopro'),
                        'desc' => __('Select header 1 top background color.', 'xzopro'),
                        'dependency'   => array( 'header_style_1', '==', 'true' ),
                    ),

                    array(
                        'id'              => 'header1_top_left_text',
                        'type'            => 'group',
                        'title'           => __('Top Left Text', 'xzopro'),
                        'button_title'    => __('Add New Text', 'xzopro'),
                        'desc'    => __('Add header 1 top left text', 'xzopro'),
                        'accordion_title' => __('Add New Text', 'xzopro'),
                        'fields'          => array(

                            array(
                                'id'    => 'top1_left_text',
                                'type'  => 'text',
                                'title' => __('Text', 'xzopro'),
                                'desc'  => __('Type text here', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top1_left_text_icon',
                                'type'  => 'icon',
                                'title' => __('Text Icon', 'xzopro'),
                                'desc' => __('Select an icon', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top1_left_text_url',
                                'type'  => 'text',
                                'title' => __('Text link', 'xzopro'),
                                'desc'  => __('Type text link.Leave blank if you don\'t want to use link', 'xzopro'),
                            ),
                        ),
                        'dependency' => array('header_style_1', '==', 'true')
                    ),

                    array(
                        'id'    => 'header1_top_left_text_color',
                        'type'  => 'color_picker',
                        'default'  => '#ffffff',
                        'title' => __('Top Left Text Color', 'xzopro'),
                        'desc' => __('Select header 1 top text color.', 'xzopro'),
                        'dependency'   => array( 'header_style_1', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header1_top_left_text_hover_color',
                        'type'  => 'color_picker',
                        'default'  => '#0a6db7',
                        'title' => __('Top Left Text Hover Color', 'xzopro'),
                        'desc' => __('Select header 1 top text hover color. This color only work if text have any link.', 'xzopro'),
                        'dependency'   => array( 'header_style_1', '==', 'true' ),
                    ),

                    array(
                        'id'              => 'header1_top_icons',
                        'type'            => 'group',
                        'title'           => __('Top Social Icons', 'xzopro'),
                        'button_title'    => __('Add New Icon', 'xzopro'),
                        'desc'    => __('Add header 1 top social icons', 'xzopro'),
                        'accordion_title' => __('Add New Icon', 'xzopro'),
                        'fields'          => array(
                            array(
                                'id'    => 'header1_site_name',
                                'type'  => 'text',
                                'title' => __('Social Site Name', 'xzopro'),
                                'desc'  => __('Type site name. This is an optional field', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top1_icon',
                                'type'  => 'icon',
                                'title' => __('Select Icon', 'xzopro'),
                                'desc' => __('Select social icon', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top1_url',
                                'type'  => 'text',
                                'title' => __('Link', 'xzopro'),
                                'desc'  => __('Type social url', 'xzopro'),
                            )
                        ),

                        'dependency' => array('header_style_1', '==', 'true'),
                    ),

                    array(
                        'id'    => 'header1_top_icon_color',
                        'type'  => 'color_picker',
                        'default'  => '#0a6db7',
                        'title' => __('Top Icon Color', 'xzopro'),
                        'desc' => __('Select header 1 top icon color.', 'xzopro'),
                        'dependency'   => array( 'header_style_1', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header1_top_icon_hover_color',
                        'type'  => 'color_picker',
                        'default'  => '#ffffff',
                        'title' => __('Top Icon Hover Color', 'xzopro'),
                        'desc' => __('Select header 1 top icon hover color.', 'xzopro'),
                        'dependency'   => array( 'header_style_1', '==', 'true' ),
                    ),

                    array(
                        'id'              => 'header1_top_right_text',
                        'type'            => 'group',
                        'title'           => __('Top Right Text', 'xzopro'),
                        'button_title'    => __('Add New Text', 'xzopro'),
                        'desc'    => __('Add header 1 top right text', 'xzopro'),
                        'accordion_title' => __('Add New Text', 'xzopro'),
                        'fields'          => array(
                            array(
                                'id'    => 'top1_right_bold_text',
                                'type'  => 'text',
                                'title' => __('Title Text', 'xzopro'),
                                'desc'  => __('Type title text here', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top1_right_small_text',
                                'type'  => 'text',
                                'title' => __('Subtitle Text', 'xzopro'),
                                'desc'  => __('Type subtitle text here', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top1_right_text_icon',
                                'type'  => 'icon',
                                'title' => __('Text Icon', 'xzopro'),
                                'desc' => __('Select an icon', 'xzopro'),
                            ),
                        ),
                        'dependency' => array('header_style_1', '==', 'true')
                    ),


                    // Header 2 options
                    array(
                        'id'    => 'header2_top_bg',
                        'type'  => 'color_picker',
                        'default'  => '#0a6db7',
                        'title' => __('Top Background Color', 'xzopro'),
                        'desc' => __('Select header 2 top background color.', 'xzopro'),
                        'dependency'   => array( 'header_style_2', '==', 'true' ),
                    ),

                    array(
                        'id'              => 'header2_top_left_text',
                        'type'            => 'group',
                        'title'           => __('Top Left Text', 'xzopro'),
                        'button_title'    => __('Add New Text', 'xzopro'),
                        'desc'    => __('Add header 2 top left text', 'xzopro'),
                        'accordion_title' => __('Add New Text', 'xzopro'),
                        'fields'          => array(

                            array(
                                'id'    => 'top2_left_text',
                                'type'  => 'text',
                                'title' => __('Text', 'xzopro'),
                                'desc'  => __('Type text here', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top2_left_text_icon',
                                'type'  => 'icon',
                                'title' => __('Text Icon', 'xzopro'),
                                'desc' => __('Select an icon', 'xzopro'),
                            ),



                            array(
                                'id'    => 'top2_left_text_url',
                                'type'  => 'text',
                                'title' => __('Text link', 'xzopro'),
                                'desc'  => __('Type text link.Leave blank if you don\'t want to use link', 'xzopro'),
                            ),
                        ),
                        'dependency' => array('header_style_2', '==', 'true')
                    ),

                    array(
                        'id'    => 'header2_top_left_text_color',
                        'type'  => 'color_picker',
                        'default'  => '#ffffff',
                        'title' => __('Top Left Text Color', 'xzopro'),
                        'desc' => __('Select header 2 top text color.', 'xzopro'),
                        'dependency'   => array( 'header_style_2', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header2_top_left_text_hover_color',
                        'type'  => 'color_picker',
                        'title' => __('Top Left Text Hover Color', 'xzopro'),
                        'default'  => '#ffffff',
                        'desc' => __('Select header 2 top left text hover color. This color only work if text have any link.', 'xzopro'),
                        'dependency'   => array( 'header_style_2', '==', 'true' ),
                    ),

                    array(
                        'id'              => 'header2_top_icons',
                        'type'            => 'group',
                        'title'           => __('Top Social Icons', 'xzopro'),
                        'button_title'    => __('Add New Icon', 'xzopro'),
                        'desc'    => __('Add header 2 social icons', 'xzopro'),
                        'accordion_title' => __('Add New Icon', 'xzopro'),
                        'fields'          => array(
                            array(
                                'id'    => 'header2_site_name',
                                'type'  => 'text',
                                'title' => __('Social Site Name', 'xzopro'),
                                'desc'  => __('Type site name. This is an optional field', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top2_icon',
                                'type'  => 'icon',
                                'title' => __('Select Icon', 'xzopro'),
                                'desc' => __('Select social icon', 'xzopro'),
                            ),

                            array(
                                'id'    => 'top2_icon_url',
                                'type'  => 'text',
                                'title' => __('Link', 'xzopro'),
                                'desc'  => __('Type social url', 'xzopro'),
                            )
                        ),

                        'dependency' => array('header_style_2', '==', 'true'),
                    ),

                    array(
                        'id'    => 'header2_top_icon_color',
                        'type'  => 'color_picker',
                        'default'  => '#ffffff',
                        'title' => __('Top Icon Color', 'xzopro'),
                        'desc' => __('Select header 2 top icon color.', 'xzopro'),
                        'dependency'   => array( 'header_style_2', '==', 'true' ),
                    ),

                    array(
                        'id'    => 'header2_top_icon_hover_color',
                        'type'  => 'color_picker',
                        'title' => __('Top Icon Hover Color', 'xzopro'),
                        'default'  => '#ffffff',
                        'desc' => __('Select header 2 top icon hover color.', 'xzopro'),
                        'dependency'   => array( 'header_style_2', '==', 'true' ),
                    ),
                )
            ),

            array(
                'name'      => 'header_logos',
                'title'     => __('Logos', 'xzopro'),
                'icon'     => 'fa fa-snowflake-o',
                'fields'    => array(

                    array(
                        'id'        => 'header_1_logo',
                        'type'      => 'image',
                        'title'     => 'Header 1 Logo',
                        'add_title' => 'Upload Logo Image',
                        'desc' => __('Upload header 1 logo', 'xzopro'),
                    ),

                    array(
                        'id'        => 'header_2_logo',
                        'type'      => 'image',
                        'title'     => 'Header 2 Logo',
                        'add_title' => 'Upload Logo Image',
                        'desc' => __('Upload header 2 logo', 'xzopro'),
                    ),
                )
            ),

            array(
                'name'      => 'site_menu_opt',
                'title'     => __('Menu', 'xzopro'),
                'icon'     => 'fa fa-bars',
                'fields'    => array(

                    array(
                        'id'    => 'fixed_menu',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => __('Menu Fixed On Top?', 'xzopro'),
                        'desc' => __('Enable or disable fixed menu. If On, menu fixed on top while page scroll.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'menu_bg',
                        'type'      => 'color_picker',
                        'default'  => '#302e4e',
                        'title' => __('Menu Background Color', 'xzopro'),
                        'desc' => __('Select menu area background color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'menu_text_color',
                        'type'      => 'color_picker',
                        'default'  => '#ffffff',
                        'title' => __('Menu Text Color', 'xzopro'),
                        'desc' => __('Select menu Text color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'menu_text_hover_color',
                        'type'      => 'color_picker',
                        'default'  => '#0a6db7',
                        'title' => __('Menu Text Hover Color', 'xzopro'),
                        'desc' => __('Select menu Text color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'dropdown_menu_bg',
                        'type'      => 'color_picker',
                        'default'  => '#302e4e',
                        'title' => __('Dropdown Menu Background Color', 'xzopro'),
                        'desc' => __('Select dropdown menu background color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'dropdown_menu_tc',
                        'type'      => 'color_picker',
                        'default'  => '#ffffff',
                        'title' => __('Dropdown Menu Text Color', 'xzopro'),
                        'desc' => __('Select dropdown menu text color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'dropdown_menu_hover_bg',
                        'type'      => 'color_picker',
                        'default'  => '#0a6cb7',
                        'title' => __('Dropdown Menu Item Hover Background', 'xzopro'),
                        'desc' => __('Select dropdown menu item background color on hover.', 'xzopro'),
                    ),
                )
            ),

        )
    );// Header Options End




    // Default Options

    $options[]   = array(
        'name'     => 'default_settings',
        'title'    => __('Layout & Options', 'xzopro'),
        'icon'     => 'fa fa-calculator',
        'sections' => array(

            array(
                'name'      => 'banner_default_opt',
                'title'     => __('Banner Options', 'xzopro'),
                'icon'     => 'fa fa-flag',
                'fields'    => array(

                    array(
                        'id'       => 'banner_default_img',
                        'type'     => 'image',
                        'title'    => __('Banner Background Image', 'xzopro' ),
                        'desc' => __('Select default banner image for all page / post. You can override this settings in individual page / post.', 'xzopro'),
                    ),

                    array(
                        'id'       => 'banner_default_text_align',
                        'type'     => 'select',
                        'title'    => __('Banner Text Align', 'xzopro'),
                        'options'  => array(
                            'left'   => __('Left', 'xzopro'),
                            'center'  => __('Center', 'xzopro'),
                            'right' => __('Right', 'xzopro')
                        ),
                        'default'  => 'center',
                        'desc' => __('Select banner default text align. You can override this settings in individual page / post.', 'xzopro'),
                    ),
                )
            ),

            array(
                'name'      => 'blog_default_options',
                'title'     => esc_html__('Blog Page', 'xzopro'),
                'icon'     => 'fa fa-pencil-square-o',
                'fields'    => array(

                    array(
                        'id'       => 'blog_layout',
                        'type'     => 'select',
                        'title'    => __('Blog Page Layout', 'xzopro'),
                        'options'  => array(
                            'left-sidebar'   => __('Left Sidebar', 'xzopro'),
                            'full-width'  => __('Full Width', 'xzopro'),
                            'right-sidebar' => __('Right Sidebar', 'xzopro')
                        ),
                        'default'  => 'right-sidebar',
                        'desc' => __('Select blog layout.', 'xzopro'),
                    ),

                    array(
                        'id'    => 'enable_blog_banner',
                        'type'  => 'switcher',
                        'title' => __('Enable Blog Banner?', 'xzopro'),
                        'desc' => __('If you want to display banner area on blog page, select ON.', 'xzopro'),
                        'default' => true,
                    ),

                    array(
                        'id'       => 'blog_banner_default_img',
                        'type'     => 'image',
                        'title'    => __('Blog Banner Background Image', 'xzopro' ),
                        'desc' => __('Select blog banner default image.', 'xzopro'),
                        'dependency' => array('enable_blog_banner', '==', 'true'),
                    ),

                    array(
                        'id'    => 'blog_custom_title',
                        'type'  => 'text',
                        'title' => __('Blog Banner Title?', 'xzopro'),
                        'dependency' => array('enable_blog_banner', '==', 'true'),
                        'desc' => __('Blog page title', 'xzopro'),
                    ),

                    array(
                        'id'       => 'blog_banner_text_align',
                        'type'     => 'select',
                        'title'    => __('Blog Banner Text Align', 'xzopro'),
                        'options'  => array(
                            'left'   => __('Left', 'xzopro'),
                            'center'  => __('Center', 'xzopro'),
                            'right' => __('Right', 'xzopro')
                        ),
                        'default'  => 'center',
                        'desc' => __('Select blog banner text align.', 'xzopro'),
                        'dependency' => array('enable_blog_banner', '==', 'true'),
                    ),
                )
            ),



            array(
                'name'      => 'post_default_options',
                'title'     => __('Single Post', 'xzopro'),
                'icon'     => 'fa fa-pencil',
                'fields'    => array(

                    array(
                        'id'       => 'post_default_layout',
                        'type'     => 'select',
                        'title'    => __('Layout', 'xzopro' ),
                        'options'  => array(
                            'full-width'   => __('Full Width', 'xzopro'),
                            'left-sidebar'  => __('Left Sidebar', 'xzopro'),
                            'right-sidebar' => __('Right Sidebar', 'xzopro')
                        ),
                        'default'  => 'right-sidebar',
                        'desc' => __('Select single post default layout. You can override this settings in individual post.', 'xzopro'),
                    ),

                    array(
                        'id'    => 'single_post_cat',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => __('Show Post Categoriese?', 'xzopro'),
                        'desc' => __('If you want to show Category, select On', 'xzopro'),
                    ),

                    array(
                        'id'    => 'single_post_tag',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => __('Show Post Tags?', 'xzopro'),
                        'desc' => __('If you want to show tags select On', 'xzopro'),
                    ),

                    array(
                        'id'    => 'single_post_nav',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => __('Enable Next - Previous Link On Single Post?', 'xzopro'),
                        'desc' => __('If you want to show next - previous post links on single post, select On', 'xzopro'),
                    ),


                )
            ),


            array(
                'name'      => 'archive_page_opt',
                'title'     => esc_html__('Archive Page', 'xzopro'),
                'icon'     => 'fa fa-archive',
                'fields'    => array(

                    array(
                        'id'       => 'archive_layout',
                        'type'     => 'select',
                        'title'    => __('Archive Page Layout', 'xzopro'),
                        'options'  => array(
                            'left-sidebar'   => __('Left Sidebar', 'xzopro'),
                            'full-width'  => __('Full Width', 'xzopro'),
                            'right-sidebar' => __('Right Sidebar', 'xzopro')
                        ),
                        'default'  => 'right-sidebar',
                        'desc' => __('Select archive layout.', 'xzopro'),
                    ),

                    array(
                        'id'    => 'archive_banner',
                        'type'  => 'switcher',
                        'default'  => true,
                        'title' => __('Enable Archive Banner?', 'xzopro'),
                        'desc' => __('Enable or disable archive banner.', 'xzopro'),
                    ),

                    array(
                        'id'       => 'archive_banner_img',
                        'type'     => 'image',
                        'title'    => __('Archive Banner Background Image', 'xzopro' ),
                        'desc' => __('Upload archive page banner image.', 'xzopro'),
                        'dependency'   => array( 'archive_banner', '==', 'true' ),
                    ),
                )
            ),

            array(
                'name'      => 'search_page_opt',
                'title'     => esc_html__('Search Page', 'xzopro'),
                'icon'     => 'fa fa-search',
                'fields'    => array(

                    array(
                        'id'       => 'search_layout',
                        'type'     => 'select',
                        'title'    => __('Search Page Layout', 'xzopro'),
                        'options'  => array(
                            'left-sidebar'   => __('Left Sidebar', 'xzopro'),
                            'full-width'  => __('Full Width', 'xzopro'),
                            'right-sidebar' => __('Right Sidebar', 'xzopro')
                        ),
                        'default'  => 'right-sidebar',
                        'desc' => __('Select Search layout.', 'xzopro'),
                    ),

                    array(
                        'id'       => 'search_banner_img',
                        'type'     => 'image',
                        'title'    => __('Search Banner Background Image', 'xzopro' ),
                        'desc' => __('Upload search page banner image.', 'xzopro'),
                    ),
                )
            ),

            array(
                'name'      => 'error404_page_opt',
                'title'     => esc_html__('Error 404 Page', 'xzopro'),
                'icon'     => 'fa fa-exclamation-triangle',
                'fields'    => array(

                    array(
                        'id'       => 'er404_layout',
                        'type'     => 'select',
                        'title'    => __('Error 404 Page Layout', 'xzopro'),
                        'options'  => array(
                            'left-sidebar'   => __('Left Sidebar', 'xzopro'),
                            'full-width'  => __('Full Width', 'xzopro'),
                            'right-sidebar' => __('Right Sidebar', 'xzopro')
                        ),
                        'default'  => 'full-width',
                        'desc' => __('Select error 404 page layout.', 'xzopro'),
                    ),

                    array(
                        'id'       => 'er404_banner_img',
                        'type'     => 'image',
                        'title'    => __('Error 404 Banner Background Image', 'xzopro' ),
                        'desc' => __('Upload error 404 page banner image.', 'xzopro'),
                    ),
                )
            ),
        )
    );// Default Layout End


    // Footer Options

    $options[]   = array(
        'name'     => 'xzopro_footer_opt',
        'title'    => __('Footer Options', 'xzopro'),
        'icon'     => 'fa fa-wordpress',
        'sections' => array(

            array(
                'name'      => 'footer_top',
                'title'     => __('Footer Widget Area', 'xzopro'),
                'icon'     => 'fa fa-wikipedia-w',
                'fields'    => array(

                    array(
                        'id'        => 'widget_area_bg_img',
                        'type'      => 'image',
                        'title'     => 'Background Image',
                        'add_title' => 'Upload Image',
                        'desc' => __('Upload footer widget area background image', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_area_bg_color',
                        'type'      => 'color_picker',
                        'default'  => '#181616',
                        'title' => __('Background Color', 'xzopro'),
                        'desc' => __('Select footer widget area background color', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_area_text_color',
                        'type'      => 'color_picker',
                        'default'  => '#dedede',
                        'title' => __('Text Color', 'xzopro'),
                        'desc' => __('Select footer widget area text color', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_area_text_hover_color',
                        'type'      => 'color_picker',
                        'default'  => '#0a6db7',
                        'title' => __('Text Hover Color', 'xzopro'),
                        'desc' => __('Select footer widget area text hover color. Only work if text have any link.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_1_width',
                        'type'      => 'text',
                        'default'  => '25',
                        'title' => __('First Widget Width', 'xzopro'),
                        'desc' => __('Type first widget width in %', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_2_width',
                        'type'      => 'text',
                        'default'  => '16.666667',
                        'title' => __('Second Widget Width', 'xzopro'),
                        'desc' => __('Type second widget width in %', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_3_width',
                        'type'      => 'text',
                        'default'  => '31.333333',
                        'title' => __('Third Widget Width', 'xzopro'),
                        'desc' => __('Type third widget width in %', 'xzopro'),
                    ),

                    array(
                        'id'        => 'widget_4_width',
                        'type'      => 'text',
                        'default'  => '27',
                        'title' => __('Fourth Widget Width', 'xzopro'),
                        'desc' => __('Type fourth widget width in %', 'xzopro'),
                    ),
                )
            ),

            array(
                'name'      => 'footer_bottom',
                'title'     => __('Footer Bottom', 'xzopro'),
                'icon'     => 'fa fa-level-down',
                'fields'    => array(

                    array(
                        'id'        => 'copyright_text',
                        'type'      => 'textarea',
                        'default'  => '&copy; Xzopro 2018 | Designed and Developed by: <a target="_blank" href="http://themedraft.com">ThemeDraft</a>',
                        'title' => __('Copyright Text', 'xzopro'),
                        'desc' => __('Type copyright text here.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'footer_btm_bg',
                        'type'      => 'color_picker',
                        'default'  => '#151414',
                        'title' => __('Background', 'xzopro'),
                        'desc' => __('Select footer bottom background color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'footer_btm_tc',
                        'type'      => 'color_picker',
                        'default'  => '#dedede',
                        'title' => __('Text Color', 'xzopro'),
                        'desc' => __('Select footer bottom text color.', 'xzopro'),
                    ),

                    array(
                        'id'        => 'footer_btm_txt_hov_color',
                        'type'      => 'color_picker',
                        'default'  => '#0a6db7',
                        'title' => __('Text Hover Color', 'xzopro'),
                        'desc' => __('Select footer bottom text color. Only work if text have any link.', 'xzopro'),
                    ),
                )
            ),

        )
    );// Footer Options End

    return $options;
}

add_filter( 'cs_framework_options', 'xzopro_cs_framework_options' );