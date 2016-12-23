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
//    =Core - Component Layer
//
//    Handles component layer, getting templates and checking data
//
// ---------------------------------------------------------------------------- *




/* ---------------------------------------------------------
*	Add a class of 'page--styleguide' to the styleguide body tag
 ---------------------------------------------------------*/
add_filter( 'body_class', 'mttr_add_styleguide_body_class' );

function mttr_add_styleguide_body_class( $classes ) {

	if ( mttr_is_styleguide() ) {
		
		$classes[] = 'page--styleguide';

	}

	return $classes;

}






/* ---------------------------------------------------------
*	Get a template - set the data, then return template with data
 ---------------------------------------------------------*/
function mttr_get_template( $slug, $data = array() ) {

	set_query_var( 'mttr_template_data', $data );
	get_template_part( $slug );

}






/* ---------------------------------------------------------
*	Get data sent to a template
 ---------------------------------------------------------*/
function mttr_get_template_var( $var_name = null ) {

	if ( '' != $var_name ) {

		$vars = get_query_var( 'mttr_template_data' );

		if ( isset( $vars[ $var_name ] ) ) {

			return $vars[ $var_name ];

		} else {

			return false;

		}

	// Return the whole array
	} else {

		return get_query_var( 'mttr_template_data' );

	}

}






/* ---------------------------------------------------------
*	Add a new component to a global array
 ---------------------------------------------------------*/
function mttr_add_component( $name, $template, $data = array() ) {

	global $_mttr_components;
 
	$_mttr_components[ esc_attr( $name ) ] = array(

		'template'  => esc_html( $template ),
		'data' => $data,

	);

}






/* ---------------------------------------------------------
*	Get information about a component from a global array
 ---------------------------------------------------------*/
function mttr_get_component( $name ) {

	global $_mttr_components;
	$components_arr = $_mttr_components;

	if ( isset( $components_arr[ esc_attr( $name ) ] ) ) {

		return $components_arr[ esc_attr( $name ) ];

	} else {

		return false;

	}

}




/* ---------------------------------------------------------
*	Get the template for a component from a global array
 ---------------------------------------------------------*/
function mttr_template_loop_through_content_templates( $content, $allowed_html = false, $offsetmargin = false ) {

	foreach ( $content as $item ) {

		if ( empty( $item['template'] ) && ! is_array( $item ) ) {

			mttr_template_offset_margin( $item, $allowed_html, $offsetmargin );

		} else {

			mttr_get_template( $item['template'], $item['data'] );

		}

	}

}




/* ---------------------------------------------------------
*	Get the allowed basic html tags - used for inline elements
 ---------------------------------------------------------*/
function mttr_template_get_basic_allowed_inline_tags( $links = false ) {

	$allowed_html = array(

		'br' => array(),
		'p' => array(
			'class' => array()
		),
		'em' => array(),
		'strong' => array(),
		'img' => array(
			'src' => array(),
			'data-src' => array(),
			'alt' => array(),
			'class' => array(),
		),

	);

	if ( $links ) {

		$allowed_html['a'] = array(

			'href' => array(),
			'class' => array(),
			'data-smooth-scroll-target' => array(),

		);
		
	}

	return apply_filters( 'mttr_template_get_basic_allowed_inline_tags_array', $allowed_html );

}





/* ---------------------------------------------------------
*	Get the template for a component from a global array
 ---------------------------------------------------------*/
function mttr_template_offset_margin( $content, $allowed_html = false, $negate = true ) {

	if ( is_array( $content ) ) {

		trigger_error("An array has been passed, mttr_template_offset_margin() expects a string.", E_USER_ERROR);
		exit();

	} else {

		if ( $allowed_html ) {

			echo wp_kses( $content, $allowed_html );

		} else {

			if ( $negate ) {

				echo '<div class="' . apply_filters( 'mttr_negate_btm_margin_utility_class', 'u-negate-btm-margin' ) . '">';

			}

				echo apply_filters( 'the_content', $content );

			if ( $negate ) {

				echo '</div>';

			}

		}

	}

}





/* ---------------------------------------------------------
*	Get the template for a component from a global array
 ---------------------------------------------------------*/
function mttr_get_component_template( $name, $data ) {

	global $_mttr_components;
	$components_arr = $_mttr_components;

	if ( isset( $components_arr[ esc_attr( $name ) ]['template'] ) ) {

		return mttr_get_template( mttr_get_component_template_file( esc_attr( $name ) ), $data );

	} else {

		return false;

	}

}





/* ---------------------------------------------------------
*	Get the title for a component test
 ---------------------------------------------------------*/
function mttr_get_component_test_info( $component, $test, $info = 'title' ) {

	global $_mttr_components;
	$components_arr = $_mttr_components;

	if ( isset( $components_arr[ esc_attr( $component ) ]['tests'][ esc_attr( $test ) ][ esc_attr( $info ) ] ) ) {

		return $components_arr[ esc_attr( $component ) ]['tests'][ esc_attr( $test ) ][ esc_attr( $info ) ];

	} else {

		return false;

	}

}





/* ---------------------------------------------------------
*	Get the location of the template for a component from a global array
 ---------------------------------------------------------*/
function mttr_get_component_template_file( $name ) {

	global $_mttr_components;
	$components_arr = $_mttr_components;

	if ( isset( $components_arr[ esc_attr( $name ) ]['template'] ) ) {

		return $components_arr[ esc_attr( $name ) ]['template'];

	} else {

		return false;

	}

}






/* ---------------------------------------------------------
*	Get the modifiers from a component test
 ---------------------------------------------------------*/
function mttr_get_component_test_data( $component, $test, $data = 'modifiers' ) {

	global $_mttr_components;
	$components_arr = $_mttr_components;

	if ( isset( $components_arr[ esc_attr( $component ) ]['tests'][ esc_attr( $test ) ]['data'][ esc_attr( $data ) ] ) ) {

		return $components_arr[ esc_attr( $component ) ]['tests'][ esc_attr( $test ) ]['data'][ esc_attr( $data ) ];

	} else {

		return false;

	}

}





/* ---------------------------------------------------------
*	Get the data array from a component test
 ---------------------------------------------------------*/
function mttr_get_component_test_data_array( $component, $test ) {

	global $_mttr_components;
	$components_arr = $_mttr_components;

	if ( isset( $components_arr[ esc_attr( $component ) ]['tests'][ esc_attr( $test ) ]['data'] ) ) {

		return $components_arr[ esc_attr( $component ) ]['tests'][ esc_attr( $test ) ]['data'];

	} else {

		return false;

	}

}





/* ---------------------------------------------------------
*	Add a component test to the styleguide
 ---------------------------------------------------------*/
function mttr_add_component_test( $component_type, $name, $data ) {

	global $_mttr_components;

	if ( 'template' == $name ) {

		trigger_error( 'Can not add a component instance of "template".' );

	}

	if ( isset( $_mttr_components[ esc_attr( $component_type ) ] ) ) {

		$_mttr_components[ esc_attr( $component_type ) ]['tests'][ $name ] = $data;

	}

}







/* ---------------------------------------------------------
*	Add a component test to the styleguide
 ---------------------------------------------------------*/
function mttr_add_editor_component( $group, $data ) {

	global $_mttr_editor_components;

	$_mttr_editor_components[ esc_attr( $group ) ][] = $data;

}




/* ---------------------------------------------------------
*	Add a component test to the styleguide
 ---------------------------------------------------------*/
function mttr_format_editor_components( $array ) {

	if ( is_array( $array ) ) {

		$settings = array();

		foreach ( $array as $key => $component ) {

			$settings[] = array(

				'title' => $key,
				'items' => $component

			);

		}

		return $settings;

	}

	return false;

}




/* ---------------------------------------------------------
*	Add typographic styles to the editor
 ---------------------------------------------------------*/
function mttr_add_editor_component_to_tinymce( $settings ) {  

	global $_mttr_editor_components;
	$mttr_styles = mttr_format_editor_components( $_mttr_editor_components );

	// Only add settings if we HAVE any
	if ( $mttr_styles ) {

		// Merge old & new styles
		$settings[ 'style_formats_merge' ] = true;

		// Add new styles
		$settings[ 'style_formats' ] = json_encode( $mttr_styles );

	}

	// Return New Settings
	return $settings;
  
} 

add_filter( 'tiny_mce_before_init', 'mttr_add_editor_component_to_tinymce' ); 






/* ---------------------------------------------------------
*	Add the styleselect dropdown to the editor
 ---------------------------------------------------------*/
function mttr_text_editor_add_style_dropdown( $buttons ) {

	array_unshift( $buttons, 'styleselect' );
	return $buttons;

}
add_filter( 'mce_buttons_2', 'mttr_text_editor_add_style_dropdown' );







/* ---------------------------------------------------------
*	Get the standard grid feature data
 ---------------------------------------------------------*/
function mttr_get_grid_feature_data_standard( $id ) {

	global $post;
	$post = $id;
	setup_postdata( $post );

	// Heading
	$heading = get_field( 'mttr_meta_heading' );

	if ( empty( $heading ) ) {

		$heading = get_the_title();

	}


	// Subheading
	$subheading = get_field( 'mttr_meta_subheading' );


	// Content
	$content = get_field( 'mttr_meta_content' );

	if ( empty( $content ) ) {

		$content = get_the_excerpt();

	}


	// Icon
	$icon = get_field( 'mttr_meta_icon_image' );

	if ( empty( $icon ) ) {

		$icon = get_field( 'mttr_meta_icon' );

		if ( $icon ) {

			$icon = mttr_get_icon( esc_attr( $icon ) );

		}

	}


	// Image
	$image = get_field( 'mttr_meta_image' );

	if ( empty( $image ) && has_post_thumbnail() ) {

		$image = get_post_thumbnail_id();

	}


	// CTA Text
	$cta_text = get_field( 'mttr_meta_cta_text' );

	if ( empty( $cta_text ) ) {

		$cta_text = get_the_title();

	}


	// CTA link
	$link = get_field( 'mttr_meta_cta_link' );

	if ( empty( $link ) ) {

		$link = get_the_permalink();

	}


	// Data
	$data = array(

		'heading' => $heading,
		'subheading' => $subheading,
		'content' => $content,
		'icon' => $icon,
		'image' => $image,
		'link' => $link,
		'cta_text' => $cta_text

	);


	wp_reset_postdata();

	return $data;

}







/* ---------------------------------------------------------
*	Auto load the PHP components
 ---------------------------------------------------------*/
function mttr_load_components( $type, $components_dir = '/components/' ) {

	$location = get_template_directory() . $components_dir . $type . '/';

	if ( file_exists( $location ) ) {

		$scan = scandir( $location );
		
		foreach ( $scan as $component ) {

			if ( file_exists( $location . $component . '/' . '_c.' . $component . '.php' ) ) {

				require( $location . $component . '/' . '_c.' . $component . '.php' );

			}

		}

	}

}





/* ---------------------------------------------------------
* 	Hook and output inline styles
 ----------------------------------------------------------*/
function mttr_output_inline_styles() {

	global $_mttr_global_styles;

	if ( is_array( $_mttr_global_styles ) ) {

		$styles = '';

		foreach( $_mttr_global_styles as $style ) {

			$styles .= $style;

		}

		// Add the inline style
		wp_add_inline_style( mttr_theme_main_css_slug(), $styles );

	}

}
add_action( 'wp_enqueue_scripts', 'mttr_output_inline_styles', 20 );





/* ---------------------------------------------------------
* 	Add inline style
 ----------------------------------------------------------*/
function mttr_add_inline_styles( $name, $style ) {

	global $_mttr_global_styles;
	$_mttr_global_styles[ esc_attr( $name ) ] = $style;

}





/* ---------------------------------------------------------
* 	Setup the component array
 ----------------------------------------------------------*/
function mttr_setup_component_array( $template, $data ) {

	return array(

		'template' => $template,
		'data' => $data

	);

}