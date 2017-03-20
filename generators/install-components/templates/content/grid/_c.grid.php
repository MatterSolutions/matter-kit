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
//	=Components - Flexible - Grid
//
// 	Setup and include the grid ACF options
//
// ---------------------------------------------------------------------------- *


class Mttr_Component_Grid {

	var $data;
	var $styles = '';
	var $component_name = 'c-grid';


	// ------------------------------------------------
	//	Initial setup
	// ------------------------------------------------
	function __construct( $hook = false, $priority = 10, $data = array(), $styles = null ) {

		if ( empty( $data ) ) {
		
			$data = $this->get_data( get_the_ID() );

		}

		if ( !empty( $styles ) ) {

			$this->styles = $styles;

		}

		// Render the component
		if ( !empty( $hook ) ) {

			$this->data = $data;

			// Output the styles in the head
			add_action( 'wp_enqueue_scripts', function() {

				$this->render_styles( $this->styles );

			}, $priority );

			add_action( $hook, function() {

				$this->render_component( $this->data );

			}, $priority );

		// Setup the component
		} else {

			// Set up the ACF fields
			$this->add_acf_fields();

		}

	}




	// ------------------------------------------------
	//	Begin rendering the component styles
	// ------------------------------------------------
	function render_styles() {

		wp_add_inline_style( mttr_theme_main_css_slug(), $this->styles );

	}




	// ------------------------------------------------
	//	Add the ACF fields
	// ------------------------------------------------
	function add_acf_fields() {

		$fields = array (

			'key' => 'mttr_flex_layouts_grid',
			'name' => 'grid',
			'label' => 'Grid',
			'display' => 'block',
			'sub_fields' => array (
				array (
					'key' => 'mttr_flex_layouts_grid_style',
					'label' => 'Style',
					'name' => 'style',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 100,
						'class' => '',
						'id' => '',
					),
					'choices' => mttr_get_acf_flexible_content_feature_options(),
					'default_value' => array (
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,
				),
				array (
					'key' => 'mttr_flex_layouts_grid_style_items_posts',
					'label' => 'Posts',
					'name' => 'posts',
					'type' => 'post_object',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array (
					),
					'taxonomy' => array (
					),
					'allow_null' => 0,
					'multiple' => 1,
					'return_format' => 'id',
					'ui' => 1,
				),
				array (
					'key' => 'mttr_flex_layouts_grid_style_latest',
					'label' => 'Latest Posts',
					'name' => 'latest_posts',
					'type' => 'true_false',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 25,
						'class' => '',
						'id' => '',
					),
					'message' => 'Display Latest Posts',
					'default_value' => 0,
				),
				array (
					'key' => 'mttr_flex_layouts_grid_style_post_type',
					'label' => 'Post Type',
					'name' => 'post_type',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'mttr_flex_layouts_grid_style_latest',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => 25,
						'class' => '',
						'id' => '',
					),
					'choices' => mttr_flex_layouts_grid_style_post_type_choices(),
					'default_value' => array (
						'standard' => apply_filters( 'mttr_flex_layouts_grid_style_post_type_standard', 'standard' ),
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,
				),
				array (
					'key' => 'mttr_flex_layouts_grid_style_post_category',
					'taxonomy' => 'category',
					'field_type' => 'multi_select',
					'multiple' => 0,
					'allow_null' => 0,
					'return_format' => 'id',
					'add_term' => 0,
					'load_terms' => 0,
					'save_terms' => 0,
					'label' => 'Post Category',
					'name' => 'post_category',
					'type' => 'taxonomy',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'mttr_flex_layouts_grid_style_latest',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => 25,
						'class' => '',
						'id' => '',
					),
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,
				),
				array (
					'key' => 'mttr_flex_layouts_grid_style_post_num',
					'label' => 'Number of Posts',
					'name' => 'per_page',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'mttr_flex_layouts_grid_style_latest',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => 25,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
			'min' => '',
			'max' => '',

		);

		mttr_add_acf_flexible_content_option( 'grid', apply_filters( 'mttr_setup_flex_grid_acf_fields_array', $fields ) );

	}




	// ------------------------------------------------
	//	Get the component location
	// ------------------------------------------------
	function get_component_template_location() {

		return 'components/content/grid/_c.grid-tpl';

	}



	// ------------------------------------------------
	//	Get the component classname
	// ------------------------------------------------
	function get_class_name( $style ) {

		// Setup the content
		$classname = 'Mttr_Component_' . ucwords( str_replace( '-', ' ', esc_attr( $style ) ) );
		$classname = ucwords( str_replace( ' ', '_', $classname ) );

		return $classname;

	}



	// ------------------------------------------------
	//	Get the data
	// ------------------------------------------------
	function get_data( $style = null, $posts = array() ) {

		if( function_exists( 'get_sub_field' ) ) {

			$latest_posts = get_sub_field( 'latest_posts' );
			$per_page = get_sub_field( 'per_page' );

			if ( empty( $style ) ) {
			
				$style = get_sub_field( 'style' );

			}

			// Base array to add items to
			$items = array();
			$listing_data = false;

			if ( class_exists( $this->get_class_name( $style ) ) ) {

				$classname = $this->get_class_name( $style );
				$class = new $classname();

				// Get the listing modifiers etc
				$listing_data = $class->get_listing_data();
				$listing_data['id'] = 'c-grid-' . esc_attr( $style ) . '-' . rand( 0000, 9999 );


				// Get latest posts
				if ( $latest_posts ) {

					$post_type = get_sub_field( 'post_type' );
					$per_page = get_sub_field( 'per_page' );
					$categories = get_sub_field( 'post_category' );

					// If no per page set, use the default posts per page
					if ( empty( $per_page ) ) {

						$per_page = get_option( 'posts_per_page' );

					}

					// Setup args
					$args = array( 

						'post_type' => $post_type,
						'post_status' => 'publish',
						'posts_per_page' => intval( $per_page ),

					);

					// Add categories to args
					if ( $categories && 'post' == $post_type ) {

						$args['cat'] = implode( ',', $categories );

					}

					
					// Setup the query
					$q = new WP_Query( $args );

					// Check that the class we're looking for exists and we have posts
					if ( $q->have_posts() ) {

						$counter = 1;

						while ( $q->have_posts() ) {

							$q->the_post();
							
							// Cache data in a var
							$data = $class->get_data( get_the_ID() );

							// Add a unique identifier for the components
							$data['data']['id'] = $listing_data['id'] . '-' . $counter;
							$items[] = $data;

							// Add the styles
							if ( method_exists( $class, 'get_styles' ) ) {

								$this->add_styles( $class->get_styles( $data['data'] ) );

							}

							$counter++;

						}

					}

					// Reset the postdata
					wp_reset_postdata();


				// We have specified posts, look for those!
				} else {

					if ( empty( $posts ) ) {

						$posts = get_sub_field( 'posts' );

					}

					if ( $posts ) {

						$counter = 1;

						// Loop through each post
						foreach( $posts as $post ) {

							// Cache data in a var
							$data = $class->get_data( $post );

							// Add a unique identifier for the components
							$data['data']['id'] = $listing_data['id'] . '-' . $counter;
							$items[] = $data;

							// Add the styles
							if ( method_exists( $class, 'get_styles' ) ) {

								$this->add_styles( $class->get_styles( $data['data'] ) );

							}

							$counter++;

						}

					}

				}

			}

			// Return the listing data and the items
			return array(

				'listing' => $listing_data,
				'items' => array(

					'data' => $items

				)

			);

		} else {

			return false;

		}

	}



	// ------------------------------------------------
	//	Add style
	// ------------------------------------------------
	function add_styles( $styles ) {

		if ( !empty( $styles ) ) {

			$this->styles = $this->styles . $styles;

		}

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

	new Mttr_Component_Grid();
	
}, 4 );