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
//	=Components - Meta data
//
// 	Main declaration file for including the meta data
//
// ---------------------------------------------------------------------------- *



// ---------------------------------------------------------
// 	Setup the meta data component
// ---------------------------------------------------------*/
function mttr_setup_component_meta_data() {

	// Setup the data array
	$data = array(

		'heading' => 'Meta Data',
		'template' => false

	);

	// Add component - name, template location
	mttr_add_component( 'meta-data', 'components/misc/meta-data/_c.meta-data-tpl', $data );

}

add_action( 'mttr_setup_components', 'mttr_setup_component_meta_data' );