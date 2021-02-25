<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function xzopro_projects_shortcode($atts, $content = null){
    extract( shortcode_atts( array(
        'count' => '5',
        'enable_masonary' => 1,
        'filter_opt' => true,
        'col_width' => '',
        'show_pagination' => '2',
        'btn_txt' => 'Read More',
        'css' => '',
    ), $atts) );

    if(empty($col_width)){
        $default_col ='col-lg-4 col-md-6 col-xs-12';
    }else{
        $default_col ='';
    }

    if($enable_masonary == 1){
        $enable_masonary = 'total-project-';
    }else{
        $enable_masonary = '';
    }

    $project_categories = get_terms('project_cat');
    $rand_number = rand(10000, 10000000);

    if(function_exists( 'vc_shortcode_custom_css_class' )) {
        $custom_css = vc_shortcode_custom_css_class( $css );
    }else{
        $custom_css ='';
    }

    $xzopro_projects_markup = '<div class="project-wrapper '.esc_attr( $custom_css ).'">

    <script>
        jQuery(document).ready(function($) {';

    if($filter_opt == 1){
        $xzopro_projects_markup .= '
            $(".mt-'.esc_attr($rand_number).'").on("click", function(){
              $(this).toggleClass("active").next(".fbtn-'.esc_attr($rand_number).'").slideToggle();
              return false;
            });

            $(".fbtn-'.esc_attr($rand_number).' li").on("click", function() {    
              if($(this).hasClass("active")) return false;
              $(".mt-'.esc_attr($rand_number).', .fbtn-'.esc_attr($rand_number).' li").removeClass("active");
              $(this).addClass("active");
              $(".mt-'.esc_attr($rand_number).'").text($(this).find(".title-text").text());
              if($(".mt-'.esc_attr($rand_number).'").is(":visible")) $(".fbtn-'.esc_attr($rand_number).'").slideUp();
              var filterValue = $(this).attr("data-filter");
              $grid.isotope({ filter: filterValue });
            });';
    }
    $xzopro_projects_markup .= '   
            var $grid = $(".project-wrap-'.esc_attr($rand_number).'").isotope({
              itemSelector: ".single-project-item",
              percentPosition: true,
              masonry: {
                columnWidth: 1
              }
            });             
        });
    </script>';

    if($filter_opt == 1){
        $xzopro_projects_markup .= '
        <div class="row">
            <div class="col-lg-12 text-center">

                <div class="isotpo-mobile-title mt-'.esc_attr($rand_number).'">All</div>

                <ul class="no-list-style work-filter-btn fbtn-'.esc_attr($rand_number).'">
                    <li class="active" data-filter="*"><span class="title-text">all</span></li>';

        if(!empty($project_categories) && !is_wp_error( $project_categories )){
            foreach($project_categories as $category){
                $xzopro_projects_markup .= '<li data-filter=".'.$category->slug.'"><span class="title-text">'.$category->name.'</span></li>';
            }

        }
        $xzopro_projects_markup .= '            
                </ul>
            </div>
        </div>';
    }



    $xzopro_projects_markup .= ' 
    
    <div class="row project-item-wrapper project-wrap-'.esc_attr($rand_number).' '.esc_attr($enable_masonary).'show'.esc_attr($count).'">';


    if($show_pagination == '1'){
        $xzopro_projects = new WP_Query(
            array(
                'posts_per_page' => $count,
                'post_type' => 'project',
                'paged'     => get_query_var('paged'),
            )
        );
    }else{
        $xzopro_projects = new WP_Query(
            array(
                'posts_per_page' => $count,
                'post_type' => 'project'
            )
        );
    }

    $project_count = 0;

    while($xzopro_projects->have_posts()) : $xzopro_projects->the_post();
        $project_count++;

        $project_cat_list = get_the_terms( get_the_ID(), 'project_cat' );

        if($project_cat_list && ! is_wp_error( $project_cat_list )){
            $cat_list = array();

            foreach($project_cat_list as $P_categori){
                $cat_list[] = $P_categori->slug;
            }
            $assigned_list = join( " ", $cat_list );
            $assigned_with_comma = join( ", ", $cat_list );
        }else{
            $assigned_list = '';
        }

        $xzopro_projects_markup .= '
        <div class="'.esc_attr($default_col).' '.esc_attr($col_width).' single-project-item '.esc_attr($assigned_list).' project-number-'.esc_attr($project_count).'">
            <div class="project-box">
                <div class="project-bg" style="background-image:url('.esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')).')"></div>
                
                <div class="project-content">
                    <div class="project-table">
                        <div class="project-table-cell">
                            <a class="image-popup-link" href="'.esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')).'"><i class="fa fa-picture-o"></i></a>
                            <div><a class="project-title" href="'.get_the_permalink().'"><h4>'.get_the_title().'</h4></a></div>
                            <p class="comma-project-cat">'.esc_attr($assigned_with_comma).'</p>
                            <a class="service-read-more" href="'.get_the_permalink().'">'.esc_html($btn_txt).'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    endwhile;
    $xzopro_projects_markup .= '
    </div>
    ';

    if($show_pagination == '1'){
        $total_pages = $xzopro_projects->max_num_pages;
        $big = 999999999;

        if ($total_pages > 1){
            $current_page = max(1, get_query_var('paged'));
            $xzopro_projects_markup.= '
	        <div class="row">
	        	<div class="col-lg-12">
	        		<nav class="xzopro-project-page-nav">
	        ';
            $xzopro_projects_markup.= paginate_links(array(
                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'    => '?paged=%#%',
                'current'   => $current_page,
                'total'     => $total_pages,
                'prev_text' => '<i class ="fa fa-long-arrow-left"></i>',
                'next_text' => '<i class ="fa fa-long-arrow-right"></i>'
            ));
            $xzopro_projects_markup.= '</nav></div></div>';
        }
    }
    $xzopro_projects_markup.= '</div>';
    wp_reset_query();



    return $xzopro_projects_markup;
}
add_shortcode('xzopro_projects', 'xzopro_projects_shortcode');

