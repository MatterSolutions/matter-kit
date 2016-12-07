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
//    =Functions - ACF
//
//    General functions dealing with ACF aspects
//
// ---------------------------------------------------------------------------- *

//* Add ACF options page...
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> 'General Theme Settings'
	) );

	acf_add_options_sub_page( array(
		'page_title' 	=> 'General Theme Settings',
		'menu_title'	=> 'General Theme Settings',
		'parent_slug'	=> 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title' 	=> 'Contact Theme Settings',
		'menu_title'	=> 'Contact Theme Settings',
		'parent_slug'	=> 'theme-general-settings',
	) );

}






/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 * http://adambalee.com/search-wordpress-by-custom-fields-without-a-plugin/
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
   
	global $wpdb;

	if ( is_search() ) {  

		$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	
	}
	
	return $join;

}
add_filter( 'posts_join', 'cf_search_join' );




/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {

	global $pagenow, $wpdb;
   
	if ( is_search() ) {

		$where = preg_replace(
			"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	
	}

	return $where;

}
add_filter( 'posts_where', 'cf_search_where' );




/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {

	global $wpdb;

	if ( is_search() ) {
		return "DISTINCT";
	}

	return $where;

}
add_filter( 'posts_distinct', 'cf_search_distinct' );





/* ---------------------------------------------------------
*	Init the flexible content setup
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_init_flexible_content_fields' ) ) {

	function mttr_init_flexible_content_fields( $classes ) {

		// Setup/create elements
		do_action( 'mttr_setup_acf_flexible_content_features' );
		do_action( 'mttr_setup_acf_flexible_content_layouts' );

		// Create the fields for in the admin
		do_action( 'mttr_setup_acf_flexible_content_fields' );

		// Add the components TO the ACF output
		do_action( 'mttr_setup_acf_flexible_content' );

	}

	add_action( 'init', 'mttr_init_flexible_content_fields', 10 );	

}






/* ---------------------------------------------------------
*	Output the flexible content fields
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_output_flexible_content_fields' ) ) {

	function mttr_output_flexible_content_fields() {

		global $_mttr_acf_flexible_content_layouts;

		$acf_fields = array (
			'key' => 'mttr_flex_content_fields',
			'title' => 'Content: Flexible Content',
			'fields' => array (
				array (
					'key' => 'mttr_flex_content_bands',
					'label' => 'Content',
					'name' => 'mttr_flexible_bands',
					'type' => 'repeater',
					'instructions' => 'Add a new band, which can have many elements inside it.',
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
					'button_label' => 'Add Band',
					'sub_fields' => array (
						array (
							'key' => 'mttr_flex_content_bgcolour',
							'label' => 'Background Colour',
							'name' => 'background_colour',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'choices' => mttr_component_flexible_content_band_colours(),
							'default_value' => array (
								'standard' => apply_filters( 'mttr_component_flexible_content_band_colour_default', 'standard' ),
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'mttr_flex_content_bgimg',
							'label' => 'Background Image',
							'name' => 'background_image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'preview_size' => 'mttr_hero',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'mttr_flex_content_bands_size',
							'label' => 'Size',
							'name' => 'size',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'choices' => mttr_component_flexible_content_band_sizes(),
							'default_value' => array (
								'standard' => apply_filters( 'mttr_component_flexible_content_band_size_default', 'standard' ),
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'mttr_flex_content_bands_width',
							'label' => 'Width',
							'name' => 'width',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => 25,
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'standard' => 'Full Width',
								'extend' => 'Grid Width',
							),
							'default_value' => array (
								'standard' => 'standard',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'disabled' => 0,
							'readonly' => 0,
						),
						array (
							'key' => 'mttr_flex_content_inner_flex',
							'label' => 'Flexible Content',
							'name' => 'flexible_content',
							'type' => 'flexible_content',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'button_label' => 'Add Content',
							'min' => '',
							'max' => '',
							'layouts' => $_mttr_acf_flexible_content_layouts,
						),
					),
				),
			),
			'location' => mttr_flex_layouts_setup_location_array( mttr_flex_layouts_locations_post_types() ),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => apply_filters( 'mttr_standard_content_hide_on_screen_array', array (
				0 => 'the_content',
			) ),
			'active' => 1,
			'description' => '',
		);

		// Add the ACF Group
		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group( $acf_fields );

		}

	}

	add_action( 'mttr_setup_acf_flexible_content_fields', 'mttr_output_flexible_content_fields', 20 );	

}






/* ---------------------------------------------------------
*	Setup the 'grid' meta fields
 ---------------------------------------------------------*/
function mttr_add_acf_grid_feature_post_type_location_array() {

	$meta_post_types = array();

	foreach( mttr_flex_layouts_grid_style_post_type_choices() as $type ) {

		$meta_post_types[] = array(

			'param' => 'post_type',
			'operator' => '==',
			'value' => $type,

		);

	}

	$meta_post_types[] = array(

		'param' => 'post_type',
		'operator' => '==',
		'value' => 'page',

	);

	return apply_filters( 'mttr_add_acf_grid_feature_post_type_location_array_data', $meta_post_types );

}





/* ---------------------------------------------------------
*	Setup the global array for flexible content
 ---------------------------------------------------------*/
function mttr_add_acf_flexible_content_option( $name, $option, $type = 'layout' ) {  

	global $_mttr_acf_flexible_content_layouts;
	$_mttr_acf_flexible_content_layouts[ esc_attr( $name ) ] = $option;
  
}





/* ---------------------------------------------------------
*	Get all flexible content options
 ---------------------------------------------------------*/
function mttr_get_acf_flexible_content_options() {  

	global $_mttr_acf_flexible_content_layouts;
	return $_mttr_acf_flexible_content_layouts;
  
}






/* ---------------------------------------------------------
*	Setup the global array for flexible content FEATURE options
 ---------------------------------------------------------*/
function mttr_add_acf_flexible_content_feature_option( $name, $option, $type = 'layout' ) {  

	global $_mttr_acf_flexible_content_feature_layouts;
	$_mttr_acf_flexible_content_feature_layouts[ esc_attr( $name ) ] = $option;
  
}





/* ---------------------------------------------------------
*	Get all flexible content options FEATURE options
 ---------------------------------------------------------*/
function mttr_get_acf_flexible_content_feature_options() {  

	global $_mttr_acf_flexible_content_feature_layouts;
	return $_mttr_acf_flexible_content_feature_layouts;
  
}




/* ---------------------------------------------------------
*	Get the post types available for this project
 ---------------------------------------------------------*/
function mttr_flex_layouts_grid_style_post_type_choices() {

	$post_types = get_post_types(); 
	unset( $post_types[ 'page' ] );
	unset( $post_types[ 'revision' ] );
	unset( $post_types[ 'attachment' ] );
	unset( $post_types[ 'nav_menu_item' ] );
	unset( $post_types[ 'acf-field-group' ] );
	unset( $post_types[ 'acf-field' ] );

	return $post_types;

}





/* ---------------------------------------------------------
*	Get the post types for ACF flexible content
 ---------------------------------------------------------*/
function mttr_flex_layouts_locations_post_types() {

	$post_types = get_post_types(); 
	unset( $post_types[ 'revision' ] );
	unset( $post_types[ 'attachment' ] );
	unset( $post_types[ 'nav_menu_item' ] );
	unset( $post_types[ 'acf-field-group' ] );
	unset( $post_types[ 'acf-field' ] );

	return apply_filters( 'mttr_flex_layouts_locations_post_types_array', $post_types );

}




/* ---------------------------------------------------------
*	Setup the location data for the flex content array
 ---------------------------------------------------------*/
function mttr_flex_layouts_setup_location_array( $types ) {

	$data = array();

	foreach( $types as $type ) {

		$data[][] = array (

			'param' => 'post_type',
			'operator' => '==',
			'value' => $type,

		);

	}

	return apply_filters( 'mttr_flex_layouts_setup_location_array_data', $data );

}






/* ---------------------------------------------------------
*	Setup MISC Feature felds
 ---------------------------------------------------------*/
function mttr_add_default_meta_grid_fields( $types ) {

	$fields = array (
		'key' => 'mttr_grid_listing_meta_fields',
		'title' => 'Meta: Grid/Listing',
		'fields' => array (
			array (
				'key' => 'mttr_meta_grid_heading',
				'label' => 'Heading',
				'name' => 'mttr_heading',
				'type' => 'text',
				'instructions' => 'This heading appears within grid features, instead of the standard title.',
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
				'key' => 'mttr_meta_grid_flavour',
				'label' => 'Flavour Text',
				'name' => 'mttr_flavour_text',
				'type' => 'textarea',
				'instructions' => 'This text is displayed in some themes within grid items, or occasionally within menus.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => 'wpautop',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'mttr_meta_grid_icon',
				'label' => 'Icon',
				'name' => 'mttr_icon',
				'type' => 'select',
				'instructions' => 'An icon associated with the page. Some components may display this within a grid.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
				),
				'default_value' => array (
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
			),
			array (
				'key' => 'mttr_meta_grid_icon_image',
				'label' => 'Icon Image',
				'name' => 'mttr_icon_image',
				'type' => 'image',
				'instructions' => 'An icon associated with the page. If supplied, components will use this image in place of the other icon.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array (
				'key' => 'mttr_meta_grid_cta_text',
				'label' => 'CTA Text',
				'name' => 'mttr_cta_text',
				'type' => 'text',
				'instructions' => 'This text appears on call to actions within grid features.',
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
				'key' => 'mttr_meta_grid_cta_link',
				'label' => 'CTA Link',
				'name' => 'mttr_cta_link',
				'type' => 'text',
				'instructions' => 'This link appears on call to actions within grid features.',
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
		'location' => mttr_flex_layouts_setup_location_array( mttr_flex_layouts_locations_post_types() ),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	);

	if ( function_exists( 'acf_add_local_field_group' ) ) {

		acf_add_local_field_group( apply_filters( 'mttr_add_default_meta_grid_fields_array_data', $fields ) );

	}

}

add_action( 'init', 'mttr_add_default_meta_grid_fields', 20 );