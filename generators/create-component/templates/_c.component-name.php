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
//	=Components - <%= componentInfo.componentName %>
//
// 	<%= componentInfo.componentDescription %>
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_<%= componentInfo.componentSlugClass %> {

	var $data;
	var $styles;
	static $component_name = 'c-<%= componentInfo.componentSlug %>';


	// ------------------------------------------------
	//	Initial setup
	// ------------------------------------------------
	function __construct( $hook = false, $priority = 10, $data = array() ) {

		// Render the component
		if ( !empty( $hook ) ) {

			if ( empty( $data ) ) {
		
				$data = $this->get_data( get_the_ID() );

			}

			$this->data = $data;

			<% if ( componentInfo.componentStyles == "yes" && componentInfo.componentFields !== "none" ) { %>// Output the styles in the head
			add_action( 'wp_enqueue_scripts', function() {

				$this->render_styles( $this->get_styles( $this->data ) );

			}, $priority );<% } %>

			add_action( $hook, function() {

				$this->render_component( $this->data );

			}, $priority );

		// Setup the component
		} else {

			<% if ( componentInfo.componentFields != "none" && componentInfo.componentFields != "grid" ) { %>// Set up the ACF fields
			$this->add_acf_fields();<% } %>

		}

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	static function get_component_template_location() {

		return 'components/<%= componentInfo.componentFolder %>/<%= componentInfo.componentSlug %>/inc/_c.<%= componentInfo.componentSlug %>-tpl';

	}


<% if ( componentInfo.componentFields === "grid" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		// Get the ID if item is empty
		if ( empty( $item ) ) { $item = get_the_ID(); }

		// Setup the data array
		$data = array(

			'template' => self::get_component_template_location(),
			'data' => mttr_get_grid_feature_data_standard( $item ),
			'modifiers' => '',

		);

		// Set the component name
		$data['data']['name'] = self::$component_name;
		<% if ( componentInfo.componentStyles == "yes" ) { %>
		// Unique identifier & images
		$data['data']['id'] = $item;
		$data['data']['image'] = mttr_get_image_url( $item, 'thumbnail' );
		$data['data']['image_mobile'] = mttr_get_image_url( $item, 'thumbnail' );
		<% } %>

		return apply_filters( 'mttr_get_component_data_grid_<%= componentInfo.componentSlugUnderscore %>_data', $data );

	}


	// ------------------------------------------------
	//	Get the listing data
	// ------------------------------------------------
	function get_listing_data() {

		$data = array(

			'modifiers' => '', // lyt modifiers
			'sizes' => '', // grid size modifiers
			'wrap' => '', // wrapper modifiers

		);

		return $data;

	}
<% } %>
<% if ( componentInfo.componentFields === "layout" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		// Gather data from sub fields
		$content = get_sub_field( 'content' );
		<% if ( componentInfo.componentStyles == "yes" ) { %>$image = get_sub_field( 'image' );<% } %>

		// Set the data in an array
		$data = array(

			'content' => $content,
			<% if ( componentInfo.componentStyles == "yes" ) { %>'id' => rand( 0000, 9999 ) . date( 'His' ),
			'image' => mttr_get_image_url_by_attachment_id( $image, 'mttr_hero' ),
			'image_mobile' => mttr_get_image_url_by_attachment_id( $image, 'thumbnail' ),<% } %>	

		);

		return apply_filters( 'mttr_get_component_data_flexible_<%= componentInfo.componentSlugUnderscore %>_data', $data );

	}


	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (

			'key' => 'mttr_flex_layouts_<%= componentInfo.componentSlugUnderscore %>',
			'name' => '<%= componentInfo.componentSlugUnderscore %>',
			'label' => '<%= componentInfo.componentName %>',
			'display' => 'block',
			'sub_fields' => array (
				array (
					'key' => 'mttr_flex_<%= componentInfo.componentSlugUnderscore %>_content',
					'label' => 'Content',
					'name' => 'content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 1,
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
				),<% if ( componentInfo.componentStyles == "yes" ) { %>
				array (
					'key' => 'mttr_flex_<%= componentInfo.componentSlugUnderscore %>_image',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
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
				),<% } %>
			),
			'min' => '',
			'max' => '',

		);

		mttr_add_acf_flexible_content_option( '<%= componentInfo.componentSlugUnderscore %>', apply_filters( 'mttr_setup_flex_<%= componentInfo.componentSlugUnderscore %>_acf_fields_array', $fields ) );

	}
<% } %>
<% if ( componentInfo.componentFields === "global" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	static function get_data( $item = null ) {

		$field = get_field( 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_field', 'options' );
		<% if ( componentInfo.componentStyles == "yes" ) { %>$image = get_field( 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_image', 'options' );<% } %>

		$data = array(

			'field' => $field,
			<% if ( componentInfo.componentStyles == "yes" ) { %>'id' => rand( 0000, 9999 ) . date( 'His' ),
			'image' => mttr_get_image_url_by_attachment_id( $image, 'mttr_hero' ),
			'image_mobile' => mttr_get_image_url_by_attachment_id( $image, 'thumbnail' ),<% } %>

		);

		return apply_filters( 'mttr_get_component_data_<%= componentInfo.componentSlugUnderscore %>_data', $data );

	}


	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (
			'key' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>',
			'title' => 'Options: <%= componentInfo.componentName %>',
			'fields' => array (
				array (
					'key' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_field',
					'label' => 'Field',
					'name' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_field',
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
				),<% if ( componentInfo.componentStyles == "yes" ) { %>
				array (
					'key' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_image',
					'label' => 'Image',
					'name' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_image',
					'type' => 'image',
					'instructions' => '',
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
				),<% } %>
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-general-theme-settings',
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

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group( apply_filters( 'mttr_setup_options_<%= componentInfo.componentSlugUnderscore %>_acf_fields_array', $fields ) );

		}

	}
<% } %>
<% if ( componentInfo.componentFields === "none" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		// Get the ID if item is empty
		if ( empty( $item ) ) { $item = get_the_ID(); }

		// Initialise an empty data array
		$data = array();

		return apply_filters( 'mttr_get_component_data_<%= componentInfo.componentSlugUnderscore %>_data', $data );

	}
<% } %>


	<% if ( componentInfo.componentStyles === "yes" && componentInfo.componentFields !== "none" ) { %>// ------------------------------------------------
	//	Begin rendering the component styles
	// ------------------------------------------------
	function render_styles() {

		wp_add_inline_style( mttr_theme_main_css_slug(), $this->get_styles() );

	}





	// ------------------------------------------------
	//	Return the component styles
	// ------------------------------------------------
	function get_styles( $data = null ) {

		// Get the data if empty
		if ( empty( $data ) ) {	$data = $this->data; }

		<% if ( componentInfo.componentFields === "grid" ) { %>$selector = '#' . self::$component_name . '--' . $data['id'];<% } %>
		<% if ( componentInfo.componentFields !== "grid" ) { %>$selector = '#' . self::$component_name . '--' . $data['id'];<% } %>


		if ( isset( $data['id'] ) ) {

			$custom_css = $selector . " {

				background-image: url('" . esc_url( $data['image_mobile'] ) . "');
				
			}

			@media (min-width: 768px) {

				" . $selector . " {

					background-image: url('" . esc_url( $data['image'] ) . "');
					
				}

			}";

			return $custom_css;

		}
			
		return '';

	}



	<% } %>// ------------------------------------------------
	//	Render the actual component
	// ------------------------------------------------
	function render_component( $data = null ) {

		if ( empty( $data ) ) {	$data = $this->data; }

		mttr_get_template( self::get_component_template_location(), $data );

	}


}


<% if ( componentInfo.componentFields === "grid" ) { %>
// Add the grid option
mttr_add_acf_flexible_content_feature_option( '<%= componentInfo.componentSlug %>', '<%= componentInfo.componentName %>' );
<% } %>
<% if ( componentInfo.componentFields !== "grid" ) { %>
// Initialise the component
add_action( 'init', function() {

	new Mttr_Component_<%= componentInfo.componentSlugClass %>();
	
}, 4 );
<% } %>