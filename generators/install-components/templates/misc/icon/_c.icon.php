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
//	=Components - Core - Icon
//
// 	Main declaration file for including the icon component
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Add the core icon component
 ---------------------------------------------------------*/
function mttr_add_core_component_icon() {

	$data = array(

		'heading' => 'Icon',
		'summary' => '<p>The standard icon object and associated template.</p>',

	);

	// Add component - name, template location
	mttr_add_component( 'icon', apply_filters( 'mttr_core_component_icon_template', 'components/misc/icon/_c.icon-tpl' ), $data );

}

add_action( 'mttr_setup_components', 'mttr_add_core_component_icon', 5 );