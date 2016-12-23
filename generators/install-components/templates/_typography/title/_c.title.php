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
//	=Components - Title
//
// 	A basic title
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Title {

	var $data;
	var $styles;
	var $component_name = 'c-title';


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
	//	Add the component to TINYMCE
	// ------------------------------------------------
	function add_component_tinymce() {

	    $tiny_mce_details = array(

			'title' => 'Title',
			'block' => 'h1',  
			'classes' => 'c-title',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Text', $tiny_mce_details );

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/_typography/title/inc/_c.title-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		if ( empty( $item ) ) { $item = get_the_ID(); }

		$data = array(

			'content' => mttr_get_contextual_title( $item ),

		);

		return apply_filters( 'mttr_get_component_data_title_data', $data );

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

	new Mttr_Component_Title();
	
}, 4 );
