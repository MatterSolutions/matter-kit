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
//    =Functions - Brand
//
//    Functions for pulling through the brand details
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Add a field for the primary logo to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_brand_primary( $wp_customize ) {

	// Add the primary logo
	$wp_customize->add_setting( 'mttr_brand_primary_logo' );

	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'mttr_brand_primary_logo',
		array(
		'label' => 'Primary Logo',
		'section' => 'title_tagline',
		'settings' => 'mttr_brand_primary_logo',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_brand_primary', 10 );







/* ---------------------------------------------------------
*	Add a field for the secondary logo to the customiser
 --------------------------------------------------------- */
function mttr_theme_customiser_brand_secondary( $wp_customize ) {

	// Add the secondary logo
	$wp_customize->add_setting( 'mttr_brand_secondary_logo' );

	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mttr_brand_secondary_logo',
		array(
		'label' => 'Secondary Logo',
		'section' => 'title_tagline',
		'settings' => 'mttr_brand_secondary_logo',
		) ) 
	);

}
add_action( 'customize_register', 'mttr_theme_customiser_brand_secondary', 12 );
