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
//	=Components - Core - Flexible content
//
// 	Main declaration file for including the flexible content component
//
// ---------------------------------------------------------------------------- *


class Mttr_Component_Flexible_Content {

	var $data;
	var $styles = '';
	var $component_name = 'c-flexible-content';


	// ------------------------------------------------
	//	Initial setup
	// ------------------------------------------------
	function __construct( $hook = false, $priority = 10, $data = array() ) {

		// Render the component
		if ( !empty( $hook ) ) {

			if ( empty( $data ) ) {

				if ( is_home() ) {

					$data = $this->get_data( get_option( 'page_for_posts' ) );

				} else {
		
					$data = $this->get_data( get_the_ID() );

				}

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

		return 'components/content/flexible-content/_c.flexible-content-tpl';

	}




	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $obj ) {

		if ( have_rows( 'mttr_flexible_bands', $obj ) ) {

			$counter = 1;
			$band_data = get_field( 'mttr_flexible_bands', $obj );

			$data['bands'] = array();

			while ( have_rows( 'mttr_flexible_bands', $obj ) ) {

				the_row();

				$data['bands'][] = array(

					'id' => 'band--content-' . $counter,
					'modifiers' => $this->get_band_modifiers( $counter, $band_data ),
					'data' => $this->get_flexible_content_data( $counter ) // This may hold a LOT of data

				);

				$counter++;

			}

			return $data;

		}

		return false;

	}




	// ------------------------------------------------
	//	Get data about the current band
	// ------------------------------------------------
	function get_band_data() {

		$band = array(

			'colour' => get_sub_field( 'background_colour' ),
			'image' => get_sub_field( 'background_image' ),
			'size' => get_sub_field( 'size' ),
			'width' => get_sub_field( 'width' ),

		);

		return $band;

	}




	// ------------------------------------------------
	//	Get the flexible content data for the band
	// ------------------------------------------------
	function get_flexible_content_data( $band_id ) {

		$flexible_content = get_sub_field( 'flexible_content' );
		$flexible_content_counter = 0;

		$data = array();

		if ( have_rows( 'flexible_content' ) ) {

			$flexible_content_counter++;
			$layouts = mttr_get_acf_flexible_content_options();

			while ( have_rows( 'flexible_content' ) ) {

				the_row();

				if ( array_key_exists( get_row_layout(), $layouts ) ) {

					$class_name = 'Mttr_Component_' . str_replace( ' ', '_', ucwords( str_replace( '_', ' ', get_row_layout() ) ) );

					if ( class_exists( $class_name ) ) {

						$component = new $class_name();
						$component_data = $component->get_data();

						// Grab the component styles
						if ( method_exists( $component, 'get_styles' ) ) {

							$this->styles = $this->styles . $component->get_styles( $component_data );

						} else {

							$this->styles = $this->styles . $component->styles;

						}

						// Add the component data and template to an array
						$data[] = array( 
						
							'data' => $component_data,
							'template' => $component->get_component_template_location()

						);

					}

				}
			
			}

			return $data;

		}

		return false;

	}




	// ------------------------------------------------
	//	Get the modifier classes for the current band
	// ------------------------------------------------
	function get_band_modifiers( $counter, $band_data, $modifiers = null ) {

		$band = $this->get_band_data();
		$band['id'] = 'band--content-' . $counter;

		// Empty array to attach modifiers to
		$band_modifiers = array();

		if ( $modifiers ) {

			$band_modifiers[] = $modifiers;

		}

		// Band identifier
		$band_modifiers[] = 'o-band--content-' . $counter;

		// Output the styles for a band background
		if ( $band[ 'image' ] ) {

			$band_modifiers[] = 'o-band--hero';
			$band_modifiers[] = 'o-tint';

		}

		// Band colours, set modifiers based on chosen colour
		if ( $band[ 'colour' ] != 'standard' ) {

			$band_modifiers[] = 'o-band--' . esc_attr( $band[ 'colour' ] );

		}


		// Band sizing, set modifiers based on chosen sizes
		if ( $band[ 'size' ] == 'standard' ) {

			$band_modifiers[] = apply_filters( 'mttr_template_flexible_content_standard_band_size', 'o-band--large' );

		} else if ( $band[ 'size' ] == 'flush' ) {

			$band_modifiers[] = 'u-hard';

		} else if ( $band[ 'size' ] == 'large' ) {

			$band_modifiers[] = 'o-band--huge';

		} else {

			$band_modifiers[] = 'o-band--' . esc_attr( $band[ 'size' ] );

		} 


		// Band width, set modifiers based on width
		if ( $band[ 'width' ] == 'extend' ) {

			$band_modifiers[] = 'o-band--extend';

		}

		// Check bands based on previous colour
		if ( $counter > 1 ) {

			// Set band contextual margins (negate space between like bands)
			if ( $band[ 'image' ] ) {

				// Disallow fixed backgrounds by default, but can filter
				if ( apply_filters( 'mttr_flexible_bands_background_fixed', false ) ) {

					$band_modifiers[] = 'u-fixed-background';

				}

			// Remove padding if flush size is chosen
			} else if ( $band[ 'size' ] == 'flush' ) {

				$band_modifiers[] = 'u-hard';

			// Remove the top padding on sequential same-colour bands
			} else if ( $band_data[ $counter - 2 ][ 'background_colour' ]  ==  $band[ 'colour' ]  &&  $band_data[ $counter - 2 ][ 'size' ]  !=  'flush' ) {

				$band_modifiers[] = 'u-hard--top';

			}

		}

		if ( $band['image'] ) {

			// Add image
			$this->add_styles( $band );

		}

		return $band_modifiers;

	}



	// ------------------------------------------------
	//	Add style
	// ------------------------------------------------
	function add_styles( $data ) {

		if ( isset( $data['image'] ) ) {

			$image_url = wp_get_attachment_image_src( $data['image'], apply_filters( 'mttr_filter_component_band_image_size', 'mttr_hero' ) );

			$custom_css = "
				#" . $data['id'] . " {
						background-image: url('" . esc_url( $image_url[0] ) . "');
				}";

			$this->styles = $this->styles . $custom_css;

		}

	}


	


	// ------------------------------------------------
	//	Begin rendering the component styles
	// ------------------------------------------------
	function render_styles( $styles = false ) {

		if ( empty( $styles ) ) {

			$styles = $this->styles;

		}

		wp_add_inline_style( mttr_theme_main_css_slug(), $styles );

	}





	// ------------------------------------------------
	//	Render the actual component
	// ------------------------------------------------
	function render_component( $data ) {

		if ( isset( $data['bands'] ) ) {

			foreach( $data['bands'] as $band ) {

				mttr_get_template( $this->get_component_template_location(), $band );

			}

		}

	}

}