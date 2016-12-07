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
//	=Components - Hero Text
//
// 	Main template file for including the Hero Text
//
// ---------------------------------------------------------------------------- *

// Component vars
$heading = mttr_get_template_var( 'heading' );
$content = mttr_get_template_var( 'content' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-hero-text';

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

echo '<div class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="o-wrap' . esc_attr( $wrap ) . '">';

		if ( $heading ) {

			echo '<h1 class="' . esc_html( $namespace ) . '__heading">';

				echo esc_html( $heading );

			echo '</h1><!-- /.' . esc_html( $namespace ) . '__heading -->';

		}

		if ( $content ) {

			echo '<div class="' . esc_html( $namespace ) . '__content">';

				echo apply_filters( 'the_content', $content );

			echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

		}

	echo '</div><!-- /.o-wrap -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';