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
	var $component_name = 'c-<%= componentInfo.componentSlug %>';


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

			// Output the styles in the head
			add_action( 'wp_enqueue_scripts', function() {

				$this->render_styles( $this->styles );

			}, $priority );

			add_action( $hook, function() {

				$this->render_component( $this->data );

			}, $priority );

		// Setup the component
		} else {

			// Set up the ACF fields
			$this->add_acf_fields();

		}

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/<%= componentInfo.componentType %>/<%= componentInfo.componentSlug %>/inc/_c.<%= componentInfo.componentSlug %>-tpl';

	}


<% if ( componentInfo.componentType == "grid" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		if ( empty( $item ) ) {

			$item = get_the_ID();

		}

		// Setup the data array
		$data = array(

			'template' => $this->get_component_template_location(),
			'data' => mttr_get_grid_feature_data_standard( $item ),
			'modifiers' => '',

		);

		// Set the component name
		$data['data']['name'] = $this->component_name;

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
<% if ( componentInfo.componentType == "layout" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		if ( empty( $item ) ) {

			$item = get_the_ID();

		}

		$field = get_sub_field( 'field', $item );

		$data = array(

			'field' => $field,

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
				),
			),
			'min' => '',
			'max' => '',

		);

		mttr_add_acf_flexible_content_option( '<%= componentInfo.componentSlug %>', apply_filters( 'mttr_setup_flex_<%= componentInfo.componentSlugUnderscore %>_acf_fields_array', $fields ) );

	}
<% } %>
<% if ( componentInfo.componentType != "layout" && componentInfo.componentType != "grid" ) { %>
	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$field = get_field( 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_field', 'options' );

		$data = array(

			'field' => $field,

		);

		return apply_filters( 'mttr_get_component_data_<%= componentInfo.componentSlugUnderscore %>_data', $data );

	}


	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (
			'key' => 'mttr_flex_layouts_<%= componentInfo.componentSlugUnderscore %>',
			'title' => '<%= componentInfo.componentName %>',
			'fields' => array (
				array (
					'key' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>',
					'label' => 'Field',
					'name' => 'mttr_options_<%= componentInfo.componentSlugUnderscore %>_field',
					'type' => 'wysiwyg',
					'instructions' => '',
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


	// ------------------------------------------------
	//	Begin rendering the component styles
	// ------------------------------------------------
	function render_styles() {

		wp_add_inline_style( mttr_theme_main_css_slug(), $this->styles );

	}





	// ------------------------------------------------
	//	Return the component styles
	// ------------------------------------------------
	function get_styles( $data = null ) {

		if ( empty( $data ) ) {

			$data = $this->data; 

		}

		$custom_css = '';

		if ( isset( $data['id'] ) ) {

			$custom_css = "#" . $data['id'] . " {
				
			}";

		}
			
		return $custom_css;

	}



	// ------------------------------------------------
	//	Render the actual component
	// ------------------------------------------------
	function render_component( $data = null ) {

		if ( empty( $data ) ) {

			$data = $this->data;

		}

		mttr_get_template( $this->get_component_template_location(), $data );

	}


}


<% if ( componentInfo.componentType == "grid" ) { %>
// Add the grid option
mttr_add_acf_flexible_content_feature_option( '<%= componentInfo.componentSlug %>', '<%= componentInfo.componentName %>' );
<% } %>
<% if ( componentInfo.componentType != "grid" ) { %>
// Initialise the component
add_action( 'init', function() {

	new Mttr_Component_<%= componentInfo.componentSlugClass %>();
	
}, 4 );
<% } %>