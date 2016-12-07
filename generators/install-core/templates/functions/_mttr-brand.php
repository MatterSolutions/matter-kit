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
//    =Functions - Brand
//
//    Get our site information from the customiser
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Return the specified image as markup
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_get_brand_image' ) ) {

	function mttr_get_brand_image( $type = 'primary' ) {

		$primary_logo = get_theme_mod( 'mttr_brand_primary_logo' );

		if ( 'primary' == $type && ( ! empty( $primary_logo ) ) ) {

			$img = mttr_wp_gallery_item_data( $primary_logo, 'large' );

			return '<img alt="' . $img[ 'alt' ]  . '" src="' . $img[ 'image' ]  . '">';

		}

		$secondary_logo = get_theme_mod( 'mttr_brand_secondary_logo' );

		if ( $type == 'secondary' && ( ! empty( $secondary_logo ) ) ) {

			$img = mttr_wp_gallery_item_data( $secondary_logo, 'large' );

			return '<img alt="' . $img[ 'alt' ]  . '" src="' . $img[ 'image' ]  . '">';

		}

		return false;

	}

}





/* ---------------------------------------------------------
*	Return an array with the requested brand image data
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_get_brand_images' ) ) {

	function mttr_get_brand_images( $type = 'all' ) {

		$logos = array();

		if ( 'all' == $type ) {

			$logos[ 'primary' ] = mttr_get_brand_image( 'primary' );
			$logos[ 'secondary' ] = mttr_get_brand_image( 'secondary' );

		} else {

			$logos[ esc_attr( $type ) ] = mttr_get_brand_image( esc_attr( $type ) );

		}

		return $logos;

	}

}