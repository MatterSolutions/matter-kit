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
//    =Core Templates - Brand
//
//    Display the brand logo
//
// ---------------------------------------------------------------------------- *

$logos = mttr_get_template_var( 'logos' );
$link = mttr_get_template_var( 'link' );
$breakpoint = mttr_get_template_var( 'breakpoint' );

if ( empty( $breakpoint ) ) {

	$breakpoint = 'desk';

}



/* ---------------------------------------------------------
*	Output the component
 --------------------------------------------------------- */
if ( $link ) {

	echo '<a class="brand" href="' . esc_url( $link ) . '" rel="home">';

} else {

	echo '<div class="brand">';

}

	if ( !empty( $logos[ 'primary' ] )  &&  !empty( $logos[ 'secondary' ] ) ) {

		echo '<div class="brand__primary  u-hide  u-show@' . esc_attr( $breakpoint ) . '">';

			echo $logos[ 'primary' ];

		echo '</div>';

		echo '<div class="brand__secondary  u-show  u-hide@' . esc_attr( $breakpoint ) . '">';

			echo $logos[ 'secondary' ];

		echo '</div>';

	} elseif ( !empty( $logos[ 'primary' ] ) ) {

		echo '<div class="brand__primary">';

			echo $logos[ 'primary' ];

		echo '</div>';

	} else {

		echo '<div class="brand__primary">';

			echo get_bloginfo( 'name' );

		echo '</div>';

	}

if ( $link ) {

	echo '</a>';

} else {

	echo '</div>';

}