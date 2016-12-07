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
//	=Components - Standard Listing
//
// 	Main template file for including the Standard Listing
//
// ---------------------------------------------------------------------------- *

// Component vars
$name = mttr_get_template_var( 'name' );
$id = mttr_get_template_var( 'id' );

$heading = mttr_get_template_var( 'heading' );
$link = mttr_get_template_var( 'link' );
$content = mttr_get_template_var( 'content' );

// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<div id="' . esc_attr( $id ) . '" class="' . esc_html( $name ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $name ) . '__body">';

		echo '<div class="u-negate-btm-margin  ' . apply_filters( 'mttr_template_slat_text_line_length', 'u-line-length' ) . '">';

			if ( $heading ) {

				echo '<h3><a href="' . esc_url( $link ) . '">' . esc_html( $heading ) . '</a></h3>';

			}

			if ( $content ) {

				echo apply_filters( 'the_content', $content );

			}

			echo '<a class="' . esc_html( $name ) . '__link" href="' . esc_url( $link ) . '">Read More</a>';

		echo '</div>';

	echo '</div><!-- /.' . esc_html( $name ) . '__body -->';

echo '</div><!-- /.' . esc_html( $name ) . ' -->';