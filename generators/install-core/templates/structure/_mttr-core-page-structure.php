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
//    =Outer Layout - Structures
//
//    Setup the opening HTML tags, head, body and closing HTML tags
//
// ---------------------------------------------------------------------------- *




/* ---------------------------------------------------------
*	Output the stuctural page markup and the wp_head() function
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_output_wp_head' ) ) {

	function mttr_output_wp_head() {

		echo '<!DOCTYPE html>';
		echo '<html ';

			language_attributes();
		
		echo ' class="no-js"';
		echo '>';
		echo '<head>';

			do_action( 'mttr_output_wp_head_meta' );

		echo '</head>';

	}

}
add_action( 'mttr_page_setup', 'mttr_output_wp_head', 1 );


// Add the WP_HEAD function to the head meta
add_action( 'mttr_output_wp_head_meta', 'wp_head', 11 );




/* ---------------------------------------------------------
*	Output the charset meta
 ---------------------------------------------------------*/

add_action( 'mttr_output_wp_head_meta', 'mttr_output_meta_charset' );

if ( ! function_exists( 'mttr_output_meta_charset' ) ) {

	function mttr_output_meta_charset() {

		echo '<meta charset="';
			bloginfo( 'charset' );
		echo '">';

	}

}





/* ---------------------------------------------------------
*	Output the responsive viewport meta
 ---------------------------------------------------------*/
 
add_action( 'mttr_output_wp_head_meta', 'mttr_output_meta_viewport_responsive' );

if ( ! function_exists( 'mttr_output_meta_viewport_responsive' ) ) {

	function mttr_output_meta_viewport_responsive() {

		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';

	}

}




/* ---------------------------------------------------------
*	Output the profile link
 ---------------------------------------------------------*/
 
add_action( 'mttr_output_wp_head_meta', 'mttr_output_meta_profile' );

if ( ! function_exists( 'mttr_output_meta_profile' ) ) {

	function mttr_output_meta_profile() {

		echo '<link rel="profile" href="http://gmpg.org/xfn/11">';

	}

}




/* ---------------------------------------------------------
*	Output the pingback link
 ---------------------------------------------------------*/
 
add_action( 'mttr_output_wp_head_meta', 'mttr_output_meta_pingback' );

if ( ! function_exists( 'mttr_output_meta_pingback' ) ) {

	function mttr_output_meta_pingback() {

		echo '<link rel="pingback" href="';
			bloginfo( 'pingback_url' );
		echo '">';

	}

}





/* ---------------------------------------------------------
*	Output the opening body tag
 ---------------------------------------------------------*/
if ( ! function_exists( 'mttr_output_body_open' ) ) {

	function mttr_output_body_open() {

		echo '<body ';

			body_class();

		echo '>';

	}

}
add_action( 'mttr_page_setup', 'mttr_output_body_open', 3 );






/* ---------------------------------------------------------
*	Output the site blocker for our menu etc
 ---------------------------------------------------------*/
if ( ! function_exists( 'mttr_output_site_blocker' ) ) {

	function mttr_output_site_blocker() {

		echo '<i data-toggle-type="remove" class="c-site-blocker  js-toggle"  data-toggle-target="body"  data-toggle-class="' . mttr_get_site_blocker_toggle_classes() . '"></i>';

	}

}
add_action( 'mttr_page_setup', 'mttr_output_site_blocker', 10 );





/* ---------------------------------------------------------
*	Output the site blocker for our menu etc
 ---------------------------------------------------------*/
if ( ! function_exists( 'mttr_get_site_blocker_toggle_classes' ) ) {

	function mttr_get_site_blocker_toggle_classes() {

		$classes = array(

			'c-masthead--is-open',
			'c-site-blocker--is-active',
			'c-popup--is-active',
			'c-menu-icon--is-active',

		);

		$classes = apply_filters( 'mttr_site_blocker_toggle_classes', $classes, 10, 1 );
		$classes = implode( '  ', $classes );

		return $classes;

	}

}






/* ---------------------------------------------------------
*	Output the site wrapper
 ---------------------------------------------------------*/

if ( ! function_exists( 'mttr_output_site_wrapper_open' ) ) {

	function mttr_output_site_wrapper_open() {

		echo '<div class="site">';

	}

}
add_action( 'mttr_page_setup', 'mttr_output_site_wrapper_open', 15 );






/* ---------------------------------------------------------
*	Output the accessibility skip to content link
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_accessibility_skip_to_content' ) ) {

	function mttr_output_accessibility_skip_to_content() {

		echo '<a class="skip-link  u-sr" href="#content">';

			esc_html_e( 'Skip to content', 'mttr' );

		echo '</a>';

	}

}
add_action( 'mttr_page_setup', 'mttr_output_accessibility_skip_to_content', 20 );






/* ---------------------------------------------------------
*	Output the opening header tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_open_header_tag' ) ) {

	function mttr_output_open_header_tag() {

		echo '<header>';

	}

}
add_action( 'mttr_before_header', 'mttr_output_open_header_tag', 1 );






/* ---------------------------------------------------------
*	Output the closing header tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_close_header_tag' ) ) {

	function mttr_output_close_header_tag() {

		echo '</header>';

	}

}
add_action( 'mttr_after_header', 'mttr_output_close_header_tag', 80 );







/* ---------------------------------------------------------
*	Output the opening main tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_open_main_tag' ) ) {

	function mttr_output_open_main_tag() {

		echo '<main id="content">';

	}

}
add_action( 'mttr_before_content', 'mttr_output_open_main_tag', 1 );






/* ---------------------------------------------------------
*	Output the closing main tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_close_main_tag' ) ) {

	function mttr_output_close_main_tag() {

		echo '</main>';

	}

}
add_action( 'mttr_after_content', 'mttr_output_close_main_tag', 80 );







/* ---------------------------------------------------------
*	Output the opening aside tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_open_aside_tag' ) ) {

	function mttr_output_open_aside_tag() {

		echo '<aside>';

	}

}
add_action( 'mttr_before_aside', 'mttr_output_open_aside_tag', 1 );






/* ---------------------------------------------------------
*	Output the closing aside tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_close_aside_tag' ) ) {

	function mttr_output_close_aside_tag() {

		echo '</aside>';

	}

}
add_action( 'mttr_after_aside', 'mttr_output_close_aside_tag', 80 );







/* ---------------------------------------------------------
*	Output the opening footer tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_open_footer_tag' ) ) {

	function mttr_output_open_footer_tag() {

		echo '<footer>';

	}

}
add_action( 'mttr_footer', 'mttr_output_open_footer_tag', 1 );






/* ---------------------------------------------------------
*	Output the closing footer tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_close_footer_tag' ) ) {

	function mttr_output_close_footer_tag() {

		echo '</footer>';

	}

}
add_action( 'mttr_footer', 'mttr_output_close_footer_tag', 80 );








/* ---------------------------------------------------------
*	Output the ending site wrapper tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_site_wrapper_close' ) ) {

	function mttr_output_site_wrapper_close() {

		echo '</div><!-- .site -->';

	}

}
add_action( 'mttr_page_end', 'mttr_output_site_wrapper_close', 1 );






/* ---------------------------------------------------------
*	Output WP Footer
 ---------------------------------------------------------*/
 
add_action( 'mttr_page_end', 'wp_footer', 5 );






/* ---------------------------------------------------------
*	Output the ending site wrapper tag
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'mttr_output_body_close' ) ) {

	function mttr_output_body_close() {

			echo '</body>';

		echo '</html>';

	}

}
add_action( 'mttr_page_end', 'mttr_output_body_close', 10 );