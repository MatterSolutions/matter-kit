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
//	=Components - Card
//
// 	A basic card grid style
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Card {

	var $data;
	var $styles;
	var $component_name = 'c-card';


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

		}

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/grid/card/inc/_c.card-tpl';

	}



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


		$title = get_field( 'mttr_heading', $item );
		if ( $title ) { $data['data']['heading'] = $title; }

		$excerpt = get_field( 'mttr_flavour_text', $item );
		if ( $excerpt ) { $data['data']['excerpt'] = strip_tags( $excerpt ); }

		// Set the component name
		$data['data']['name'] = $this->component_name;
		$data['data']['id'] = $item;

		if ( 'post' == get_post_type( $item ) ) {

			$data['data']['date'] = get_the_date( get_option( 'date_format' ), $item );

		}

		$data['data']['image'] = mttr_get_image_url( $item, 'thumbnail' );
		$data['data']['categories'] = get_the_category( $item );

		return apply_filters( 'mttr_get_component_data_grid_card_data', $data );

	}


	// ------------------------------------------------
	//	Get the listing data
	// ------------------------------------------------
	function get_listing_data() {

		$data = array(

			'modifiers' => '', // lyt modifiers
			'sizes' => 'g-one-half@lap', // grid size modifiers
			'wrap' => '', // wrapper modifiers

		);

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

			$custom_css = "#c-card--" . $data['id'] . " .c-card__media {

				background-image: url('" . esc_url( $data['image'] ) . "');
				
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



// Add the grid option
mttr_add_acf_flexible_content_feature_option( 'card', 'Card' );

