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
//	=Components - Searchform Mini
//
// 	Main template file for including the Searchform Mini
//
// ---------------------------------------------------------------------------- *


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-searchform-mini';

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

echo '<form role="search" method="get" class="' . esc_attr( $namespace ) . $modifiers . '" action="' . esc_url( home_url( '/' ) ) . '">';

	echo '<label class="u-sr" for="s">' . _x( 'Search for:', 'label' ) . '</label>';
	echo '<input class="' . esc_attr( $namespace ) . '__input" placeholder="Keyword search..." type="text" value="' . get_search_query() . '" name="s" id="s" />';

	echo '<div class="' . esc_attr( $namespace ) . '__submit">';
	
		echo '<button class="c-btn  c-btn--transparent" type="submit"><i class="o-icon  u-center">' . mttr_get_icon( 'magnifying-glass.svg' ) . '</i></button>';

	echo '</div><!-- /.' . esc_attr( $namespace ) . '__submit -->';

echo '</form><!-- /.' . esc_attr( $namespace ) . ' -->';