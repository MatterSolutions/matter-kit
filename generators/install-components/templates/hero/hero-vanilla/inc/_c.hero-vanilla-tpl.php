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
//	=Components - Hero Vanilla
//
// 	Main template file for including the Hero Vanilla
//
// ---------------------------------------------------------------------------- *

// Component vars
$content = mttr_get_template_var( 'content' );
$heading = mttr_get_template_var( 'heading' );
$meta = mttr_get_template_var( 'meta' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-hero-vanilla';

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

		echo '<div class="o-wrap">';

			if ( $heading ) {

				echo '<h1 class="c-title">' . esc_html( $heading ) . '</h1>';

			}

			if ( $meta ) {

				if ( isset( $meta['template'] ) && isset( $meta['data'] ) ) {

					mttr_get_template( $meta['template'], $meta['data'] );

				}

			}

			if ( $content ) {

				echo '<div class="' . esc_html( $namespace ) . '__content">';

					echo apply_filters( 'the_content', $content );

				echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

			}

		echo '</div><!-- /.o-wrap -->';

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';