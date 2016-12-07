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
//    =Core - Flexible Content Functions
//
//    Core flexible content functions, including band sizes and colours
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Get the colours for the band backgrounds
 ---------------------------------------------------------*/
function mttr_component_flexible_content_band_colours() {

	$array = array( 

		'standard' => 'Standard (transparent)',
		'grey-ui' => 'Grey',
		'white' => 'White',
		'primary' => apply_filters( 'mttr_component_flexible_content_band_colours_primary_label', 'Primary' ),
		'secondary' => apply_filters( 'mttr_component_flexible_content_band_colours_secondary_label', 'Secondary' ),

	);

	return apply_filters( 'mttr_component_flexible_content_band_colours_array', $array );

}







/* ---------------------------------------------------------
*	Get the colours for the band sizes
 ---------------------------------------------------------*/
function mttr_component_flexible_content_band_sizes() {

	$array = array (
		'standard' => 'Standard',
		'large' => 'Large',
		'small' => 'Small',
		'flush' => 'Flush',
	);

	return apply_filters( 'mttr_component_flexible_content_band_sizes_array', $array );

}