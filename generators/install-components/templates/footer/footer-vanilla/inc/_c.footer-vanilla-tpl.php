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
//	=Components - Footer Vanilla
//
// 	Main template file for including the Footer Vanilla
//
// ---------------------------------------------------------------------------- *

// Component vars
$primary_content = mttr_get_template_var( 'primary' );
$toggles = mttr_get_template_var( 'toggles' );
$wrap = mttr_get_template_var( 'wrap' );
$secondary_content = mttr_get_template_var( 'secondary' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-footer-vanilla';

}


// Setup a unique identifier
if ( !$id ) {

	$id = rand( 0000, 9999 ) . date( 'His' );

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

echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		echo '<div class="o-wrap">';

			echo '<div class="o-lyt  o-ltg">';

					echo '<div class="o-lyt__item  o-ltg__item  ' . esc_html( $namespace ) . '__primary">';

						// Loop through our left content
						if ( $primary_content && is_array( $primary_content ) ) {

							echo '<ul class="o-lyt  o-ltg">';

								foreach ( $primary_content as $primary => $item ) {

									echo '<li class="o-lyt__item  o-ltg__item  ' . esc_html( $namespace ) . '__' . esc_attr( $primary ) . '">';

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

					echo '</div><!-- /.' . esc_html( $namespace ) . '__primary -->';

					echo '<div class="o-lyt__item  o-ltg__item  ' . esc_html( $namespace ) . '__secondary">';

						// Loop through our left content
						if ( $secondary_content && is_array( $secondary_content ) ) {

							echo '<ul class="o-lyt  o-ltg  o-lyt--flush">';

								foreach ( $secondary_content as $secondary => $item ) {

									echo '<li class="o-lyt__item  o-ltg__item  ' . esc_html( $namespace ) . '__' . esc_attr( $secondary ) . '">';

										if ( !empty( $item[ 'template' ] ) && is_array( $item ) ) {

											mttr_get_template( $item[ 'template' ], $item[ 'data' ] );

										} else {

											mttr_template_offset_margin( $item );

										}

									echo '</li>';

								}

							echo '</ul>';

						} elseif ( $secondary_content ) {

							mttr_template_offset_margin( $secondary_content );

						}

					echo '</div><!-- /.' . esc_html( $namespace ) . '__secondary -->';

				echo '</div><!-- /.o-lyt -->';

			echo '</div><!-- /.o-wrap -->';

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';