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
//    =Styleguide Page - Styletiles - Colours
//
//    Add the colours and typefaces to the styletile page
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Output the top section of the styleguide (colours, typefaces)
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_styleguide_styletile_content' ) ) {
	
	function mttr_styleguide_styletile_content() {

		echo '<div class="o-band  o-band--huge  u-keyline  u-keyline--thin">';

			echo '<div class="o-band__body">';

				echo '<div class="o-wrap">';

					echo '<ul class="o-ltg  o-ltg--huge  o-lyt  o-lyt--large">';

						echo '<li class="o-ltg__item  o-lyt__item   g-one-half@lap">';

							echo '<ul class="o-lyt  o-ltg  o-ltg--large">';

								do_action( 'mttr_styleguide_styletile_top_primary' );

							echo '</ul>';

						echo '</li>';

						echo '<li class="o-ltg__item  o-lyt__item   g-one-half@lap">';

							echo '<ul class="o-lyt  o-ltg  o-ltg--large">';

								do_action( 'mttr_styleguide_styletile_top_secondary' );

							echo '</ul>';

						echo '</li>';

					echo '</ul><!-- /.o-lyt -->';

				echo '</div><!-- /.o-wrap -->';

			echo '</div><!-- /.o-band__body -->';

		echo '</div><!-- /.o-band -->';

	}

}

// We ONLY want this on the initial styleguide page, rather than all of them
// if ( is_page( 'styleguide' ) ) {

	add_action( 'mttr_before_styleguide_loop_styleguide', 'mttr_styleguide_styletile_content', 20 );

// }






/* ---------------------------------------------------------
*	Output the styletile colours
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_styleguide_styletile_colours' ) ) {
	
	function mttr_styleguide_styletile_colours() {

		echo '<li class="o-lyt__item  o-ltg__item  s-styletile__colours">';

			// echo '<div class="s-dock  s-dock--top  s-dock--right  s-dock--offset-right">';

			// 	echo '<div class="s-dock__item">';

			// 		mttr_styletile_note( 'Colours', 'Primary &amp; secondary colours aligned for the brand' );

			// 	echo '</div>';

				echo '<h3 class="s-v-meta">Colours</h3>';

				echo '<ul class="o-ltg  o-ltg--small  o-lyt  o-lyt--small">';

					mttr_styleguide_styletile_colour_loop( mttr_get_styleguide_styletile_standard_colours() );

				echo '</ul>';

			// echo '</div><!-- /.s-dock -->';

		echo '</li>';

	}

}

add_action( 'mttr_styleguide_styletile_top_primary', 'mttr_styleguide_styletile_colours', 5 );







/* ---------------------------------------------------------
*	Loop through the colours to generate a nice list of colours
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_styleguide_styletile_colour_loop' ) ) {

	function mttr_styleguide_styletile_colour_loop( $colours ) {

		foreach( $colours as $colour => $hex ) {

			echo '<li class="o-ltg__item  o-lyt__item  g-one-third">';

				echo '<div data-hex-attr="' . esc_attr( $hex ) . '" class="s-colour-swatch  o-ratio  o-ratio--square  v-colour-bg--' . esc_attr( $colour ) . '">';

				echo '</div>';

			echo '</li>';

		}

	}

}






/* ---------------------------------------------------------
*	Get an array of the standard colours
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_get_styleguide_styletile_standard_colours' ) ) {

	function mttr_get_styleguide_styletile_standard_colours() {

		return array( 

			'primary' => '#ffffff', 
			'secondary' => '#ffffff',
			'tertiary' => '#ffffff',
			'quaternary' => '#ffffff',
			'senary' => '#ffffff'

		);

	}

}











/* ---------------------------------------------------------
*	Output a Typeface style
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_styleguide_styletile_typeface' ) ) {
	
	function mttr_styleguide_styletile_typeface( $details ) {

		echo '<li class="o-lyt__item  o-ltg__item">';

			echo '<h3 class="s-v-meta">' . esc_html( $details[ 'meta' ] ) . '</h3>';
			echo '<h4 class="' . esc_html( $details[ 'modifiers' ] ) . '">' . $details[ 'name' ] . '</h3>';
			echo apply_filters( 'the_content', $details[ 'content' ] );

		echo '</li>';

	}

}






// // /* ---------------------------------------------------------
// // *	Setup the styletile styles - colours, fonts etc
// //  ---------------------------------------------------------*/
// function mttr_setup_components_styletile_styles() {

// 	$data = array(

// 		'heading' => 'Styles',
// 		'summary' => '<p>The base styles for the project</p>',
// 		'template' => false

// 	);

// 	// Add component - name, template location
// 	mttr_add_component( 'styles', false, $data );

// }

// add_action( 'mttr_setup_components', 'mttr_setup_components_styletile_styles' );






// // /* ---------------------------------------------------------
// // *	Setup the styletile header primary test
// //  ---------------------------------------------------------*/
// // function mttr_setup_components_styletile_styles_colours() {

// // 	// Component slug
// // 	$slug = 'colours';

// // 	// Component test information
// //     $component = array(

// // 		'content' => '<p>The colours!</p>',
// // 		'size' => 'large',
// // 		'wide' => true,

// //     );

// //     mttr_add_component_test( 'styles', esc_attr( $slug ), $component );

// // }

// // add_action( 'mttr_setup_component_tests', 'mttr_setup_components_styletile_styles_colours' );






// // /* ---------------------------------------------------------
// // *	Add the styletile header to the styletile page
// //  ---------------------------------------------------------*/
// function mttr_styleguide_styletile_styles() {

// 	// Add the component to the styleguide page
// 	mttr_add_component_to_styleguide_page( 'styletile', 'styles' );

// }

// add_action( 'mttr_setup_styleguide_page_components', 'mttr_styleguide_styletile_styles' );

