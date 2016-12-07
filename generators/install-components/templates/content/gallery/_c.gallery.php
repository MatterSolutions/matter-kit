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
//    =Component - Gallery
//
//    The base gallery component
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Add the core gallery component
 ---------------------------------------------------------*/
function mttr_add_core_component_gallery() {

	$data = array(

		'heading' => 'Gallery',
		'summary' => '<p>Display the standard WordPress gallery, filtered.</p>',

	);

	// Add component - name, template location
	mttr_add_component( 'gallery', apply_filters( 'mttr_core_component_gallery_template', 'components/content/gallery/_c.gallery-tpl' ), $data );

}

add_action( 'mttr_setup_components', 'mttr_add_core_component_gallery', 5 );