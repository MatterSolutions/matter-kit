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
//    =Customiser - Social
//
//    Add social media customiser settings
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Add social media order settings to the customiser
 ---------------------------------------------------------*/
function mttr_customiser_social_order_settings( $wp_customize ) {

	$wp_customize->add_section( 'mttr_social' , array(

	    'title' => __( 'Matter Kit - Social Media', 'mttr' ),
	    'description' => __( 'Manage your social media links and references.', 'mttr' ),
	    'priority'   => 50,

	) );


	// Add the social share order
	$wp_customize->add_setting( 'mttr_social_share_order' );


	// Add a control to upload the logo
	$wp_customize->add_control( new Mttr_Customize_Textarea_Control( $wp_customize, 'mttr_social_share_order',
		
		array(

			'label' => 'Social Media Share Link Order',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_share_order',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_order_settings', 60 );







/* ---------------------------------------------------------
*	Add social media facebook URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_facebook_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_facebook_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_facebook_url',
		
		array(

			'label' => 'Facebook URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_facebook_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_facebook_settings', 60 );






/* ---------------------------------------------------------
*	Add social media Twitter URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_twitter_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_twitter_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_twitter_url',
		
		array(

			'label' => 'Twitter URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_twitter_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_twitter_settings', 60 );








/* ---------------------------------------------------------
*	Add social media LinkedIn URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_linkedin_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_linkedin_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_linkedin_url',
		
		array(

			'label' => 'LinkedIn URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_linkedin_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_linkedin_settings', 60 );







/* ---------------------------------------------------------
*	Add social media GooglePlus URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_googleplus_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_googleplus_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_googleplus_url',
		
		array(

			'label' => 'Google Plus URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_googleplus_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_googleplus_settings', 60 );







/* ---------------------------------------------------------
*	Add social media Instagram URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_instagram_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_instagram_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_instagram_url',
		
		array(

			'label' => 'Instagram URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_instagram_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_instagram_settings', 60 );








/* ---------------------------------------------------------
*	Add social media Youtube URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_youtube_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_youtube_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_youtube_url',
		
		array(

			'label' => 'YouTube URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_youtube_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_youtube_settings', 60 );







/* ---------------------------------------------------------
*	Add social media Pinterest URL
 ---------------------------------------------------------*/
function mttr_customiser_social_media_pinterest_settings( $wp_customize ) {

	// Add settings for social media links
	$wp_customize->add_setting( 'mttr_social_pinterest_url' );


	// Add the control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mttr_social_pinterest_url',
		
		array(

			'label' => 'Pinterest URL',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_pinterest_url',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_media_pinterest_settings', 60 );










/* ---------------------------------------------------------
*	Add social media menu order settings to the customiser
 ---------------------------------------------------------*/
function mttr_customiser_social_menu_order_settings( $wp_customize ) {

	// Add the social share order
	$wp_customize->add_setting( 'mttr_social_menu_share_order' );


	// Add a control to upload the logo
	$wp_customize->add_control( new Mttr_Customize_Textarea_Control( $wp_customize, 'mttr_social_menu_share_order',
		
		array(

			'label' => 'Social Media Menu Order',
			'section' => 'mttr_social',
			'settings' => 'mttr_social_menu_share_order',

		) ) 

	);

}

add_action( 'customize_register', 'mttr_customiser_social_menu_order_settings', 60 );