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
//	=Components - Standard Listing
//
// 	A slat based listing using only textual elements
//
// ---------------------------------------------------------------------------- *


class Mttr_Component_Slat_Text {

	var $data;
	var $styles;
	var $component_name = 'c-slat-text';


	// ------------------------------------------------
	//	Initial setup
	// ------------------------------------------------
	function __construct( $hook = false, $priority = 10, $data = array() ) {

		if ( empty( $data ) ) {
		
			$data = $this->get_data();

		}

		// Set the data
		$this->data = $data;

		// Output the styles in the head
		add_action( 'wp_enqueue_scripts', function() {

			$this->render_styles( $this->styles );

		}, $priority );

		// Hook the content where it needs to go!
		add_action( $hook, function() {

			$this->render_component( $this->data );

		}, $priority );

	}




	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/grid/slat-text/_c.slat-text-tpl';

	}





	// ------------------------------------------------
	//	Get the listing data
	// ------------------------------------------------
	function get_listing_data() {

		$data = array(

			'modifiers' => '',
			'sizes' => '',
			'wrap' => '',

		);

		return $data;

	}




	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$data = array(

			'template' => $this->get_component_template_location(),
			'data' => mttr_get_grid_feature_data_standard( $item ),
			'modifiers' => 'o-band  o-band--large  u-keyline',

		);

		$data['data']['name'] = $this->component_name;

		return $data;

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

			// $custom_css = "#" . $data['id'] . " {
				
			// }";

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


// Add the grid option
mttr_add_acf_flexible_content_feature_option( 'slat-text', 'Slat' );