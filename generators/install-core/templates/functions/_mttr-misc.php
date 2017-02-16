<?php

// * ---------------------------------------------------------------------------    
// 
//       __ __  __
//     /  /   /   /     __/__/__
//     \ /   /   /  __   /  /  __  (/__
//      /   /   / /  /  /  /  /__) /  /
//     /   /   / (__/__/_ /__/____/  /_/
//             \
//               SOLUTIONS
// 
// 
//    =Functions - Misc
//
//    Misc template functions
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Useful if you need to limit words visually for an area
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_excerpt' ) ) {

	function mttr_excerpt( $content, $trim_length = null ) {

		if ( empty( $trim_length ) ) $trim_length = apply_filters( 'mttr_excerpt_default_trim_length', 30 );

		return wp_trim_words( $content, $trim_length, apply_filters( 'mttr_excerpt_ellipse_text', '...' ) );

	}

}




/* ---------------------------------------------------------
*	Change the default excerpt [...]
 --------------------------------------------------------- */

function mttr_excerpt_more( $excerpt ) {

	return '...';

}

add_filter( 'excerpt_more', 'mttr_excerpt_more', 30 );







/* ---------------------------------------------------------
*	Count the words in a supplied string
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_count_words' ) ) {
	
	function mttr_count_words( $str ) {

	    $count = str_word_count( strip_tags( $str ) );
	    return $count;
	    
	}

}





/* ---------------------------------------------------------
*	Unformat a string (remove tags and BRs)
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_remove_line_break_formatting' ) ) {

	function mttr_remove_line_break_formatting( $str = null ) {

		if ( $str ) {

			$str = strip_tags( $str );
			$str = str_replace( '<br>', '', $str );
			$str = str_replace( '<br />', '', $str );

			return $str;

		}

		return false;

	}

}






/* ---------------------------------------------------------
*	Get related posts
 --------------------------------------------------------- */
function mttr_get_related_posts( $post_id, $posts_per_page ) {
	
	$counter = 0;
	$features = array();

	$specified_posts = get_field( 'mttr_posts_related', $post_id );
	$tags = wp_get_post_tags( $post_id );
	$categories = wp_get_post_categories( $post_id );


	// Get specified posts
	if ( $specified_posts ) {

		foreach ( $specified_posts as $featured_post ) {

			$features[] = $featured_post;

		}

	}

	// Get tags
	if ( count( $features ) < intval( $posts_per_page )  &&  $tags ) {

		// Loop through and get all tags
		$tag_ids = array();
		foreach( $tags as $tag ) {

			$tag_ids[] = $tag->term_id;

		}


		/*
		*	Find similar tagged posts
		*/
		$tag_query = new WP_Query( 

			array( 

				'tag__in' => $tag_ids,
				'post__not_in' => array( $post_id ),
				'posts_per_page' => intval( $posts_per_page ),

			) 

		);


		if ( $tag_query->have_posts() ) {

			while ( $tag_query->have_posts() ) {

				$tag_query->the_post();
				$features[] = get_the_ID();

			}

		}

		wp_reset_postdata();

	}


	// Get posts from same categories
	if ( count( $features ) < intval( $posts_per_page ) ) {

		$existing_features = $features;
		$existing_features[] = $post_id;


		/*
		*	Find similar category posts
		*/
		$cat_query = new WP_Query( 

			array( 

				'category__in' => $categories,
				'post__not_in' => $existing_features,
				'posts_per_page' => intval( $posts_per_page - count( $features ) ),

			) 

		);

		if ( $cat_query->have_posts() ) {

			while ( $cat_query->have_posts() ) {

				$cat_query->the_post();
				$features[] = get_the_ID();

			}

		}

		wp_reset_postdata();

	}


	// If there's still not enough, JUST GET MORE POSTS
	if ( count( $features ) < intval( $posts_per_page ) ) {

		$existing_features = $features;
		$existing_features[] = $post_id;


		/*
		*	Find similar category posts
		*/
		$cat_query = new WP_Query( 

			array( 

				'post__not_in' => $existing_features,
				'posts_per_page' => intval( $posts_per_page - count( $features ) ),

			) 

		);

		if ( $cat_query->have_posts() ) {

			while ( $cat_query->have_posts() ) {

				$cat_query->the_post();
				$features[] = get_the_ID();

			}

		}

		wp_reset_postdata();

	}


	// If there's still none, just return false....
	if ( count( $features ) < 1 ) {

		return false;

	}

	return $features;

}






/* ---------------------------------------------------------
*	Return the file size of a given file
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_format_file_size' ) ) {

	function mttr_format_file_size( $file ) {

		$bytes = filesize( $file );
		$s = array('b', 'Kb', 'Mb', 'Gb');
		$e = floor( log( $bytes ) / log( 1024 ) );

		return sprintf( '%.2f '.$s[$e], ( $bytes / pow( 1024, floor( $e ) ) ) );

	}

}






/* ---------------------------------------------------------
*	Returns true if a blog has more than 1 category.
 --------------------------------------------------------- */
function mttr_categorized_blog() {

	if ( false === ( $cats = get_transient( 'mttr_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$cats = count( $cats );

		set_transient( 'mttr_categories', $cats );
	}

	if ( $cats > 1 ) {
		// This blog has more than 1 category so mttr_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so mttr_categorized_blog should return false.
		return false;
	}

}






/* ---------------------------------------------------------
*	Return the pagination array
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_pagination' ) ) {

	function mttr_get_pagination( $numpages = '', $pagerange = '', $paged='' ) {

		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 3,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( 'Previous', 'mttr' ),
			'next_text' => __( 'Next', 'mttr' ),
			'type'      => 'list',
		) );

		if ( $links ) {

			return $links;

		}

		return false;

	}

}






function mttr_get_flexible_content_text( $item ) {

	$excerpt = '';

	if ( have_rows( 'mttr_flexible_bands', $item ) ) {

		while ( have_rows( 'mttr_flexible_bands', $item ) ) {

			the_row();

			if ( have_rows( 'flexible_content', $item ) ) {

				while ( have_rows( 'flexible_content', $item ) ) {

					the_row();

					if ( get_row_layout() == 'standard_content' ) {

						$excerpt .= apply_filters( 'the_content', get_sub_field( 'content_one', false, false ) );
						$excerpt .= apply_filters( 'the_content', get_sub_field( 'content_two', false, false ) );
						$excerpt .= apply_filters( 'the_content', get_sub_field( 'content_three', false, false ) );

					}

				}

			}

		}

	}

	return $excerpt;

}







/* ---------------------------------------------------------
*	Output the pagination
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_paged_navigation' ) ) {

	function mttr_paged_navigation( $numpages = '', $pagerange = '', $paged='' ) {

		$links = mttr_get_pagination();

		if ( $links ) {

			echo '<nav class="c-pagination">';

				echo $links;

			echo '</nav>';

		}

	}

}






/* ---------------------------------------------------------
*	Flush out the transients used in mttr_categorized_blog.
 --------------------------------------------------------- */
function mttr_category_transient_flusher() {
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'mttr_categories' );

}
add_action( 'edit_category', 'mttr_category_transient_flusher' );
add_action( 'save_post',     'mttr_category_transient_flusher' );












/* ---------------------------------------------------------
*	@TODO Refactor and simplify the following functions
 --------------------------------------------------------- */
function mttr_get_contextual_title() {

	$title = get_the_title();

	if ( is_archive() ) {

		if ( is_category() ) { 

			$title = single_cat_title( '', false );

		} elseif( is_tag() ) { 

			$title = single_tag_title( '', false );

		} elseif ( is_day() ) { 

			$title = 'Archive for ' . date();

		} elseif ( is_month() ) { 

			$title = date( 'F, Y' );

		} elseif( is_year() ) {

			$title = date( 'Y' );

		} elseif( is_author() ) {

			$author = get_userdata( get_query_var( 'author' ) );
			$title = 'Posts by ' . $author->display_name;

		}

	}


	// Taxonomies
	if ( is_tax() ) {

		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$title = $term->name;

	}


	// Blog main
	if ( is_home() && get_option( 'page_for_posts' ) ) {

		$title = get_the_title( get_option( 'page_for_posts' ) );

	}


	// 404
	if ( is_404() ) {

		$title = '404';

	}


	// Search
	if ( is_search() ) {

		$title = 'Search Results for: ' . get_search_query();

	}


	// Nothing found
	if ( is_search()  &&  !have_posts() ) {

		$title = 'Nothing found';

	}

	return $title;

}



function mttr_get_contextual_subheading() {

	$subheading = '';

	if ( is_archive() ) {

		if ( is_category() ) { 

		} elseif( is_tag() ) { 

		} elseif ( is_day() ) { 

			$subheading = 'Archive for';

		} elseif ( is_month() ) { 

			$subheading = 'Archive for';

		} elseif( is_year() ) {

			$subheading = 'Archive for';

		} elseif( is_author() ) {

			$author = get_userdata( get_query_var( 'author' ) );
			$subheading = 'Posts by ';

		}

	}


	// Search
	if ( is_search() ) {

		$subheading = 'Search Results for: ';

	}


	// Nothing found
	if ( is_search()  &&  !have_posts() ) {

		$subheading = '';

	}

	return $subheading;

}



/*
*	Get the content or description based on what 'page' we're viewing
*/
function mttr_get_contextual_content() {

	$content = get_the_excerpt();

	if ( is_archive() ) {

		if ( is_category() ) { 

			$content = category_description();

		}

		if ( is_tag() ) { 

			$content = tag_description();

		}

		if ( is_author() ) {

			$content = false;

		}

	}


	// Blog main
	if ( is_home() && get_option( 'page_for_posts' ) ) {

		// Blog
		$content = get_post_field( 'post_excerpt', get_option( 'page_for_posts' ) );

	}


	// 404
	if ( is_404() ) {

		$content = 'Sorry, this page doesn\'t seem to exist!';

	}


	// Nothing found
	if ( is_search()  &&  !have_posts() ) {

		$content = 'Please try another search';

	}

	return $content;

}




/* ---------------------------------------------------------
*	Check if a blog page
 ---------------------------------------------------------*/
function mttr_is_blog(){

    if ( is_front_page() && is_home() ) {

        return false;

    } elseif ( is_front_page() ) {

        return false;

    } elseif ( is_home() ) {

        return true;

    } else {

        return false;

    }
}




/* ---------------------------------------------------------
*	Output flexible content OR standard content (or no content )
 ---------------------------------------------------------*/
function mttr_output_flexible_with_fallback_content( $obj ) {

	if ( empty( $ojb ) ) {

		$obj = get_the_ID();

		if ( mttr_is_blog() ) {

			$obj = get_option( 'page_for_posts' );

		}

	}

	// Check for flexible content
	if ( have_rows( 'mttr_flexible_bands', $obj ) ) {

		mttr_site_layout_flexible_content( $obj );

	} else {

		$posts = mttr_get_post_loop_ids();

		if ( $posts ) {

			mttr_output_standard_content_single( $posts[ 0 ] );

		} else {

			mttr_get_no_content();

		}

	}

}






/* ---------------------------------------------------------
*	Output the 'no content' partial
 ---------------------------------------------------------*/
function mttr_get_no_content() {

	$data = apply_filters( 'mttr_get_no_content_template_data', array() );
	mttr_get_template( apply_filters( 'mttr_get_no_content_template_file', '_core/components/none/_c.none-tpl' ), $data );

}






/* ---------------------------------------------------------
*	Setup standard content (single/page)
 ---------------------------------------------------------*/
function mttr_setup_standard_content_single_data( $id = null ) {

	// Get an ID
	if ( empty( $id ) ) {

		$id = get_the_ID();

	}

	// Setup the post data
	global $post;
	$post = $id;
	setup_postdata( $post );

	// Get content
	$content = array(

		'primary' => mttr_get_contextual_content()

	);

	// Setup modifiers
	$modifiers = 'o-lyt';
	
	// Get our base data!
	$data = array(

		'content' => $content,
		'width' => apply_filters( 'mttr_flex_standard_content_width_default', 'u-line-length' ),
		'alignment' => apply_filters( 'mttr_flex_standard_content_alignment_default', 'u-line-length--left' ),
		'modifiers' => $modifiers,

	);

	// FILTER DATA (just in case)
	$data = apply_filters( 'mttr_get_flexible_content_standard_content_data', $data );

	// reset the post data back to normal
	wp_reset_postdata();

	// Return our magical data
	return $data;

}






/* ---------------------------------------------------------
*	Output standard content (single/page)
 ---------------------------------------------------------*/
function mttr_output_standard_content_single( $id = null ) {

	// Get an ID
	if ( empty( $id ) ) {

		$id = get_the_ID();

	}

	// Setup our data
	$data = mttr_setup_standard_content_single_data( $id );
	$template = apply_filters( 'mttr_get_flexible_content_standard_content_template', '_core/components/flexible/standard-content/_c.standard-content-tpl' );

	// Setup our default content band!
	echo '<div class="o-band  ' . apply_filters( 'mttr_template_flexible_content_standard_band_modifiers', '' ) . '  ' . apply_filters( 'mttr_template_flexible_content_standard_band_size', 'o-band--large' ) . '">';

		echo '<div class="o-band__body  o-tint__body">';

			mttr_get_template( $template, $data );

		echo '</div>';

	echo '</div>';

}






/* ---------------------------------------------------------
*	Get an array of post IDs
 ---------------------------------------------------------*/
function mttr_get_post_loop_ids() {

	if ( have_posts() ) {

		$posts = array();

		while ( have_posts() ) {

			the_post();

			$posts[] = get_the_ID();

		}

		return $posts;

	}

	return false;

}



/* ---------------------------------------------------------
*	Ensure Google Maps is ENQUEUED
 ---------------------------------------------------------*/
function mttr_enqueue_google_maps() {

	// Enqueue google maps if not enqueued already
	if ( !wp_script_is( 'google-maps', 'enqueued' ) ) {

		wp_register_script( 'google-maps', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyADBdz6lVyTulkmIJoCjRZgsW98_Z04yIM', array( 'jquery' ), CHILD_THEME_VERSION, true );
		wp_enqueue_script( 'google-maps' );

	}

}




/* ---------------------------------------------------------
*	Add ability to edit Gravity Forms for editors
 ---------------------------------------------------------*/
function mttr_add_gravity_forms_editor(){

    $role = get_role( 'editor' );
    $role->add_cap( 'gform_full_access' );

}
add_action( 'admin_init','mttr_add_gravity_forms_editor' );




/* ---------------------------------------------------------
*	Generator for CPT lables
 ---------------------------------------------------------*/

function mttr_generate_cpt_labels( $single, $plural = null ) {

	if( empty( $plural ) ) {

		if( substr( $single, -1) == 'y' ) {

			$plural = substr( $single, 0, -1) . 'ies';

		} else {

			$plural = $single . 's';

		}

	}

	$labels = array(

		'name' => $plural,
		'singular_name' => $single,
		'add_new_item' => 'Add New ' . $single,
		'edit_item' => 'Edit ' . $single,
		'new_item' => 'New ' . $single,
		'view_item' => 'View ' . $single,
		'view_items' => 'View ' . $plural,
		'search_items' => 'Search ' . $plural,
		'not_found' => 'No ' . $plural . ' found',
		'not_found_in_trash' => 'No ' . $plural . ' found in Trash',
		'parent_item_colon' => 'Parent ' . $single . ':',
		'all_items' => 'All ' . $plural,
		'archives' => $single . ' Archives',
		'attributes' => $single . ' Attributes',
		'insert_into_item' => 'Insert into ' . $single,
		'uploaded_to_this_item' => 'Uploaded to this ' . $single,

	);

	return $labels;

}