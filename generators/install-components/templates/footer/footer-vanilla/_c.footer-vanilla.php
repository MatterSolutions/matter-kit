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
//	=Components - Footer Vanilla
//
// 	A really simple footer, with a space for the logo and menu.
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Footer_Vanilla {

	var $data;
	var $styles;
	var $component_name = 'c-footer-vanilla';


	// ------------------------------------------------
	//	Initial setup
	// ------------------------------------------------
	function __construct( $hook = false, $priority = 10, $data = array() ) {

		// ------------------------------------------------
		//	Register the customiser field
		// ------------------------------------------------
		add_action( 'customize_register', function( $wp_customize ) {

			$wp_customize->add_section( 'mttr_footer_vanilla' , array(

			    'title' => __( 'Footer', 'mttr' ),
			    'description' => __( 'Manage your footer logo.', 'mttr' ),
			    'priority'   => 50,

			) );


			// Add the social share order
			$wp_customize->add_setting( 'mttr_footer_vanilla_content' );


			// Add a control to upload the logo
			$wp_customize->add_control( new Mttr_Customize_Textarea_Control( $wp_customize, 'mttr_footer_vanilla_content',
				
				array(

					'label' => 'Footer Content',
					'section' => 'mttr_footer_vanilla',
					'settings' => 'mttr_footer_vanilla_content',

				) ) 

			);

		}, 60 );


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

		return 'components/footer/footer-vanilla/inc/_c.footer-vanilla-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$content = get_theme_mod( 'mttr_footer_vanilla_content' );

		$data = array(

			'primary' => $content,
			'secondary' => array(

				'menu' => array(

					'template' => 'components/misc/menu/_c.menu-tpl',
					'data' => array(

						'menu' => array( 

							'theme_location' => apply_filters( 'mttr_site_layout_footer_theme_location', 'footer' ),
							'menu_id' => 'footer-menu',
							'container' => false,
							'menu_class' => 'o-nav  o-nav--columned',

						),

					),

				),

			),
			'modifiers' => 'o-band--large'

		);

		return apply_filters( 'mttr_get_component_data_footer_vanilla_data', $data );

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

	new Mttr_Component_Footer_Vanilla( 'mttr_footer', 30 );
	
}, 4 );
