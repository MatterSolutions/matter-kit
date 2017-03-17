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
//	=Components - <%= componentInfo.componentName %>
//
// 	Main template file for including the <%= componentInfo.componentName %>
//
// ---------------------------------------------------------------------------- *

// Component vars
<% if ( componentInfo.componentFields !== "grid" ) { %>$content = mttr_get_template_var( 'content' );<% } %>
$id = mttr_get_template_var( 'id' );
<% if ( componentInfo.componentFields === "grid" ) { %>$heading = mttr_get_template_var( 'heading' );
$content = mttr_get_template_var( 'excerpt' );<% } %>


// Component namespace, in case we've changed it
$namespace = mttr_get_template_var( 'namespace' );
if ( !$namespace ) { $namespace = 'c-<%= componentInfo.componentSlug %>'; }

// Setup a unique identifier
if ( !$id ) { $id = rand( 0000, 9999 ) . date( 'His' ); }

// Modifiers
$modifiers = mttr_get_template_var( 'modifiers' );
if ( $modifiers ) { $modifiers = '  ' . $modifiers; }



// ------------------------------------------------
//	Begin outputting component
// ------------------------------------------------

echo '<div id="' . esc_html( $namespace ) . '--' . esc_attr( $id ) . '" class="' . esc_html( $namespace ) . esc_html( $modifiers ) . '">';

	echo '<div class="' . esc_html( $namespace ) . '__body">';

		<% if ( componentInfo.componentFields === "grid" ) { %>if ( $heading ) {

			echo '<h3 class="' . esc_html( $namespace ) . '__heading">';

				echo esc_html( $heading );

			echo '</h3><!-- /.' . esc_html( $namespace ) . '__heading -->';

		}<% } %>

		if ( $content ) {

			echo '<div class="' . esc_html( $namespace ) . '__content">';

				echo apply_filters( 'the_content', $content );

			echo '</div><!-- /.' . esc_html( $namespace ) . '__content -->';

		}

	echo '</div><!-- /.' . esc_html( $namespace ) . '__body -->';

echo '</div><!-- /.' . esc_html( $namespace ) . ' -->';