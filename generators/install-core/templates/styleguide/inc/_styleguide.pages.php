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
//    =Styleguide - Pages
//
//    Add our standard styleguide pages, based on where we are in our process
//
// ---------------------------------------------------------------------------- *





/* ---------------------------------------------------------
*	Add our styleguide page styletiles
 ---------------------------------------------------------*/

function mttr_styleguide_page_styletiles() {

	if ( has_site_icon() ) {

		$icon = '<img src="' . get_site_icon_url( null, 64 ) . '" alt="' . get_bloginfo( 'name' ) . '">';

	} else {

		$icon = mttr_get_icon( 'home.svg' );

	}

	$styleguide_page = array(

		'name' => 'Styleguide',
		'label' => 'Styleguide',
		'link' => '/styleguide',
		'icon' => $icon,
		'content' => '<p>The styletile elements.</p>',
		'template' => false,

	);

	// Add styleguide page - slug, page data
	mttr_add_styleguide_page( 'styleguide', apply_filters( 'mttr_styleguide_page_styletile_details', $styleguide_page ) );

}
add_action( 'mttr_setup_styleguide_pages', 'mttr_styleguide_page_styletiles', 5 );







/* ---------------------------------------------------------
*	Add our styleguide page components
 ---------------------------------------------------------*/

function mttr_styleguide_page_components() {

	$styleguide_page = array(

		'name' => 'Components',
		'label' => 'Components',
		'link' => '/styleguide/components',
		'icon' => mttr_get_icon( 'layers.svg' ),
		'content' => '<p>The components available within the project.</p>',
		'template' => '_core/styleguide/template-parts/generic/_s.page-header',

	);

	// Add styleguide page - slug, page data
	mttr_add_styleguide_page( 'components', apply_filters( 'mttr_styleguide_page_imagery_details', $styleguide_page ) );

}
add_action( 'mttr_setup_styleguide_pages', 'mttr_styleguide_page_components', 10 );








/* ---------------------------------------------------------
*	Add our styleguide page typography
 ---------------------------------------------------------*/

function mttr_styleguide_page_typography() {

	$styleguide_page = array(

		'name' => 'Typography',
		'label' => 'Typography',
		'link' => '/styleguide/typography',
		'icon' => mttr_get_icon( 'text.svg' ),
		'content' => '<p>The typographic elements and scale used throughout the project.</p>',
		'template' => '_core/styleguide/template-parts/generic/_s.page-header',

	);

	// Add styleguide page - slug, page data
	mttr_add_styleguide_page( 'typography', apply_filters( 'mttr_styleguide_page_typography_details', $styleguide_page ) );

}
add_action( 'mttr_setup_styleguide_pages', 'mttr_styleguide_page_typography', 15 );








/* ---------------------------------------------------------
*	Add our styleguide page imagery
 ---------------------------------------------------------*/

function mttr_styleguide_page_imagery( $show = false ) {

	if ( ! defined( 'MTTR_WIRES' ) || $show ) {

		$styleguide_page = array(

			'name' => 'Imagery',
			'label' => 'Imagery',
			'link' => '/styleguide/imagery',
			'icon' => mttr_get_icon( 'image-inverted.svg' ),
			'content' => '<p>The art direction and available icons for the project.</p>',
			'template' => '_core/styleguide/template-parts/generic/_s.page-header',

		);

		// Add styleguide page - slug, page data
		mttr_add_styleguide_page( 'imagery', apply_filters( 'mttr_styleguide_page_imagery_details', $styleguide_page ) );

	}

}
add_action( 'mttr_setup_styleguide_pages', 'mttr_styleguide_page_imagery', 15 );







/* ---------------------------------------------------------
*	Add our styleguide page layouts
 ---------------------------------------------------------*/

function mttr_styleguide_page_layouts( $show = false ) {

	if ( ! defined( 'MTTR_WIRES' ) || $show ) {

		$styleguide_page = array(

			'name' => 'Layouts',
			'label' => 'Layouts',
			'link' => '/styleguide/layouts',
			'icon' => mttr_get_icon( 'text-document-inverted.svg' ),
			'content' => '<p>The layouts available within the project.</p>',
			'template' => '_core/styleguide/template-parts/generic/_s.page-header',

		);

		// Add styleguide page - slug, page data
		mttr_add_styleguide_page( 'layouts', apply_filters( 'mttr_styleguide_page_layouts_details', $styleguide_page ) );

	}

}
add_action( 'mttr_setup_styleguide_pages', 'mttr_styleguide_page_layouts', 15 );