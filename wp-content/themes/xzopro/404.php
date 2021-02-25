<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Xzopro
 */

$er404_banner_img = xzopro_option('er404_banner_img');
$er404_bg_img = wp_get_attachment_image_src( $er404_banner_img, 'full' );
$er404_bg_src = $er404_bg_img[0];


$er404_layout = xzopro_option('er404_layout');

if(!empty($er404_layout)){
    $er404_layout = xzopro_option('er404_layout');
}else{
    $er404_layout = 'full-width';
}

if(!empty($er404_layout) && $er404_layout != 'full-width' && is_active_sidebar( 'sidebar-1' )){
    $main_col_class = 'col-lg-8 col-md-8';
}else{
    $main_col_class = 'col-lg-12';
}

get_header();
?>

    <div class="banner-area" <?php if(!empty($er404_bg_src)) :?> style="background-image: url(<?php echo esc_url($er404_bg_src)?>)" <?php endif;?> >
        <div class="container text-center ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-content">
                        <h1><?php esc_html_e('Error 404', 'xzopro'); ?></h1>

                        <div class="breadcrum-container">
                            <?php if(function_exists('bcn_display')) bcn_display();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="primary" class="content-area xzopro-vc-disable">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">

                    <?php if($er404_layout == 'left-sidebar'){
                        get_sidebar();
                    }?>

                    <div class="<?php echo esc_attr($main_col_class); ?>">
                        <section class="error-404 not-found">
                            <header class="page-header">
                                <h1 class="page-title title-404"><?php esc_html_e( '404', 'xzopro' ); ?></h1>
                                <h5><?php esc_html_e( 'Page Not found', 'xzopro' ); ?></h5>
                            </header><!-- .page-header -->

                            <div class="page-content">
                                <p><?php esc_html_e( 'It looks like nothing was found at this location. Try another search.', 'xzopro' ); ?></p>

                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <?php
                                        get_search_form();
                                        ?>
                                    </div>
                                </div>
                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->
                    </div>

                    <?php if($er404_layout == 'right-sidebar'){
                        get_sidebar();
                    }?>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
