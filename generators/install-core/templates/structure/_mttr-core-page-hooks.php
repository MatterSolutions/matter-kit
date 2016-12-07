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
//    =Outer Layout - Hooks
//
//    Set up the outer hooks for our template use
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Output the stuctural page markup and the wp_head() function
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_outer_setup_header' ) ) {

	function mttr_outer_setup_header() {

		// Page setup, opening html tags etc
		do_action( 'mttr_page_setup' );

	}

}





/* ---------------------------------------------------------
*	Output the stuctural page markup and the wp_head() function
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_outer_header' ) ) {

	function mttr_outer_header() {

		// Header elements
		do_action( 'mttr_before_header' );
		do_action( 'mttr_header' );
		do_action( 'mttr_after_header' );

	}

}







/* ---------------------------------------------------------
*	Output the page, including header, content and footer
 ---------------------------------------------------------*/
 
if ( ! function_exists( 'matter_kit' ) ) {

	function matter_kit() {

		get_header();

		do_action( 'mttr_before_content' );
		do_action( 'mttr_content' );
		do_action( 'mttr_after_content' );

		do_action( 'mttr_before_aside' );
		do_action( 'mttr_aside' );
		do_action( 'mttr_after_aside' );

		get_footer();

	}

}




/* ---------------------------------------------------------
*	Output the footer elements
 ---------------------------------------------------------*/

if ( ! function_exists( 'mttr_outer_footer' ) ) {

	function mttr_outer_footer() {

		// Footer elements
		do_action( 'mttr_before_footer' );
		do_action( 'mttr_footer' );
		do_action( 'mttr_after_footer' );

	}

}



/* ---------------------------------------------------------
*	Output the footer elements
 ---------------------------------------------------------*/

if ( ! function_exists( 'mttr_outer_setup_footer' ) ) {

	function mttr_outer_setup_footer() {

		// Page ending and scripts
		do_action( 'mttr_page_end' );

	}

}



/* ---------------------------------------------------------
*	Loop through components and output tests
 ---------------------------------------------------------*/
 
function mttr_setup_components() {

	do_action( 'mttr_setup_components' );

}
add_action( 'after_setup_theme', 'mttr_setup_components' );