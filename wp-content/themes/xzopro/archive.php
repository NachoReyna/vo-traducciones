<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Xzopro
 */

$archive_banner = xzopro_option('archive_banner');
$archive_banner_img = xzopro_option('archive_banner_img');
$archive_bg_img = wp_get_attachment_image_src( $archive_banner_img, 'full' );
$archive_bg_src = $archive_bg_img[0];

$archive_layout = xzopro_option('archive_layout');
if(!empty($archive_layout)){
    $archive_layout = xzopro_option('archive_layout');
}else{
    $archive_layout = 'right-sidebar';
}


if(!empty($archive_layout) && $archive_layout != 'full-width' && is_active_sidebar( 'sidebar-1' )){
    $main_col_class = 'col-lg-8 col-md-12';
}else{
    $main_col_class = 'col-lg-12';
}
get_header();
?>
    <?php if($archive_banner == true) : ?>
    <div class="banner-area" <?php if(!empty($archive_bg_src)) :?> style="background-image: url(<?php echo esc_url($archive_bg_src)?>)" <?php endif;?> >
        <div class="container text-center ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>
                            <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
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
    <div class="container pt-5">
        <div class="row">
            <?php if ( category_description() ) : ?> 	<div class="des-category"> <?php echo category_description(); ?> </div> <?php endif; ?> 
        </div>
    </div>
    <?php endif; ?>

    <div id="primary" class="content-area xzopro-vc-disable">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row <?php echo esc_attr($archive_layout) ?>">
                    <?php if($archive_layout == 'left-sidebar'){
                        get_sidebar();
                    }?>
                    <div class="<?php echo esc_attr($main_col_class)?> xzopro-posts-wrap <?php echo esc_attr($archive_layout) ?>">

                        <?php
                        if ( have_posts() ) :

                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', get_post_type() );

                            endwhile;

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
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
                            </div>
                        </div>
                    </div>
                    <?php if($archive_layout == 'right-sidebar'){
                        get_sidebar();
                    }?>
                </div>
            </div>
        </main>
    </div>
<?php
get_footer();