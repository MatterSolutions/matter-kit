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
	new Mttr_Component_Hero_Vanilla( 'mttr_header', 20 );



	// ------------------------------------------------
	//	Output the posts (or no content)
	// ------------------------------------------------
	new Mttr_Component_Flexible_Content( 'mttr_content', 10 );


	
	// ------------------------------------------------
	//	Related posts
	// ------------------------------------------------

	// Output grid items
	$grid = new Mttr_Component_Grid();
	$data = $grid->get_data( 'card', mttr_get_related_posts( get_the_ID(), 2 ) );
	$styles = $grid->styles;

	new Mttr_Component_Grid( 'mttr_content', 15, $data, $styles );


	// Output the elements
	matter_kit();