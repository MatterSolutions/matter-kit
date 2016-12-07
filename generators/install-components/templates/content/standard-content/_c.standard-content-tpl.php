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
//	=Components - Flexible - Standard Content 
//
// 	The template for including standard content
//
// ---------------------------------------------------------------------------- *


// Component vars
$content = mttr_get_template_var( 'content' );
$wrap = mttr_get_template_var( 'wrap' );
$alignment = mttr_get_template_var( 'alignment' );
$width = mttr_get_template_var( 'width' );


// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );

// Add spaces before modifiers
if ( $modifiers ) {

	$modifiers = '  ' . $modifiers;

}


// Add spaces before wrap
if ( $wrap ) {

	$wrap = '  ' . $wrap;

} else {

	$wrap = '';

}



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------
echo '<div class="o-wrap' . esc_html( $wrap ) . '">';

	echo '<div class="' . esc_attr( $width ) . '  ' . esc_attr( $alignment ) . '">';

		// Loop through our content
		if ( $content && is_array( $content ) ) {

			echo '<ul class="o-lyt  o-ltg' . esc_html( $modifiers ) . '">';

				foreach ( $content as $item ) {

					echo '<li class="o-lyt__item  o-ltg__item">';

						if ( is_array( $item ) ) {

							foreach ( $item as $inner_item ) {

								if ( empty( $inner_item[ 'template' ] ) && !is_array( $inner_item ) ) {

									mttr_template_offset_margin( $inner_item );

								} else {

									mttr_get_template( $inner_item[ 'template' ], $inner_item[ 'data' ] );

								}

							}

						} else {

							mttr_template_offset_margin( $item );

						}

					echo '</li>';

				}

			echo '</ul>';

		} elseif ( $content ) {

			mttr_template_offset_margin( $content );

		}

	echo '</div>';

echo '</div><!-- /.wrap -->';