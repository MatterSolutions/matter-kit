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
//	=Components - Gallery
//
// 	Main template file for including WordPress galleries
//
// ---------------------------------------------------------------------------- *

// Component vars
$tag = mttr_get_template_var( 'tag' );
$after = mttr_get_template_var( 'after' );
$loop = mttr_get_template_var( 'loop' );
$before = mttr_get_template_var( 'before' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( empty( $namespace ) ) {

	$namespace = 'c-gallery';

}

// Modifiers
$item_modifiers = mttr_get_template_var( 'item_modifiers' );

// Add spaces before modifiers
if ( $item_modifiers ) {

	$item_modifiers = '  ' . $item_modifiers;

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
if ( $wrap ) {

	$wrap = '  ' . $wrap;

} else {

	$wrap = '';

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------


echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		// Loop through our content
		if ( $before && is_array( $before ) ) {

			mttr_template_loop_through_content_templates( $before );

		} elseif ( $before ) {

			mttr_template_offset_margin( $before, mttr_template_get_basic_allowed_inline_tags() );

		}


		if ( $loop && is_array( $loop ) ) {

			echo '<ul class="o-lyt  o-ltg">';

			foreach ( $loop as $item ) {

				echo '<li class="o-lyt__item  o-ltg__item  ' . esc_html( $namespace ) . '__item' . $item_modifiers . '">';

					echo '<a data-gallery-title="' . esc_html( $item[ 'title' ] ) . '" data-gallery-caption="' . esc_html( $item[ 'caption' ] ) . '" class="' . esc_html( $namespace ) . '__item" href="' . esc_url( $item[ 'image' ] ) . '">';
						
						do_action( 'mttr_component_gallery_template_before_item' );

						echo '<img class="' . esc_html( $namespace ) . '__media" alt="' . esc_html( $item[ 'alt' ] ) . '" src="' . esc_url( $item[ 'thumbnail' ] ) . '">';
						
						do_action( 'mttr_component_gallery_template_after_item' );

					echo '</a>';

				echo '</li>';

			}

			echo '</ul>';

		}


		// Loop through our content
		if ( $after && is_array( $after ) ) {

			mttr_template_loop_through_content_templates( $after );

		} elseif ( $after ) {

			mttr_template_offset_margin( $after, mttr_template_get_basic_allowed_inline_tags() );

		}

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';