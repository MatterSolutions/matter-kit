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
//	=Components - Content None
//
// 	The component displayed when there is no content to display.
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Content_None {

	var $data;
	var $styles;
	var $component_name = 'c-content-none';


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

		return 'components/content/content-none/inc/_c.content-none-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$data = array();

		if ( is_home() && current_user_can( 'publish_posts' ) ) {

			$data['content'] = 'Ready to publish your first post? <a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">Get started here</a>';

		} else if ( is_search() ) {

			$data['content'] = 'Sorry, but nothing matched your search terms. Please try again with some different keywords.';
			$data['search'] = true;

		} else {

			$data['content'] = 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.';
			$data['search'] = true;

		}

		$data['modifiers'] = 'u-text--center';

		return apply_filters( 'mttr_get_component_data_content_none_data', $data );

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

	new Mttr_Component_Content_None();
	
}, 4 );
