<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Xzopro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
        if ( is_single() && 'post' === get_post_type()){
            $xzopro_single_post_class = ' xzopro-single-post';
        }else{
            $xzopro_single_post_class = '';
        }

        $single_post_cat = xzopro_option('single_post_cat');
        $single_post_tag = xzopro_option('single_post_tag');    
    ?>

    <div class="xzopro-posts<?php echo esc_attr($xzopro_single_post_class); ?>">
        <?php if(has_post_thumbnail()) : ?>
            <div class="xzopro-post-thumb">
                <?php the_post_thumbnail('xzopro-blog-thumb'); ?>
            </div>
        <?php endif; ?>

        <header class="entry-header">
            <?php
            if ( !is_singular() ) :
                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            endif;

            if ( 'post' === get_post_type() ) : ?>
                <div class="xzopro-posts-meta">
                    <ul class="no-list-style">
                        <li><?php xzopro_posted_by();?></li>
                        <li><?php xzopro_posted_on();?></li>
                        <?php if(get_comments_number() != 0){?><li><?php xzopro_comment_count();?></li><?php } ?>

                        <?php if($single_post_cat == true || $single_post_cat !== NULL){?><li><?php xzopro_post_categories();?></li><?php } ?>
                    </ul>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            if(is_single()){
                the_content( sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xzopro' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xzopro' ),
                    'after'  => '</div>',
                ) );
            }else{
                the_excerpt();
                echo '<div class="xzopro-post-read-more"><a href="' . esc_url( get_permalink() ) . '" class="xzopro-btn fill-btn">'.esc_html__('Leer más', 'xzopro').'</a></div>';
            }?>
            
        </div><!-- .entry-content -->

        <?php if(is_single() && 'post' === get_post_type()) :?>
        <?php if ( $single_post_tag == true || $single_post_tag !== NULL) : ?>
            <div class="entry-footer">
                <div class="post-tags">
                    <?php xzopro_post_tags(); ?>
                </div>
            </div>
        <?php endif;?>
        <?php endif;?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->