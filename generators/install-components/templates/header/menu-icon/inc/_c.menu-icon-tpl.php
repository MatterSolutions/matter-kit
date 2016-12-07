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
//	=Components - Menu Icon
//
// 	A fancy hamburger
//
// ---------------------------------------------------------------------------- */


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( empty( $namespace ) ) {

	$namespace = 'c-menu-icon';

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
echo '<div class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<span class="' . esc_html( $namespace ) . '__body">';

		echo '<i class="' . esc_html( $namespace ) . '__bars"></i>';

	echo '</span>';

	echo '<i class="u-sr">Toggle Menu</i>';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';
