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
//    =Styleguide Page - Styleguide functions
//
//    Hooks and functions for the styleguide
//
// ---------------------------------------------------------------------------- *


if ( !function_exists( 'mttr_init_styleguide' ) ) {

	function mttr_init_styleguide( $classes ) {

		// Setup/create elements
		do_action( 'mttr_setup_styleguide_pages' );
		do_action( 'mttr_setup_components' );
		do_action( 'mttr_setup_component_tests' );

		// Add the components TO the styleguide
		do_action( 'mttr_setup_styleguide_page_components' );

	}

	add_action( 'init', 'mttr_init_styleguide', 5 );	

}




if ( !function_exists( 'mttr_add_styleguide_body_class' ) ) {

	// Add a 'styleguide' class to the body
	add_filter( 'body_class', 'mttr_add_styleguide_body_class' );
	function mttr_add_styleguide_body_class( $classes ) {

		if ( is_page( array( 'styleguide' ) ) ) {
			
			$classes[] = 'page--styleguide';

		}

		return $classes;

	}

}



/*
*   Add a page to the styleguide
*/

if ( !function_exists( 'mttr_add_styleguide_page' ) ) {

	function mttr_add_styleguide_page( $slug, $data = array() ) {

		global $_mttr_styleguide_pages;
		$_mttr_styleguide_pages[ esc_attr( $slug ) ] = $data;

	}

}




/*
*   Add a component to styleguide page
*/

if ( !function_exists( 'mttr_add_component_to_styleguide_page' ) ) {

	function mttr_add_component_to_styleguide_page( $page, $component ) {

		global $_mttr_styleguide_pages;
		$_mttr_styleguide_pages[ esc_attr( $page ) ][ 'components' ][ esc_attr( $component ) ] = mttr_get_component( $component );

	}

}



/*
*   Get the styleguide global var
*/
if ( !function_exists( 'mttr_get_styleguide_global' ) ) {

	function mttr_get_styleguide_global() {

		global $_mttr_styleguide_pages;
		return $_mttr_styleguide_pages;

	}

}





/* ---------------------------------------------------------
*	Add styletile note
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_styletile_note' ) ) {

	function mttr_styletile_note( $heading, $content = false ) {

		$data = array(

			'heading' => $heading,
			'content' => $content,

		);

		mttr_get_template( '_core/styleguide/template-parts/generic/_s.note', $data );

	}

}





/*
*	Styleguide sidebar header menu
*/
if ( !function_exists( 'mttr_add_styleguide_header' ) ) {

	function mttr_add_styleguide_header() {

		$_mttr_styleguide_pages = mttr_get_styleguide_global();

		$data = array(

			'pages' => $_mttr_styleguide_pages,

		);

		mttr_get_template( '_core/styleguide/template-parts/_s.header', $data );

	}

} // end if
add_action( 'mttr_output_styleguide', 'mttr_add_styleguide_header', 20 );







/*
*   Loop through components and output tests
*/

if ( !function_exists( 'mttr_styleguide_loop' ) ) {

	function mttr_styleguide_loop() {
		
		$_mttr_styleguide_pages = mttr_get_styleguide_global();

		if ( isset( $_mttr_styleguide_pages[ get_post_field( 'post_name' ) ] ) ) {

			$page = $_mttr_styleguide_pages[ get_post_field( 'post_name' ) ];

			echo '<section class="s-page  s-tab  s-tab--' . sanitize_title( $page[ 'label' ] );

				echo '  s-tab--is-active';

				if ( !empty( $page[ 'modifiers' ] ) ) {

					echo '  ' . esc_html( $page[ 'modifiers' ] );

				}

			echo '">';

				// Header elements
				do_action( 'mttr_before_styleguide_loop_before' );

				// Header elements
				do_action( 'mttr_before_styleguide_loop_' . esc_attr( strtolower( $page[ 'label' ] ) ) );

				// // Include the styleguide page header
				// if ( $page[ 'template' ] ) {

				// 	mttr_get_template( $page[ 'template' ], $page );

				// }

				// Content
				do_action( 'mttr_before_styleguide_loop_content' );

				// if ( isset( $page[ 'components' ] )  &&  is_array( $page[ 'components' ] ) ) {
 
				// 	if ( is_array( $page[ 'components' ] ) ) {

				// 		foreach( $page[ 'components' ] as $component_name => $component ) {

				// 			$tests = array();

				// 			if ( is_array( $component[ 'tests' ] ) ) {

				// 				foreach ( $component[ 'tests' ] as $test ) {

				// 					$tests[] = array(

				// 						'size' => $test[ 'size' ],
				// 						'name' => $test[ 'name' ],
				// 						'content' => $test[ 'content' ],
				// 						'template' => $component_name,
				// 						'data' => $test[ 'data' ],

				// 					);

				// 				}

				// 				$sidebar = false;

				// 				if ( !$component[ 'data' ][ 'hide' ] ) {

				// 					$sidebar = array(

				// 						'heading' => $component[ 'data' ][ 'heading' ],
				// 						'content' => $component[ 'data' ][ 'summary' ],

				// 					);

				// 				}

				// 				$page_content = array(

				// 					'sidebar' => $sidebar,
				// 					'content' => $tests,

				// 				);

				// 				mttr_get_template( '_core/styleguide/template-parts/generic/_s.page-content', $page_content );

				// 			} // End if	
												
				// 		} // end foreach

				// 	} // end if

				// }

				// Footer elements
				do_action( 'mttr_after_styleguide_loop_' . esc_attr( strtolower( $page[ 'label' ] ) ) );

			echo '</section>';

		}

	}

}

add_action( 'mttr_output_styleguide', 'mttr_styleguide_loop', 30 );






/* ---------------------------------------------------------
*	Add styleguide css file on styleguide page
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_styleguide_styles' ) ) {

	function mttr_styleguide_styles() {

		// Enqueue styletile css for the styleguide page
		if ( mttr_is_styleguide() ) {

			wp_enqueue_style( 'mttr-styleguide-style', get_template_directory_uri() . '/assets/css/styleguide.css' );

		}

	}

}

add_action( 'wp_enqueue_scripts', 'mttr_styleguide_styles', 8 );






/* ---------------------------------------------------------
*	Output the component test information
 --------------------------------------------------------- */
if ( !function_exists( 'mttr_output_styleguide_component_test_details' ) ) {

	function mttr_output_styleguide_component_test_details( $test, $name ) {

	echo '<pre><code>';

			echo '$data = ';
			echo var_export( $test[ 'data' ] );
			echo ';';
			echo '
mttr_get_component_template( \'' . $name . '\', $data );';

		echo '</code></pre>';

	}

}




/* ---------------------------------------------------------
*	Force a specific template to be used for styleguide pages
 --------------------------------------------------------- */
add_filter( 'template_include', 'mttr_apply_styleguide_template', 99 );

function mttr_apply_styleguide_template( $template ) {

	mttr_is_styleguide();

	if ( mttr_is_styleguide() ) {

		$tpl = locate_template( apply_filters( 'mttr_styleguide_template_filename', array( 'page-styleguide.php' ) ) );
		if ( '' != $tpl ) {

			return $tpl;
		
		}

	}

	return $template;

}





/* ---------------------------------------------------------
*	Check if a page is a 'styleguide' page
 --------------------------------------------------------- */

function mttr_is_styleguide() {

	if ( is_page() ) {

		if ( is_page( 'styleguide' ) ) {

			return true;

		} 

		$parents = get_post_ancestors( get_the_ID() );
		
		if ( is_array( $parents ) && isset( $parents[ 0 ] ) ) {

			$styleguide_slug = get_post_field( 'post_name', get_post( $parents[ 0 ] ) );

			if ( $styleguide_slug == 'styleguide' ) {

				return true;

			}

		}

	}

	return false;

}