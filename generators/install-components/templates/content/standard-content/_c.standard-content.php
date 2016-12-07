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
//	=Components - Flexible - Standard Content
//
// 	Setup and include the standard content templates
//
// ---------------------------------------------------------------------------- *


class Mttr_Component_Standard_Content {

	var $data;
	var $styles;
	var $component_name = 'c-standard-content';



	// ------------------------------------------------
	//	Initial setup
	// ------------------------------------------------
	function __construct( $hook = false, $priority = 10, $data = array() ) {

		// Render the component
		if ( !empty( $hook ) ) {

			if ( empty( $data ) ) {
		
				$data = $this->get_data( get_the_ID() );

			}

			$this->data = $data;

			add_action( $hook, function() {

				$this->render_component( $this->data );

			}, $priority );

		// Setup the component
		} else {

			// Set up the ACF fields
			$this->add_acf_fields();

			// Add the filter for the column options
			add_filter( 'acf/load_field/key=mttr_flex_standard_content_column_options', function( $field ) {

				return $this->filter_acf_column_option_fields( $field );

			});

		}

	}




	// ------------------------------------------------
	//	Filter the option field markup
	// ------------------------------------------------
	function filter_acf_column_option_fields( $field ) {

		$field[ 'choices' ] = array(

			'one' => '<img src="' . get_template_directory_uri() .'/components/content/standard-content/img/content-one-col.png" alt="One Column">',
			'two' => '<img src="' . get_template_directory_uri() .'/components/content/standard-content/img/content-two-cols.png" alt="Two Columns">',
			'three' => '<img src="' . get_template_directory_uri() .'/components/content/standard-content/img/content-three-cols.png" alt="Three Columns">',
			'content_sidebar' => '<img src="' . get_template_directory_uri() .'/components/content/standard-content/img/content-content-sidebar.png" alt="Content Sidebar">',
			'sidebar_content' => '<img src="' . get_template_directory_uri() .'/components/content/standard-content/img/content-sidebar-content.png" alt="Sidebar Content">'

		);

		return $field;

	}




	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (

			'key' => 'mttr_flex_layouts_standard_content',
			'name' => 'standard_content',
			'label' => 'Standard Content',
			'display' => 'row',
			'sub_fields' => array (
				array (
					'key' => 'mttr_flex_standard_content_column_options',
					'label' => 'Columns',
					'name' => 'columns',
					'type' => 'radio',
					'instructions' => 'Choose the desired layout. This layout will be reflected on larger screen sizes. On smaller screen sizes, the columns will stack below each other.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						// Choices are loaded in a function below
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'one',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'mttr_flex_standard_content_wysiwyg_one',
					'label' => 'Content One',
					'name' => 'content_one',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
				array (
					'key' => 'mttr_flex_standard_content_wysiwyg_two',
					'label' => 'Content Two',
					'name' => 'content_two',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'mttr_flex_standard_content_column_options',
								'operator' => '!=',
								'value' => 'one',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
				array (
					'key' => 'mttr_flex_standard_content_wysiwyg_three',
					'label' => 'Content Three',
					'name' => 'content_three',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'mttr_flex_standard_content_column_options',
								'operator' => '==',
								'value' => 'three',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
				),
				array (
					'key' => 'mttr_flex_standard_content_width',
					'label' => 'Width',
					'name' => 'width',
					'type' => 'radio',
					'instructions' => 'Choose the width of the content. Optimal is recommended for long passages of text in a single column. For a larger number of columns, block may be best.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'u-line-length' => 'Optimal',
						'u-line-length--wide' => 'Block',
						'u-line-length--petite' => 'Short'
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'line_length',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'mttr_flex_standard_content_alignment',
					'label' => 'Alignment',
					'name' => 'alignment',
					'type' => 'radio',
					'instructions' => 'Choose the alignment of the content. This only affects the block alignment, not text alignment.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 50,
						'class' => '',
						'id' => '',
					),
					'choices' => array (
						'u-line-length--left' => 'Left',
						'u-line-length--center' => 'Center',
						'u-line-length--right' => 'Right'
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => apply_filters( 'mttr_flex_standard_content_alignment_default', 'u-line-length--left' ),
					'layout' => 'horizontal',
				),
				array (
					'key' => 'mttr_flex_standard_content_reverse',
					'label' => 'Reverse',
					'name' => 'reverse',
					'type' => 'true_false',
					'instructions' => 'Reverse the direction flow on larger screens. This will effectively "swap" the block positions on desktop, but retain the original stacking order on smaller screens.',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'mttr_flex_standard_content_column_options',
								'operator' => '==',
								'value' => 'content_sidebar',
							),
						),
						array (
							array (
								'field' => 'mttr_flex_standard_content_column_options',
								'operator' => '==',
								'value' => 'sidebar_content',
							),
						),
						array (
							array (
								'field' => 'mttr_flex_standard_content_column_options',
								'operator' => '==',
								'value' => 'two',
							),
						),
					),
					'wrapper' => array (
						'width' => 50,
						'class' => '',
						'id' => '',
					),
					'message' => 'Reverse the content flow.',
					'default_value' => 0,
				),
			),
			'min' => '',
			'max' => '',

		);

		mttr_add_acf_flexible_content_option( 'standard_content', apply_filters( 'mttr_setup_flex_standard_content_acf_fields_array', $fields ) );

	}




	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/content/standard-content/_c.standard-content-tpl';

	}




	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data() {

		$layout = get_sub_field( 'columns' );

		$content_one = get_sub_field( 'content_one', false, false );
		$content_two = get_sub_field( 'content_two', false, false );
		$content_three = get_sub_field( 'content_three', false, false );

		$width = get_sub_field( 'width' );
		$alignment = get_sub_field( 'alignment' );

		if ( $layout == 'content_sidebar' ) {

			$content = array(

				'content' => $content_one,
				'sidebar' => $content_two,

			);

			$modifiers = 'o-lyt--content-sidebar';

		}

		if ( $layout == 'sidebar_content' ) {

			$content = array(

				'content' => $content_two,
				'sidebar' => $content_one,

			);

			$modifiers = 'o-lyt--content-sidebar';

		}

		if ( $layout == 'one' ) {

			$content = array(

				'primary' => $content_one

			);

			$modifiers = 'o-lyt';

		}

		if ( $layout == 'two' ) {

			$content = array(

				'primary' => $content_one,
				'secondary' => $content_two,

			);

			$modifiers = 'o-lyt--halves';

		}

		if ( $layout == 'three' ) {

			$content = array(

				'primary' => $content_one,
				'secondary' => $content_two,
				'tertiary' => $content_three,

			);

			$modifiers = 'o-lyt--thirds';

		}

		$data = array(

			'content' => $content,
			'width' => $width,
			'alignment' => $alignment,
			'modifiers' => $modifiers

		);

		return apply_filters( 'mttr_get_flexible_content_standard_content_data', $data );

	}




	// ------------------------------------------------
	//	Render the actual component
	// ------------------------------------------------
	function render_component( $data ) {

		mttr_get_template( $this->get_component_template_location(), $data );

	}

}


// Initialise the component
add_action( 'init', function() {

	new Mttr_Component_Standard_Content();
	
}, 4 );