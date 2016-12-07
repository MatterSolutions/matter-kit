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
//    =Styleguide Page - Type Hierarchy
//
//    The default functions for displaying our type hierarchy
//
// ---------------------------------------------------------------------------- *


// /* ---------------------------------------------------------
// *	Section - Typography
//  ---------------------------------------------------------*/
// function mttr_add_styleguide_typography_hierarchy_component() {

// 	$data = array(

// 		'heading' => 'Hierarchy',
// 		'summary' => '<p>Our different typographic elements and their visual hierarchy.</p>',

// 	);


// 	// Add component - name, template location
// 	mttr_add_component( 'hierarchy', false, $data );	

// }

// add_action( 'mttr_setup_components', 'mttr_add_styleguide_typography_hierarchy_component', 20 );



// /* ---------------------------------------------------------
// *	Section - Typography
//  ---------------------------------------------------------*/
// function mttr_add_styleguide_typography_hierarchy_to_styleguide() {

// 	mttr_add_component_to_styleguide_page( 'typography', 'hierarchy' );

// }

// add_action( 'mttr_setup_styleguide_page_components', 'mttr_add_styleguide_typography_hierarchy_to_styleguide', 20 );




/* ---------------------------------------------------------
*	Output the styleguide typography
 ---------------------------------------------------------*/

if ( !function_exists( 'mttr_styleguide_typography' ) ) {
	
	function mttr_styleguide_typography() {

		echo '<div class="o-band  o-band--large">';

			echo '<div class="o-band__body">';

				echo '<div class="o-wrap">';

					echo '<ol class="o-ltg  o-ltg--large  o-lyt">';

						do_action( 'mttr_styleguide_typography_elements' );

					echo '</ol>';
							
				echo '</div><!-- /.o-wrap -->';

			echo '</div><!-- /.o-band__body -->';

		echo '</div><!-- /.o-band -->';

	}

}

// add_action( 'mttr_after_styleguide_loop_typography', 'mttr_styleguide_typography', 20 );








/* ---------------------------------------------------------
*	Output test markup for the typefaces
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_test_typeface' ) ) {

	function mttr_test_typeface() {

		$info = '<p>ABCDEFGHIJKLMNOPQRSTUVWXYZ<br>';
		$info .= 'abcdefghijklmnoqrstuvwxyz<br>';
		$info .= '0123456789&!@#$%&</p>';

		return $info;

	}

}







/* ---------------------------------------------------------
*	Format a typography element for the styleguide
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_format_element' ) ) {

	function mttr_styleguide_typography_format_element( $data ) {

		$summary = '<li class="o-ltg__item">';

			$summary .= '<ul class="o-lyt  o-lyt--reverse  o-ltg">';

				$summary .= '<li class="o-lyt__item  g-one-third@lap">';
			
					$summary .= '<h6 class="s-v-meta">';

						$selector = '.' . $data[ 'class' ];

						$summary .= strip_tags( $data[ 'name' ] );

					$summary .= '</h6>';

					$summary .= '<p class="s-v-caption">' . $data[ 'description' ] . '</p>';

				$summary .= '</li>';


				$summary .= '<li class="o-lyt__item  g-two-thirds@lap">';

					$summary .= '<' . $data[ 'tag' ] . ' class="' . $data[ 'class' ] . '">' . $data[ 'name' ] . '</' . $data[ 'tag' ] . '>';

				$summary .= '</li>';

			$summary .= '</ul>';

		$summary .= '</li>';

		return $summary;

	}

}









/* ---------------------------------------------------------
*	Add title to tinyMCE
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_title_tinymce' ) ) {

	function mttr_styleguide_typography_title_tinymce() {

		$tiny_mce_details = array(

			'title' => 'Title',  
			'block' => 'h1',  
			'classes' => 'v-title',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Headings', $tiny_mce_details );

	}

}

























/* ---------------------------------------------------------
*	Output the typography cta link
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_cta_link' ) ) {

	function mttr_styleguide_typography_cta_link() {

		$data = array(

			'class' => 'v-cta-link',
			'name' => 'CTA Link',
			'tag' => 'p',
			'description' => 'A call to action link can be used in place of a button, if a button has too much impact, but a regular link doesn\'t have enough.',
			
		);

		echo mttr_styleguide_typography_format_element( $data );

		mttr_styleguide_typography_cta_link_tinymce();

	}

}

add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_cta_link' );


/* ---------------------------------------------------------
*	Add pullquote to tinyMCE
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_cta_link_tinymce' ) ) {

	function mttr_styleguide_typography_cta_link_tinymce() {

		$tiny_mce_details = array(

			'title' => 'CTA Link',  
			'block' => 'a',  
			'classes' => 'v-cta-link',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Buttons', $tiny_mce_details );

	}

}







// /* ---------------------------------------------------------
// *	Output the typography pullquote
//  ---------------------------------------------------------*/
// if (!function_exists( 'mttr_styleguide_typography_pullquote' ) ) {

// 	function mttr_styleguide_typography_pullquote() {

// 		$data = array(

// 			'class' => 'v-pullquote',
// 			'name' => '<p>Pullquote</p>',
// 			'tag' => 'blockquote',
// 			'description' => 'The pullquote can be used to quote smaller passages of text.',
			
// 		);

// 		echo mttr_styleguide_typography_format_element( $data );

// 		mttr_styleguide_typography_pullquote_tinymce();

// 	}

// }

// add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_pullquote' );


// /* ---------------------------------------------------------
// *	Add pullquote to tinyMCE
//  ---------------------------------------------------------*/
// if (!function_exists( 'mttr_styleguide_typography_pullquote_tinymce' ) ) {

// 	function mttr_styleguide_typography_pullquote_tinymce() {

// 		$tiny_mce_details = array(

// 			'title' => 'Pullquote',  
// 			'block' => 'blockquote',
// 			'classes' => 'v-pullquote',
// 			'wrapper' => false,

// 		);

// 		mttr_add_editor_component( 'Text', $tiny_mce_details );

// 	}

// }









/* ---------------------------------------------------------
*	Output the typography blockquote
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_blockquote' ) ) {

	function mttr_styleguide_typography_blockquote() {

		$data = array(

			'class' => 'v-blockquote',
			'name' => '<p>Blockquote</p>',
			'tag' => 'blockquote',
			'description' => 'The blockquote can be used to quote larger passages of text.',
			
		);

		echo mttr_styleguide_typography_format_element( $data );

		mttr_styleguide_typography_blockquote_tinymce();

	}

}

add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_blockquote' );


/* ---------------------------------------------------------
*	Add blockquote to tinyMCE
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_blockquote_tinymce' ) ) {

	function mttr_styleguide_typography_blockquote_tinymce() {

		$tiny_mce_details = array(

			'title' => 'Blockquote',  
			'block' => 'blockquote',  
			'classes' => 'v-blockquote',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Text', $tiny_mce_details );

	}

}








/* ---------------------------------------------------------
*	Output the typography body
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_body' ) ) {

	function mttr_styleguide_typography_body() {

		$data = array(

			'class' => 'v-body',
			'name' => 'Body',
			'tag' => 'p',
			'description' => 'Styling for a standard paragraph.',
			
		);

		echo mttr_styleguide_typography_format_element( $data );

	}

}

add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_body' );






/* ---------------------------------------------------------
*	Output the typography citation
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_citation' ) ) {

	function mttr_styleguide_typography_citation() {

		$data = array(

			'class' => 'v-citation',
			'name' => 'Citation',
			'tag' => 'cite',
			
		);

		echo mttr_styleguide_typography_format_element( $data );

		mttr_styleguide_typography_citation_tinymce();

	}

}

add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_citation' );


/* ---------------------------------------------------------
*	Add citation to tinyMCE
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_citation_tinymce' ) ) {

	function mttr_styleguide_typography_citation_tinymce() {

		$tiny_mce_details = array(

			'title' => 'Citation',  
			'block' => 'p',  
			'classes' => 'v-citation',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Text', $tiny_mce_details );

	}

}







// /* ---------------------------------------------------------
// *	Output the typography caption
//  ---------------------------------------------------------*/
// if (!function_exists( 'mttr_styleguide_typography_caption' ) ) {

// 	function mttr_styleguide_typography_caption() {

// 		$data = array(

// 			'class' => 'v-caption',
// 			'name' => 'Caption',
// 			'tag' => 'p',
			
// 		);

// 		echo mttr_styleguide_typography_format_element( $data );

// 		mttr_styleguide_typography_caption_tinymce();

// 	}

// }

// add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_caption' );


// /* ---------------------------------------------------------
// *	Add caption to tinyMCE
//  ---------------------------------------------------------*/
// if (!function_exists( 'mttr_styleguide_typography_caption_tinymce' ) ) {

// 	function mttr_styleguide_typography_caption_tinymce() {

// 		$tiny_mce_details = array(

// 			'title' => 'Caption',  
// 			'block' => 'p',  
// 			'classes' => 'v-caption',
// 			'wrapper' => false,

// 		);

// 		mttr_add_editor_component( 'Text', $tiny_mce_details );

// 	}

// }







/* ---------------------------------------------------------
*	Output the typography meta
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_meta' ) ) {

	function mttr_styleguide_typography_meta() {

		$data = array(

			'class' => 'v-meta',
			'name' => 'Meta',
			'tag' => 'p',
			
		);

		echo mttr_styleguide_typography_format_element( $data );

		mttr_styleguide_typography_meta_tinymce();

	}

}

add_action( 'mttr_styleguide_typography_elements', 'mttr_styleguide_typography_meta' );


/* ---------------------------------------------------------
*	Add meta to tinyMCE
 ---------------------------------------------------------*/
if (!function_exists( 'mttr_styleguide_typography_meta_tinymce' ) ) {

	function mttr_styleguide_typography_meta_tinymce() {

		$tiny_mce_details = array(

			'title' => 'Meta',  
			'block' => 'h6',  
			'classes' => 'v-caption',
			'wrapper' => false,

		);

		mttr_add_editor_component( 'Text', $tiny_mce_details );

	}

}