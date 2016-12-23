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
//	=Components - Hero Vanilla
//
// 	A very basic hero, with overlaying text
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Hero_Vanilla {

	var $data;
	var $styles;
	var $component_name = 'c-hero-vanilla';


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

				$this->styles = $this->get_styles();
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

		return 'components/hero/hero-vanilla/inc/_c.hero-vanilla-tpl';

	}




	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		// Get the ID if no item is set
		if ( empty( $item ) ) {

			$item = get_the_ID();

		}

		$meta_data = false;

		// Setup meta data for posts
		if ( is_single() && 'post' == get_post_type() ) {

			$meta = new Mttr_Component_Meta();
			$meta_data = array(

				'template' => $meta->get_component_template_location(),
				'data' => array(

					'loop' => $meta->get_data( get_the_ID() ),

				)

			);

		}		

		// Setup main data array
		$data = array(

			'id' => rand( 0000, 9999 ) . date( 'His' ),
			'heading' => mttr_get_contextual_title(),
			'image' => mttr_get_image_url( $item, 'mttr_hero' ),
			'image_mobile' => mttr_get_image_url( $item, 'thumbnail' ),
			'meta' => $meta_data,
			'modifiers' => 'c-hero-vanilla--left  o-tint  o-tint--light'

		);

		return apply_filters( 'mttr_get_component_data_hero_vanilla_data', $data );

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

			$custom_css = "#c-hero-vanilla--" . $data['id'] . " {

				background-image: url('" . esc_url( $data['image_mobile'] ) . "');
				
			}

			@media (min-width: 768px) {

				#c-hero-vanilla--" . $data['id'] . " {

					background-image: url('" . esc_url( $data['image'] ) . "');
					
				}

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

	new Mttr_Component_Hero_Vanilla();
	
}, 4 );
