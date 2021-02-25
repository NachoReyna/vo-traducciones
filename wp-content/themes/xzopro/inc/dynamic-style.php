<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


function xzopro_dynamic_style() {
    wp_enqueue_style( 'xzopro-dynamic-style', get_template_directory_uri() . '/assets/css/dynamic-style.css', array(), '1.0', 'all' );

    $xzopro_dynamic_css = '
        .vc_col-has-fill>.vc_column-inner,.vc_row-has-fill+.vc_row-full-width+.vc_row>.vc_column_container>.vc_column-inner,.vc_row-has-fill+.vc_row>.vc_column_container>.vc_column-inner,.vc_row-has-fill+.vc_vc_row>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner,.vc_row-has-fill+.vc_vc_row_inner>.vc_row>.vc_vc_column_inner>.vc_column_container>.vc_column-inner,.vc_row-has-fill>.vc_column_container>.vc_column-inner,.vc_row-has-fill>.vc_row>.vc_vc_column>.vc_column_container>.vc_column-inner,.vc_row-has-fill>.vc_vc_column_inner>.vc_column_container>.vc_column-inner,.vc_section.vc_section-has-fill,.vc_section.vc_section-has-fill+.vc_row-full-width+.vc_section,.vc_section.vc_section-has-fill+.vc_section {
            padding-top: 0 !important;
        }
        
        .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab>a,
         .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a,
         .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a,
         .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a{
            color: #fff;
         }
        
        .project-tab div.vc_tta.vc_general .vc_tta-panel-body{
            margin-bottom: 30px;
            padding: 30px 30px 0px 30px;
        }
        
        .project-tab div.vc_tta-panels-container .vc_tta-panel:last-child .vc_tta-panel-body {
            margin-bottom: 0;
        }
	';

    $xzopro_body_font_array = xzopro_option('xzopro_body_font');
    $xzopro_menu_font_array = xzopro_option('xzopro_menu_font');
    $xzopro_h1_font_array = xzopro_option('xzopro_h1_font');
    $xzopro_h2_font_array = xzopro_option('xzopro_h2_font');
    $xzopro_h3_font_array = xzopro_option('xzopro_h3_font');
    $xzopro_h4_font_array = xzopro_option('xzopro_h4_font');
    $xzopro_h5_font_array = xzopro_option('xzopro_h5_font');
    $xzopro_h6_font_array = xzopro_option('xzopro_h6_font');

    if(!empty($xzopro_body_font_array)){
        $xzopro_dynamic_css .= '
            body {
                font-family: "'.esc_html($xzopro_body_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_body_font_array['weight']).';
                font-style: '.esc_html($xzopro_body_font_array['style']).';';

            if(!empty($xzopro_body_font_array['size'])){
                $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_body_font_array['size']).'px;';
            }
        $xzopro_dynamic_css .= '
            }
        ';
    }

    if(!empty($xzopro_menu_font_array)){
        $xzopro_dynamic_css .= '
            .navigation ul li a {
                font-family: "'.esc_html($xzopro_menu_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_menu_font_array['weight']).';
                font-style: '.esc_html($xzopro_menu_font_array['style']).';';

        if(!empty($xzopro_menu_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_menu_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
            
            .footer-top-area .widget.widget_nav_menu li a{
                font-family: "'.esc_html($xzopro_menu_font_array['family']).'", sans-serif;
            }
        ';
    }

    if(!empty($xzopro_h1_font_array)){
        $xzopro_dynamic_css .= '
            h1 {
                font-family: "'.esc_html($xzopro_h1_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_h1_font_array['weight']).';
                font-style: '.esc_html($xzopro_h1_font_array['style']).';';

        if(!empty($xzopro_h1_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_h1_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
        ';
    }


    if(!empty($xzopro_h2_font_array)){
        $xzopro_dynamic_css .= '
            h2 {
                font-family: "'.esc_html($xzopro_h2_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_h2_font_array['weight']).';
                font-style: '.esc_html($xzopro_h2_font_array['style']).';';

        if(!empty($xzopro_h2_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_h2_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
        ';
    }

    if(!empty($xzopro_h3_font_array)){
        $xzopro_dynamic_css .= '
            h3 {
                font-family: "'.esc_html($xzopro_h3_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_h3_font_array['weight']).';
                font-style: '.esc_html($xzopro_h3_font_array['style']).';';

        if(!empty($xzopro_h3_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_h3_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
        ';
    }

    if(!empty($xzopro_h4_font_array)){
        $xzopro_dynamic_css .= '
            h4 {
                font-family: "'.esc_html($xzopro_h4_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_h4_font_array['weight']).';
                font-style: '.esc_html($xzopro_h4_font_array['style']).';';

        if(!empty($xzopro_h4_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_h4_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
        ';
    }

    if(!empty($xzopro_h5_font_array)){
        $xzopro_dynamic_css .= '
            h5 {
                font-family: "'.esc_html($xzopro_h5_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_h5_font_array['weight']).';
                font-style: '.esc_html($xzopro_h5_font_array['style']).';';

        if(!empty($xzopro_h5_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_h5_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
        ';
    }

    if(!empty($xzopro_h6_font_array)){
        $xzopro_dynamic_css .= '
            h6 {
                font-family: "'.esc_html($xzopro_h6_font_array['family']).'", sans-serif;
                font-weight: '.esc_html($xzopro_h6_font_array['weight']).';
                font-style: '.esc_html($xzopro_h6_font_array['style']).';';

        if(!empty($xzopro_h6_font_array['size'])){
            $xzopro_dynamic_css .= '
        	    font-size: '.esc_html($xzopro_h6_font_array['size']).'px;';
        }
        $xzopro_dynamic_css .= '
            }
        ';
    }

    $default_banner = xzopro_option('banner_default_img');

    if(!empty($default_banner)){
        $default_banner_array = wp_get_attachment_image_src($default_banner, 'full');
        $default_banner_src = $default_banner_array[0];
    }else{
        $default_banner_src = get_template_directory_uri() .'/assets/images/banner.jpg';
    }

    $xzopro_dynamic_css .='
        .banner-area {
            background-image: url('.esc_url($default_banner_src).');
        }  
    ';

    // Primary / Main Color
    $primary_color = xzopro_option('primary_color');
    $xzopro_dynamic_css .='
        .header-top-social ul li a, .header-top-left ul li a:hover, .site-footer li a:hover, .footer-top-area .widget.widget_nav_menu li a:hover, .footer-top-area .widget.widget_nav_menu li a:hover:before, .recent-widget-date, .header-right-info li i, .single-service-box.service-box-style-2 .service-box-icon, .about-box-link, .about-box-top-icon, .image-popup-link:hover, .project-box h4:hover, .work-filter-btn li.active, .work-filter-btn li:hover, span.price-unit, .single-pricing-table i, .read-more, .xzopro-single-blog-post:hover .post-content h4, .post-header-meta .post-author a:hover, .address-widget-list i, .breadcrum-container a:hover, span[typeof="ListItem"] a:hover, span[typeof="ListItem"] a.home:hover:before, aside .widget li a:hover, .widget.widget_recent_comments li:hover:before, table td a,table th a, footer.entry-footer a:hover, .comment-metadata a:hover, .comment-author.vcard a:hover, .service-read-more:hover, .service-read-more:before, .site-info a:hover, .xzopro-search-content .entry-title a:hover,.search-trigger:hover, .member-icons li a, .twial-list li i, .service-box-style-3 .service-box-icon i, .xzopro-posts-meta li i, .xzopro-posts .entry-title a:hover, .xzopro-posts-meta a:hover, .comment-metadata .edit-link a,.comment-author.vcard b.fn a:hover,.xzopro-single-post .entry-content a, .comment-list li a, .sidebar-widget-area .widget ul li.recentcomments a:before {
            color: '.esc_attr($primary_color).';
        }
          
        .fill-btn, .about-box-link:hover, .slider-main-wrapper .owl-dots .owl-dot.active, .single-service-box.service-box-style-2:hover .service-box-icon, .xzopro-project-page-nav .page-numbers:hover, .xzopro-project-page-nav .page-numbers.current, .single-choose-us-box:hover .choose-us-box-icon, .testimonial-main-wrap .owl-dots div.active, .table-tag, .post-link-tbl-cell a, input[type=submit], blockquote:before, aside.sidebar-widget-area .widget-title, .widget.widget_tag_cloud a:hover, footer.entry-footer span.edit-link, nav.navigation.pagination li span.current, a.page-numbers:hover, .nav-links a:hover, .sticky:before, button[type="submit"].search-submit, .header-search-form, .header-search-form .search-form input, .slicknav_btn, .slicknav_nav a:hover, .slicknav_nav .slicknav_row:hover, .video-play-button:before, .video-play-button:after, .project-gallery .owl-nav div, .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab>a, .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a, .main-navigation ul .sub-menu .current-menu-item > a, .main-navigation ul .sub-menu .current-menu-ancestor> a, .main-navigation ul li ul li:hover > a, .testimonial-wrapper .owl-nav div {
            background: '.esc_attr($primary_color).';
        }
        
        .single-service-box.service-box-style-2:hover .service-box-icon, .fill-btn, aside.sidebar-widget-area section.widget, aside.sidebar-widget-area .widget-title, nav.navigation.pagination li span.current, a.page-numbers:hover, .nav-links a:hover,.xzopro-project-page-nav .page-numbers.current, .xzopro-contact-form-1 input:focus, .xzopro-contact-form-1 textarea:focus, .about-box-link, .service-box-style-3:hover, .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab>a, .main-navigation .sub-menu, .about-box-content:hover {
            border-color: '.esc_attr($primary_color).';
        }
        
        .header-search-form input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 300px '.esc_attr($primary_color).' inset;
        }
        
        @media only screen and (max-width: 767px) {
            .isotpo-mobile-title,
            .work-filter-btn li {
                background: '.esc_attr($primary_color).';
            }

            .work-filter-btn li.active, .work-filter-btn li:hover {
                color: #ffffff;
            }
        }
    ';// Primary / Main Color End


    // Secondary / Hover Color
    $secondary_color = xzopro_option('secondary_color');
    $xzopro_dynamic_css .='
        .fill-btn:hover, .bordered-btn:hover{
            border-color: '.esc_attr($secondary_color).';
        }
        
        .fill-btn:hover, .bordered-btn:hover, input[type=submit]:hover, .video-play-button:hover:before, .video-play-button:hover:after,.project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a, .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab>a:hover, .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a:hover, .project-tab div.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a {
            background:  '.esc_attr($secondary_color).';
        }
        
        @media only screen and (max-width: 767px) {
            .work-filter-btn li:hover, .isotpo-mobile-title:hover, .work-filter-btn li.active {
            background: '.esc_attr($secondary_color).';
            }
        }
    ';// Secondary / Hover Color End

    $preloader_bg_color = xzopro_option('preloader_bg_color');
    $xzopro_dynamic_css .='
        #loader-wrapper .loader-section {
            background: '.esc_attr($preloader_bg_color).';
        }
    ';

    $header1_top_bg = xzopro_option('header1_top_bg');
    $header1_top_left_text_color = xzopro_option('header1_top_left_text_color');
    $header1_top_left_text_hover_color = xzopro_option('header1_top_left_text_hover_color');
    $header1_top_icon_color = xzopro_option('header1_top_icon_color');
    $header1_top_icon_hover_color = xzopro_option('header1_top_icon_hover_color');
    $header2_top_bg = xzopro_option('header2_top_bg');
    $header2_top_left_text_color = xzopro_option('header2_top_left_text_color');
    $header2_top_left_text_hover_color = xzopro_option('header2_top_left_text_hover_color');
    $header2_top_icon_color = xzopro_option('header2_top_icon_color');
    $header2_top_icon_hover_color = xzopro_option('header2_top_icon_hover_color');
    $header1_sf_bg = xzopro_option('header1_sf_bg');
    $header2_sf_bg = xzopro_option('header2_sf_bg');

    $xzopro_dynamic_css .='
        .header-top-area {
            background: '.esc_attr($header1_top_bg).';
        }
        
        .header-top-left ul li a, .header-top-left ul li span, .header-top-left li:after {
            color: '.esc_attr($header1_top_left_text_color).';
        }
        
        .header-top-left ul li a:hover{
            color: '.esc_attr($header1_top_left_text_hover_color).';
        }
        
        .header-top-social ul li a{
             color: '.esc_attr($header1_top_icon_color).';
        }
        
        .header-top-social ul li a:hover{
            color: '.esc_attr($header1_top_icon_hover_color).';
        }
        
        .header-style-2 .header-top-area{
            background: '.esc_attr($header2_top_bg).';
        }
        
        .header-style-2 .header-top-left ul li a, .header-style-2 .header-top-left ul li span,
        .header-style-2 .header-top-left li:after{
             color: '.esc_attr($header2_top_left_text_color).';
        }
        
        .header-style-2 .header-top-left ul li a:hover{
            color: '.esc_attr($header2_top_left_text_hover_color).';
        }
        
        .header-style-2 .header-top-social ul li a{
            color: '.esc_attr($header2_top_icon_color).';
        }
        
        .header-style-2 .header-top-social ul li a:hover{
            color: '.esc_attr($header2_top_icon_hover_color).';
        }
        
        .header-search-form, .header-search-form .search-form input{
            background: '.esc_attr($header1_sf_bg).';
        }
        
        .header-style-2 .header-search-form, .header-style-2 .header-search-form .search-form input{
            background: '.esc_attr($header2_sf_bg).';
        }
    ';


    $menu_bg = xzopro_option('menu_bg');
    $menu_text_color = xzopro_option('menu_text_color');
    $menu_text_hover_color = xzopro_option('menu_text_hover_color');
    $dropdown_menu_bg = xzopro_option('dropdown_menu_bg');
    $dropdown_menu_hover_bg = xzopro_option('dropdown_menu_hover_bg');
    $dropdown_menu_tc = xzopro_option('dropdown_menu_tc');

    $xzopro_dynamic_css .='
        .main-menu-area:before, .slicknav_menu {
            background: '.esc_attr($menu_bg).';
        }
        
        .main-menu-area, .main-menu-area a{
            color : '.esc_attr($menu_text_color).';
        }
        
        .main-menu-area .xzopro-btn{
            color:#ffffff;
        }
        
        .search-trigger:hover{
            color: '.esc_attr($menu_text_hover_color).';
        }
        
        .menu-right-area:before{
            background: '.esc_attr($menu_text_color).';
        }
        
        .main-navigation .sub-menu{
            background: '.esc_attr($dropdown_menu_bg).';
        }
        
        .main-navigation ul .sub-menu .current-menu-item > a, .main-navigation ul .sub-menu a:hover {
            background: '.esc_attr($dropdown_menu_hover_bg).';
        }
        
        .main-navigation .sub-menu {
            border-color: '.esc_attr($dropdown_menu_hover_bg).';
        }
        
        .main-navigation ul .sub-menu a,
        .main-navigation ul .sub-menu a:hover,
        .main-navigation ul .sub-menu .current-menu-item > a,
        .main-navigation ul .sub-menu .current-menu-ancestor> a  {
            color: '.esc_attr($dropdown_menu_tc).';
        }
    ';



    $widget_area_bg_img = xzopro_option('widget_area_bg_img');
    $widget_area_bg_color = xzopro_option('widget_area_bg_color');
    $widget_area_text_color = xzopro_option('widget_area_text_color');
    $widget_area_text_hover_color = xzopro_option('widget_area_text_hover_color');
    $widget_1_width = xzopro_option('widget_1_width');
    $widget_2_width = xzopro_option('widget_2_width');
    $widget_3_width = xzopro_option('widget_3_width');
    $widget_4_width = xzopro_option('widget_4_width');
    $footer_btm_bg = xzopro_option('footer_btm_bg');
    $footer_btm_tc = xzopro_option('footer_btm_tc');
    $footer_btm_txt_hov_color = xzopro_option('footer_btm_txt_hov_color');

    if(!empty($widget_area_bg_img)){
        $widget_area_bg_img_array = wp_get_attachment_image_src($widget_area_bg_img, 'full');
        $widget_area_bg_img_src = $widget_area_bg_img_array[0];
    }else{
        $widget_area_bg_img_src = get_template_directory_uri() .'/assets/images/footer-bg.png';
    }

    $xzopro_dynamic_css .='
        .footer-top-area {
            background-image: url('.esc_url($widget_area_bg_img_src).');
        }
        
        .footer-top-area {
            background-color: '.esc_attr($widget_area_bg_color).';
        }
        
        .footer-top-area, .footer-top-area a,
        .footer-top-area .widget.widget_nav_menu li a,
        .site-footer .widget-title, .footer-top-area .widget.widget_archive li a,
        .footer-top-area .widget.widget_categories li a,
        .footer-top-area .widget.widget_pages li a,
        .footer-top-area .widget.widget_meta li a,
        .footer-top-area .widget.widget_recent_comments li,
        .footer-top-area .widget.widget_recent_comments li a,
        .footer-top-area .widget.widget_recent_entries li a,
        .footer-top-area .widget.widget_rss li a,
        .footer-top-area .widget.widget_tag_cloud a {
            color: '.esc_attr($widget_area_text_color).';
        }
        
        .site-footer li a:hover,
        .footer-top-area .widget.widget_nav_menu li a:hover,
        .footer-top-area .widget.widget_nav_menu li a:hover:before,
        .recent-widget-date,
        .footer-top-area .address-widget-list i,
        .footer-top-area .widget.widget_archive li a:hover,
        .footer-top-area .widget.widget_categories li a:hover,
        .footer-top-area .widget.widget_pages li a:hover,
        .footer-top-area .widget.widget_meta li a:hover,
        .footer-top-area .widget.widget_recent_comments li a:hover,
        .footer-top-area .widget.widget_recent_entries li a:hover,
        .footer-top-area .widget.widget_rss li a:hover {
            color: '.esc_attr($widget_area_text_hover_color).';
        }
        
        @media only screen and (min-width: 992px) {
            .footer-top-area .widget.col-lg-3:nth-child(1) {
                max-width: '.esc_attr($widget_1_width).'%;
                flex: 0 0 '.esc_attr($widget_1_width).'%;
            }
        
            .footer-top-area .widget.col-lg-3:nth-child(2) {
                max-width: '.esc_attr($widget_2_width).'%;
                flex: 0 0 '.esc_attr($widget_2_width).'%;
            }
        
            .footer-top-area .widget.col-lg-3:nth-child(3) {
                max-width: '.esc_attr($widget_3_width).'%;
                flex: 0 0 '.esc_attr($widget_3_width).'%;
            }
            .footer-top-area .widget.col-lg-3:nth-child(4) {
                max-width: '.esc_attr($widget_4_width).'%;
                flex: 0 0 '.esc_attr($widget_4_width).'%;
            }
        }
        
        .footer-bottom-area{
            background-color: '.esc_attr($footer_btm_bg).';
        }
        
        .footer-bottom-area, .footer-bottom-area a{
            color: '.esc_attr($footer_btm_tc).';
        }  
        
        .footer-bottom-area a:hover, .site-footer li a:hover{
            color: '.esc_attr($footer_btm_txt_hov_color).';
        }              
    ';


    wp_add_inline_style( 'xzopro-dynamic-style', $xzopro_dynamic_css );
}

add_action('wp_enqueue_scripts', 'xzopro_dynamic_style');