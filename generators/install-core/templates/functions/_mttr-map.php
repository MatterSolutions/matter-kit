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
//    =Functions - Map
//
//    Functions for gathering the global map information
//
// ---------------------------------------------------------------------------- *





/* ---------------------------------------------------------
*	Get ACF Map Fields
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_get_acf_map_fields' ) ) {

	function mttr_get_acf_map_fields( ) {

		$array = array (
			'key' => 'mttr_global_contact_map',
			'title' => 'Contact Map',
			'fields' => array (
				array (
					'key' => 'mttr_global_contact_map_message',
					'label' => 'Map Details',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Enter an address to display for the standard map component and details that will appear within the marker information box.',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array (
					'key' => 'mttr_global_contact_map_map',
					'label' => 'Map',
					'name' => 'mttr_options_contact_map',
					'type' => 'google_map',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'center_lat' => '',
					'center_lng' => '',
					'zoom' => '',
					'height' => '',
				),
				array (
					'key' => 'mttr_global_contact_map_marker',
					'label' => 'Marker Details',
					'name' => 'mttr_options_contact_marker',
					'type' => 'wysiwyg',
					'instructions' => 'Enter the contact details to appear within the map marker. Shortcodes can be used in this field to output the details dynamically.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-contact-theme-settings',
					),
				),
			),
			'menu_order' => 5,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		);

		return apply_filters( 'mttr_get_acf_map_fields_array', $array );

	}

}




/* ---------------------------------------------------------
*	Add ACF Map Fields
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_add_acf_map_fields' ) ) {

	function mttr_add_acf_map_fields( ) {

		$map_key = mttr_get_google_map_key();

		if ( function_exists( 'acf_add_local_field_group' )  &&  ! empty( $map_key ) ) {

			acf_add_local_field_group( mttr_get_acf_map_fields() );

		}

	}

}

add_action( 'init', 'mttr_add_acf_map_fields' );





/* ---------------------------------------------------------
*	Map Key
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_get_google_map_key' ) ) {

	function mttr_get_google_map_key() {

		return apply_filters( 'mttr_google_map_key', false );

	}

}