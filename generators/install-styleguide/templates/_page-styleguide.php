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
//    =Outer Template - Styleguide Page
//
//    The template used for displaying the styleguide pages
//
// ---------------------------------------------------------------------------- *


// ------------------------------------------------
//	Output the posts (or no content)
// ------------------------------------------------
new Mttr_Component_Flexible_Content( 'mttr_before_styleguide_loop_content', 40 );



/* ---------------------------------------------------------
*	Begin actions
 ---------------------------------------------------------*/
do_action( 'mttr_page_setup' );	

do_action( 'mttr_output_styleguide' );

do_action( 'mttr_page_end' );