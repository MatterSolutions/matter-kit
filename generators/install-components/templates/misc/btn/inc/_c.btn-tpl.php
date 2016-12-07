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
//	=Components - btn / button
//
// 	Main template file for including buttons
//
// ---------------------------------------------------------------------------- *

// Component vars
$content = mttr_get_template_var( 'content' );
$link = mttr_get_template_var( 'link' );
$target = mttr_get_template_var( 'target' );

// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( empty( $namespace ) ) {

	$namespace = 'c-btn';

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

// Output an <a> or <button> depending on our data
if ( $link ) {

	echo '<a';

		if ( $target ) {

			echo ' target="' . esc_attr( $target ) . '"';

		}

	echo ' href="' . esc_url( $link ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

} else {

	echo '<button class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

}


	// Loop through our content
	if ( $content && is_array( $content ) ) {

		mttr_template_loop_through_content_templates( $content );

	} elseif ( $content ) {

		mttr_template_offset_margin( $content, mttr_template_get_basic_allowed_inline_tags() );

	}


// Output our closing <a> or <button> tag
if ( $link ) {

	echo '</a><!-- /.' . esc_html( $namespace ) . ' -->';

} else {

	echo '</button><!-- /.' . esc_html( $namespace ) . ' -->';

}

