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
//	=Components - Flexible - Map
//
// 	Setup and include the media list templates
//
// ---------------------------------------------------------------------------- *



/*
*	Add the hero as a flexible content option
*/
function mttr_get_flexible_content_map() {

	// Enqueue google maps if not enqueued already
	if ( !wp_script_is( 'google-maps', 'enqueued' ) ) {

		wp_register_script( 'google-maps', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array( 'jquery' ), CHILD_THEME_VERSION, true );
		wp_enqueue_script( 'google-maps' );

	}

	// Get the locations
	$map_location = get_sub_field( 'locations' );

	if ( !$map_location ) {

		$map_location = get_field( 'mttr_options_contact_map_location', 'options' );

	}

	$modifiers = apply_filters( 'mttr_get_flexible_content_map_modifiers', 'map' );

	$data = array(

		'locations' => $map_location,
		'modifiers' => $modifiers

	);

	$data = apply_filters( 'mttr_get_flexible_content_map_data', $data );
	$template = apply_filters( 'mttr_get_flexible_map_content_template', 'components/misc/map/_c.map-tpl' );

	mttr_get_template( $template, $data );

}





/* ---------------------------------------------------------
*	Setup the standard content ACF fields
 ---------------------------------------------------------*/
function mttr_setup_flex_map_acf_fields() {

	$fields = array (

		'key' => 'mttr_flex_layouts_map',
		'name' => 'map',
		'label' => 'Map',
		'display' => 'row',
		'sub_fields' => array (
			array (
				'key' => 'mttr_flex_layouts_map_locations',
				'label' => 'Locations',
				'name' => 'locations',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => '',
				'max' => '',
				'layout' => 'block',
				'button_label' => 'Add Location',
				'sub_fields' => array (
					array (
						'key' => 'mttr_flex_layouts_map_locations_name',
						'label' => 'Location Name',
						'name' => 'location_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'mttr_flex_layouts_map_locations_map',
						'label' => 'Location',
						'name' => 'location',
						'type' => 'google_map',
						'instructions' => '',
						'required' => 1,
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
						'key' => 'mttr_flex_layouts_map_locations_address',
						'label' => 'Postal Address',
						'name' => 'postal_address',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 50,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'new_lines' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'mttr_flex_layouts_map_locations_phone',
						'label' => 'Phone Number',
						'name' => 'phone_number',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'mttr_flex_layouts_map_locations_fax',
						'label' => 'Fax Number',
						'name' => 'fax_number',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'mttr_flex_layouts_map_locations_email',
						'label' => 'Email Address',
						'name' => 'email_address',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
				),
			),
		),
		'min' => '',
		'max' => '',

	);

	mttr_add_acf_flexible_content_option( 'map', apply_filters( 'mttr_setup_flex_map_acf_fields_array', $fields ) );

}

add_action( 'init', 'mttr_setup_flex_map_acf_fields', 9 );