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
//    =Boilerplate - Setup
//
//    Misc setup items, removing some WP things, setting up capabilities
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Add excerpt support to pages
 --------------------------------------------------------- */
add_action( 'init', 'mttr_add_excerpts_to_pages' );

function mttr_add_excerpts_to_pages() {

     add_post_type_support( 'page', 'excerpt' );

}





/* ---------------------------------------------------------
*	Remove emoji scripts
 --------------------------------------------------------- */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );




/* ---------------------------------------------------------
*	Push Gravity Forms to the footer
 --------------------------------------------------------- */
add_filter( 'gform_init_scripts_footer', '__return_true' );


/* ---------------------------------------------------------
*	Set the tabindex to false
 --------------------------------------------------------- */
add_filter( 'gform_tabindex', '__return_false' );




/* ---------------------------------------------------------
*	Set the theme text domain
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_text_domain' ) ) {

	function mttr_text_domain() {

		load_theme_textdomain( 'mttr', get_template_directory() . '/languages' );

	}

}

add_action( 'after_setup_theme', 'mttr_text_domain' );




/* ---------------------------------------------------------
*	Theme support
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_supports' ) ) {

	function mttr_theme_supports() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		//HTML 5 Elements
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}

}
add_action( 'after_setup_theme', 'mttr_theme_supports' );




/* ---------------------------------------------------------
*	Remove unnecessary image sizes
 --------------------------------------------------------- */
function mttr_remove_default_image_sizes( $sizes ) {

    unset( $sizes['medium'] );
    return $sizes;

}
add_filter( 'intermediate_image_sizes_advanced', 'mttr_remove_default_image_sizes' );





/* ---------------------------------------------------------
*	Image Sizes
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_image_sizes' ) ) {

	function mttr_theme_image_sizes() {

		// Layout specific image sizes
		add_image_size( 'mttr_hero', 1500, 800, true );

	}

}
add_action( 'after_setup_theme', 'mttr_theme_image_sizes' );




/* ---------------------------------------------------------
*	Standard menus
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_default_menus' ) ) {

	function mttr_theme_default_menus() {

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'mttr' ),
			'secondary' => esc_html__( 'Secondary', 'mttr' ),
			'footer' => esc_html__( 'Footer', 'mttr' ),
			'legal' => esc_html__( 'Legal', 'mttr' ),
		) );

	}

}
add_action( 'after_setup_theme', 'mttr_theme_default_menus' );






/* ---------------------------------------------------------
*	Load jQuery
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_jquery' ) ) {

	function mttr_theme_jquery() {

		if ( ! is_admin() ) {

			wp_deregister_script( 'jquery' ); 
			wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.3.min.js', array(), '1.3.2' ); 
			wp_enqueue_script( 'jquery' );

		}

	}

}
add_action( 'wp_enqueue_scripts', 'mttr_theme_jquery' );






/* ---------------------------------------------------------
*	Return css slug name
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_main_css_slug' ) ) {

	function mttr_theme_main_css_slug() {

		return apply_filters( 'mttr_theme_main_css_slug', 'mttr-style' );

	}

}







/* ---------------------------------------------------------
*	Load main CSS file
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_main_css' ) ) {

	function mttr_theme_main_css() {

		// Output wires if dev environment, wires is set and NOT the styleguide
		if ( defined( 'MTTR_WIRES' )  &&  ( true == MTTR_WIRES )  &&  ( ! mttr_is_styleguide() ) ) {

			// Wires
			wp_enqueue_style( mttr_theme_main_css_slug(), get_template_directory_uri() . '/assets/css/wires.css' );

		} else {

			// Base Stylesheet
			wp_enqueue_style( mttr_theme_main_css_slug(), get_template_directory_uri() . '/assets/css/main.css' );

		}

	}

}
add_action( 'wp_enqueue_scripts', 'mttr_theme_main_css' );







/* ---------------------------------------------------------
*	Load editor CSS file
 --------------------------------------------------------- */
 if ( ! function_exists( 'mttr_theme_editor_css' ) ) {

	function mttr_theme_editor_css() {

		add_editor_style( get_stylesheet_directory_uri() . '/assets/css/editor.css' );

	}

}
add_action( 'admin_init', 'mttr_theme_editor_css' );
 






/* ---------------------------------------------------------
*	Load main JS file
 --------------------------------------------------------- */
if ( ! function_exists( 'mttr_theme_main_js' ) ) {

	function mttr_theme_main_js() {

		// Base Scripts
		wp_enqueue_script( 'mttr-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '201607', true );

	}

}
add_action( 'wp_enqueue_scripts', 'mttr_theme_main_js' );