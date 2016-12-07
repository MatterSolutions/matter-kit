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
//	=Components - No Content
//
// 	Retrieve and set up the data for the 'No Content' template
//
// ---------------------------------------------------------------------------- *



/* ---------------------------------------------------------
*	Heading
 ---------------------------------------------------------*/
function mttr_add_component_no_content_heading() {

	echo '<h1 class="t-title  u-flush--bottom">' . mttr_get_contextual_title() . '</h1>'; 

}
add_action( 'mttr_core_component_no_content_content', 'mttr_add_component_no_content_heading', 10 );





/* ---------------------------------------------------------
*	Content
 ---------------------------------------------------------*/
function mttr_add_component_no_content_content() {

	echo apply_filters( 'the_content', mttr_get_contextual_content() ); 

}
add_action( 'mttr_core_component_no_content_content', 'mttr_add_component_no_content_content', 10 );






/* ---------------------------------------------------------
*	Add default modifiers
 ---------------------------------------------------------*/
function mttr_add_component_no_content_modifiers( $data ) {

	$data[ 'modifiers' ] = 'o-band  o-band--large  u-keyline  u-text--center';

	return $data;

}
add_filter( 'mttr_output_no_content_template_data', 'mttr_add_component_no_content_modifiers', 10, 1 );





/* ---------------------------------------------------------
*	Add wrap modifiers
 ---------------------------------------------------------*/
function mttr_add_component_no_content_wrap_modifiers( $data ) {

	$data[ 'wrap' ] = '';

	return $data;

}
add_filter( 'mttr_output_no_content_template_data', 'mttr_add_component_no_content_wrap_modifiers', 10, 1 );






/* ---------------------------------------------------------
*	Output the no-content template file
 ---------------------------------------------------------*/
function mttr_output_no_content_template() {

	$data = apply_filters( 'mttr_output_no_content_template_data', array() );
	mttr_get_template( 'components/content/no-content/_c.no-content-tpl', $data );

}