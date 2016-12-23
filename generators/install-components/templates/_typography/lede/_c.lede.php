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
//	=Components - Lede
//
// 	A basic lede paragraph
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Lede {

	var $data;
	var $styles;
	var $component_name = 'c-lede';


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

			// Add to TinyMCE
			$this->add_component_tinymce();

		}

	}


	// ------------------------------------------------
	//	Add the component to TINYMCE
	// ------------------------------------------------
	function add_component_tinymce() {

	    $tiny_mce_details = array(

			'title' => 'Lede',
			'block' => 'p',  
			'classes' => 'c-lede',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Text', $tiny_mce_details );

	}




	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/_typography/lede/inc/_c.lede-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$data = array();

		return apply_filters( 'mttr_get_component_data_lede_data', $data );

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

	new Mttr_Component_Lede();
	
}, 4 );
