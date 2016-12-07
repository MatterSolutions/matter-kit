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
//	=Components - Core - menu
//
// 	Main declaration file for including the menu component
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Add the core menu component
 ---------------------------------------------------------*/
function mttr_add_core_component_menu() {

	$data = array(

		'heading' => 'Menu',
		'summary' => '<p>Display a WordPress menu.</p>',

	);

	// Add component - name, template location
	mttr_add_component( 'menu', apply_filters( 'mttr_core_component_menu_template', '_core/components/menu/_c.menu-tpl' ), $data );

}

add_action( 'mttr_setup_components', 'mttr_add_core_component_menu', 5 );