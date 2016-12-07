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
//    =Styleguide Page - Styletiles - Header
//
//    Add the website header get_header() to the styletile page
//
// ---------------------------------------------------------------------------- *



// /* ---------------------------------------------------------
// *	Setup the styletile header
//  ---------------------------------------------------------*/
// function mttr_setup_components_header() {

// 	$data = array(

// 		'heading' => 'Header',
// 		'summary' => '<p>The standard header used within the project.</p>',
// 		'hide' => true,

// 	);

// 	// Add component - name, template location
// 	mttr_add_component( apply_filters( 'mttr_component_header_slug', 'header' ), apply_filters( 'mttr_component_header_template', 'header' ), $data );

// }

// add_action( 'mttr_setup_components', 'mttr_setup_components_header' );






// /* ---------------------------------------------------------
// *	Setup the styletile header primary test
//  ---------------------------------------------------------*/
// function mttr_setup_components_header_primary() {

// 	// Component slug
// 	$slug = 'primary';

// 	// Component test information
//     $component = array(

// 		'content' => '<p>The standard header throughout the project.</p>',
// 		'size' => 'large',
// 		'wide' => true,

//     );

//     mttr_add_component_test( apply_filters( 'mttr_component_header_slug', 'header' ), esc_attr( $slug ), $component );

// }

// add_action( 'mttr_setup_component_tests', 'mttr_setup_components_header_primary' );






// /* ---------------------------------------------------------
// *	Add the styletile header to the styletile page
//  ---------------------------------------------------------*/
// function mttr_styleguide_styletile_header() {

// 	// Add the component to the styleguide page
// 	mttr_add_component_to_styleguide_page( 'styletile', apply_filters( 'mttr_component_header_slug', 'header' ) );

// }

// add_action( 'mttr_setup_styleguide_page_components', 'mttr_styleguide_styletile_header' );







/* ---------------------------------------------------------
*	Add the styletile header to the styletile page
 ---------------------------------------------------------*/
function mttr_styleguide_styletile_header_note() {

	// Show the note on the main styleguide page
	if ( is_page( 'styleguide' ) ) {

		echo '<div class="s-dock  s-dock--top-100  s-dock--right">';

			echo '<div class="s-dock__item">';

				mttr_styletile_note( 'Header', 'Header with logo, menu and dropdown' );

			echo '</div>';

	}

		mttr_outer_header();


	if ( is_page( 'styleguide' ) ) {

		echo '</div>';

	}

}

// Pull through the primary theme header
add_action( 'mttr_before_styleguide_loop_before', 'mttr_styleguide_styletile_header_note' );