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
//    =Core Templates - Icon
//
//    Display an icon, outputs the data elements for the SVG injector
//
// ---------------------------------------------------------------------------- *

$tag = mttr_get_template_var( 'tag' );
$icon = mttr_get_template_var( 'icon' );

$modifiers = mttr_get_template_var( 'modifiers' );

$icon = mttr_get_icon( $icon );

if ( !$tag ) {

	$tag = 'i';

}



/* ---------------------------------------------------------
*	Begin outputting template
 ---------------------------------------------------------*/

if ( $icon ) {

	echo '<' . esc_attr( $tag ) . ' class="o-icon' . esc_html( $modifiers ) . '">';

		echo $icon;

	echo '</' . esc_attr( $tag ) . '>';

}