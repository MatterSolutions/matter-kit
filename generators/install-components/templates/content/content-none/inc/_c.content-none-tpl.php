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
//	=Components - Content None
//
// 	Main template file for including the Content None
//
// ---------------------------------------------------------------------------- *

// Component vars
$heading = mttr_get_template_var( 'heading' );
$content = mttr_get_template_var( 'content' );
$search = mttr_get_template_var( 'search' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-content-none';

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

echo '<div class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		echo '<div class="o-wrap">';

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

			if ( $search ) {

				get_search_form();

			}

		echo '</div><!-- /.o-wrap -->';

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';