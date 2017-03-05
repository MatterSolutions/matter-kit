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
//    =Outer Template - Index
//
//    The most default of all WordPress templates
//
// ---------------------------------------------------------------------------- */


	// ------------------------------------------------
	//	Output the posts (or no content)
	// ------------------------------------------------
	if ( have_posts() ) {


		// ------------------------------------------------
		//	Hero
		// ------------------------------------------------
		new Mttr_Component_Hero_Text( 'mttr_header', 10 );



		// ------------------------------------------------
		//	Output content on archives
		// ------------------------------------------------
		if ( ! is_search() && ! is_front_page() && is_home() ) {

			// Output the content
			new Mttr_Component_Flexible_Content( 'mttr_content', 10 );

		}

		// Set up empty item array
		$items = array();

		// Get all posts and display a listing
		while ( have_posts() ) {

			the_post();
			$items[] = get_the_ID();

		}


		// ------------------------------------------------
		//	Post 'grid'
		// ------------------------------------------------

		// Output grid items
		$grid = new Mttr_Component_Grid();
		$data = $grid->get_data( 'blog-card', $items );
		$styles = $grid->styles;

		new Mttr_Component_Grid( 'mttr_content', 15, $data, $styles );


	// ------------------------------------------------
	//	No Content
	// ------------------------------------------------
	} else {

		$content = new Mttr_Component_Content_None();
		$data = $content->get_data();

		new Mttr_Component_Content_None( 'mttr_content', 15, $data );

	}


	// ------------------------------------------------
	//	Pagination
	// ------------------------------------------------
	new Mttr_Component_Pagination_Square( 'mttr_content', 20 );


	// Output the elements
	matter_kit();