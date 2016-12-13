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
//	=Components - Subheading
//
// 	A basic subheading
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Subheading {

	var $data;
	var $styles;
	var $component_name = 'c-subheading';


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
			$this->add_component_tinymce();

		}

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/typography/subheading/inc/_c.subheading-tpl';

	}



	// ------------------------------------------------
	//	Add the component to TINYMCE
	// ------------------------------------------------
	function add_component_tinymce() {

	    $tiny_mce_details = array(

			'title' => 'Subheading',
			'block' => 'h3',  
			'classes' => 'c-subheading',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Text', $tiny_mce_details );

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		if ( empty( $item ) ) { $item = get_the_ID(); }

		$data = array(

			'subheading' => mttr_contextual_subheading( $item ),

		);

		return apply_filters( 'mttr_get_component_data_subheading_data', $data );

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

	new Mttr_Component_Subheading();
	
}, 4 );
