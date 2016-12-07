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
//	=Components - 404
//
// 	Main template file for including the 404
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

	$namespace = 'c-content-404';

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

echo '<section class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	if ( $heading ) {

		echo '<h2 class="' . esc_html( $namespace ) . '__heading  t-subheading">';

			echo esc_html( $heading );

		echo '</h2><!-- /.' . esc_html( $namespace ) . '__heading -->';

	}

	if ( $content ) {

		echo '<div class="' . esc_html( $namespace ) . '__content">';

			echo apply_filters( 'the_content', $content );

		echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

	}

	if ( $search ) {

		echo '<div class="o-wrap  o-wrap--petite">';

			get_search_form();

		echo '</div>';

	}

echo '</section><!-- /.' . esc_html( $namespace ) . ' -->';