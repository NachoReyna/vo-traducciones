<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Xzopro
 */

$search_banner_img = xzopro_option('search_banner_img');
$search_bg_img = wp_get_attachment_image_src( $search_banner_img, 'full' );
$search_bg_src = $search_bg_img[0];

$search_layout = xzopro_option('search_layout');
if(!empty($search_layout)){
    $search_layout = xzopro_option('search_layout');
}else{
    $search_layout = 'right-sidebar';
}

if(!empty($search_layout) && $search_layout != 'full-width' && is_active_sidebar( 'sidebar-1' )){
    $main_col_class = 'col-lg-8 col-md-8';
}else{
    $main_col_class = 'col-lg-12';
}
get_header();
?>
    <div class="banner-area" <?php if(!empty($search_bg_src)) :?> style="background-image: url(<?php echo esc_url($search_bg_src)?>)" <?php endif;?> >
        <div class="container text-center ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>
                            <?php
                            /* translators: %s: search query. */
                            printf( esc_html__( 'Search Results for: %s', 'xzopro' ), '<span>' . get_search_query() . '</span>' );
                            ?>
                        </h1>

                        <div class="breadcrum-container">
                            <?php if(function_exists('bcn_display')) bcn_display();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<section id="primary" class="content-area xzopro-vc-disable">
		<main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <?php if($search_layout == 'left-sidebar'){
                        get_sidebar();
                    }?>

                    <div class="<?php echo esc_attr($main_col_class) ?>">
                        <?php if ( have_posts() ) : ?>

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', 'search' );

                            endwhile;?>

                            <div class="col-lg-12 text-center">
                                <?php
                                the_posts_pagination(array(
                                    'next_text' => '<i class="fa fa-angle-right"></i>',
                                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                                    'screen_reader_text' => ' ',
                                    'type'                => 'list'
                                ));
                                ?>
                            </div>
                        <?php
                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                    </div>

                    <?php if($search_layout == 'right-sidebar'){
                        get_sidebar();
                    }?>
                </div>
            </div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
