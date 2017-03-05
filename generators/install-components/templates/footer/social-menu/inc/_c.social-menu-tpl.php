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
//	=Components - Social Menu
//
// 	Main template file for including the Social Menu
//
// ---------------------------------------------------------------------------- *

// Component vars
$social = mttr_get_template_var( 'social' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-social-menu';

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

echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		if ( $social ) {

			echo '<div class="' . esc_html( $namespace ) . '__content">';

				echo apply_filters( 'the_content', $social );

			echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

		}

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';