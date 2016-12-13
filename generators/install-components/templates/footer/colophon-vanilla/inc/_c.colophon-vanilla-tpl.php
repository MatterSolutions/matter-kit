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
//	=Components - Colophon Vanilla
//
// 	Main template file for including the Colophon Vanilla
//
// ---------------------------------------------------------------------------- *

// Component vars
$primary_content = mttr_get_template_var( 'primary' );
$wrap = mttr_get_template_var( 'wrap' );
$secondary_content = mttr_get_template_var( 'secondary' );
$id = mttr_get_template_var( 'id' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( !$namespace ) {

	$namespace = 'c-colophon-vanilla';

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

echo '<div class="' . esc_html( $namespace ) . '' . esc_attr( $modifiers ) . '">';

	echo '<div class="o-wrap' . $wrap . '">';

		echo '<div class="' . esc_html( $namespace ) . '__body">';

			echo '<div class="o-lyt  o-lyt--middle  o-ltg">';

				echo '<div class="o-lyt__item  o-ltg__item  ' . esc_html( $namespace ) . '__primary">';

					// Loop through our left content
					if ( $primary_content && is_array( $primary_content ) ) {

						echo '<ul class="o-lyt  o-lyt--small  o-ltg  o-ltg--small">';

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

			echo '</div><!-- /.o-lyt -->';

		echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

	echo '</div><!-- /.o-wrap -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';