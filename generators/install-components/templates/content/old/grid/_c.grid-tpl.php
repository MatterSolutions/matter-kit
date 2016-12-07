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
//	=Components - Flexible - Media list
//
// 	The template for including media list
//
// ---------------------------------------------------------------------------- *


// Component vars
$items = mttr_get_template_var( 'items' );
$listing = mttr_get_template_var( 'listing' );



// Modifiers
$modifiers = '';

if ( !empty( $listing[ 'modifiers' ] ) ) {

	$modifiers = '  ' . $listing[ 'modifiers' ];

}


// Grid Sizes
$grid_modifiers = '';

if ( !empty( $listing[ 'sizes' ] ) ) {

	$grid_modifiers = '  ' . $listing[ 'sizes' ];

}


// Grid data
$grid_data = '';

if ( !empty( $listing[ 'meta' ] ) ) {

	$grid_data = '  ' . $listing[ 'meta' ];

}


// Add spaces before wrap
$wrap = '';

if ( !empty( $listing[ 'wrap' ] ) ) {

	$wrap = '  ' . $listing[ 'wrap' ];

} else {

	$wrap = '';

}





// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------
echo '<div class="o-wrap' . esc_html( $wrap ) . '">';

	// Loop through our items
	if ( $items['data'] && is_array( $items['data'] ) ) {

		echo '<ul id="' . esc_attr( $listing['id'] ) . '" class="o-lyt  o-ltg' . esc_html( $modifiers ) . '">';

			$counter = 0;

			foreach ( $items['data'] as $item ) {

				echo '<li' . $grid_data . ' class="o-lyt__item  o-ltg__item' . esc_html( $grid_modifiers ) . '">';

					// Include the grid/feature template itself
					if ( isset( $item['template'] ) ) {

						mttr_get_template( $item['template'], $item['data'] );

					}

				echo '</li>';

				$counter++;

			}

		echo '</ul>';

	}

echo '</div><!-- /.wrap -->';