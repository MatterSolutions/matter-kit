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
//    =Functions - Contact
//
//    Functions for gathering the global contact information
//
// ---------------------------------------------------------------------------- *





/* ---------------------------------------------------------
*	Get ACF Contact Fields
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_get_acf_contact_fields' ) ) {

	function mttr_get_acf_contact_fields( ) {

		$array = array (
			'key' => 'mttr_global_contact_details',
			'title' => 'Contact Details',
			'fields' => array (
				array (
					'key' => 'mttr_global_contact_details_message',
					'label' => 'Contact Details',
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
					'message' => 'The contact details for your business. These details are used throughout the website inside shortcodes and forms. To output your phone number in posts and pages, please use [mttr_phone_number].',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array (
					'key' => 'mttr_global_contact_details_phone',
					'label' => 'Phone Number',
					'name' => 'mttr_options_contact_phone_number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'mttr_global_contact_details_fax',
					'label' => 'Fax Number',
					'name' => 'mttr_options_contact_fax_number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'mttr_global_contact_details_email',
					'label' => 'Email Address',
					'name' => 'mttr_options_contact_email_address',
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
				),
				array (
					'key' => 'mttr_global_contact_details_physical_address',
					'label' => 'Physical Address',
					'name' => 'mttr_options_contact_physical_address',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => 'br',
				),
				array (
					'key' => 'mttr_global_contact_details_shipping_address',
					'label' => 'Shipping Address',
					'name' => 'mttr_options_contact_shipping_address',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => 'br',
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
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		);

		return apply_filters( 'mttr_get_acf_contact_fields_array', $array );

	}

}




/* ---------------------------------------------------------
*	Add ACF Contact Fields
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_add_acf_contact_fields' ) ) {

	function mttr_add_acf_contact_fields( ) {

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group( mttr_get_acf_contact_fields() );

		}

	}

}

// add_action( 'init', 'mttr_add_acf_contact_fields' );





/* ---------------------------------------------------------
*	Return the HEAD OFFICE phone number
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_get_global_contact_phone_number' ) ) {

	function mttr_get_global_contact_phone_number( ) {

		$detail = false;

		if( !$detail = get_theme_mod( 'mttr_contact_phone_number' ) ) {

			// Hold up we're dealing with old kit over here
			$detail = get_field( 'mttr_options_contact_phone_number', 'options' );

		}

		return $detail;

	}

}





/* ---------------------------------------------------------
*	Run a tel: filter over the phone number
 --------------------------------------------------------- */

if ( ! function_exists( 'mttr_filter_phone_number_tel_link' ) ) {

	function mttr_filter_phone_number_tel_link( $phone_number ) {

		return preg_replace( '/[^0-9]/', '', $phone_number );

	}

}






/* ---------------------------------------------------------
*	Get the fax number
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_get_contact_fax_number' ) ) {

	function mttr_get_contact_fax_number( ) {

		$detail = false;

		if( !$detail = get_theme_mod( 'mttr_contact_fax_number' ) ) {

			// Hold up we're dealing with old kit over here
			$detail = get_field( 'mttr_options_contact_fax_number', 'options' );

		}

		return $detail;

	}

}






/* ---------------------------------------------------------
*	Get the contact email address
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_get_contact_email_address' ) ) {

	function mttr_get_contact_email_address( ) {

		$detail = false;

		if( !$detail = get_theme_mod( 'mttr_contact_email_address' ) ) {

			// Hold up we're dealing with old kit over here
			$detail = get_field( 'mttr_options_contact_email_address', 'options' );

		}

		return $detail;

	}

}






/* ---------------------------------------------------------
*	Get the HEAD OFFICE physical address
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_get_contact_physical_address' ) ) {

	function mttr_get_contact_physical_address( $address = null ) {

		$detail = false;

		if( !$detail = get_theme_mod( 'mttr_contact_physical_address' ) ) {

			// Hold up we're dealing with old kit over here
			$detail = get_field( 'mttr_options_contact_physical_address', 'options' );

		}

		return $detail;

	}

}






/* ---------------------------------------------------------
*	Get the link to the google maps directions
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_get_google_maps_directions_uri' ) ) {

	function mttr_get_google_maps_directions_uri( $address = null ) {

		if ( empty( $address ) ) {

			$address = mttr_unformat_address( mttr_get_physical_address() );

		}

		if ( $address ) {

			return esc_url( 'https://maps.google.com?daddr=' . urlencode( $address ) );

		}

		return false;

	}

}