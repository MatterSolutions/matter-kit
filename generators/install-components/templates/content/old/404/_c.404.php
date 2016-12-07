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
//	=Components - 404
//
// 	Retrieve and set up the data for the 404 Page
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Heading
 ---------------------------------------------------------*/
function mttr_add_component_404_heading() {

	echo '<h1 class="t-title  u-flush--bottom">404</h1>'; 

}
add_action( 'mttr_core_component_404_content', 'mttr_add_component_404_heading', 10 );





/* ---------------------------------------------------------
*	Subheading
 ---------------------------------------------------------*/
function mttr_add_component_404_subheading() {

	echo '<p class="t-heading">' . mttr_get_contextual_title() . '</p>'; 

}
add_action( 'mttr_core_component_404_content', 'mttr_add_component_404_subheading', 10 );





/* ---------------------------------------------------------
*	Content
 ---------------------------------------------------------*/
function mttr_add_component_404_content() {

	echo apply_filters( 'the_content', mttr_get_contextual_content() ); 

}
add_action( 'mttr_core_component_404_content', 'mttr_add_component_404_content', 15 );





/* ---------------------------------------------------------
*	Add default modifiers
 ---------------------------------------------------------*/
function mttr_add_component_404_modifiers( $data ) {

	$data[ 'modifiers' ] = 'o-band  o-band--large  u-keyline  u-text--center';

	return $data;

}
add_filter( 'mttr_output_404_template_data', 'mttr_add_component_404_modifiers', 10, 1 );





/* ---------------------------------------------------------
*	Add wrap modifiers
 ---------------------------------------------------------*/
function mttr_add_component_404_wrap_modifiers( $data ) {

	$data[ 'wrap' ] = '';

	return $data;

}
add_filter( 'mttr_output_404_template_data', 'mttr_add_component_404_wrap_modifiers', 10, 1 );






/* ---------------------------------------------------------
*	Output the 404 template file
 ---------------------------------------------------------*/
function mttr_output_404_template() {

	$data = apply_filters( 'mttr_output_404_template_data', array() );
	mttr_get_template( 'components/content/404/_c.404-tpl', $data );

}