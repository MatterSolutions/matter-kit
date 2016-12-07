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
//	=Components - Hero Morph - Class
//
// 	A really versatile hero unit, with many modifiers
//
// ---------------------------------------------------------------------------- *

class mttrComponentHeroMorph {

	public $namespace = 'c-hero';
	public $id;
	public $data = array();



	/* ---------------------------------------------------------
	* 	Setup the base data
	 ----------------------------------------------------------*/ 
	function __construct( $id = 'main' ) {

		$id = apply_filters( 'mttr_component_hero_morph_default_id', $id );

		// Setup vars
		$this->id = esc_attr( $id );
 
	}




	/* ---------------------------------------------------------
	* 	Data source router for the hero component
	 ----------------------------------------------------------*/
	public function mttr_get_hero_data( $src, $data = array() ) {

		if ( $src && empty( $data ) ) {

			// Find standard content...
			$data = $this->mttr_get_hero_data_standard_content();

		}

		return $data;

	}




	/* ---------------------------------------------------------
	* 	Setup the Hero Morph media Standard Content array data
	 ----------------------------------------------------------*/
	public function mttr_get_hero_data_standard_content() {

		$image_fallback = apply_filters( 'mttr_component_hero_morph_use_image_fallback', true );

		$content = get_field( 'mttr_component_hero_morph_content' );

		if ( empty( $content ) ) {

			$content = array(

				'heading' => mttr_component_title_default_array_setup(),

			);

		} else {

			$content = array(

				'content' => apply_filters( 'the_content', $content ),

			);

		}

		$data = array(

			'id' => $this->id,
			'namespace' => $this->namespace,
			'media' => $this->mttr_get_hero_data_image_attachment( get_the_ID(), $image_fallback ),
			'content' => $content,

		);

		if ( get_post_type() == 'post' ) {		

			$data[ 'content' ][ 'meta' ] = mttr_get_component_meta_data_template_array( $item );

		}

		$this->data = apply_filters( 'mttr_get_component_hero_morph_data_standard_content', $data );

		return $this->data;

	}





	/* ---------------------------------------------------------
	* 	Setup the Hero Morph media array data
	 ----------------------------------------------------------*/
	public function mttr_get_hero_data_image_attachment( $id, $fallback = true ) {

		$images = false;

		if ( $id ) {

			$images = array();

			$images[ 'palm' ] = mttr_get_image_url( $id, 'thumbnail', $fallback );
			$images[ 'desk' ] = mttr_get_image_url( $id, 'mttr_hero', $fallback );

		}

		return $images;

	}





	






	/* ---------------------------------------------------------
	* 	Prepare the inline styles
	 ----------------------------------------------------------*/
	public function mttr_component_hero_morph_prepare_inline_styles( $data ) {

		$style = '';

		// Prepare the mobile image styles
		if ( isset( $data[ 'media' ][ 'palm' ] ) ) {

			$style .= '#' . esc_html( $data[ 'namespace' ] ) . '--' . esc_attr( $data[ 'id' ] ) . '  .' . esc_html( $data[ 'namespace' ] ) . '__media {';

				$style .= 'background-image: url( \'' . esc_url( $data[ 'media' ][ 'palm' ] ) . '\' );';

			$style .= '}';
		}

		// Prepare the desktop image styles
		if ( isset( $data[ 'media' ][ 'desk' ] ) ) {

			$style .= '@media ( min-width: 992px ) { ';

				$style .= '#' . esc_html( $data[ 'namespace' ] ) . '--' . esc_attr( $data[ 'id' ] ) . '  .' . esc_html( $data[ 'namespace' ] ) . '__media {';

					$style .= 'background-image: url( \'' . esc_url( $data[ 'media' ][ 'desk' ] ) . '\' );';

				$style .= '}'; // End ID declaration

			$style .= '}'; // End media
		}

		return $style;

	}





	/* ---------------------------------------------------------
	* 	Output the Hero Morph component
	 ----------------------------------------------------------*/
	public function mttr_output_template_hero_morph( $data ) {

		if ( empty( $data ) ) {

			$data = $this->data;

		}

		// Output template
		mttr_get_component_template( 'hero', $data );

	}

}


/* ---------------------------------------------------------
*	Begin functions, mostly for flexible content
 ---------------------------------------------------------*/




 /* ---------------------------------------------------------
*	Setup the Hero Morph ACF fields
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_setup_standard_hero_morph_acf_fields' ) ) {

	function mttr_setup_standard_hero_morph_acf_fields() {

		$fields = array (

			'key' => 'mttr_component_hero_morph',
			'title' => 'Hero',
			'fields' => array (
				array (
					'key' => 'mttr_component_hero_morph_content',
					'label' => 'Content',
					'name' => 'mttr_component_hero_morph_content',
					'type' => 'wysiwyg',
					'instructions' => 'The content that appears within the hero unit on the page. The image used for the background is the featured image of the page.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'page_type',
						'operator' => '==',
						'value' => 'front_page',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => 'Content for the main hero of the page.',
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group( apply_filters( 'mttr_component_hero_morph_acf_fields', $fields ) );

		}

	}

}
add_action( 'acf/init', 'mttr_setup_standard_hero_morph_acf_fields' );