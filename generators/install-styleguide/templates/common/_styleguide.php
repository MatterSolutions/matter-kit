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
//    =Common - Styleguide elements
//
//    Reusable styleguide functions
//    Usually contains functions for use within the styleguide templates
//
// ---------------------------------------------------------------------------- *


/* ---------------------------------------------------------
*	Output the primary typeface
 ---------------------------------------------------------*/
if ( ! function_exists( 'mttr_theme_typefaces' ) ) {

	function mttr_theme_typefaces() {

		<% if ( styleguideInfo.TypefaceHost == "GoogleFonts" ) { %>
		wp_enqueue_script( 'webfont-loader', 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js', null, null, true );
		wp_add_inline_script( 'webfont-loader', "WebFont.load({ google: { families: ['<%= styleguideInfo.TypefaceData %>'] } });" );
		<% } %><% if ( styleguideInfo.TypefaceHost == "Typekit" ) { %>
		$typekit = '(function(d) { var config = { kitId: \'<%= styleguideInfo.TypefaceData %>\', scriptTimeout: 3000, async: true }, h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src=\'https://use.typekit.net/\'+config.kitId+\'.js\';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s) })(document);';
		wp_add_inline_script( 'webfont-loader', $typekit );
		<% } %>

	}

}
add_action( 'wp_enqueue_scripts', 'mttr_theme_typefaces' );






/* ---------------------------------------------------------
*	Output the styleguide colours
 ---------------------------------------------------------*/
function mttr_get_styleguide_styletile_standard_colours() {

	return array( 

		'primary' => '<%= styleguideInfo.ColourPrimary %>', 
		'secondary' => '<%= styleguideInfo.ColourSecondary %>',
		'tertiary' => '<%= styleguideInfo.ColourTertiary %>',
		
	);

}






/* ---------------------------------------------------------
*	Output the primary typeface
 ---------------------------------------------------------*/
function mttr_styleguide_styletile_typeface_primary() {

	$content = '<h4 class="s-v-meta  u-flush--bottom">Regular: 300</h4>';
	$content .= '<p class="s-styletile__typeface-test">' . mttr_test_typeface() . '</p>';

	$details = array(

		'meta' => 'Primary Typeface',
		'name' => '<%= styleguideInfo.TypefacePrimaryName %>',
		'content' => $content,
		'modifiers' => 'v-subheading',

	);

	mttr_styleguide_styletile_typeface( $details );

}

add_action( 'mttr_styleguide_styletile_top_secondary', 'mttr_styleguide_styletile_typeface_primary', 10 );

