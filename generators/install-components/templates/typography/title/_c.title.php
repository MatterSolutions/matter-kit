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
//	=Components - Title
//
// 	Display a basic title
//
// ---------------------------------------------------------------------------- *





/* ---------------------------------------------------------
* 	Setup the Title component
 ----------------------------------------------------------*/
function mttr_setup_component_title() {

	// Setup the data array
	$data = array(

		'heading' => 'Title',
		'template' => false

	);

	// Add component - name, template location
	mttr_add_component( 'title', 'components/typography/title/inc/_c.title-tpl', $data );

}

add_action( 'mttr_setup_components', 'mttr_setup_component_title' );





/* ---------------------------------------------------------
*	Setup the primary test
 ---------------------------------------------------------*/
function mttr_setup_component_title_primary() {


	/* ---------------------------------------------------------
	*	Add the component
	 ---------------------------------------------------------*/

	// Component slug
	$slug = 'primary';


	// Component test information
    $component = array(

		'content' => 'Title',
		'wide' => false,
		'data' => array(

			'content' => 'Title',
			'modifiers' => '',

		),

    );

    mttr_add_component_test( 'title', esc_attr( $slug ), $component );




    

    /* ---------------------------------------------------------
	*	Add the component to TINYMCE
	 ---------------------------------------------------------*/
    $tiny_mce_details = array(

		'title' => mttr_get_component_test_info( 'title', $slug, 'content' ),
		'block' => 'h1',  
		'classes' => 't-title' . mttr_get_component_test_data( 'title', $slug, 'modifiers' ),
		'wrapper' => false,

	);

	mttr_add_editor_component( 'Text', $tiny_mce_details );

	

}

add_action( 'mttr_setup_component_tests', 'mttr_setup_component_title_primary' );








function mttr_component_title_default_array_setup( $title = null ) {

	if ( empty( $title ) ) {

		$title = mttr_get_contextual_title();

	}

	$data = array(

		'template' => mttr_get_component_template_file( 'title' ),
		'data' => array(

			'content' => $title,
			'modifiers' => mttr_get_component_test_data( 'title', $slug, 'modifiers' )

		)

	);

	return $data;

}