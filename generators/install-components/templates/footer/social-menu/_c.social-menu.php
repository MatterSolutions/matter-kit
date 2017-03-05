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
//	=Components - Social Menu
//
// 	A basic circular social menu
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Social_Menu {

	var $data;
	var $styles;
	var $component_name = 'c-social-menu';


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

		return 'components/footer/social-menu/inc/_c.social-menu-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$data = array(

			'social' => mttr_social_menu( apply_filters( 'mttr_social_menu_type', 'default' ) ),
			'modifiers' => 'u-text--center',

		);

		return apply_filters( 'mttr_get_component_data_social_menu_data', $data );

	}


	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (
			'key' => 'mttr_flex_layouts_social_menu',
			'title' => 'Social Menu',
			'fields' => array (
				array (
					'key' => 'mttr_options_social_menu',
					'label' => 'Field',
					'name' => 'mttr_options_social_menu_field',
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

			acf_add_local_field_group( apply_filters( 'mttr_setup_options_social_menu_acf_fields_array', $fields ) );

		}

	}



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




// Initialise the component
add_action( 'init', function() {

	new Mttr_Component_Social_Menu( 'mttr_footer', 10 );
	
}, 4 );
