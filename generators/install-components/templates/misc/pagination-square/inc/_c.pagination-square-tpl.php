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
//	=Components - Pagination Square
//
// 	Main template file for including the Pagination Square
//
// ---------------------------------------------------------------------------- *

// Component vars
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-pagination-square';

}


// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}


// wrap
$wrap = mttr_get_template_var( 'wrap' );

// Add spaces before wrap modifiers
if ( $wrap ) {

	$wrap = '  ' . $wrap;

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

$links = mttr_get_pagination();

if ( $links ) {

	echo '<div class="' . esc_attr( $namespace ) . '  o-band' . esc_attr( $modifiers ) . '">';

		echo '<div class="o-wrap' . esc_attr( $wrap ) . '">';

			echo '<nav>' . $links . '</nav>';

		echo '</div><!-- /.o-wrap -->';

	echo '</div><!-- /.' . esc_attr( $namespace ) . ' -->';

}