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
//	=Components - Hero Morph
//
// 	A really versatile hero unit, with many modifiers
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Include the main hero morph class
 ---------------------------------------------------------*/
require get_template_directory() . '/components/hero/hero/inc/_c.hero-class.php';




/* ---------------------------------------------------------
*	Setup the Hero Morph Component
 ---------------------------------------------------------*/
function mttr_setup_component_hero() {

	// Setup the data array
	$data = array(

		'heading' => 'Hero Morph',
		'template' => false

	);

	// Add component - name, template location
	mttr_add_component( 'hero', 'components/hero/hero/inc/_c.hero-tpl', $data );

}
add_action( 'mttr_setup_components', mttr_setup_component_hero() );





/* ---------------------------------------------------------
*	Create the base hero obj
 ---------------------------------------------------------*/
function mttr_component_template_hero_morph_standard_obj( $id = 'main' ) {

	$id = apply_filters( 'mttr_component_template_hero_morph_standard_obj_id', $id );
	$hero = new mttrComponentHeroMorph( $id );
	return $hero;

}





// * ---------------------------------------------------------------------------    
// 
//	=Hero Morph - Standard
//
// 	The most vanilla hero within the project
//
// ---------------------------------------------------------------------------- *


	/* ---------------------------------------------------------
	*	Get the standard hero modifiers
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_standard_modifiers() {

		return 'c-hero--tint  c-hero--tall  c-hero--wide  u-text--center  u-text--grey-ui-white-ui';

	}



	/* ---------------------------------------------------------
	*	Setup the standard hero data
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_standard_data() {

		$hero = mttr_component_template_hero_morph_standard_obj();
		$data = $hero->mttr_get_hero_data( 'image' );
		$data[ 'modifiers' ] = mttr_component_template_hero_morph_standard_modifiers();
		return apply_filters( 'mttr_component_template_hero_morph_standard_data_array', $data );

	}





	/* ---------------------------------------------------------
	*	Output the standard hero STYLES
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_standard_styles() {

		$hero = mttr_component_template_hero_morph_standard_obj();
		$styles = $hero->mttr_component_hero_morph_prepare_inline_styles( mttr_component_template_hero_morph_standard_data() );
		mttr_add_inline_styles( 'main', $styles );

		return $styles;

	}





	/* ---------------------------------------------------------
	*	Output the standard hero MARKUP
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_standard_markup() {

		mttr_get_component_template( 'hero', mttr_component_template_hero_morph_standard_data() );

	}







// * ---------------------------------------------------------------------------    
// 
//	=Hero Morph - Text Hero
//
// 	The text-based hero within the project
//
// ---------------------------------------------------------------------------- *



	/* ---------------------------------------------------------
	*	Setup the text hero data
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_text_data() {

		$hero = mttr_component_template_hero_morph_standard_obj();
		$data = $hero->mttr_get_hero_data( 'image' );
		$data[ 'modifiers' ] = 'c-hero--auto  c-hero--wide  c-hero--pull-up';
		return apply_filters( 'mttr_component_template_hero_morph_text_data_array', $data );

	}




	/* ---------------------------------------------------------
	*	Output the text hero MARKUP
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_text_markup() {

		mttr_get_component_template( 'hero', mttr_component_template_hero_morph_text_data() );

	}




// * ---------------------------------------------------------------------------    
// 
//	=Hero Morph - Home Hero
//
// 	The home page hero for the project
//
// ---------------------------------------------------------------------------- *



	/* ---------------------------------------------------------
	*	Setup the home hero data
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_home_data() {

		$hero = mttr_component_template_hero_morph_standard_obj();
		$data = $hero->mttr_get_hero_data( 'image' );
		$data[ 'modifiers' ] = mttr_component_template_hero_morph_standard_modifiers();
		return apply_filters( 'mttr_component_template_hero_morph_home_data_array', $data );

	}



	/* ---------------------------------------------------------
	*	Output the home hero STYLES
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_home_styles() {

		$hero = mttr_component_template_hero_morph_standard_obj();
		$styles = $hero->mttr_component_hero_morph_prepare_inline_styles( mttr_component_template_hero_morph_standard_data() );
		mttr_add_inline_styles( 'main', $styles );

		return $styles;

	}




	/* ---------------------------------------------------------
	*	Output the home hero MARKUP
	 ---------------------------------------------------------*/
	function mttr_component_template_hero_morph_home_markup() {

		mttr_get_component_template( 'hero', mttr_component_template_hero_morph_home_data() );

	}