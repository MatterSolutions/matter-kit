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
//    =Outer Template - Single
//
//    The template used for standard WordPress singles (posts etc)
//
// ---------------------------------------------------------------------------- */

	// ------------------------------------------------
	//	Hero
	// ------------------------------------------------
	new Mttr_Component_Hero_Text( 'mttr_header', 10 );



	// ------------------------------------------------
	//	Output the posts (or no content)
	// ------------------------------------------------
	new Mttr_Component_Flexible_Content( 'mttr_content', 10 );


	
	// ------------------------------------------------
	//	Related posts
	// ------------------------------------------------

	$grid = new Mttr_Component_Grid();
	$data = $grid->get_data( 'slat-text', mttr_get_related_posts( get_the_ID(), 2 ) );

	new Mttr_Component_Grid( 'mttr_content', 15, $data );


	// Output the elements
	matter_kit();