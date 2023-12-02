<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Tattoo Designer
 */

if ( ! function_exists( 'tattoodesigner_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function tattoodesigner_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'tattoodesigner_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function tattoodesigner_categorized_blog() {
	if ( false === ( $tattoodesigner_all_the_cool_cats = get_transient( 'tattoodesigner_all_the_cool_cats' ) ) ) {
		$tattoodesigner_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		$tattoodesigner_all_the_cool_cats = count( $tattoodesigner_all_the_cool_cats );

		set_transient( 'tattoodesigner_all_the_cool_cats', $tattoodesigner_all_the_cool_cats );
	}

	if ( '1' != $tattoodesigner_all_the_cool_cats ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('tattoo_designer_sticky_menu')):
    function tattoo_designer_sticky_menu()
    {
        $is_sticky = get_theme_mod('tattoo_designer_stickyheader', false);

        if ($is_sticky == false):
            return 'not-sticky';
        else:
            return 'is-sticky-on';
        endif;
    }
endif;

/**
 * Flush out the transients used in tattoodesigner_categorized_blog
 */
function tattoodesigner_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'tattoodesigner_all_the_cool_cats' );
}
add_action( 'edit_category', 'tattoodesigner_category_transient_flusher' );
add_action( 'save_post',     'tattoodesigner_category_transient_flusher' );