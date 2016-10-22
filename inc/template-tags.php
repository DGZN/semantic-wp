<?php
if ( !function_exists( 'get_the_posts_navigation' ) ):
function get_the_posts_navigation( $args = array() ) {
	$navigation = '';
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
			$args = wp_parse_args( $args, array(
					'prev_text'          => __( 'Older posts', 'medical-rehab' ),
					'next_text'          => __( 'Newer posts', 'medical-rehab' ),
					'screen_reader_text' => __( 'Posts navigation', 'medical-rehab' ),
			) );

			$next_link = get_previous_posts_link( $args['next_text'] );
			$prev_link = get_next_posts_link( $args['prev_text'] );

			if ( $prev_link ) {
					$navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
			}

			if ( $next_link ) {
					$navigation .= '<div class="nav-next">' . $next_link . '</div>';
			}

			$navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
	}

	return $navigation;
}
endif;

if ( ! function_exists( 'medicalrehab_post_nav' ) ) :

/**
* Display navigation to next/previous post when applicable.
*/

function medicalrehab_post_nav() {

	// Don't print empty markup if there's nowhere to navigate.

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {

		return;

	}

	?>

	<nav class="navigation post-navigation" role="navigation">

		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'medical-rehab' ); ?></h2>

		<div class="nav-links">

			<?php

				previous_post_link( '<div class="nav-previous">%link</div>', _x( '%title', 'Previous post link', 'medical-rehab' ) );

				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title', 'Next post link',     'medical-rehab' ) );

			?>

		</div><!-- .nav-links -->

	</nav><!-- .navigation -->

	<?php

}

endif;


if ( ! function_exists( 'medical_rehab_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function medical_rehab_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'medical-rehab' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'medical-rehab' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;



if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'medical-rehab' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'medical-rehab' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'medical-rehab' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'medical-rehab' ), get_the_date( _x( 'Y', 'yearly archives date format', 'medical-rehab' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'medical-rehab' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'medical-rehab' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'medical-rehab' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'medical-rehab' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'medical-rehab' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'medical-rehab' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'medical-rehab' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'medical-rehab' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'medical-rehab' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;