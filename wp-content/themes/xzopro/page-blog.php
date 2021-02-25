
<?php
/*
Template Name: Page Blog
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

if(array_key_exists('custom_title', $banner_meta)) {
    $custom_title = $banner_meta['custom_title'];
} else {
    $custom_title = '';
}

$banner_default_text_align = xzopro_option('banner_default_text_align');

if(array_key_exists('banner_text_align', $banner_meta) && $banner_meta['banner_text_align'] != '1') {
    $banner_text_align = $banner_meta['banner_text_align'];
} elseif(!empty($banner_default_text_align)) {
    $banner_text_align = xzopro_option('banner_default_text_align');
}else{
    $banner_text_align = 'center';
}

$vc_enabled = get_post_meta($post->ID, '_wpb_vc_js_status', true);
if($vc_enabled != 'true') {
    $vc_check_class = 'xzopro-vc-disable';
} else {
    $vc_check_class = 'xzopro-vc-enable';
}

get_header();
?>

<?php if($enable_page_banner == true ) : ?>
    <div class="banner-area" <?php if(!empty($banner_bg_src)) :?> style="background-image: url(<?php echo esc_url($banner_bg_src)?>)" <?php endif;?> >
        <div class="container text-<?php echo esc_attr($banner_text_align) ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1>
                            <?php
                            if(!empty($custom_title)){
                                echo esc_html($custom_title);
                            }else{
                                the_title();
                            }
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
	<div id="primary" class="content-area <?php echo esc_attr($vc_check_class); ?>">
		<main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            while ( have_posts() ) :
                                the_post();

                                get_template_part( 'template-parts/content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->



<?php get_footer(); ?>