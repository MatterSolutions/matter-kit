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
//	=Components - Subheading
//
// 	Main template file for including the Subheading
//
// ---------------------------------------------------------------------------- *

// Component vars
$content = mttr_get_template_var( 'content' );
$tag = mttr_get_template_var( 'tag' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-subheading';

}



if ( !$tag ) {

	$tag = apply_filters( 'mttr_component_template_typography_title', 'h3' );

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

echo '<' . esc_html( $tag ) .  ' class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	if ( $content && is_array( $content ) ) {

		mttr_template_loop_through_content_templates( $content, mttr_template_get_basic_allowed_inline_tags( true ) );

	} elseif ( $content ) {

		mttr_template_offset_margin( $content, mttr_template_get_basic_allowed_inline_tags( true ) );

	}

echo '</' . esc_html( $tag ) .  '><!-- /.' . esc_html( $namespace ) . ' -->';