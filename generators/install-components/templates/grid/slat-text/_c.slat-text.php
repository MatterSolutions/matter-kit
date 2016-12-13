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

			'modifiers' => 'o-ltg--flush',
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

		);

		$data['data']['name'] = $this->component_name;
		$data['data']['wrap'] = 'o-wrap--flush';
		$data['data']['modifiers'] = 'o-band  o-band--large  u-keyline';

		return $data;

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