<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Xzopro
 */

if ( ! function_exists( 'xzopro_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function xzopro_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'xzopro' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="fa fa-calendar"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'xzopro_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function xzopro_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'xzopro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"><i class="fa fa-user"></i> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'xzopro_post_tags' ) ) :
	/**
	 * Prints HTML with meta information for the tags.
	 */
	function xzopro_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'xzopro'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tags: %1$s', 'xzopro') . '</span>', $tags_list); // WPCS: XSS OK.
            }

		}
	}
endif;

if ( ! function_exists( 'xzopro_post_categories' ) ) :
    /**
     * Prints HTML with meta information for the categories.
     */
    function xzopro_post_categories() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {

            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'xzopro'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links"><i class="fa fa-tags"></i>' . esc_html__('%1$s', 'xzopro') . '</span>', $categories_list); // WPCS: XSS OK.
            }

        }
    }
endif;


if ( ! function_exists( 'xzopro_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function xzopro_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'xzopro_comment_count' ) ) :
    /**
     * Prints HTML with meta information for the comments.
     */
    function xzopro_comment_count() {
        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
            echo '<span class="comments-link"><i class="fa fa-comments-o"></i>';
            comments_popup_link();
            echo '</span>';
        }
    }
endif;