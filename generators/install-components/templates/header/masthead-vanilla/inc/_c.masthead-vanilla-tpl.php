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
//	=Components - Masthead Vanilla
//
// 	A very basic masthead
//
// ---------------------------------------------------------------------------- *


	// Get vars
 	$primary_content = mttr_get_template_var( 'primary' );
 	$toggles = mttr_get_template_var( 'toggles' );
 	$wrap = mttr_get_template_var( 'wrap' );
 	$secondary_content = mttr_get_template_var( 'secondary' );
 	
	$modifiers = mttr_get_template_var( 'modifiers' );

	if ( empty( $wrap ) ) {

		$wrap = '';

	}


	// Add spaces before modifiers
	if ( $modifiers ) {

		$modifiers = '  ' . $modifiers;

	}


	echo '<div class="c-masthead">';

		echo '<div class="c-masthead__body">';

			echo '<div class="c-masthead__toggles">';

				if ( $toggles ) {

					foreach( $toggles as $toggle_key => $toggle ) {

						if ( $toggle[ 'type' ] == 'menu' ) {

							echo '<button data-toggle-class="' . esc_html( $toggle[ 'toggle_class' ] ) . '" data-toggle-target="' . $toggle[ 'toggle_target' ] . '" class="c-masthead__toggle  c-masthead__toggle--' . esc_attr( $toggle_key ) . '  ' . $toggle[ 'class' ] . '" aria-controls="' . $toggle[ 'aria_controls' ] . '" aria-expanded="' . $toggle[ 'aria_expanded' ] . '">';

								if ( $toggle[ 'data' ] ) {

									$menu_icon = new Mttr_Component_Menu_Icon();
									mttr_get_template( $menu_icon->get_component_template_location(), $toggle[ 'data' ] );

								} else {

									echo $toggle[ 'text' ];

								}

							echo '</button>';
						
						} elseif ( $toggle[ 'type' ] == 'link' ) {

							echo '<a href="' . $toggle[ 'link' ] . '" class="c-masthead__toggle  c-masthead__toggle--' . esc_attr( $toggle_key ) . '  ' . esc_html( $toggle[ 'class' ] ) . '">' . $toggle[ 'text' ] . '</a>';
						
						}

					}

				}

			echo '</div><!-- /.c-masthead__toggles -->';

		echo '</div><!-- /.c-masthead__body -->';


		echo '<div class="c-masthead__content">';

			echo '<div class="o-wrap' . $wrap . '">';

				echo '<div class="o-lyt  o-lyt--flush  o-lyt--middle">';

					echo '<div class="o-lyt__item  c-masthead__primary">';

						// Loop through our left content
						if ( $primary_content && is_array( $primary_content ) ) {

							echo '<ul class="o-lyt">';

								foreach ( $primary_content as $primary => $item ) {

									echo '<li class="o-lyt__item  c-masthead__' . esc_attr( $primary ) . '">';

										if ( !empty( $item[ 'template' ] ) && is_array( $item ) ) {

											mttr_get_template( $item[ 'template' ], $item[ 'data' ] );

										} else {

											mttr_template_offset_margin( $item );

										}

									echo '</li>';

								}

							echo '</ul>';

						} elseif ( $primary_content ) {

							mttr_template_offset_margin( $primary_content );

						}

					echo '</div><!-- /.c-masthead__primary -->';

					echo '<div class="o-lyt__item  c-masthead__secondary">';

						// Loop through our left content
						if ( $secondary_content && is_array( $secondary_content ) ) {

							echo '<ul class="o-lyt  o-lyt--flush">';

								foreach ( $secondary_content as $secondary => $item ) {

									echo '<li class="o-lyt__item  c-masthead__' . esc_attr( $secondary ) . '">';

										if ( !empty( $item[ 'template' ] ) && is_array( $item ) ) {

											mttr_get_template( $item[ 'template' ], $item[ 'data' ] );

										}

									echo '</li>';

								}

							echo '</ul>';

						}

					echo '</div><!-- /.c-masthead__secondary -->';

				echo '</div><!-- /.o-lyt -->';

			echo '</div><!-- /.o-wrap -->';

		echo '</div><!-- /.c-masthead__content -->';

	echo '</div><!-- /.c-masthead -->';