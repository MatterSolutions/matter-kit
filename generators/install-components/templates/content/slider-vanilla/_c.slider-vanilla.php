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
//	=Components - Slider Vanilla
//
// 	A basic slider
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Slider_Vanilla {

	var $data;
	var $styles;
	static $component_name = 'c-slider-vanilla';


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

				$this->render_styles( $this->get_styles( $this->data ) );

			}, $priority );

			add_action( $hook, function() {

				$this->render_component( $this->data );

			}, $priority );

		// Setup the component
		} else {

			// Set up the ACF fields
			$this->add_acf_fields();

		}

	}


	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	static function get_component_template_location() {

		return 'components/content/slider-vanilla/inc/_c.slider-vanilla-tpl';

	}




	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		// Gather data from sub fields
		$items = get_sub_field( 'items' );
		$size = get_sub_field( 'size' );
		$item_modifiers = 'o-band';

		if ( $size == 'large' ) {

			$item_modifiers = 'o-band--huge';

		} else {

			$item_modifiers = 'o-band--large';

		}

		// Set the data in an array
		$data = array(

			'items' => $items,
			'size' => $size,
			'id' => rand( 0000, 9999 ) . date( 'His' ),
			'item_modifiers' => $item_modifiers,

		);

		return apply_filters( 'mttr_get_component_data_flexible_slider_vanilla_data', $data );

	}


	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (

			'key' => 'mttr_flex_layouts_slider_vanilla',
			'name' => 'slider_vanilla',
			'label' => 'Slider Vanilla',
			'display' => 'block',
			'sub_fields' => array (
				array (
					'key' => 'mttr_flex_slider_vanilla_items',
					'label' => 'Items',
					'name' => 'items',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 0,
					'layout' => 'block',
					'button_label' => '',
					'sub_fields' => array (
						array (
							'key' => 'mttr_flex_slider_vanilla_image',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'id',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array (
							'key' => 'mttr_flex_slider_vanilla_content',
							'label' => 'Content',
							'name' => 'content',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
						array (
							'key' => 'mttr_flex_slider_vanilla_width',
							'label' => 'Width',
							'name' => 'width',
							'type' => 'radio',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'line-length' => 'Optimal Line Length',
								'narrow' => 'Narrow',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
							'return_format' => 'value',
						),
						array (
							'key' => 'mttr_flex_slider_vanilla_alignment',
							'label' => 'Alignment',
							'name' => 'alignment',
							'type' => 'radio',
							'instructions' => 'Alignment affects the positioning on larger screens.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'left' => 'Left',
								'center' => 'Center',
								'right' => 'Right',
							),
							'allow_null' => 0,
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'center',
							'layout' => 'horizontal',
							'return_format' => 'value',
						),
					),
				),
				array (
					'key' => 'mttr_flex_slider_vanilla_size',
					'label' => 'Size',
					'name' => 'size',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'normal' => 'Normal',
						'large' => 'Large',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
			),
			'min' => '',
			'max' => '',

		);

		mttr_add_acf_flexible_content_option( 'slider_vanilla', apply_filters( 'mttr_setup_flex_slider_vanilla_acf_fields_array', $fields ) );

	}





	// ------------------------------------------------
	//	Begin rendering the component styles
	// ------------------------------------------------
	function render_styles() {

		wp_add_inline_style( mttr_theme_main_css_slug(), $this->get_styles() );

	}





	// ------------------------------------------------
	//	Return the component styles
	// ------------------------------------------------
	function get_styles( $data = null ) {

		// Get the data if empty
		if ( empty( $data ) ) {	$data = $this->data; }

		$custom_css = '';

		if ( !empty( $data['items'] ) ) {

			foreach ( $data['items'] as $key => $item ) {

				$selector = '#' . self::$component_name . '--' . $data['id'] . '--' . $key;

				// Add the background to the first clone (for infinite loops)
				if ( $key == 0 ) {

					$selector .= ',#' . self::$component_name . '--' . $data['id'] . ' .slick-cloned:last-of-type';

				}

				// Add the background to the last clone (for infinite loops)
				if ( $key == ( count( $data['items'] ) - 1 ) ) {

					$selector .= ',#' . self::$component_name . '--' . $data['id'] . ' .slick-cloned:first-of-type';

				}

				if ( !empty( $image_id = $item['image'] ) ) {

					$image = mttr_get_image_url_by_attachment_id( $image_id, 'mttr_hero' );
					$image_mobile = mttr_get_image_url_by_attachment_id( $image_id, 'thumbnail' );

					if ( isset( $data['id'] ) ) {

						$custom_css .= $selector . " {

							background-image: url('" . esc_url( $image_mobile ) . "');
							
						}

						@media (min-width: 768px) {

							" . $selector . " {

								background-image: url('" . esc_url( $image ) . "');
								
							}

						}";

					}

				}

			}

		}
			
		return $custom_css;

	}



	// ------------------------------------------------
	//	Render the actual component
	// ------------------------------------------------
	function render_component( $data = null ) {

		if ( empty( $data ) ) {	$data = $this->data; }

		mttr_get_template( self::get_component_template_location(), $data );

	}


}




// Initialise the component
add_action( 'init', function() {

	new Mttr_Component_Slider_Vanilla();
	
}, 4 );
