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
//	=Components - Hero Morph
//
// 	Main template file for including the Hero Morph
//
// ---------------------------------------------------------------------------- *

// Component vars
$bp = mttr_get_template_var( 'bp' ); // Breakpoint PX size
$wrap = mttr_get_template_var( 'wrap' ); // Wrap Modifiers
$media = mttr_get_template_var( 'media' ); // Array of media items
$content = mttr_get_template_var( 'content' ); // Content array
$id = mttr_get_template_var( 'id' ); // Unique ID


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-hero';

}


// Ensure a unique identifier
if ( !$id ) {

	$id = rand( 0000, 9999 ) . date( 'His' );

}


// Ensure a unique identifier
if ( !$bp ) {

	$bp = '768px';

}


// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}



// Add spaces before wrap modifiers
if ( $wrap ) {

	$wrap = '  ' . $wrap;

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	if ( $media ) {

		echo '<div class="' . esc_html( $namespace ) . '__media">';


		echo '</div>';

	}

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		echo '<div class="o-wrap' . esc_html( $wrap ) . '">';

			if ( $content && is_array( $content ) ) {

				echo '<div class="' . esc_html( $namespace ) . '__content">';

					mttr_template_loop_through_content_templates( $content );

				echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

			}

		echo '</div><!-- /.o-wrap -->';

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';