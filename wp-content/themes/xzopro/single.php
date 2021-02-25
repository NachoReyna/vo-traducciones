<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Xzopro
 */

if(get_post_meta($post->ID, 'banner_metabox', true)) {
    $banner_meta = get_post_meta($post->ID, 'banner_metabox', true);
} else {
    $banner_meta = array();
}

if(array_key_exists('enable_page_banner', $banner_meta)) {
    $enable_page_banner = $banner_meta['enable_page_banner'];
} else {
    $enable_page_banner = true;
}

if(array_key_exists('banner_bg', $banner_meta) && !empty($banner_meta['banner_bg'])) {
    $banner_bg = $banner_meta['banner_bg'];
    $banner_bg_img = wp_get_attachment_image_src( $banner_bg, 'full' );
    $banner_bg_src = $banner_bg_img[0];
} else {
    $banner_bg_src = '';
}

$banner_default_text_align = xzopro_option('banner_default_text_align');

if(array_key_exists('banner_text_align', $banner_meta) && $banner_meta['banner_text_align'] != '1') {
    $banner_text_align = $banner_meta['banner_text_align'];
} elseif(!empty($banner_default_text_align)) {
    $banner_text_align = xzopro_option('banner_default_text_align');
}else{
    $banner_text_align = 'center';
}


if(get_post_meta($post->ID, 'layout_meta', true)) {
    $layout_meta = get_post_meta($post->ID, 'layout_meta', true);
} else {
    $layout_meta = array();
}


$post_default_layout = xzopro_option('post_default_layout');

if(array_key_exists('post_layout', $layout_meta) && $layout_meta['post_layout'] != '1' ) {
    $post_layout = $layout_meta['post_layout'];
} elseif(!empty($post_default_layout)) {
    $post_layout = xzopro_option('post_default_layout');
}else{
    $post_layout = 'right-sidebar';
}


if(!empty($post_layout) && $post_layout != 'full-width' && is_active_sidebar( 'sidebar-1' )){
    $single_post_column_class = 'col-lg-8 col-md-12';
}else{
    $single_post_column_class = 'col-lg-12';
}

get_header();?>
    <?php if($enable_page_banner == true ) : ?>
        <div class="banner-area" <?php if(!empty($banner_bg_src)) :?> style="background-image: url(<?php echo esc_url($banner_bg_src)?>)" <?php endif;?> >
            <div class="container text-<?php echo esc_attr($banner_text_align) ?>">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-content">
                            <h1>
                                <?php
                                    the_title();
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
    <?php endif;?>
    
   

    

	<div id="primary" class="content-area xzopro-vc-disable">
		<main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <?php if($post_layout == 'left-sidebar'){
                        get_sidebar();
                        
                    }?>

                    <div class="<?php echo esc_attr($single_post_column_class);?>">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', get_post_type() );


                            $single_post_nav = xzopro_option('single_post_nav');
                            if($single_post_nav == true){
                                echo '<div class="single-blog-post-navigation">';
                                the_post_navigation(array(
                                    'prev_text'                  => __( 'Previous Post', 'xzopro' ),
                                    'next_text'                  => __( 'Next Post', 'xzopro' ),
                                ));
                                echo '</div>';
                            }
                             
                            // If comments are open or we have at least one comment, load up the comment template.
                            /*if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;*/

                        endwhile; // End of the loop.
                        ?>
                    </div>

                    <?php if($post_layout == 'right-sidebar'){
                        get_sidebar();
                    }?>
                    
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
