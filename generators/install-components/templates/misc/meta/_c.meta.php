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
//	=Components - Meta
//
// 	Basic meta data
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Meta {

	var $data;
	var $styles;
	var $component_name = 'c-meta';


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

		}

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/misc/meta/inc/_c.meta-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		if ( empty( $item ) ) {

			$item = get_the_ID();

		}

		$data = array(

			'date' => $this->get_date( $item ),
			'categories' => $this->get_categories( $item )

		);

		return apply_filters( 'mttr_get_component_data_meta_data', $data );

	}





	// ---------------------------------------------------------
	// 	Get the categories
	// ---------------------------------------------------------*/
	function get_categories( $item ) {

		if ( empty( $item ) ) {

			$item = get_the_ID();

		}

		return array(

			'icon' => mttr_get_icon( 'box.svg' ),
			'heading' => false,
			'content' => get_the_category_list( ', ', false, $item ),

		);

	}




	// ---------------------------------------------------------
	// 	Get the date array
	// ---------------------------------------------------------*/
	function get_date( $item ) {

		$date = get_the_date( apply_filters( 'mttr_format_date_meta', get_option( 'date_format' ) ), $item );

		return array(

			'icon' => mttr_get_icon( 'calendar.svg' ),
			'heading' => false,
			'content' => $date,

		);

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

	new Mttr_Component_Meta();
	
}, 4 );
