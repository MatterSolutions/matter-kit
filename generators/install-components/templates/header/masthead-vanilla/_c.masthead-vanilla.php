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
//	=Components - Masthead Vanilla
//
// 	A very basic masthead
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Masthead_Vanilla {

	var $data;
	var $styles;
	var $component_name = 'c-masthead-vanilla';


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

		return 'components/header/masthead-vanilla/inc/_c.masthead-vanilla-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$brand = new Mttr_Component_Brand();
		$brand_template = $brand->get_component_template_location();

		$data = array(

			'toggles' => $this->get_toggle_data(),
			'primary' => array(

				'brand' => array(

					'template' => $brand_template,
					'data' => array(

						'logos' => mttr_get_brand_images( 'primary' ),
						'link' => home_url( '/' ),
						'breakpoint' => 'desk',

					),

				)

			),
			'secondary' => array(

				'primary_menu' => array(

					'template' => 'components/misc/menu/_c.menu-tpl',
					'data' => array(

						'menu' => array( 

							'theme_location' => 'primary',
							'menu_id' => 'primary-menu',
							'container' => false,
							'menu_class' => 'o-nav  o-nav--dropdown  o-nav--sliding-mobile  o-nav--horizontal  js-sliding-nav',
							'after' => '<span class="menu-item-trigger  js-toggle--sub-menu"></span>'

						),

					),

				),
				'secondary_menu' => array(

					'template' => 'components/misc/menu/_c.menu-tpl',
					'data' => array(

						'menu' => array( 

							'theme_location' => 'secondary',
							'menu_id' => 'secondary-menu--mobile',
							'container' => false,
							'menu_class' => 'o-nav  o-nav--dropdown  o-nav--sliding-mobile  js-sliding-nav',
							'after' => '<span class="menu-item-trigger  js-toggle--sub-menu"></span>'

						),

					),

				)

			)

		);

		return apply_filters( 'mttr_get_component_data_masthead_vanilla_data', $data );

	}




	// ------------------------------------------------
	//	Setup the masthead toggle data
	// ------------------------------------------------
	function get_toggle_data() {

		$toggles = array(

			'primary' => array(

				'type' => 'menu',
				'toggle_class' => 'c-masthead--is-open  c-site-blocker--is-active  c-menu-icon--is-active',
				'toggle_target' => 'body',
				'class' => 'c-btn  c-btn--transparent  c-btn--icon  js-toggle',
				'aria_controls' => 'primary-menu',
				'aria_expanded' => 'false',
				'data' => array(
					'modifiers' => 'c-menu-icon  c-menu-icon--standard  u-pos--center',
				),

			),
			'secondary' => array(

				'type' => 'link',
				'text' => '<i class="u-sr">Call us on ' . do_shortcode( '[mttr_phone_number]' ) . '</i><i class="o-icon  u-pos--center">' . mttr_get_icon( 'phone.svg' ) . '</i>',
				'link' => 'tel:' . do_shortcode( '[mttr_phone_number tel=true]' ),
				'class' => 'c-btn  c-btn--transparent  c-btn--icon  ga--phone  ga--phone-header',

			)

		);

		return $toggles;

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

	new Mttr_Component_Masthead_Vanilla( 'mttr_header', 10 );
	
}, 4 );
