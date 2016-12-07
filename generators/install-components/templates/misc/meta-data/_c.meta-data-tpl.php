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
//	=Components - Meta data
//
// 	Main template file for including meta data
//
// ---------------------------------------------------------------------------- *

// Component vars
$loop = mttr_get_template_var( 'loop' );


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );

if ( empty( $namespace ) ) {

	$namespace = 'c-meta-data';

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

// Output an <a> or <button> depending on our data

echo '<div class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	if ( $loop && is_array( $loop ) ) {

		echo '<ul class="' . apply_filters( 'mttr_template_meta_data_list_classes', 'o-lyt  o-lyt--small  o-lyt--auto  o-ltg  o-ltg--small' ) . '">';

			foreach( $loop as $key => $item ) {

				$modifier = esc_html( $namespace ) . '__' . esc_attr( $key );

				echo '<li class="o-lyt__item  o-ltg__item  ' . $modifier .'">';

					if ( !empty( $item[ 'icon' ] ) ) {

						echo '<i class="o-icon  ' . apply_filters( 'mttr_template_meta_data_icon_classes', 'o-icon--before  o-icon--small' ) . '">' . $item[ 'icon' ] . '</i>';

					}


					if ( !empty( $item[ 'heading' ] ) ) {

						mttr_template_offset_margin( $item[ 'heading' ], mttr_template_get_basic_allowed_inline_tags() );

					}


					if ( !empty( $item[ 'content' ] ) ) {

						mttr_template_offset_margin( $item[ 'content' ], mttr_template_get_basic_allowed_inline_tags( true ) );

					}

				echo '</li>';

			}

		echo '</ul>';

	} elseif ( $loop ) {

		mttr_template_offset_margin( $loop, mttr_template_get_basic_allowed_inline_tags() );

	}

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';