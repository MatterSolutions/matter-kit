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
//    =Functions - Images
//
//    Misc functions for dealing with images
//
// ---------------------------------------------------------------------------- *





/* ---------------------------------------------------------
*	Get the featured image URL
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_image_url' ) ) {

	function mttr_get_image_url( $id, $size = 'mttr_hero', $default = true ) {

		if ( has_post_thumbnail( $id ) ) {

			$hero_image = wp_get_attachment_image_src( get_post_thumbnail_ID( $id ), $size );
			$hero_image = $hero_image[0];

			return $hero_image;

		} else {

			if ( $default ) {

				$hero_image = mttr_get_default_image( $size );

				return $hero_image;

			}

			return false;

		}

	}

}





/* ---------------------------------------------------------
*	Get the featured image URL by attachment ID
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_image_url_by_attachment_id' ) ) {

	function mttr_get_image_url_by_attachment_id( $id, $size = 'mttr_hero', $default = true ) {

		if ( $id ) {

			$hero_image = wp_get_attachment_image_src( $id, $size );
			$hero_image = $hero_image[0];

			return $hero_image;

		} else {

			if ( $default ) {

				$hero_image = mttr_get_default_image( $size );

				return $hero_image;

			}

			return false;

		}

	}

}






/* ---------------------------------------------------------
*	Get the GLOBAL default image URL
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_default_image' ) ) {

	function mttr_get_default_image( $size = 'mttr_hero' ) {

		$hero = get_theme_mod( 'mttr_brand_default_image' );
		$hero_deprecated = get_field( 'mttr_options_hero_default_image', 'option' );

		if ( $hero ) {
			
			$img_arr = wp_get_attachment_image_src( $hero, $size );

			if ( isset( $img_arr[0] ) ) {

				return $img_arr[0];

			}
			
			return false;		

		} elseif ( $hero_deprecated ) {

			$img_arr = wp_get_attachment_image_src( $hero_deprecated, $size );

			if ( isset( $img_arr[0] ) ) {

				return $img_arr[0];

			}
			
			return false;	

		} else {

			return false;

		}

	}

}






/* ---------------------------------------------------------
*	Output an icon
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_icon' ) ) {

	function mttr_icon( $icon, $fallback = false ) {

		echo mttr_get_icon( $icon, $fallback );

	}

}





/* ---------------------------------------------------------
*	Get an icon
	@TODO: Refactor this to tidy it up
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_get_icon' ) ) {

	function mttr_get_icon( $icon, $fallback = false ) {

		// Check to see if the icon exists
		$file = 'assets/img/icons/' . esc_html( $icon );

		$stylesheet_directory = apply_filters( 'mttr_filter_get_icon_icon_directory', trailingslashit( get_stylesheet_directory() ) );
		$stylesheet_directory_uri = apply_filters( 'mttr_filter_get_icon_icon_uri', trailingslashit( get_stylesheet_directory_uri() ) );
		

		// If file exists, create new path
		if ( file_exists( ( $stylesheet_directory . $file ) ) ) {

			$file_path_info = pathinfo( ( $stylesheet_directory_uri . $file ) );
			$file_uri = $stylesheet_directory_uri . 'assets/img/icons/' . esc_html( $icon );

			if ( strtolower( $file_path_info['extension'] ) == 'svg' ) {

				$file_fallback = 'assets/img/icons/png/' . esc_html( $file_path_info['filename'] . '.png' );

				if ( file_exists( ( $stylesheet_directory . $file_fallback ) ) && $fallback ) {

					return '<img src="' . ( $stylesheet_directory_uri . $file_fallback ) . '" class="js-inject-svg" alt="" data-src="' . ( $stylesheet_directory_uri . $file ) . '">';

				} else {

					return '<img src="" class="js-inject-svg" alt="" data-src="' . ( $stylesheet_directory_uri . $file ) . '">';

				}
				

			} else {

				return '<img alt="" src="' . ( $stylesheet_directory_uri . $file ) . '">';

			}

		}

		return false;

	}

}





/* ---------------------------------------------------------
*	Filter the WordPress Galleries for a nicer output
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_wp_gallery' ) ) {

	function mttr_wp_gallery( $output = '', $atts, $instance ) {
		
		$return = false; // fallback

		// Check to see that there are IDs available
		if ( $atts[ 'ids' ] ) {

			$data = array();
			$gallery_images = explode( ',', $atts[ 'ids' ] );
			
			foreach( $gallery_images as $gallery_item ) {

				$data[ 'loop' ][] = mttr_wp_gallery_item_data( $gallery_item );

			}

			
			// Allow a minimum of 4 columns
			if ( $atts[ 'columns' ] == '4' ) {

				$data[ 'item_modifiers' ] = 'g-one-half  g-one-quarter@palm-h  g-one-quarter@lap';

			}

			elseif ( $atts[ 'columns' ] == '5' ) {

				$data[ 'item_modifiers' ] = 'g-one-half  g-one-third@palm-h  g-one-fifth@lap';

			}

			else {

				$data[ 'item_modifiers' ] = 'g-one-half  g-one-third@palm-h  g-one-sixth@lap';

			}

			$data[ 'modifiers' ] = 'js-image-popup';

			// Begin buffering output
			ob_start();

			mttr_get_component_template( 'gallery', apply_filters( 'mttr_wp_gallery_array', $data ) );
			$return = ob_get_contents();

    		ob_end_clean();

		}

		return $return;

	}

}

add_filter( 'post_gallery', 'mttr_wp_gallery', 10, 3 );







/* ---------------------------------------------------------
*	Change the WordPress gallery default settings
 --------------------------------------------------------- */
function mttr_gallery_default_settings( $settings ) {

    $settings[ 'galleryDefaults' ][ 'columns' ] = 6;
    $settings[ 'galleryDefaults' ][ 'link' ] = 'none';
    return $settings;

}
add_filter( 'media_view_settings', 'mttr_gallery_default_settings' );





/* ---------------------------------------------------------
*	Change the WordPress gallery sizes
 --------------------------------------------------------- */
function mttr_gallery_default_settings_sizes( $sizes ) {

	// Remove undesired sizes
	unset( $sizes[ 'full' ] );
	unset( $sizes[ 'large' ] );
    return $sizes;

}
add_filter( 'image_size_names_choose', 'mttr_gallery_default_settings_sizes' );







/* ---------------------------------------------------------
*	Get information about an attachment image
 --------------------------------------------------------- */

if ( !function_exists( 'mttr_wp_gallery_item_data' ) ) {

	function mttr_wp_gallery_item_data( $attachment_id, $img_size = 'large', $thumb_size = 'thumbnail' ) {

		// Check if images exist
		$image = mttr_get_image_url_by_attachment_id( $attachment_id, apply_filters( 'mttr_filter_gallery_image_src_size', $img_size ) );

		if ( empty( $image ) ) {

			return false;

		}

		// Set up the data
		$data = array(

			'image' => $image,
			'thumbnail' => mttr_get_image_url_by_attachment_id( $attachment_id, apply_filters( 'mttr_filter_gallery_image_thumb_size', $thumb_size ) ),
			'title' => get_post_field( 'post_title', $attachment_id ),
			'alt' => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
			'caption' => apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $attachment_id ) ),

		);

		return $data;

	}

}