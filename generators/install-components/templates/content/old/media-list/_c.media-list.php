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
//	=Components - Flexible - Media list
//
// 	Setup and include the media list templates
//
// ---------------------------------------------------------------------------- *



/*
*	Add the hero as a flexible content option
*/
function mttr_get_flexible_content_media_list() {

	$items = get_sub_field( 'items' );
	$modifiers = 'o-lyt--alternate  o-lyt--large  o-ltg--large';

	$modifiers = apply_filters( 'mttr_get_flexible_content_media_list_modifiers', $modifiers );

	if ( get_sub_field( 'reverse' ) ) {

		$modifiers .= '  o-lyt--reverse';

	}

	$data = array(

		'items' => $items,
		'modifiers' => $modifiers

	);

	$data = apply_filters( 'mttr_get_flexible_content_media_list_data', $data );
	$template = apply_filters( 'mttr_get_flexible_media_list_content_template', 'components/content/flexible/media-list/_c.media-list-tpl' );

	mttr_get_template( $template, $data );

}





/* ---------------------------------------------------------
*	Setup the standard content ACF fields
 ---------------------------------------------------------*/
function mttr_setup_flex_media_list_acf_fields() {

	$fields = array (

		'key' => 'mttr_flex_layouts_media_list',
		'name' => 'media_list',
		'label' => 'Media',
		'display' => 'block',
		'sub_fields' => array (
			array (
				'key' => 'mttr_flex_layouts_media_list_items',
				'label' => 'Items',
				'name' => 'items',
				'type' => 'repeater',
				'instructions' => 'Add an image and the associated content. This content will appear beside the image on larger screens and below the image on smaller screens. A list of images and items will alternate left and right automatically, starting with the image on the left. To start the alternating with the image on the right, check the "Reverse" box below the list.',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => '',
				'max' => '',
				'layout' => 'block',
				'button_label' => 'Add Media Block',
				'sub_fields' => array (
					array (
						'key' => 'mttr_flex_layouts_media_item_img',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 33,
							'class' => '',
							'id' => '',
						),
						'return_format' => 'id',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array (
						'key' => 'mttr_flex_layouts_media_list_item_content',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 66,
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
					),
				),
			),
			array (
				'key' => 'mttr_flex_layouts_media_list_reverse',
				'label' => 'Reverse',
				'name' => 'reverse',
				'type' => 'true_false',
				'instructions' => 'Reverse the original directional flow of the items in the list.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Reverse',
				'default_value' => 0,
			),
		),
		'min' => '',
		'max' => '',

	);

	mttr_add_acf_flexible_content_option( 'media_list', apply_filters( 'mttr_setup_flex_media_list_acf_fields_array', $fields ) );

}

add_action( 'init', 'mttr_setup_flex_media_list_acf_fields', 7 );