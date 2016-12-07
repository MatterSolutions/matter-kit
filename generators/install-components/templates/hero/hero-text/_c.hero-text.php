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
//	=Components - Hero Text
//
// 	A text-only hero unit
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Hero_Text {

	var $data;
	var $styles;
	var $component_name = 'c-hero-text';


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

		return 'components/hero/hero-text/inc/_c.hero-text-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$modifiers = false;
		$content = false;

		// No posts, center the text to match the content
		if ( ! have_posts() || is_404() ) {

			$modifiers = 'u-text--center';

		}

		// Content
		if ( is_archive() ) {

			$content = mttr_get_contextual_content();

		}

		// Setup the data array
		$data = array(

			'heading' => mttr_get_contextual_title(),
			'content' => $content,
			'modifiers' => $modifiers

		);

		return apply_filters( 'mttr_get_component_data_hero_text_data', $data );

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

	new Mttr_Component_Hero_Text();
	
}, 4 );
