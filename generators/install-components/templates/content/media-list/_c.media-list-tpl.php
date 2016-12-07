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
//	=Components - Flexible - Media list
//
// 	The template for including media list
//
// ---------------------------------------------------------------------------- *


// Component vars
$items = mttr_get_template_var( 'items' );
$wrap = mttr_get_template_var( 'wrap' );


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

echo '<div class="o-wrap' . esc_html( apply_filters( 'mttr_media_list_template_wrap', $wrap ) ) . '">';

	// Loop through our items
	if ( $items && is_array( $items ) ) {

		echo '<ul class="o-lyt  o-lyt--media  o-ltg' . esc_html( $modifiers ) . '">';

			$counter = 0;

			foreach ( $items as $item ) {

				echo '<li class="o-lyt__item  o-ltg__item">';

					if ( is_array( $item ) && !empty( $item[ 'content' ] ) ) {

						$vertical_alignment = 'o-lyt--middle';

						if ( mttr_count_words( $item[ 'content' ] ) > apply_filters( 'mttr_template_media_list_wordcount_vertical_alignment', 20 ) ) {

							$vertical_alignment = 'o-lyt--top';

						}

						echo '<ul class="o-lyt  o-ltg  ' . $vertical_alignment . '">';							

							echo '<li class="o-lyt__item  o-ltg__item  u-text--center  ' . apply_filters( 'mttr_media_list_template_image_widths', 'g-one-half@lap  g-one-third@desk' ) . '">';

								if ( !empty( $item[ 'image' ] ) ) {

									echo wp_get_attachment_image( $item[ 'image' ], 'large' );

								}

							echo '</li>';

							echo '<li class="o-lyt__item  o-ltg__item  ' . apply_filters( 'mttr_media_list_template_content_widths', 'g-one-half@lap  g-two-thirds@desk' ) . '">';

								echo '<div class="o-lyt__content">';

									if ( !empty( $item[ 'content' ] ) ) {

										mttr_template_offset_margin( $item[ 'content' ] );

									}

								echo '</div><!-- /.o-lyt__content -->';

							echo '</li>';

						echo '</ul>';

					}

				echo '</li>';

			}

		echo '</ul>';

	}

echo '</div><!-- /.wrap -->';