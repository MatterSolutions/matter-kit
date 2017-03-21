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
//	=Components - Slider Vanilla
//
// 	Main template file for including the Slider Vanilla
//
// ---------------------------------------------------------------------------- *

// Component vars
$items = mttr_get_template_var( 'items' );
$id = mttr_get_template_var( 'id' );



// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );
if ( !$namespace ) { $namespace = 'c-slider-vanilla'; }

// Setup a unique identifier
if ( !$id ) { $id = rand( 0000, 9999 ) . date( 'His' ); }

// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );
if ( $modifiers ) { $modifiers = '  ' . $modifiers; }


// item Modifiers
$item_modifiers = mttr_get_template_var( 'item_modifiers' );
if ( $item_modifiers ) { $item_modifiers = '  ' . $item_modifiers; }



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		if ( $items ) {

			echo '<div class="o-lyt  o-lyt--flush  ' . esc_html( $namespace ) . '__items  js-slider-vanilla">';

			foreach ( $items as $key => $item ) {

				echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '--' . $key . '" class="o-lyt__item  ' . esc_html( $namespace ) . '__item  o-tint">';

					echo '<div class="' . esc_html( $namespace ) . '__content-wrap'  . esc_html( $item_modifiers ) . '  o-tint__body">';

						echo '<div class="o-wrap">';

							if ( !empty( $item['content'] ) ) {

								$alignment_modifier = '';
								if ( !empty( $item['alignment'] ) ) $alignment_modifier = '  ' . esc_html( $namespace ) . '__content--' . $item['alignment'];

								$width_modifier = '';
								if ( !empty( $item['width'] ) ) $width_modifier = '  ' . esc_html( $namespace ) . '__content--' . $item['width'];

								echo '<div class="' . esc_html( $alignment_modifier ) . esc_html( $width_modifier ) . '">';

									echo '<div class="u-negate-btm-margin">';

										echo apply_filters( 'the_content', $item['content'] );
									
									echo '</div>';

								echo '</div>';

							}

						echo '</div><!-- /.o-wrap -->';

					echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

				echo '</div><!-- /.o-lyt__item -->';

			}

			echo '</div><!-- /.o-lyt -->';

		}

		echo '<div class="' . esc_html( $namespace ) . '__arrows"></div>';
		echo '<div class="' . esc_html( $namespace ) . '__dots"></div>';

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';