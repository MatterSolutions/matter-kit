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
//	=Components - Buttons
//
// 	Main declaration file for including the buttons
//
// ---------------------------------------------------------------------------- *



// ---------------------------------------------------------
// 	Setup the button component
// ---------------------------------------------------------*/
function mttr_setup_component_btn() {

	// Setup the data array
	$data = array(

		'heading' => 'Buttons',
		'template' => false

	);

	// Add component - name, template location
	mttr_add_component( 'btn', 'components/misc/btn/inc/_c.btn-tpl', $data );

}

add_action( 'mttr_setup_components', 'mttr_setup_component_btn' );







/* ---------------------------------------------------------
*	Setup the primary test
 ---------------------------------------------------------*/
function mttr_setup_component_btn_primary() {


	/* ---------------------------------------------------------
	*	Add the component
	 ---------------------------------------------------------*/

	// Component slug
	$slug = 'primary';


	// Component test information
    $component = array(

		'content' => 'Primary Button',
		'wide' => false,
		'data' => array(

			'content' => 'Primary',
			'modifiers' => 'c-btn--primary',

		),

    );

    mttr_add_component_test( 'btn', esc_attr( $slug ), $component );




    /* ---------------------------------------------------------
	*	Add the component to TINYMCE
	 ---------------------------------------------------------*/
    $tiny_mce_details = array(

		'title' => mttr_get_component_test_info( 'btn', $slug, 'content' ),
		'selector' => 'a',  
		'classes' => 'c-btn  ' . mttr_get_component_test_data( 'btn', $slug, 'modifiers' ),
		'wrapper' => false,

	);

	mttr_add_editor_component( 'Buttons', $tiny_mce_details );

}

add_action( 'mttr_setup_component_tests', 'mttr_setup_component_btn_primary' );




/* ---------------------------------------------------------
*	Setup the secondary test
 ---------------------------------------------------------*/

function mttr_setup_component_btn_secondary() {

	/* ---------------------------------------------------------
	*	Add the component
	 ---------------------------------------------------------*/

	// Component slug
	$slug = 'secondary';


	// Component test information
    $component = array(

		'content' => 'Secondary Button',
		'wide' => false,
		'data' => array(

			'content' => 'Secondary',
			'modifiers' => 'c-btn--secondary',

		),

    );

    mttr_add_component_test( 'btn', esc_attr( $slug ), $component );




    /* ---------------------------------------------------------
	*	Add the component to TINYMCE
	 ---------------------------------------------------------*/
    $tiny_mce_details = array(

		'title' => mttr_get_component_test_info( 'btn', $slug, 'content' ),
		'selector' => 'a',  
		'classes' => 'c-btn  ' . mttr_get_component_test_data( 'btn', $slug, 'modifiers' ),
		'wrapper' => false,

	);

	mttr_add_editor_component( 'Buttons', $tiny_mce_details );

}

add_action( 'mttr_setup_component_tests', 'mttr_setup_component_btn_secondary' );






/* ---------------------------------------------------------
*	Setup the secondary test
 ---------------------------------------------------------*/

function mttr_setup_component_btn_ghosted() {

	/* ---------------------------------------------------------
	*	Add the component
	 ---------------------------------------------------------*/

	// Component slug
	$slug = 'ghost';


	// Component test information
    $component = array(

		'content' => 'Ghosted Button',
		'wide' => false,
		'data' => array(

			'content' => 'Ghost',
			'modifiers' => 'c-btn--primary-ghost',

		),

    );

    mttr_add_component_test( 'btn', esc_attr( $slug ), $component );




    /* ---------------------------------------------------------
	*	Add the component to TINYMCE
	 ---------------------------------------------------------*/
    $tiny_mce_details = array(

		'title' => mttr_get_component_test_info( 'btn', $slug, 'content' ),
		'selector' => 'a',  
		'classes' => 'c-btn  ' . mttr_get_component_test_data( 'btn', $slug, 'modifiers' ),
		'wrapper' => false,

	);

	mttr_add_editor_component( 'Buttons', $tiny_mce_details );

}

add_action( 'mttr_setup_component_tests', 'mttr_setup_component_btn_ghosted' );








/* ---------------------------------------------------------
*	Add the btn units to the styleguide
 ---------------------------------------------------------*/
function mttr_styleguide_styletile_buttons() {

	echo '<li class="o-ltg__item  o-lyt__item">';

		echo '<div class="s-dock  s-dock--top  s-dock--right  s-dock--offset-right">';

			echo '<div class="s-dock__item">';

				mttr_styletile_note( 'Buttons', 'The primary and secondary button styles' );

			echo '</div>';

			echo '<h3 class="s-v-meta">Buttons</h3>';

			echo '<ul class="o-lyt  o-lyt--small  o-lyt--auto  o-ltg  o-ltg--small">';

				echo '<li class="o-lyt__item  o-ltg__item  g-one-half@lap">';

					// Primary btn
					mttr_get_component_template( 'btn', mttr_get_component_test_data_array( 'btn', 'primary' ) );

				echo '</li>';

				echo '<li class="o-lyt__item  o-ltg__item  g-one-half@lap">';

					// Secondary btn
					mttr_get_component_template( 'btn', mttr_get_component_test_data_array( 'btn', 'secondary' ) );

				echo '</li>';

				echo '<li class="o-lyt__item  o-ltg__item  g-one-half@lap">';

					// Secondary btn
					mttr_get_component_template( 'btn', mttr_get_component_test_data_array( 'btn', 'ghost' ) );

				echo '</li>';

			echo '</ul>';

		echo '</div>';

	echo '</li>';

}

add_action( 'mttr_styleguide_styletile_top_primary', 'mttr_styleguide_styletile_buttons', 30 );