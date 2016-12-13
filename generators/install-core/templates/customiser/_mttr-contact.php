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
//    Functions for pulling through the contact details
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Register the contact section
 --------------------------------------------------------- */
function mttr_theme_customiser_contact_section( $wp_customize ) {

	$wp_customize->add_section( 'mttr_contact_details' , array(

	    'title' => __( 'Contact Details', 'mttr' ),
	    'description' => __( 'Manage company contact details.', 'mttr' ),
	    'priority'   => 20,

	) );

}
add_action( 'customize_register', 'mttr_theme_customiser_contact_section', 60 );






/* ---------------------------------------------------------
*	Add a field for the phone number to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_contact_phone_number( $wp_customize ) {

	// Add the primary logo
	$wp_customize->add_setting( 'mttr_contact_phone_number' );

	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_contact_phone_number',
		array(
		'label' => 'Phone Number',
		'section' => 'mttr_contact_details',
		'settings' => 'mttr_contact_phone_number',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_contact_phone_number', 10 );




/* ---------------------------------------------------------
*	Add a field for the fax number to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_contact_fax_number( $wp_customize ) {

	// Add the primary logo
	$wp_customize->add_setting( 'mttr_contact_fax_number' );

	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_contact_fax_number',
		array(
		'label' => 'Fax Number',
		'section' => 'mttr_contact_details',
		'settings' => 'mttr_contact_phonefax_number',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_contact_fax_number', 10 );




/* ---------------------------------------------------------
*	Add a field for the email address to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_contact_email_address( $wp_customize ) {

	// Add the primary logo
	$wp_customize->add_setting( 'mttr_contact_email_address' );

	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_contact_email_address',
		array(
		'label' => 'Email Address',
		'section' => 'mttr_contact_details',
		'settings' => 'mttr_contact_email_address',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_contact_email_address', 10 );




/* ---------------------------------------------------------
*	Add a field for the physical address to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_contact_physical_address( $wp_customize ) {

	// Add the primary logo
	$wp_customize->add_setting( 'mttr_contact_physical_address' );

	// Add a control to upload the logo
	$wp_customize->add_control( new Mttr_Customize_Textarea_Control( $wp_customize, 'mttr_contact_physical_address',
		array(
		'label' => 'Physical Address',
		'section' => 'mttr_contact_details',
		'settings' => 'mttr_contact_physical_address',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_contact_physical_address', 10 );




/* ---------------------------------------------------------
*	Add a field for the postal address to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_contact_postal_address( $wp_customize ) {

	// Add the primary logo
	$wp_customize->add_setting( 'mttr_contact_postal_address' );

	// Add a control to upload the logo
	$wp_customize->add_control( new Mttr_Customize_Textarea_Control( $wp_customize, 'mttr_contact_postal_address',
		array(
		'label' => 'Postal Address',
		'section' => 'mttr_contact_details',
		'settings' => 'mttr_contact_postal_address',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_contact_postal_address', 10 );