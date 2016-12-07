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
//	=Components - No Content
//
// 	Output the no content template
//
// ---------------------------------------------------------------------------- *

// Component vars


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-no-content';

}


// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}



// Wrap Modifiers
$wrap = mttr_get_template_var( 'wrap' );

// Add spaces before modifiers
if ( !empty( $wrap ) ) {

	$wrap = '  ' . $wrap;

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<section class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		echo '<div class="o-wrap' . esc_html( $wrap ) . '">';

			do_action( 'mttr_core_component_no_content_content' );

		echo '</div>';

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</section><!-- /.' . esc_html( $namespace ) . ' -->';