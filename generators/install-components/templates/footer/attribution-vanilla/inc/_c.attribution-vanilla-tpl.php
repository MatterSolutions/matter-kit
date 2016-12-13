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
//	=Components - Attribution Vanilla
//
// 	Main template file for including the Attribution Vanilla
//
// ---------------------------------------------------------------------------- *

// Component vars
$url = mttr_get_template_var( 'url' );
$image = mttr_get_template_var( 'image' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-attribution-vanilla';

}


// Setup a unique identifier
if ( !$id ) {

	$id = rand( 0000, 9999 ) . date( 'His' );

}


// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<a target="_blank" rel="nofollow" class="' . esc_html( $namespace ) . '" href="' . esc_url( $url ) . '">';

	$file = trailingslashit( get_stylesheet_directory() ) . 'assets/img/' . esc_html( $image );

	if ( file_exists( $file ) ) {

		readfile( $file );

	}

echo '</a>';