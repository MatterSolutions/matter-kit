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
//	=Components - Colophon Vanilla
//
// 	A basic colophon with copyright information and a legal menu
//
// ---------------------------------------------------------------------------- *

class Mttr_Component_Colophon_Vanilla {

	var $data;
	var $styles;
	var $component_name = 'c-colophon-vanilla';


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

		return 'components/footer/colophon-vanilla/inc/_c.colophon-vanilla-tpl';

	}





	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $item = null ) {

		$data = array(

			'primary' => array(

				'content' => '&copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '. All Rights Reserved.',
				'menu' => array(

					'template' => 'components/misc/menu/_c.menu-tpl',
					'data' => array(

						'menu' => array( 

							'theme_location' => apply_filters( 'mttr_site_layout_colophon_theme_location', 'legal' ),
							'menu_id' => 'legal-menu',
							'container' => false,
							'menu_class' => 'o-list  o-list--bare  o-list--delimited  o-list--inline',

						),

					),

				),
				'social' => mttr_social_menu( apply_filters( 'mttr_social_menu_type', 'default' ) ),
				'attribution' => array(

					'template' => 'components/footer/attribution-vanilla/inc/_c.attribution-vanilla-tpl',
					'data' => array(

						'url' => 'https://www.mattersolutions.com.au',
						'image' => 'matter-solutions-logo.svg'

					),

				)

			),
			'modifiers' => 'o-band--flush  o-band--grey-ui'

		);

		return apply_filters( 'mttr_get_component_data_colophon_vanilla_data', $data );

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

	new Mttr_Component_Colophon_Vanilla( 'mttr_footer', 70 );
	
}, 4 );
